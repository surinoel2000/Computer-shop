<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class listController extends Controller
{
    //
    public function index(Request $request, $modelName){

        $adminUser = Auth::guard('admin')->user();
        $model = '\App\Models\\'.ucfirst($modelName);
        $model = new $model;
        $configs = $model->listingConfigs();
        $title = $model->title;
        $records = $model::paginate(3);
        // $data = $model::paginate(1);

        if ($modelName == 'Product'){
            $all_Product = DB::table('products')
            ->join('categories','products.category_code','=','categories.category_code')
            ->join('brands','products.brand_code','=','brands.brand_code')->select('products.*','brands.name_brand','categories.category_name')->paginate(10);

            return view('admin.list.listing_product', [
                'table_name' => 'Danh sách sản phẩm',
                'model' => $modelName,
                'user' => $adminUser,
                'Configs' => $configs,
                'data' => $all_Product,
                'title' => $title
            ]);
        }
        if ($modelName == 'Category'){
            $result = DB::table('categories')

            ->select('categories.*')
            ->paginate(2);
            $records = $model::paginate(5);

            return view('admin.list.listing_categoryproduct', [
                'table_name' => 'Danh sách danh mục sản phẩm',
                'user' => $adminUser,
                'records' => $records,
                'Configs' => $configs,
                'data' => $result
            ]);
        }

        if ($modelName == 'Brand'){
            $result = DB::table('brands')
            ->select('brands.*')
            ->paginate(2);
            $records = $model::paginate(5);
            return view('admin.list.listing_brandproduct', [
                'table_name' => 'Danh sách hãng sản phẩm',
                'user' => $adminUser,
                'records' => $records,
                'Configs' => $configs,
                'data' => $result
            ]);
        }
        if($modelName == 'User'){
            $result = DB::table('users')
            ->select('users.*')->paginate(10);
            $records = $model::paginate(10);
            return view('admin.list.listing_user', [
                'table_name' => 'Danh sách tài khoản người dùng',
                // 'model' => $modelName,
                'user' => $adminUser,
                'records' => $records,
                'Configs' => $configs,
                'data' => $result
            ]);
        }

        if($modelName == 'Order'){
            $result = DB::table('orders')
            // ->join('order_statuss','orders.order_status','=','order_statuss.id_status')
            // ->join('brand_products','products.Ma_hang','=','brand_products.Ma_hang')
            ->select('orders.*')->orderBy('updated_at','desc')->paginate(10);
            $records = $model::paginate(10);
            $order_detail = DB::table('order_details')->select('order_details.*','products.*','brands.name_brand','categories.category_name')
            ->join('products', 'order_details.product_code ','=','products.product_code')
            ->join('categories','products.category_code','=','categories.category_code')
            ->join('brands','products.brand_code','=','brands.brand_code')
            ->get();
            $status_orde = DB::table('order_statuss')->select('order_statuss.*')->get();
            return view('admin.list.listing_orders', [
                'table_name' => 'Danh sách đơn hàng',
                // 'model' => $modelName,
                'user' => $adminUser,
                'records' => $records,
                'Configs' => $configs,
                'data' => $result,
                'order_detail'=>$order_detail,
                'order_status'=>$status_orde,
            ]);
        }
    }
}
