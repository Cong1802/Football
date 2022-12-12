<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PitchController;
use App\Http\Controllers\TimeSlotController;


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

Route::get('/', function () {
    return view('layout');
});

Auth::routes();

// Frontend
// cái /home chỉ là url đường dẫn
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/404', [App\Http\Controllers\HomeController::class, 'error_page']);



Route::get('/search', [App\Http\Controllers\HomeController::class, 'search']);
Route::post('/autocomplete-ajax', [App\Http\Controllers\HomeController::class, 'autocomplete_ajax']);



// user infomation
Route::get('/user-infomation/{id}', [App\Http\Controllers\UserInfoController::class, 'user_infomation']);
Route::post('/update-user-info/{id}', [App\Http\Controllers\UserInfoController::class, 'update_user_infomation']);

// booking
Route::get('/booking/{pitch_id}', [App\Http\Controllers\BookingController::class, 'booking']);
Route::post('/select-pitch-type', [App\Http\Controllers\BookingController::class, 'SelectPitchType']);
Route::post('/select-date', [App\Http\Controllers\BookingController::class, 'SelectDate']);
Route::post('/create-booking', [App\Http\Controllers\BookingController::class, 'create_booking']);
Route::get('/history-booking', [App\Http\Controllers\BookingController::class, 'history_booking']);

// booking admin
Route::get('/booking-admin', [App\Http\Controllers\BookingController::class, 'booking_admin']);
Route::get('/revenue', [App\Http\Controllers\BookingController::class, 'revenue']);
Route::get('/all-booking', [App\Http\Controllers\BookingController::class, 'all_booking']);
Route::get('/all-booking-card', [App\Http\Controllers\BookingController::class, 'all_booking_details']);
Route::get('/delete-booking-card/{booking_id}', [App\Http\Controllers\BookingController::class,'delete_booking_details']);
Route::get('/delete-booking/{booking_id}', [App\Http\Controllers\BookingController::class,'delete_booking']);

