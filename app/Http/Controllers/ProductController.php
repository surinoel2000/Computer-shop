<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('Asia/Ho_Chi_Minh');

session_start();//Session bat dau chay
class ProductController extends Controller
{
    public function search(Request $request)
    {
        $category_products = DB::table('categories')
        ->select('categories.*')->get();
        $brand_views = DB::table('brands')
        ->select('brands.*')->get();
        $data = DB::table('products')->where('name_product','like' ,'%'.$request->input('query').'%')->where('product_status', 1)->get();
        $quaty = DB::table('products')->select('category_code',DB::raw('count(*) as total'))
        ->groupBy('category_code')
        ->get();
        $qty_brand = DB::table('products')->select('brand_code',DB::raw('count(*) as total'))
        ->groupBy('brand_code')
        ->get();

        return view('frontend.search_result',[
            'category_products' => $category_products,
            'products' => $data,
            'brands' => $brand_views,
            'quaty' => $quaty,
            "qty_brand" => $qty_brand,
        ]);
    }

    //
    public function add_Product(){
        $adminUser = Auth::guard('admin')->user();
    	$cate_product = DB::table('categories')->orderby('category_code','desc')->get();
    	$brand_product = DB::table('brands')->orderby('brand_code','desc')->get();
    	return view('admin.add.add_Product',['user'=>$adminUser])->with('categories',$cate_product)->with('brands',$brand_product);
    }

    public function save_Product(Request $request){
        $adminUser = Auth::guard('admin')->user();
    	$result = array();
        $result['product_code'] = $request->product_code;
    	$result['name_product'] = $request->name_product;
        $result['brand_code'] = $request->brand_code;
        $result['category_code'] = $request->category_code;
        $result['description'] = $request->description;
        $result['price'] = $request->price;
    	$result['product_status'] = $request->product_status;
        $get_image = $request->File('thumbnail_url');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/product_imgs',$new_image);
            $result['thumbnail_url'] = $new_image;

            DB::table('products')->insert($result);
            Session::put('massage','Thêm thông tin thành công');
            return redirect()->route('listing.index',['model'=>'Product'],);
        }
    	DB::table('products')->insert($result);
    	Session::put('massage','Thêm thông tin thành công');
    	return redirect()->route('listing.index',['model'=>'Product'],);


    }

    public function unactive_Product(Request $request,$Ma_sp){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('products')->where('product_code',$Ma_sp)->update(['product_status'=>0]);
        DB::table('products')->where('product_code',$Ma_sp)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã ẩn thông tin');
    	return redirect()->route('listing.index',['model'=>'Product']);
    }

    public function active_Product($Ma_sp){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('products')->where('product_code',$Ma_sp)->update(['product_status'=>1]);
        DB::table('products')->where('product_code',$Ma_sp)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã hiển thị thông tin');
    	return redirect()->route('listing.index',['model'=>'Product']);
    }

    public function delete_Product($Ma_sp){
        $adminUser = Auth::guard('admin')->user();
        $product = DB::table('products')->where('product_code',$Ma_sp)->get();
        foreach ($product as $value){
            $Hinh_anh = $value->thumbnail_url;
        }
    	DB::table('products')->where('product_code',$Ma_sp)->delete();
        if(\File::exists(public_path('uploads/product_imgs/'.$Hinh_anh))){
            \File::delete(public_path('uploads/product_imgs/'.$Hinh_anh));
            }
    	Session::put('massage','Đã xóa PAY thông tin');
    	return redirect()->route('listing.index',['model'=>'Product']);

    }

    public function edit_Product($Ma_sp){
        $adminUser = Auth::guard('admin')->user();
    	$edit_Product = DB::table('products')->where('product_code',$Ma_sp)->get();
        $cate_product = DB::table('categories')->orderby('category_code','desc')->get();
    	$brand_product = DB::table('brands')->orderby('brand_code','desc')->get();
    	$manager_product = view('admin.edit.edit_Product',['user'=>$adminUser])->with('edit_Product',$edit_Product)->with('category_Product',$cate_product)->with('brands',$brand_product);
    	Session::put('massage','Tải dữ liệu thành CÔNG');
    	return view('admin.layouts.index',['user'=>$adminUser])->with('add_categoryProduct',$manager_product);
    }

    public function update_Product(Request $request,$Ma_sp){
        $adminUser = Auth::guard('admin')->user();

        $result = array();
        $result['updated_at'] = Carbon::now();
    	$result['name_product'] = $request->name_product;
        $result['brand_code'] = $request->brand_code;
        $result['category_code'] = $request->category_code;
        $result['description'] = $request->description;
        $result['price'] = $request->price;
    	$result['product_status'] = $request->product_status;
        $get_image = $request->File('thumbnail_url');
        $product = DB::table('products')->where('product_code',$Ma_sp)->get();
        foreach ($product as $value){
            $Hinh_anh = $value->thumbnail_url;
        }
        if($Hinh_anh == $get_image->getClientOriginalName()){
            $result['thumbnail_url'] = $get_image->getClientOriginalName();
            DB::table('products')->where('product_code',$Ma_sp)->update($result);
            Session::put('massage','Đã cập nhật "Hình ảnh"');
            return redirect()->route('listing.index',['model'=>'Product']);
        }
        else {
            if($get_image){
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('uploads/product_imgs',$new_image);
                $result['thumbnail_url'] = $new_image;
                print_r($result['product_status']);
                DB::table('products')->where('product_code',$Ma_sp)->update($result);
                Session::put('massage','Đã cập nhật thông tin thành công');
                return redirect()->route('listing.index',['model'=>'Product']);
        }
        }

    }
}
