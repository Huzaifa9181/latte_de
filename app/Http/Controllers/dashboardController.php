<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Session;

class dashboardController extends Controller
{
    //
    public $model;

    function __construct()
    {
        $this->model = new User;
    }
    function admin_index(){
        return view('admin_index');
    }

    function admin_login(){
        return view('admin_login');
    }

    function login_handle(Request $req){
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
                if($user->role_id == 1){
                    return view('admin_index');
                }else{
                    $data = product::all();
                    return view('index',['data'=>$data]);
                }
            }else{
                Session::flash('login', 'false');
                return redirect('admin_login?password=false');
            }  
        }else{
            return redirect('admin_login?account=false');
        };
    }

    function admin_logout(Request $req){
        $req->session()->flush();
        return redirect('admin_login');
    }

    function admin_users_table(){
        $data = $this->model->all();
        return view('admin_users_table' , ["data" =>$data]);
    }

    function user_delete(Request $req){
        if(!empty($req->u_id)){
            $id = $req->u_id;
            $data = User::find($id);
            $data->delete();
            return response()->json(['response' => 'success'], 200);
        }else{
            return "empty id";
        }
    }
}
