<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Token;
use Illuminate\Client\Response;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $store = Http::withHeaders([
            'x-access-token' => $acess
        ])->get('http://127.0.0.1:8090/current_store')->json();
        $URL = 'http://127.0.0.1:8090/product/store/'.$store['id'];
        $Products = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL)->json();
        if(empty($Products)){
            $msg = 'A loja não tem nenhum Produto';
            return view('product.index',['msg'=>$msg]);
        }else{
        return view('product.index',['Products'=>$Products]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'unitary_value'=>'required',
            'weigth'=>'required',
        ]);
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $store = Http::withHeaders([
            'x-access-token' => $acess
        ])->get('http://127.0.0.1:8090/current_store')->json();
        $URL = 'http://127.0.0.1:8090/product/store/'.$store['id'];
        $name = $request->name;
        $unitary_value = (float)$request->unitary_value;
        $weigth = (float)$request->weigth;
        $response = Http::withHeaders([
            'x-access-token' => $acess
        ])->post($URL,['name'=>$name,'unitary_value'=>$unitary_value,'weigth'=>$weigth]);
        return redirect('dashboard');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL = 'http://127.0.0.1:8090/product/'.$id;
        $product = Http::withHeaders([
            'x-access-token' => $acess
        ])->get(url:$URL)->json();


        if(empty($product)){
            return redirect('dashboard');
        }else{
        return view('product.show',['product'=>$product]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL= 'http://127.0.0.1:8090/product/'.$id;
        $product = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL)->json();
        return view('product.edit',['product'=>$product]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'unitary_value'=>'required',
            'weigth'=>'required',
        ]);
        $URL= 'http://127.0.0.1:8090/product/'.$id;
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $name = $request->name;
        $unitary_value = (float)$request->unitary_value;
        $weigth = (float)$request->weigth;
        $response = Http::withHeaders([
            'x-access-token' => $acess
        ])->put($URL,['name'=>$name,'unitary_value'=>$unitary_value,'weigth'=>$weigth]);
        return redirect('dashboard');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchProdutc(Request $request, $id)
    { 
        $name = $request->name;
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL = "http://127.0.0.1:8090/product/name";
        $product = Http::withHeaders([
            'x-access-token' => $acess
        ])->post($URL,['name'=>$name])->json();
        $URL_request = "http://127.0.0.1:8090/request/".$id;
        $request = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL_request)->json();
        if($product == 405){
            return redirect('request.create',['request'=>$request]);
        }else{
            return view('request.create',['product'=>$product],['request'=>$request]);
        }
    }
    public function updateProduct(Request $request,$id)
    {
        //
        $request->validate([
            'name'=>'required',
            'unitary_value'=>'required',
            'weigth'=>'required',
        ]);
        $URL= 'http://127.0.0.1:8090/product/'.$id;
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $name = $request->name;
        $unitary_value = (float)$request->unitary_value;
        $weigth = (float)$request->weigth;
        $response = Http::withHeaders([
            'x-access-token' => $acess
        ])->put($URL,['name'=>$name,'unitary_value'=>$unitary_value,'weigth'=>$weigth]);
        return redirect('dashboard');
        
    }
    public function destroyProduct($id){
        $URL= 'http://127.0.0.1:8090/product/'.$id;  
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $response = Http::withHeaders([
            'x-access-token' => $acess
        ])->delete($URL);

    }
}
