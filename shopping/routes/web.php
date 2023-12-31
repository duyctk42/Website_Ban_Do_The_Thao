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

Route::get('/admin','AdminController@loginAdmin' );
Route::post('/admin','AdminController@postloginAdmin' );

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::prefix('menus')->group(function () {
        Route::get('/',[
            'as' => 'menus.index',
            'uses' => 'MenusController@index',
//             'middleware'=>'can:menu-list'
        ]);

        Route::get('/create',[
            'as' => 'menus.create',
            'uses' => 'MenusController@create'
        ]);
        Route::post('/store',[
            'as' => 'menus.store',
            'uses' => 'MenusController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'menus.edit',
            'uses' => 'MenusController@edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'menus.update',
            'uses' => 'MenusController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'menus.delete',
            'uses' => 'MenusController@delete'
        ]);


    });

    Route::prefix('categories')->group(function () {
        Route::get('/',[
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
            'middleware'=>'can:category-list'
        ]);
        Route::get('/create',[
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
            'middleware'=>'can:category-add'
        ]);
        Route::post('/store',[
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit',
            'middleware'=>'can:category-edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete',
            'middleware'=>'can:category-delete'
        ]);

    });
    //product
    Route::prefix('product')->group(function () {
        Route::get('/',[
            'as' => 'product.index',
            'uses' => 'AdminProductController@index'
        ]);
        Route::get('/create',[
            'as' => 'product.create',
            'uses' => 'AdminProductController@create'
        ]);
        Route::post('/store',[
            'as' => 'product.store',
            'uses' => 'AdminProductController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'product.edit',
            'uses' => 'AdminProductController@edit'

        ]);
        Route::post('/update/{id}',[
            'as' => 'product.update',
            'uses' => 'AdminProductController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete'
        ]);

    });
    //slider
    Route::prefix('slider')->group(function () {
        Route::get('/',[
            'as' => 'slider.index',
            'uses' => 'SliderAdminController@index'
        ]);
        Route::get('/create',[
            'as' => 'slider.create',
            'uses' => 'SliderAdminController@create'
        ]);
        Route::post('/store',[
            'as' => 'slider.store',
            'uses' => 'SliderAdminController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'slider.edit',
            'uses' => 'SliderAdminController@edit'
        ]);
        Route::post('/update/{id}',[
                'as' => 'slider.update',
            'uses' => 'SliderAdminController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'slider.delete',
            'uses' => 'SliderAdminController@delete'
        ]);

    });
    //settings
    Route::prefix('settings')->group(function () {
        Route::get('/',[
            'as' => 'settings.index',
            'uses' => 'AdminSettingController@index'
        ]);
        Route::get('/create',[
            'as' => 'settings.create',
            'uses' => 'AdminSettingController@create'
        ]);
        Route::post('/store',[
            'as' => 'settings.store',
            'uses' => 'AdminSettingController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'settings.edit',
            'uses' => 'AdminSettingController@edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'settings.update',
            'uses' => 'AdminSettingController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'settings.delete',
            'uses' => 'AdminSettingController@delete'
        ]);


    });
    Route::prefix('users')->group(function () {
        Route::get('/',[
            'as' => 'users.index',
            'uses' => 'AdminUserController@index'
        ]);
        Route::get('/create',[
            'as' => 'users.create',
            'uses' => 'AdminUserController@create'
        ]);
        Route::post('/store',[
            'as' => 'users.store',
            'uses' => 'AdminUserController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'users.edit',
            'uses' => 'AdminUserController@edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'users.update',
            'uses' => 'AdminUserController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'users.delete',
            'uses' => 'AdminUserController@delete'
        ]);

    });
    Route::prefix('roles')->group(function () {
        Route::get('/',[
            'as' => 'roles.index',
            'uses' => 'AdminRoleController@index'
        ]);
        Route::get('/create',[
            'as' => 'roles.create',
            'uses' => 'AdminRoleController@create'
        ]);
        Route::post('/store',[
            'as' => 'roles.store',
            'uses' => 'AdminRoleController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'roles.edit',
            'uses' => 'AdminRoleController@edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'roles.update',
            'uses' => 'AdminRoleController@update'
        ]);

    });
    Route::prefix('permissions')->group(function () {
        Route::get('/create',[
            'as' => 'permissions.create',
            'uses' => 'AdminPermissionController@createPermissions'
        ]);
        Route::post('/store',[
            'as' => 'permissions.store',
            'uses' => 'AdminPermissionController@store'
        ]);
    });

});

