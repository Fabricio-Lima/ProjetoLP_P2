<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
        * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('loginPage');
    }

    /**
        * @return \Illuminate\Http\Response
    */
    public function create(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Conta registrada com sucesso!");
    }

    /**
        * @param  \Illuminate\Http\Request
        * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }

    /**
        * @param int $id
        * @return \Illuminate\Http\Response
    */
    public function show()
    {
        return view('auth.register');
    }

    /**
        * @param int  $id
        * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }

    /**
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }

    /**
        * @param  int  $id
        * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
