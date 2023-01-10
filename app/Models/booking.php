<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    public $timestamps = false;
    function insert($data){
        $book = new booking;
        $book->name = $data['name'];
        $book->email = $data['email'];
        $book->date = $data['date'];
        $book->time = $data['time'];
        $book->person = $data['person'];
        $book->user_id = session('id');
        $save = $book->save();
        if($save){
            return 1;
        }
    }
}
