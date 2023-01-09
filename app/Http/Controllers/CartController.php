<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

class CartController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function add_cart(Request $req, $id){



        $produc = DB::table('products')->where('product_code',$id)->first();
        if($produc){
            $oldCart = Session('Cart') ? Session('Cart') : null;

            $newCart = new Cart($oldCart);
            $newCart->AddCart($produc,$id);
            $req->session()->put('Cart',$newCart);

        }
        return back()->withInput();
    }

    function delete_ListItemcart(Request $request, $id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteitemCart($id);
        if(Count($newCart->products) > 0){
            $request->session()->put('Cart',$newCart);
        }
        else{
            $request->session()->forget('Cart');
        }
        return back()->withInput();
    }

    function save_itemcart(Request $request, $id,$quantity){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->updatequantity_cart($id,$quantity);

        $request->session()->put('Cart',$newCart);

        return redirect()->route('fe.list_cart');
    }

    function list_cart(){

        return view('frontend.cart');
    }
}
