<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class AuthController extends Controller
{
    //
    public function dashboard(){
        return view('admin.admin-welcome');
     }

    public function login(){
        return view('admin.login');
    }

    public function checkLogin(Request $request){
        print_r($request->password);
        // if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
        //     return redirect()->route('admin.dashboard');
        // }
        // else{
        //     return redirect()->route('admin.auth.login') -> with('error', 'Lỗi! Đăng nhập thất bại Email hoặc mật khẩu Sai');
        // }
        $credentials = $request->only('email','password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->route('admin.auth.login')-> with('error', 'Lỗi! Đăng nhập thất bại Email hoặc mật khẩu Sai');
        }

    }
    public function show_dashboard(){
        $adminUser = Auth::guard('admin')->user();
            return view('admin.admin-welcome',['user'=>$adminUser]);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }
    public function update_status($order_id, $status){
        $adminUser = Auth::guard('admin')->user();
        DB::table('orders')->where('id',$order_id)->update(['order_status'=>$status]);
        DB::table('orders')->where('id',$order_id)->update(['updated_at'=>Carbon::now()]);
        return redirect()->route('listing.index',['model'=>'Order']);
    }
}
