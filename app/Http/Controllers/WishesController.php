<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class WishesController extends Controller{
    
    public function index(){
        //we want to return a json that has all the the wishes and the authors
        $wishes = App\Wish::getAllWishes();
        return $wishes;
    }

    
    public function create(){
        if (!\Auth::check()){
            return [ 'status'=>'denied' ];
        }
        return [
            'endpoint'=>'/api/wish',
            'method'=>'post',
            'function'=> 'make a wish' ];
    }
    
    public function store(){
        if (!\Auth::check()){
            return [ 'status'=>'denied' ];
        }
        try{
            if(!App\Wish::createWish(request('wish'), request('id')))
                return ['status'=>'failed'];
            
            return ['status'=>'success'];
        }
        catch(\Exception $e){
            return ['state'=>$e->getMessage()];
        }
    }

    public function show($id){
        if (!\Auth::check()){
            return [ 'status'=>'denied' ];
        }
        $format = '/api/wish/%d';
        return [
            'endpoint'=>sprintf($format,$id),
            'method'=>'delete',
            'function'=> 'delete a wish' ];
    }

    public function edit($id){
        if (!\Auth::check()){
            return [ 'status'=>'denied' ];
        }
        $format = '/api/wish/%d';
        return [
            'endpoint'=>sprintf($format,$id),
            'method'=>'put', 
            'function'=> 'edit a wish'];
    }

   
    public function update($id){
        if (!\Auth::check()){
            return [ 'status'=>'denied' ];
        }
        try{
            $result = App\Wish::updateWish($id, request('wish'), request('id'));
            if(!$result){
                return ['status'=>'failed'];
            }
            return ['status'=>'success'];
        }
        catch(\Exception $e){
            return ['state'=>$e->getMessage()];
        }
    }

    public function destroy($id){
        if (!\Auth::check()){
            return [ 'status'=>'denied' ];
        }
        try{
            $result = App\Wish::deleteWish($id, request('id'));
            if(!$result){
                return ['status'=>'failed'];
            }
            return ['status'=>'success'];
        }
        catch(\Exception $e){
            return ['state'=>$e->getMessage()];
        }
    }
}