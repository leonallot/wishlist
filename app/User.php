<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    public function wish(){
        return $this->hasMany(Wish::class);
    }

    public static function createUser($fname, $lname, $email, $password){
        $user = new User;
        $user->fname = $fname;
        $user->lname = $lname;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();
        return $user;
    }

    public static function getUser($email, $password){
        $user = User::where('email',$email)->first();
        
        if(!$user){
            return False;
        }
        
        if(\Hash::check($password,$user->password)) {
            return $user;
        } 
        else {
            return False;
        }
    }

    public static function loginUser($id){
        try{
            $user = User::find($id);
            $user->api_token = str_random(80);
            $user->save();
        }catch(\Excecption $e){
            loginUser($id);
        }
    }

    public static function logoutUser($id){
        try{
            $user = User::find($id);
            $user->api_token = null;
            $user->save();
        }catch(\Excecption $e){
            loginUser($id);
        }
    }
}