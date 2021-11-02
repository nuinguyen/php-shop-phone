<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $data=$request->all();

        $admin_email = $data['admin_email'];
        $admin_password = $data['admin_password'];

        $login_admin = Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

//        $login_user = User::where('email',$admin_email)->where('password',$admin_password)->first();

        if(Auth::attempt(['email'=>$request->admin_email,'password'=>$request->admin_password])){
            if(Auth::user()->level==2){
                Session::put('customer_name',Auth::user()->name);
                return Redirect::to('/');
            }elseif(Auth::user()->level==1){
                return Redirect::to('/dashboard');
            }
        }
        elseif ($login_admin){
            return Redirect::to('/dashboard');
        }
        else{
            Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
            return Redirect::to('/admin');
        }
//        if($login_admin){
//            $login_count = $login_admin->count();
//            if($login_count>0){
//                Session::put('admin_name',$login_admin->admin_name);
//                Session::put('admin_id',$login_admin->admin_id);
//                return Redirect::to('/dashboard');
//            }
//        }elseif($login_user){
//            $login_count = $login_user->count();
//            if($login_count>0){
//                Session::put('admin_name',$login_user->admin_name);
//                Session::put('admin_id',$login_user->admin_id);
//                return Redirect::to('/');
//            }
//        }else{
//            Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
//            return Redirect::to('/admin');
//        }
    }
    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
