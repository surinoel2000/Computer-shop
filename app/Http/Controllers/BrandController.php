<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

date_default_timezone_set('Asia/Ho_Chi_Minh');
//
session_start();//session chay
class BrandController extends Controller
{
    //
    public function add_brandProduct(){
        $adminUser = Auth::guard('admin')->user();
    	return view('admin.add.add_brandproduct',
        ['user'=>$adminUser]);
    }

    public function save_brandProduct(Request $request){
        $adminUser = Auth::guard('admin')->user();
    	$result = array();
    	$result['brand_code'] = $request->ma_hang;
    	$result['name_brand'] = $request->ten_hang;
    	$result['brand_status'] = $request->brand_status;

    	DB::table('brands')->insert($result);
    	Session::put('massage','Thêm thông tin thành công');

        return redirect()->route('listing.index',['model'=>'Brand'],);

    }

    public function unactive_brandProduct($Ma_hang){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('brands')->where('brand_code',$Ma_hang)->update(['brand_status'=>0]);
        DB::table('brands')->where('brand_code',$Ma_hang)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã ẩn hãng này');
    	return redirect()->route('listing.index',['model'=>'Brand'],);
    }
    public function active_brandProduct($Ma_hang){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('brands')->where('brand_code',$Ma_hang)->update(['brand_status'=>1]);
        DB::table('brands')->where('brand_code',$Ma_hang)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã hiển thị hãng này');
    	return redirect()->route('listing.index',['model'=>'Brand'],);
    }

    public function edit_brandProduct($Ma_hang){
        $adminUser = Auth::guard('admin')->user();
    	$edit_brandProduct = DB::table('brands')->where('brand_code',$Ma_hang)->get();
    	$manager_brand_product = view('admin.edit.edit_brandProduct',['user'=>$adminUser])->with('edit_brandProduct',$edit_brandProduct);
    	Session::put('massage','Đang tải thông tin');
    	return view('admin.layouts.index',['user'=>$adminUser])->with('admin.edit.edit_brandProduct',$manager_brand_product);

    }
    public function update_brandProduct(Request $request,$Ma_hang){
        $adminUser = Auth::guard('admin')->user();
    	$result = array();
    	$result['name_brand'] = $request->input('name_brand');

        $result['brand_status'] = $request->input('brand_status');
        $result['updated_at'] = Carbon::now();

    	DB::table('brands')->where('brand_code',$Ma_hang)->update($result);

    	Session::put('massage','Update thông tin thành công');
    	return redirect()->route('listing.index',['model'=>'Brand']);
    }

    public function delete_brandProduct($Ma_hang){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('brands')->where('brand_code',$Ma_hang)->delete();
    	Session::put('massage','Đã xóa PAY Hãng');
    	return redirect()->route('listing.index',['model'=>'Brand']);
    }
}
