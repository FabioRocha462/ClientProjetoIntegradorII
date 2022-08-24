<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use Illuminate\Client\Response;
use Illuminate\Support\Facades\Http;

class DeliveryController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
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

    public function DeliveryCreated($id){
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL_request = 'http://127.0.0.1:8090/request/'.$id;
        $request = Http::withHeaders([
            'x-access-token'=> $acess
        ])->get($URL_request)->json();
        $address = Http::withHeaders([
            'x-access-token'=> $acess
        ])->get('http://127.0.0.1:8090/address/client/'.$request['id_client'])->json();

        return view('delivery.create',['address'=>$address,'request'=>$request]);
        
    }

    public function DeliveryAddress($id_address,$id_request)
    {
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL_request = 'http://127.0.0.1:8090/request/'.$id_request;
        $request = Http::withHeaders([
            'x-access-token'=> $acess
        ])->get($URL_request)->json();
        $URL_address = 'http://127.0.0.1:8090/address/'.$id_address;
        $address = Http::withHeaders([
            'x-access-token'=> $acess
        ])->get($URL_address)->json();
        return view('delivery.salve',['request'=>$request,'address'=>$address]);
    }

    public function SalveDelvery(Request $request,$id_request,$id_address){
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $shipping_value = $request->shipping_value;
        $URL ='http://127.0.0.1:8090/delivery/request/'.$id_request.'/'.$id_address;
        $response = Http::withHeaders([
            'x-access-token'=> $acess
        ])->post($URL,['shipping_value'=>$shipping_value]);


        $URL_tracking = 'http://127.0.0.1:8090/tracking/request/'.$id_request;
        $tracking = Http::withHeaders([
            'x-access-token'=> $acess
        ])->post($URL_tracking)->json();
        if($response->serverError() == true){
            $msg = "erro ao salvar a entrega :(";
            return view('dashboard',['msg'=>$msg]);
        }else{
            $msg = "Entrega Salva com Sucesso";
            return view('dashboard',['msg'=>$msg]);
        }

    }
}
