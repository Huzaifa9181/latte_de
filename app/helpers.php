<?php
use App\Models\product;

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

?>