<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Token;
use Illuminate\Client\Response;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('address.create');
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
        $URL_ADDRESS = 'http://127.0.0.1:8090/address/'.$id;
        $address = Http::withHeaders([
            'x-access-token'=>$acess
        ])->get($URL_ADDRESS)->json();
        return view('address.show',['address'=>$address]);
        
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

        $URL_ADDRESS = 'http://127.0.0.1:8090/address/'.$id;

        $address = Http::withHeaders([
            'x-access-token'=>$acess
        ])->get($URL_ADDRESS)->json();
        return view('address.edit',['address'=>$address]);

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
    public function addressClient($id)
    {
        $token = Token::findOrFail(1);
        $acess = $token->token;

        $URL_ADDRESS = 'http://127.0.0.1:8090/address/client/'.$id;

        $address = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL_ADDRESS)->json();
        $addressJson = $address[0];
        if(!empty($address))
        {
            return view('address.index',['address'=>$address]);
        }else{
            return redirect('dashboard');
        }
        
    }
    public function addAddress($id){
        $URL = 'http://127.0.0.1:8090/client/'.$id;
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $client = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL)->json();
        return view('address.create',['client'=>$client]);

    }

    public function SalveAddress(Request $request, $id){
        $URL_address ='http://127.0.0.1:8090/address/client/'.$id;
        $token = Token::findOrFail(1);
        $acess = $token->token; 
        $locality = $request->locality;
        $local = $request->local;
        $district = $request->district;
        $number = $request->number;
        $cep = $request->cep;
        $response = Http::withHeaders([
            'x-access-token' => $acess
        ])->post($URL_address,['locality'=>$locality,'local'=>$local,'district'=>$district,'number'=>$number,'cep'=>$cep]);
        if($response->serverError() == false){
            $msg = 'Salvo com Sucesso';
            return view('dashboard',['msg'=>$msg]);
        }
        else{
            $msg = 'Erro ao salvar';
            return view('dashboard',['msg'=>$msg]);
        }

    }
    public function updateAddress(Request $request,$id)
    {
        $URL_address ='http://127.0.0.1:8090/address/'.$id;
        $token = Token::findOrFail(1);
        $acess = $token->token;   
        $locality = $request->locality;
        $local = $request->local;
        $district = $request->district;
        $number = $request->number;
        $cep = $request->cep; 
        $response = Http::withHeaders([
            'x-access-token' => $acess
        ])->put($URL_address,['locality'=>$locality,'local'=>$local,'district'=>$district,'number'=>$number,'cep'=>$cep]);
        return redirect('dashboard');
    }
    public function destroyAddress($id)
    {
        $token = Token::findOrFail(1);
        $acess = $token->token;   
        $URL_address ='http://127.0.0.1:8090/address/'.$id;
        $response = Http::withHeaders([
            'x-access-token' => $acess
        ])->delete($URL_address);
        return redirect('dashboard');
    }
}
