<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Token;
use Illuminate\Client\Response;
class ClientController extends Controller
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
        $URL = 'http://127.0.0.1:8090/client/store/'.$store['id'];
        $Clients = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL)->json();

        if(empty($Clients)){
            $msg = 'A Loja não tem nenhum client';
            return view('client.index',['msg'=>$msg]);
        }else{
        return view('client.index',['Clients'=>$Clients]);
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
        return view('client.create');
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
            'cpf'=>'required',
            'phone'=>'required',
        ]);
        $name =  $request->name;
        $cpf = $request->cpf;
        $phone =$request->phone;
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $store = Http::withHeaders([
            'x-access-token' => $acess
        ])->get('http://127.0.0.1:8090/current_store')->json();
        $URL = 'http://127.0.0.1:8090/client/store/'.$store['id'];
       $response = Http::withHeaders([
        'x-access-token' => $acess
    ])->post($URL,['name'=>$name,'cpf'=>$cpf,'phone'=>$phone])->json();
       if($response == 200){
        $msg = 'Criado com Sucesso';
        return view('dashboard',['msg'=>$msg]);
       }else{
        $msg = 'Erro ao Criar :(';
        return view('dashboard',['msg'=>$msg]);
       }

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
        $URL = 'http://127.0.0.1:8090/client/'.$id;
        $Client = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL)->json();
        if(empty($Client)){
            return redirect('dashboard');
        }else{
        return view('client.show',['Client'=>$Client]);
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
        $URL = 'http://127.0.0.1:8090/client/'.$id;
        $client = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL);
        return view('client.edit',['client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function client_request($id){
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL = 'http://127.0.0.1:8090/request/client/'.$id;
        $request = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL)->json();
        return view('client.client_request',['request'=>$request]);
    }

    public function updateClient(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'cpf'=>'required',
            'phone'=>'required',
        ]);
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $name = $request->name;
        $cpf = $request->cpf;
        $phone = $request->phone;
        $URL = 'http://127.0.0.1:8090/client/'.$id;
        $response = Http::withHeaders([
            'x-access-token' => $acess
        ])->put($URL,['name'=>$name,'cpf'=>$cpf,'phone'=>$phone]);
        return view('dashboard');

    }
    public function destroyClient($id)
    {
        $URL= 'http://127.0.0.1:8090/client/'.$id;  
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $response = Http::withHeaders([
            'x-access-token' => $acess
        ])->delete($URL);
        return view('dashboard');
    }
}
