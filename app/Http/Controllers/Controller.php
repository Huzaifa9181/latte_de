<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index(){
        $data = product::all();
        return view('index',['data'=>$data]);
    }

    function index2(){
        $data = product::all();
        return view('/',['data'=>$data]);
    }

    function about(){
        return view('about');
    }

    function menu(){
        return view('menu');
    }

    function contact(){
        return view('contact');
    }

    function testimonial(){
        return view('testimonial');
    }

    function service(){
        return view('service');
    }

    function reservation(){
        return view('reservation');
    }

    function signup(){
        return view('signup');
    }

    function login(){
        return view('login');
    }
}
