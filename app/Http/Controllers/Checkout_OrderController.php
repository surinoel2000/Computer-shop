<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class Checkout_OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(Session::has("Cart") == null){

            return  redirect()->route('home.shop');
        }

        return view('frontend.checkout');
    }

    public function order_place(Request $request){
        $data  = array();
        $data['users_id'] = Auth::user()->id ;
        $data['fullname'] = $request->name;
        $data['order_email'] = $request->email;
        $data['phone_number'] = $request->tel;
        $data['diachi'] = $request->address;
        $data['note'] = $request->note;
        $data['order_status']   = 1;
        $data['total_money'] = Session::get("Cart")->totalPrice + 100000;
        $data['payment_option'] = $request->payment_option;

        $order_id = DB::table('orders')->insertGetId($data);

        foreach(Session::get("Cart")->products as $product){

            $ord_d_data = array();
            $ord_d_data['order_id'] = $order_id;
            $ord_d_data['product_code'] = $product['productInfo']->product_code;
            $ord_d_data['price'] = $product['productInfo']->price;
            $ord_d_data['count_product'] = $product['quantity'];
            $ord_d_data['total_money'] = $product['price'];

            DB::table('order_details')->insert($ord_d_data);
        }

        // Session::get("Cart")::destroy();
        $request->session()->forget('Cart');
        Session::put('order_id',$order_id);

        return redirect()->route('notifi');


    }

    public function checkout_notifi(){
        if(Session::has("order_id") == null){
            return back()->withInput();
        }

        $order_detail = DB::table('order_details')
        ->join('products', 'order_details.product_code','=','products.product_code')
        ->select('order_details.*','products.product_code','products.name_product')
        ->where('order_details.order_id',Session::get('order_id'))->get();
        Session()->forget('order_id');
        return view('frontend.checkout_ketqua',[
            'order_detail' => $order_detail
        ]);
    }

}
