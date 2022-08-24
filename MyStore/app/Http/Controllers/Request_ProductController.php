<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Token;
use Illuminate\Client\Response;

class Request_ProductController extends Controller
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
   
    public function createRequest_product(Request $request, $id_request,$id_product)

    {
        $token = Token::findOrFail(1);
        $acess = $token->token;
        $URL = 'http://127.0.0.1:8090/request/product/'.$id_request.'/'.$id_product;
        $quantity = $request->quantity;
        $response = Http::withHeaders([
            'x-access-token' => $acess
        ])->post($URL,['quantity'=>$quantity]);
        $URL_request = 'http://127.0.0.1:8090/request/'.$id_request;
        $request = Http::withHeaders([
            'x-access-token' => $acess
        ])->get($URL_request)->json();
        //$URL_product = 'http://127.0.0.1:8090/product/'.$id_product;
        //$product = Http::get($URL_product)->json();
        return view('request.create',['request'=>$request]);
        
    }
 
}
