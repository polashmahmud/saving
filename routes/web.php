<?php


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize' ] // Route translate middleware
    ],
    function() {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function () {
            return view('welcome');
        });

        Auth::routes();

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('member', 'MemberController');

        Route::prefix('admin')->group(function () {
            Route::resource('role', 'RoleController');
            Route::post('save-permission', 'RoleController@savePermission')->name('save-permission');
            Route::resource('permission', 'PermissionController');
        });


    });





