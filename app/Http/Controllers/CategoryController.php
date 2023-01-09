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
class CategoryController extends Controller
{
    //
    public function add_categoryProduct(){
        $adminUser = Auth::guard('admin')->user();
    	return view('admin.add.add_categoryproduct',
        ['user'=>$adminUser]);
    }

    public function create_categoryProduct(Request $request){ //them danh muc
        $adminUser = Auth::guard('admin')->user();

        $ma_danh_muc = $request->input('category_code');
        $ten_danh_muc = $request->input('category_name');
        $mo_ta_danh_muc = $request->input('description');
        $status_category = $request->input('category_status');
// ủa long sao mấy cái productcontroller + brand ko có function tạo dữ liệu nhỉ vậy mà vẫn add dữ liệu đc ??? nó dây
        DB::beginTransaction();
        try {
            DB::insert('insert into categories (category_code, category_name, description, category_status)
                        values (?, ?, ?, ?)', array($ma_danh_muc, $ten_danh_muc, $mo_ta_danh_muc, $status_category));
            DB::commit();
            Session::put('massage','Thêm thông tin thành công');
            // all good
        } catch (\Exception $e) {
            $mes = 'Thêm thông tin thất bại. Lỗi:'.' '.(string)$e->getMessage();
            Session::put('massage',$mes);
            DB::rollback();

        }
        return redirect()->route('listing.index',['model'=>'Category'],);

    }

    public function unactive_categoryProduct(Request $request,$Ma_danh_muc){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('categories')->where('category_code',$Ma_danh_muc)->update(['category_status'=>0]);
        DB::table('categories')->where('category_code',$Ma_danh_muc)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã ẩn danh mục');
    	return redirect()->route('listing.index',['model'=>'Category']);
    }
    public function active_categoryProduct($Ma_danh_muc){
        $adminUser = Auth::guard('admin')->user();
    	DB::table('categories')->where('category_code',$Ma_danh_muc)->update(['category_status'=>1]);
        DB::table('categories')->where('category_code',$Ma_danh_muc)->update(['updated_at'=>Carbon::now()]);
    	Session::put('massage','Đã hiển thị danh mục');
    	return redirect()->route('listing.index',['model'=>'Category']);
    }

    public function edit_categoryProduct($Ma_danh_muc){ //Chinh sua danh muc da ton tai
        $adminUser = Auth::guard('admin')->user();
    	$edit_categoryProduct = DB::table('categories')->where('category_code',$Ma_danh_muc)->get();
    	$manager_categogry_product = view('admin.edit.edit_categoryProduct',['user'=>$adminUser])->with('edit_categoryProduct',$edit_categoryProduct);
    	Session::put('massage','Tải thông tin XONG!');
    	return view('admin.layouts.index',['user'=>$adminUser])->with('admin.edit.edit_categoryProduct',$manager_categogry_product);

    }

    public function update_categoryProduct(Request $request,$Ma_danh_muc){ //Event update thong tin da nhap vao sau buoc Edit
        $adminUser = Auth::guard('admin')->user();
    	$result = array();
    	$result['category_name'] = $request->input('category_name');
        $result['description'] = $request->input('description');
        $result['category_status'] = $request->input('category_status');
        $result['updated_at'] = Carbon::now();

    	DB::table('categories')->where('category_code',$Ma_danh_muc)->update($result);
    	Session::put('massage','Cập nhật thông tin thành công');
    	return redirect()->route('listing.index',['model'=>'Category']);
    }

    public function delete_categoryProduct($Ma_danh_muc){//Event xoa danh muc da da tao
        $adminUser = Auth::guard('admin')->user();
    	DB::table('categories')->where('category_code',$Ma_danh_muc)->delete();
    	Session::put('massage','Đã xóa PAY thông tin');
    	return redirect()->route('listing.index',['model'=>'Category']);
    }

}
