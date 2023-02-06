<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\productController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ImportExportController;
Route::controller(Controller::class)->group(function () {
    Route::get('/', 'index');
    Route::get('index', 'index');
    Route::get('about', 'about');
    Route::get('contact', 'contact');
    Route::get('testimonial', 'testimonial');
    Route::get('service', 'service');
    Route::get('reservation', 'reservation');
    Route::get('menu', 'menu');
    Route::get('signup', 'signup');
    Route::get('login', 'login');
});

Route::controller(userController::class)->group(function () {
    Route::post('handle_login', 'handle_login');
    Route::post('handle_signup', 'handle_signup');
    Route::get('logout', 'logout');
});

Route::controller(productController::class)->group(function () {
    Route::post('cart', 'cart');
    Route::post('handle_cart','handle_cart');
    Route::post('delete','delete');

});

Route::controller(paymentController::class)->group(function () {
    Route::post('payment', 'payment');
    Route::get('delivery', 'delivery')->middleware('cartSession');
    Route::get('payment_details', 'payment_details')->middleware('cartSession');
});   

Route::controller(dashboardController::class)->group(function () {
    Route::get('admin_index', 'admin_index')->middleware('adminCheck');
    Route::get('admin_login', 'admin_login');
    Route::post('login_handle', 'login_handle');
    Route::get('admin_logout', 'admin_logout');
    Route::get('users_list', 'admin_users_table');
    Route::post('user_delete', 'user_delete');
});

Route::controller(ImportExportController::class)->group(function () {
    Route::get('export','export')->name('export');
    Route::post('import','import')->name('import');
});

// Route::get('delivery',[productController::class,'delivery']);
Route::post('handle_book',[bookingController::class,'handle_book']);

Route::get('add_to_cart', function () {
    return view('add_to_cart');
});