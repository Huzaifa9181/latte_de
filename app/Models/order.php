<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    function insert($data){
        $order = new order;
        $order->order_number = $data['order_number'];
        $order->user_name = $data['user_name'];
        $order->user_id = $data['user_id'];
        $order->products_id = json_encode($data['product_id']);
        $order->total = $data['total'];
        $save = $order->save();
        if($save){
            return 1;
        }
    }
}
