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

Route::group(['prefix' => 'web/', 'namespace' => 'Website'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['prefix' => 'product'], function() {
        
        Route::get('/', 'ProductController@index')->name('website.product.index');
        
    });
    
});



Route::group(['prefix' => 'admin', 'namespace'=> 'Admin'], function() {
    Route::get('/', function() {
        return redirect()->route('admin.dashboard');
    })->name('admin');

    Route::get('/dashboard', function () {
        return redirect()->route('admin.category.index');
    })->name('admin.dashboard');
    
    Route::group(['prefix' => 'category'], function() {
        
        Route::get('/', function() {
            return redirect()->route('admin.category.list');
        })->name('admin.category.index');
        
        Route::get('/list', 'CategoryController@index')->name('admin.category.list');
        Route::get('/create', 'CategoryController@create')->name('admin.category.create');
        Route::post('/store', 'CategoryController@store')->name('admin.category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('admin.category.update');
        Route::get('/delete/{id}', 'CategoryController@destroy')->name('admin.category.delete');
    });

    
    Route::group(['prefix' => 'san-pham'], function() {
        // Route::get('/', function() {
        //     return redirect()->route('admin.product.list');
        // })->name('admin.product.index');
        
        Route::get('/danh-sach', 'ProductController@index')->name('admin.product.list');
        Route::get('/them-moi', 'ProductController@create')->name('admin.product.create');
        Route::post('/store', 'ProductController@store')->name('admin.product.store');
        Route::get('/sua-san-pham-/{id}', 'ProductController@edit')->name('admin.product.edit');
        Route::post('/update/{id}', 'ProductController@update')->name('admin.product.update');
        Route::get('/xoa-san-pham-/{id}', 'ProductController@destroy')->name('admin.product.delete');
    });
    
    Route::group(['prefix' => 'attribute'], function() {
        Route::get('/', function() {
            return redirect()->route('admin.attribute.list');
        })->name('admin.attribute.index');
        
        Route::get('/list', 'AttributeController@index')->name('admin.attribute.list');
        Route::get('/create', 'AttributeController@create')->name('admin.attribute.create');
        Route::post('/store', 'AttributeController@store')->name('admin.attribute.store');
        Route::get('/edit/{id}', 'AttributeController@edit')->name('admin.attribute.edit');
        Route::post('/update/{id}', 'AttributeController@update')->name('admin.attribute.update');
        Route::get('/delete/{id}', 'AttributeController@destroy')->name('admin.attribute.delete');
    });
    Route::group(['prefix' => 'value'], function() {
        Route::get('/create', 'ValueController@create')->name('admin.value.create');
        Route::post('/store', 'ValueController@store')->name('admin.value.store');
        Route::get('/edit/{id}', 'ValueController@edit')->name('admin.value.edit');
        Route::post('/update/{id}', 'ValueController@update')->name('admin.value.update');
        Route::get('/delete/{id}', 'ValueController@destroy')->name('admin.value.delete');
    });
    
    Route::group(['prefix' => 'variant'], function() {
        Route::get('create/{id}','VariantController@create')->name('admin.variant.create');
        Route::post('store/{id}','VariantController@store')->name('admin.variant.store');
        Route::get('edit/{id}','VariantController@edit')->name('admin.variant.edit');
        Route::post('update/{id}','VariantController@update')->name('admin.variant.update');
        Route::get('/delete/{id}','VariantController@destroy')->name('admin.variant.delete');
    });
    
    Route::group(['prefix' => 'banner'], function() {
        Route::get('/', function() {
            return redirect()->route('admin.banner.list');
        })->name('admin.banner.index');
        
        Route::get('/list', 'BannerController@index')->name('admin.banner.list');
        Route::get('create','BannerController@create')->name('admin.banner.create');
        Route::post('store','BannerController@store')->name('admin.banner.store');
        Route::get('edit/{id}','BannerController@edit')->name('admin.banner.edit');
        Route::post('update/{id}','BannerController@update')->name('admin.banner.update');
        Route::get('/delete/{id}','BannerController@destroy')->name('admin.banner.delete');
    });
    Route::group(['prefix' => 'don-hang'], function() {
        Route::get('don-hang-chua-xu-ly.html','OrderController@order')->name('admin.order.list');
        Route::get('chi-tiet-don-hang-/{id}.html','OrderController@orderDetail')->name('admin.order.process');
        Route::get('don-hang-da-xu-ly.html','OrderController@approved')->name('admin.order.approved');
    });
});
