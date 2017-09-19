<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class RegisterController extends Controller
{
    
    public function create()
    {
        if(\Auth::check()){
            return [ 'status'=>'denied' ];
        }

        return [ 'endpoint'=>'/api/register',
            'method'=>'post',
            'keys'=>'fname, lname, email, password, passconfirm' ];
    }

    public function store()
    {
        if(\Auth::check()){
            return [ 'status'=>'denied' ];
        }

        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'passconfirm' => 'required'
        ]);
 
        if(strcmp(request('password'), request('passconfirm'))!== 0){
            return [ 'status'=>'authentication failure' ];
        }

        //creating the user
        try{
            $user=App\User::createuser(request('fname'),request('lname'),request('email'),request('password'));
        }catch(\Exception $e){
            
        }
        //signing in the user
        //auth()->login($user);
        App\User::loginUser($user->id);

        return [ 'status'=>'passed' ];
    }
}
