<?php

use App\Http\Controllers\Admin\GameCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\WebController;

Route::get('/',[WebController::class,'home'])->name('home');
Route::get('/from/{id}',[WebController::class,'form'])->name('form');
Route::post('/submit_from',[WebController::class,'submit_from'])->name('submit_from');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'as' => 'admin.'], function () {
        Route::group(['prefix' => 'manage'], function () {
            Route::resources([
                'setting' => SettingController::class,
                'gamecategory'=>GameCategoryController::class,
            ]);
        });

        //Change Profile image
        Route::post('/setting/changeprofile', [SettingController::class, 'change_profile'])->name('change_profile');

        //Change logo image
        Route::post('/setting/changelogo', [SettingController::class, 'change_logo'])->name('change_logo');

        //Change logo Change User
        Route::post('/setting/changeuser', [SettingController::class, 'change_user'])->name('change_user');
    });
});

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return redirect('/');
});
