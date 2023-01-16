<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use Illuminate\Support\Facades\Mail;

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

        $total =0;
        foreach(session("add_to_cart") as $key => $val){
            $total = $total + intval($val['quantity'])*p_find($val['id'])['price'];
        }

        $dataview = [
            'order_number' => $randomNumber,
            'user_name' => session('name'),
            'user_id' => session('id'),
            'product_id'=>$p_id,
            'total'=>$total
        ];
        $order = $this->model->insert($dataview);
        if($order == 1){
            $req->session()->forget('add_to_cart');
            $user['to'] = session('email');
            Mail::send('payment_details', $dataview, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Your Order Successfully Through By Latte De Admin Wait For Her Reply');
            });
        }
    }

    // public $total = 0;
    function delivery(Request $req){
        $randomNumber = random_int(100000, 999999);
        $session = session("add_to_cart");
        $p_id = array_column($session,"id");
        $data = [
            'order_number' => $randomNumber,
            'user_name' => session('name'),
            'user_id' => session('id'),
            'product_id'=>$p_id
        ];

        $total =0;
        foreach(session("add_to_cart") as $key => $val){
            $total = $total + intval($val['quantity'])*p_find($val['id'])['price'];
        }

        $dataview = [
            'order_number' => $randomNumber,
            'user_name' => session('name'),
            'user_id' => session('id'),
            'product_id'=>$p_id,
            'total'=>$total

        ];
        $order = $this->model->insert($dataview);
        if($order == 1){
            $req->session()->forget('add_to_cart');
            $user['to'] = session('email');
            Mail::send('payment_details', $dataview, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Your Order Successfully Through By Latte De Admin Wait For Her Reply');
            });
            return view("add_to_cart");
        }
    }
}
