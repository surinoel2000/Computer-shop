<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Query\Builder;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('welcome');
        $category_products = DB::table('categories')
        ->select('categories.*')->where('categories.category_status',1)->get();
        $brand_views = DB::table('brands')
        ->select('brands.*')->where('brands.brand_status',1)->get();
        $products = DB::table('products')
        ->join('categories','products.category_code','=','categories.category_code')
        ->join('brands','products.brand_code','=','brands.brand_code')->select('products.*','brands.name_brand','categories.category_name')->where('products.product_status',1)->get();
    	return view('welcome',[
            'category_products' => $category_products,
            'products' => $products,
            'brands' => $brand_views,
        ]);
    }

    public function search_bill_order (){
        return view('frontend.search_history_order');
    }

    public function history_order(Request $request){
        if(Auth::user()){
            $result = DB::table('orders')
                ->select('orders.*')
                ->where('orders.users_id',Auth::user()->id)
                ->orderBy('updated_at','desc')->paginate(10);

            $order_detail = DB::table('order_details')->select('order_details.*','products.*','brands.name_brand','categories.category_name')
                ->join('products', 'order_details.product_code ','=','products.product_code')
                ->join('categories','products.category_code','=','categories.category_code')
                ->join('brands','products.brand_code','=','brands.brand_code')
                ->get();
            $status_orde = DB::table('order_statuss')->select('order_statuss.*')->get();
            $request->session()->put('order-message', 'Không tồn tại bất kỳ đơn hàng nào!');
            if($result->count() == 0){
                return view('frontend.history_orders',[
                    'data' => $result,
                ]);
            }
            else{

                $request->session()->forget('order-message');
                return view('frontend.history_orders',[
                    'data' => $result,
                    'order_detail'=>$order_detail,
                    'order_status'=>$status_orde,
                ]);
            }

        }
        else{
            $result = DB::table('orders')
                ->select('orders.*')
                ->where('orders.phone_number',$request->search_order)
                ->orderBy('updated_at','desc')->paginate(10);

            $order_detail = DB::table('order_details')->select('order_details.*','products.*','brands.name_brand','categories.category_name')
                ->join('products', 'order_details.product_code ','=','products.product_code')
                ->join('categories','products.category_code','=','categories.category_code')
                ->join('brands','products.brand_code','=','brands.brand_code')
                ->get();
            $status_orde = DB::table('order_statuss')->select('order_statuss.*')->get();
            if($result->count() == 0){
                $request->session()->put('order-message', 'Không tồn tại bất kỳ đơn hàng nào!');
                return view('frontend.history_orders',[
                    'data' => $result,
                ]);
            }
            else{
                $request->session()->forget('order-message');
                return view('frontend.history_orders',[
                    'data' => $result,
                    'order_detail'=>$order_detail,
                    'order_status'=>$status_orde,
                ]);
            }
        }

    }



    public function shop_index()
    {
        $category_products = DB::table('categories')
        ->select('categories.*')->where('categories.category_status',1)->get();
        $brand_views = DB::table('brands')
        ->select('brands.*')->where('brands.brand_status',1)->get();
        $products = DB::table('products')
            ->join('categories','products.category_code','=','categories.category_code')
            ->join('brands','products.brand_code','=','brands.brand_code')->select('products.*','brands.name_brand','categories.category_name')
            ->where('products.product_status',1)->get();

        $quaty = DB::table('products')->select('category_code',DB::raw('count(*) as total'))->where('products.product_status',1)
        ->groupBy('category_code')
        ->get();

        $qty_brand = DB::table('products')->select('brand_code',DB::raw('count(*) as total'))->where('products.product_status',1)
        ->groupBy('brand_code')
        ->get();
    	return view('frontend.store',[
            'category_products' => $category_products,
            'products' => $products,
            'brands' => $brand_views,
            'quaty' => $quaty,
            "qty_brand" => $qty_brand
        ]);
    }

    public function chitietSP(Request $request,$product_code){
        $this->middleware('auth');
        $products = DB::table('products')
            ->join('categories','products.category_code','=','categories.category_code')
            ->join('brands','products.brand_code','=','brands.brand_code')
            ->select('products.*','brands.name_brand','categories.category_name')->where('product_code',$product_code)->get();
        $category_products = DB::table('categories')
        ->select('categories.*')->get();
        return view('frontend.product',
                [
                    'category_products' => $category_products,
                    'product'=>$products]);
    }


}
