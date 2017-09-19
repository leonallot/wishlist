<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class SessionsController extends Controller
{
    public function create(){
        if(\Auth::check()){
            return [ 'status'=>'denied' ];
        }

        return [ 'endpoint'=>'/api/login',
            'method'=>'post',
            'keys'=>'email, password' ];
    }

    public function store(){
        if(\Auth::check()){
            return [ 'status'=>'denied' ];
        }

        $this->validate(request(),[
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = App\User::getUser(request('email'),request('password'));
        if(!$user){
            return [ 'status'=>'authentication failure' ];
        }

        auth()->login($user);
        return [ 'status'=> 'passed' ];
    }

    public function destroy(){
        auth()->logout(); 
        return [  'status'=>'successful' ];//redirect('/blog/login');
    }
}
