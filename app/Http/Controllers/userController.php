<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\product;
class userController extends Controller
{
    //
    public $model;
    function __construct()
    {
        $this->model = new User;
    }

    function handle_login(Request $req){
        $data = $req->input();
        $user = User::where('email', $data['email'])->first();        
        $count = User::where('email', $data['email'])->count();        
        if($count > 0){
            if (Hash::check($data['password'], $user->password)) {
                $req->session()->put('loggedin', 'true');
                $req->session()->put('id', $user->id);
                $req->session()->put('name', $user->name);
                $req->session()->put('email', $user->email);
                $req->session()->put('password', $user->pass);
                $req->session()->put('role_id', $user->role_id);
                $data = product::all();
                return view('index',['data'=>$data]);
            }else{
                Session::flash('login', 'false');
                return redirect('login?password=false');
            }
            
            
        };
    }

    function handle_signup(Request $req){
        $data = $req->input();
        $count = User::where('email', $data['email'])->count();        
        if($count == 0){
            if($data['password'] === $data['cpass']){
                $this->model->signup($data);
                return redirect('login');
            }else{
                return redirect('signup?password=false');
            }
        }else{
            Session::flash('signup', 'false');
            return redirect('signup?verify=false');
        }
    }

    function logout(Request $req){
        $req->session()->flush();
        return redirect('login');
    }
}
