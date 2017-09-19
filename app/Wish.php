<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public static function createWish($wish, $id){
        if(!$wish)
            return False;

    	$mywish = new Wish; 
        $mywish->user_id = $id;
        $mywish->wish = $wish;
    	return $mywish->save();
    }

    public static function getAllWishes(){
    	$wishes=static::with('user')->latest()->get();
    	return $wishes;
    }

    public static function updateWish($id, $wish, $user_id){
        if(!$wish || $user_id != $wish->user->name){
            return False;
        }
        $mywish = Wish::find($id);
        $mywish->wish = $wish;
        $mywish->save(); 
    }

    public static function deleteWish($id, $user_id){
        $wish = Wish::find($id);
        if($user_id != $wish->user->name){
            return False;
        }
        $wish->delete();
    }
}