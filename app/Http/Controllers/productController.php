<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\product;
class productController extends Controller
{
    public $array;
    function cart(Request $req){
         $session = session('add_to_cart');
        if($session){
            $id = array_column($session,"id");
            if (!in_array($req->input("id") , $id))
            {
                $id =$req->input("id");
                $this->array = [
                  "id"=>$id,
                  "quantity" => $req->input("quantity")
                ];
                if($this->array['id'] == $req->input("id")){
                    Session::push('add_to_cart', $this->array);   
                    return redirect('index#menu');
                }else{
                    return redirect('add_to_cart?item=exsist');
                }
            }
            else
            {
                return redirect('add_to_cart?item=exsist');
            }
        }else{
            $id = $req->input("id");
            $this->array = [
                "id"=>$id,
                "quantity" => $req->input("quantity")
              ];
            Session::push('add_to_cart', $this->array);
            return redirect('index#menu');
        }
    }

    function handle_cart(Request $req){
        $data = $req->post();
        $id = array_column(session('add_to_cart'), 'id');
        $cart = [];
        foreach($data['id'] as $key => $value){
            // $req->session()->flush();
            $this->array = [
                'id'=>$cart[$value]['id'] = $data['id'][$key],
                'name'=>$cart[$value]['name'] = $data['name'][$key],
                'quantity'=>$cart[$value]['quantity'] = $data['quantity'][$key],
                'price'=>$cart[$value]['price'] = $data['price'][$key]
            ];
        }
        $req->session()->put('add_to_cart', $cart);
        return redirect("add_to_cart");
    }

    function delete(Request $req){
        if(!empty($req->p_id)){
            $id = $req->p_id;
            $cart2 = session("add_to_cart");
            foreach(session("add_to_cart") as $key=>$value){
                if($cart2[$key]['id'] == $id){
                    unset($cart2[$key]);
                    Session::put('add_to_cart', $cart2);
                    return response()->json(['response' => 'success'], 200);
                }
            }
        }else{
            return "empty id";
        }
    }
}
