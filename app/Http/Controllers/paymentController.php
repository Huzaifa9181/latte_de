<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class paymentController extends Controller
{
    //
    public $model;

    function __construct()
    {
        $this->model = new order;
    }

    function payment(Request $req){
        $randomNumber = random_int(100000, 999999);
        $session = session("add_to_cart");
        $p_id = array_column($session,"id");
        $data = [
            'order_number' => $randomNumber,
            'user_name' => session('name'),
            'user_id' => session('id'),
            'product_id'=>$p_id
        ];
        $order = $this->model->insert($data);
        if($order == 1){
            $req->session()->forget('add_to_cart');
            // $req->session()->flush();
            return view('payment_details');
        }
    }

    function delivery(){
        $randomNumber = random_int(100000, 999999);
        $session = session("add_to_cart");
        $p_id = array_column($session,"id");
        $data = [
            'order_number' => $randomNumber,
            'user_name' => session('name'),
            'user_id' => session('id'),
            'product_id'=>$p_id
        ];
        $order = $this->model->insert($data);
        if($order == 1){
            return view('payment_details');
        }
    }

    
}
