<?php

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
// use App\congty;

Route::get('/', function () {
    return view('welcome');
});



Route::get('admin/dangnhap','userConTroller@getDangNhapAdmin');
Route::post('admin/dangnhap','userConTroller@postDangNhapAdmin');
Route::get('admin/dangxuat','userConTroller@getDangXuatAdmin');
Route::group(['prefix'=>'admin','middleware'=>'AdminLogin'],function(){
    Route::group(['prefix'=>'congty'], function(){
        Route::get('danhsach','congtyController@getDanhSach');
        Route::get('sua/{id}','congtyController@getSua');
        Route::post('sua/{id}','congtyController@postSua');
        Route::get('them','congtyController@getThem');
        Route::post('them','congtyController@postThem');
        Route::get('xoa/{id}','congtyController@getXoa');
    });
    Route::group(['prefix'=>'donvidem'], function(){
        Route::get('danhsach','donvidemController@getDanhSach');
        Route::get('sua/{id}','donvidemController@getSua');
        Route::post('sua/{id}','donvidemController@postSua');
        Route::get('them','donvidemController@getThem');
        Route::post('them','donvidemController@postThem');
        Route::get('xoa/{id}','donvidemController@getXoa');
    });
    Route::group(['prefix'=>'phieu'], function(){
        Route::get('danhsach','phieuController@getDanhSach');
        Route::get('sua/{id}','phieuController@getSua');
        Route::post('sua/{id}','phieuController@postSua');
        Route::get('them','phieuController@getThem');
        Route::post('them','phieuController@postThem');
        Route::get('xoa/{id}','phieuController@getXoa');
    });
    Route::group(['prefix'=>'sanpham'], function(){
        Route::get('danhsach','sanphamController@getDanhSach');
        Route::get('sua/{id}','sanphamController@getSua');
        Route::post('sua/{id}','sanphamController@postSua');
        Route::get('them','sanphamController@getThem');
        Route::post('them','sanphamController@postThem');
        Route::get('xoa/{id}','sanphamController@getXoa');
    });
    Route::group(['prefix'=>'danhsachphieu'], function(){
        Route::get('phnk','phieunhapkhoController@getDanhSach');
        Route::get('phxk','phieunhapkhoController@getDanhSachxk');
        Route::get('sua/{id}','phieunhapkhoController@getSua');
        Route::post('sua/{id}','phieunhapkhoController@postSua');
        Route::get('them','phieunhapkhoController@getThem');
        Route::post('them','phieunhapkhoController@postThem');
        Route::get('xoa/{id}','phieunhapkhoController@getXoa');

        Route::get('chitiet/{id}','chitietphieuController@getChiTiet');
        Route::get('themchitiet','chitietphieuController@getThemChiTiet');
        Route::post('themchitiet','chitietphieuController@postThemChiTiet');
        Route::get('suachitiet/{id}','chitietphieuController@getSua');
        Route::post('suachitiet/{id}','chitietphieuController@postSua');
        Route::get('xoachitiet/{id}','chitietphieuController@getXoa');
        Route::get('duyetchitiet/{id}/{id_sp}','chitietphieuController@getDuyet');
        Route::get('getproduct/{product}','chitietphieuController@getproduct');
    });
    Route::group(['prefix'=>'phieuxuatkho'], function(){
        Route::get('danhsach','phieuxuatkhoController@getDanhSach');
        Route::get('sua','phieuxuatkhoController@getSua');
        Route::get('them','phieuxuatkhoController@getThem');
    });
    Route::group(['prefix'=>'users'], function(){
        Route::get('danhsach','userController@getDanhSach');
        Route::get('sua/{id}','userController@getSua');
        Route::post('sua/{id}','userController@postSua');
        Route::get('them','userController@getThem');
        Route::post('them','userController@postThem');
        Route::get('xoa/{id}','userController@getXoa');
    });

    Route::group(['prefix'=>'ajax'],function(){
        Route::get('row_product/{id}','ajaxController@getRow_Product');
        Route::get('row_value/{id}','ajaxController@getRow_value');

    });
});

