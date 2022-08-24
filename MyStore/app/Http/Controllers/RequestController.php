<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Token;
use Illuminate\Client\Response;

class RequestController extends Controller
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

    public function addRequest($id)
    {   
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL = 'http://127.0.0.1:8090/client/'.$id;
        $client = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL)->json();
        return view('request.create',['client'=>$client]);
    }
    public function createRequest($id){
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL = 'http://127.0.0.1:8090/request/client/'.$id;
        $request = Http::withHeaders([
            'x-access-token' => $acess
        ])->post($URL)->json();
        return view('request.create',['request'=>$request]);
        
    }

    public function indexRequestClient($id){
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL = 'http://127.0.0.1:8090/request/client/'.$id;
        $request = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL)->json();
        return view('client.client_request',['request'=>$request]);
    }
    public function showRequest($id)
    {
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL = 'http://127.0.0.1:8090/request/product/'.$id;
        $request = Http::withHeaders([
            'x-access-token' => $acess
            ])->get($URL)->json();


            return view('request.show',['request'=>$request]);
    }
    public function Request_product($id)
    {
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL_request = 'http://127.0.0.1:8090/request/product/'.$id;
        $request = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL_request)->json();
        $total = 0;
        foreach($request as $r){
            $total = $total + $r['mul'];
        }
        $request_id = Http::withHeaders([
            'x-access-token' => $acess
        ])->get('http://127.0.0.1:8090/request/'.$id)->json();

        return view('request.show',['request'=>$request,'total'=>$total,'request_id'=>$request_id]);

    }
}
