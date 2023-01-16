<?php
use App\Models\product;
use App\Models\order;

if(!function_exists("p_find")){
    function p_find($id){
        $product = product::find($id);
        $array = [
            "id"=>$product->id,
            "name"=>$product->name,
            "path"=>$product->path,
            "price"=>$product->price
        ];
        return $array;
    }
}

if(!function_exists("p_count")){
    function p_count(){
        $count = product::all()->count();
        return $count;
    }
}

if(!function_exists("o_total")){
    function o_total(){
        $count = order::all()->count();
        return $count;
    }
}


if(!function_exists("order_count")){
    function order_count(){
        $count = order::all();
        $total =0;
        foreach($count as $key => $val){
            $total = $total + $val['total'];
        }
        return $total;
    }
}

?>