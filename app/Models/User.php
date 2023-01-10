<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    function signup($data){
        $user = new User;
        $password = Hash::make($data['password']);
        $user->name = $data['name'];
        $user->email =  $data['email'];
        $user->password = $password;
        $user->role_id = 3;
        $user->save();
    }
}

