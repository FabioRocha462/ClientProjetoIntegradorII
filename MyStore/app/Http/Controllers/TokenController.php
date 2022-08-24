<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;
use Illuminate\Support\Facades\Http;
use Illuminate\Client\Response;
class TokenController extends Controller
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
    public function token_login()
    {
        return view('tokens.token_log');
    }
    public function token_create(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $URL = 'http://127.0.0.1:8090/login';
        $response = Http::withBasicAuth($email,$password)->get($URL);
        $body = $response['token'];
        if ($response->status() == 403){
            $msg = "Login Inválido";
            return view('tokens.token_log',['msg'=>$msg]);
        }
            $token = Token::all();
            if (count($token)>=1)
            {
                $token = Token::findOrFail(1);
                $token->token = $body;
                $token->update();
                return view('dashboard');
            }else{

                $newToken = new Token;
                $newToken->token = $body;
                $newToken->save();
                return view('dashboard');
            }

        
        
    }
}
