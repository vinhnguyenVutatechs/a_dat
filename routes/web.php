<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
Route::get('/', 'IndexController@getIndex')->name('Index');
Route::post('/', 'IndexController@postNickUser')->name('NickUser');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@getIndexAdmin')->name('Admin');
    Route::get('/khach-hang', 'AdminController@getKhachHang')->name('KhachHang');
    // Route::get('/them-khach-hang', 'AdminController@getKhachHang')->name('KhachHang');
    Route::post('/sua-khach-hang/{id}', 'AdminController@postEditKhachHang')->name('EditKhachHang');
    Route::get('/xoa-khach-hang/{id}', 'AdminController@getDeleteUser')->name('DeleteUser');

    Route::group(['prefix' => '/'], function () {
        Route::get('/tai-khoan-admin', 'AccAdminController@getAccAdmin')->name('AccAdmin');
        Route::post('/them-tai-khoan-admin', 'AccAdminController@postAddAdmin')->name('AddAdmin');
        Route::get('/xoa-tai-khoan-admin/{id}', 'AccAdminController@getDeleteAdmin')->name('DeleteAdmin');
    });

    Route::get('/san-pham', 'AdminController@getProduct')->name('SanPham');
    Route::post('/them-san-pham', 'AdminController@postAddProduct')->name('AddProduct');
    Route::post('/sua-san-pham/{id}', 'AdminController@postEditproduct')->name('EditProduct');
    Route::get('/xoa-san-pham/{id}', 'AdminController@getDeleteProduct')->name('DeleteProduct');

    Route::get('/danh-muc', 'AdminController@getDanhMuc')->name('Categories');
    Route::post('/them-danh-muc', 'AdminController@postAddCategories')->name('AddCategories');
    Route::post('/sua-danh-muc/{id}', 'AdminController@postEditCategories')->name('EditCategories');
    Route::get('/xoa-danh-muc/{id}', 'AdminController@getDeleteCategories')->name('DeleteCategories');

    Route::group(['prefix' => '/'], function () {
        Route::get('/cai-dat-cau-hinh', 'AdminController@getSesttings')->name('Sesttings');
        Route::post('/them-cau-hinh', 'AdminController@postAddSesttings')->name('AddSestting');
        Route::post('/sua-cau-hinh/{id}', 'AdminController@postEditSesttings')->name('EditSestting');
        Route::get('/xoa-cai-dat-cau-hinh/{id}', 'AdminController@getDeleteSesttings')->name('DeleteSestting');

    });


});
Route::group(['prefix' => '/'], function () {
    Route::get('/dang-nhap', 'AdminController@getLogin')->name('Login');
    Route::post('/dang-nhap', 'AdminController@postLogin')->name('PostLogin');
    Route::get('/dang-xuat', 'AdminController@getLogout')->name('Logout');
});
