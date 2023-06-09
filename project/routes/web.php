<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::post('/storeRiad', 'App\Http\Controllers\AdminHomeController@storeRiad')->name("admin.riad.store");

Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\Controller@about')->name("home.about");
Route::get('/admin', 'App\Http\Controllers\AdminHomeController@index')->name("admin.index");

Route::get('/Riads', 'App\Http\Controllers\AdminHomeController@riads')->name("admin.riads");
Route::delete('/deleteRiad/{id}', 'App\Http\Controllers\AdminHomeController@deleteRiad')->name("admin.riad.delete");
Route::get('/editRiad{id}', 'App\Http\Controllers\AdminHomeController@editRiad')->name("admin.riad.edit");
Route::post('/storeRiad', 'App\Http\Controllers\AdminHomeController@storeRiad')->name("admin.riad.store");
Route::get('/addRiad', 'App\Http\Controllers\AdminHomeController@addRiad')->name("admin.riad.add");
Route::put('/updateRiad/{id}', 'App\Http\Controllers\AdminHomeController@updateRiad')->name("admin.riad.update");

Route::get('/Reviews', 'App\Http\Controllers\AdminHomeController@reviews')->name("admin.reviews");
Route::delete('/deleteReview/{id}', 'App\Http\Controllers\AdminHomeController@deleteReview')->name("admin.review.delete");

Route::get('/Rooms', 'App\Http\Controllers\AdminHomeController@rooms')->name("admin.rooms");
Route::post('/storeRoom', 'App\Http\Controllers\AdminHomeController@storeRoom')->name("admin.room.store");
Route::get('/addRoom', 'App\Http\Controllers\AdminHomeController@addRoom')->name("admin.room.add");
Route::get('/editRoom{id}', 'App\Http\Controllers\AdminHomeController@editRoom')->name("admin.room.edit");
Route::put('/updateRoom/{id}', 'App\Http\Controllers\AdminHomeController@updateRoom')->name("admin.room.update");
Route::delete('/deleteRoom/{id}', 'App\Http\Controllers\AdminHomeController@deleteRoom')->name("admin.room.delete");

Route::get('/services', 'App\Http\Controllers\AdminHomeController@services')->name("admin.services");
Route::get('/addService', 'App\Http\Controllers\AdminHomeController@addService')->name("admin.service.add");
Route::post('/storeService', 'App\Http\Controllers\AdminHomeController@storeService')->name("admin.service.store");
Route::get('/editService{id}', 'App\Http\Controllers\AdminHomeController@editService')->name("admin.service.edit");
Route::put('/updateService/{id}', 'App\Http\Controllers\AdminHomeController@updateService')->name("admin.service.update");
Route::delete('/deleteService/{id}', 'App\Http\Controllers\AdminHomeController@deleteService')->name("admin.service.delete");


Route::get('/users', 'App\Http\Controllers\AdminHomeController@users')->name("admin.users");
Route::get('/addUser', 'App\Http\Controllers\AdminHomeController@addUser')->name("admin.user.add");
Route::post('/storeUser', 'App\Http\Controllers\AdminHomeController@storeUser')->name("admin.user.store");
Route::get('/editUser{id}', 'App\Http\Controllers\AdminHomeController@editUser')->name("admin.user.edit");
Route::put('/updateUser/{id}', 'App\Http\Controllers\AdminHomeController@updateUser')->name("admin.user.update");
Route::delete('/deleteUser/{id}', 'App\Http\Controllers\AdminHomeController@deleteUser')->name("admin.user.delete");

Route::get('/category', 'App\Http\Controllers\AdminHomeController@categories')->name("admin.categories");
Route::get('/addCategory', 'App\Http\Controllers\AdminHomeController@addCategory')->name("admin.category.add");
Route::post('/storeCategory', 'App\Http\Controllers\AdminHomeController@storeCategory')->name("admin.category.store");
Route::get('/editCategory{id}', 'App\Http\Controllers\AdminHomeController@editCategory')->name("admin.category.edit");
Route::put('/updateCategory/{id}', 'App\Http\Controllers\AdminHomeController@updateCategory')->name("admin.category.update");
Route::delete('/deleteCategory/{id}', 'App\Http\Controllers\AdminHomeController@deleteCategory')->name("admin.category.delete");

Route::get('/yourReservations', 'App\Http\Controllers\HomeController@yourReservations')->name("yourReservations");
Route::get('/Bookings', 'App\Http\Controllers\AdminHomeController@bookings')->name("admin.bookings");
Route::get('/editBooking{id}', 'App\Http\Controllers\AdminHomeController@editBooking')->name("admin.booking.edit");
Route::put('/updateBooking/{id}', 'App\Http\Controllers\AdminHomeController@updateBooking')->name("admin.booking.update");
Route::delete('/deleteBooking/{id}', 'App\Http\Controllers\AdminHomeController@deleteBooking')->name("admin.booking.delete");

Route::post('/booking{id}', 'App\Http\Controllers\HomeController@booking')->name("room.book");
Route::get('/AvailableRooms', 'App\Http\Controllers\RoomController@AvailableRooms')->name("room.Available");
Route::get('/blogs', 'App\Http\Controllers\BlogController@index')->name("blog.index");
Route::get('/rooms', 'App\Http\Controllers\RoomController@index')->name("room.index");
Route::get('/room{id}', 'App\Http\Controllers\RoomController@show')->name("room.show");
Route::get('/addReview', 'App\Http\Controllers\ReviewController@store')->name("review.store");
Route::get('/riads', 'App\Http\Controllers\RiadController@index')->name("riad.index");
Route::get('/{categoryName}', 'App\Http\Controllers\RoomController@findByCategory')->name("room.find");

    