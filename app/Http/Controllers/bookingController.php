<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\booking;

class bookingController extends Controller
{
    //
    public $model;
    function __construct()
    {
        $this->model = new booking;
    }


    function handle_book(Request $req){
        $data = $req->input();
        if(is_numeric($data['person'])){
            $result = $this->model->insert($data);
            if($result == 1){
                $req->session()->put('book', 'true');
                Session::flash('book', 'true');
                return redirect('index?book=true');
            }else{
                Session::flash('book', 'false');
                return redirect('index?book=false');
            }
        }else{
            Session::flash('book', 'false');
            return redirect('index?book=false');
        }
    }
}
