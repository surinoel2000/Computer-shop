<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Checkout_OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\listController;
use App\Http\Controllers\User_ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Index Route
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index'])->name('index-home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/product-detail/{product_code}',[HomeController::class,'chitietSP'])->name('fe.detail');
Route::get('shop',[HomeController::class, 'shop_index'])->name('home.shop');//Route shop list san pham
Route::get('search',[ProductController::class, 'search']);//Route thanh search
Route::get('/Add-cart/{id}',[CartController::class,'add_cart']);
Route::get('/list-cart',[CartController::class,'list_cart'])->name('fe.list_cart');
Route::get('/delete-item-list-cart/{id}',[CartController::class,'delete_ListItemcart'])->name('fe.delete_item_list_cart');
Route::get('/update-quantity-item-cart/{id}/{quantity}',[CartController::class,'save_itemcart'])->name('fe.update_item_list_cart');

Route::get('profile/{id}',[User_ProfileController::class,'show_profile'])->name('fe.user_profile');

Route::get('checkout', [Checkout_OrderController::class, 'index'])->name('cart.checkout'); //Route check out don hang
// Route::get('/products/{product_code}',[HomeController::class, '']);

//Giỏ hèng
Route::get('cart',[CartController::class, 'cart']);//route gio hang
Route::post('/order-place',[Checkout_OrderController::class,'order_place']);
Route::get('/checkout-notifi',[Checkout_OrderController::class,'checkout_notifi'])->name('notifi');

//Route xem lich su don dat hang
Route::get('search-history-order',[HomeController::class,'search_bill_order']) ->name('search_order');
Route::get('history-order',[HomeController::class,'history_order'])->name('fe.history_order');


//Admin Login Route
Route::prefix('admin')->group(function (){
    // Route::get('/dashboard', [AuthController::class,'show_dashboard'])->name('admin.dashboard');
    Route::get('/login', [AuthController::class,'login'])->name('admin.auth.login');
    Route::post('/login', [AuthController::class,'checkLogin'])->name('admin.auth.check-login');
    Route::get('/logout',[AuthController::class,'logout'])->name('admin.logout');
    Route::middleware(['admin'])->group(function(){
        Route::get('/order/change-status/{id}/{status_id}',[AuthController::class,'update_status'])->name('admin.change_status');

        Route::get('/dashboard',[AuthController::class,'show_dashboard'])->name('admin.dashboard');

        Route::get('/listing/{model}',[listController::class,'index'])->name('listing.index');


        Route::prefix('category-Product')->group(function(){
            Route::get('/add-category-product',[CategoryController::class,'add_categoryProduct'])->name('category_product.add');
            Route::post('/save-category-Product',[CategoryController::class,'create_categoryProduct'])->name('category_product.create');
            Route::get('/unactive-category-Product/{Ma_danh_muc}',[CategoryController::class,'unactive_categoryProduct'])->name('category_product.unactive');
            Route::get('/active-category-Product/{Ma_danh_muc}',[CategoryController::class,'active_categoryProduct'])->name('category_product.active');
            Route::get('/edit-category-Product/{Ma_danh_muc}',[CategoryController::class,'edit_categoryProduct']);
            Route::get('/delete-category-Product/{Ma_danh_muc}',[CategoryController::class,'delete_categoryProduct']);
            Route::post('/update-category-Product/{Ma_danh_muc}',[CategoryController::class,'update_categoryProduct']);
        });
        Route::prefix('brand-Product')->group(function(){
            Route::get('/add-brand-product',[BrandController::class,'add_brandProduct'])->name('brand_product.add');
            Route::post('/save-brand-Product',[BrandController::class,'save_brandProduct'])->name('brand_product.save');
            Route::get('/unactive-brand-Product/{Ma_hang}',[BrandController::class,'unactive_brandProduct'])->name('brand_product.unactive');
            Route::get('/active-brand-Product/{Ma_hang}',[BrandController::class,'active_brandProduct'])->name('brand_product.active');
            Route::get('/edit-brand-Product/{Ma_hang}',[BrandController::class,'edit_brandProduct']);
            Route::get('/delete-brand-Product/{Ma_hang}',[BrandController::class,'delete_brandProduct']);
            Route::post('/update-brand-Product/{Ma_hang}',[BrandController::class,'update_brandProduct']);
        });//đấy
        Route::prefix('Product')->group(function(){
            Route::get('/add-product',[ProductController::class,'add_Product'])->name('product.add');
            Route::post('/save-Product',[ProductController::class,'save_Product'])->name('product.save');
            Route::get('/unactive-Product/{Ma_sp}',[ProductController::class,'unactive_Product'])->name('product.unactive');
            Route::get('/active-Product/{Ma_sp}',[ProductController::class,'active_Product'])->name('product.active');
            Route::get('/edit-Product/{Ma_sp}',[ProductController::class,'edit_Product']);
            Route::post('/update-Product/{Ma_sp}',[ProductController::class,'update_Product']);
            Route::get('/delete-Product/{Ma_sp}',[ProductController::class,'delete_Product']);
        });

    });
    // Route::match(['get', 'post'], 'login', function () {

});

//User Login-register Route
Auth::routes();
