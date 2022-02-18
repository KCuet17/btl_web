<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\AccountController;



Route::get('',[HomeController::class,'index']);
Route::get('/trang_chu',[HomeController::class,'index']);
Route::get('/logout',[AdminController::class,'logout']);

//hien san pham len trang chu


Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);


Route::post('/admin-dashboard',[AdminController::class,'dashboard']);
Route::post('/save-tbl-admin',[AdminController::class,'save_tbl_admin']);

//Danh muc san pham
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product']);
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product']);

Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class,'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class,'delete_category_product']);

Route::post('/save-category-product',[CategoryProduct::class,'save_category_product']);
Route::post('/update-category-product/{category_product_id}',[CategoryProduct::class,'update_category_product']);

Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class,'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class,'active_category_product']);
Route::get('/expired-product/{category_product_id}',[CategoryProduct::class,'expried_product']);

//danh muc account
Route::get('/dangky',[AdminController::class,'show_form_dk']);
//Route::get('/dangky',[AdminController::class,'show_form_dk']);
Route::get('/add-user-account1',[AccountController::class,'add_user_account1']);
Route::get('/all-user-account',[AccountController::class,'all_user_account']);
Route::post('/save-user-account',[AccountController::class,'save_user_account']);

Route::get('/edit-account/{admin_id}',[AccountController::class,'edit_account']);
Route::get('/delete-account/{admin_id}',[AccountController::class,'delete_account']);
Route::post('/update-user-account/{admin_id}',[AccountController::class,'update_user_account']);

//dang bai cho chu tro
Route::get('/dang-bai',[HomeController::class,'dang_bai']);
Route::post('/luu-dang-bai',[HomeController::class,'luu_dang_bai']);
Route::get('/owner-posts/{admin_id}',[HomeController::class,'owner_posts']);

//gia han
Route::post('/gia-han-phong/{phong_id}',[HomeController::class,'gia_han_phong']);
//update phong
Route::post('/update-so-luong-phong/{phong_id}',[CategoryProduct::class,'update_so_luong_phong']);
//hien san pham len trang chu
Route::get('/detail-category-product/{category_product_id}',[HomeController::class,'detail_category_product']);
Route::post('/luu-danh-gia/{phong_id}/{admin_id}',[HomeController::class,'luu_danh_gia']);

//doi mk
Route::get('/change-password/{admin_id}',[AdminController::class,'changePassword']);
//luu mk moi
Route::post('/update-password/{admin_id}',[AdminController::class,'update_password']);
//tim kiem
Route::post('/tim-kiem',[HomeController::class,'search'])->name('search');
Route::get('/search/{araara}',[HomeController::class,'search_product']);


