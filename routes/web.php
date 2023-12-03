<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\OwnerController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Frontend\FrontendRoomController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Backend\RoomTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'userProfileStore'])->name('profile.store');
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');
    Route::get('/user/change-password', [UserController::class, 'userChangePassword'])->name('user.change.password');
    Route::post('/user/password/store', [UserController::class, 'changePasswordStore'])->name('password.change.store');
});

require __DIR__.'/auth.php';

// admin group middleware
Route::middleware(['auth','roles:admin'])->group(function(){

    // admin profiles
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change-password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.update'); 
    
    // manage owners
    Route::controller(OwnerController::class)->group(function(){
        Route::get('/all/owner', 'allOwner')->name('all.owner');
        Route::get('/add/owner', 'addOwner')->name('add.owner');
        Route::post('/owner/store', 'ownerStore')->name('owner.store');
        Route::get('/owner/{id}/edit', 'editOwner')->name('edit.owner');
        Route::post('/owner/update', 'updateOwner')->name('update.owner');
        Route::get('/owner/{id}/delete', 'deleteOwner')->name('delete.owner');
    });

     // manage book area
     Route::controller(OwnerController::class)->group(function(){
        Route::get('/book/area', 'bookArea')->name('book.area');
        Route::post('/book/area/update', 'bookAreaUpdate')->name('book.area.update');
    });

     // manage room type
     Route::controller(RoomTypeController::class)->group(function(){
        Route::get('/room/type/list', 'roomTypeList')->name('room.type.list');
        Route::get('/room/type/create', 'addRoomType')->name('add.room.type');
        Route::post('/room/type/store', 'roomTypeStore')->name('room.type.store');
    });

      // manage room
      Route::controller(RoomController::class)->group(function(){
        Route::get('/room/{id}/edit', 'editRoom')->name('edit.room'); 
        Route::post('/room/{id}/update', 'updateRoom')->name('update.room'); 
        Route::get('/room/{id}/delete', 'deleteRoom')->name('delete.room'); 

        Route::get('/room/multi-image/{id}/delete', 'multiImageDelete')->name('multi.image.delete');
        Route::post('/room/number/{id}/store', 'storeNumberRoom')->name('room.number.store'); 
        Route::get('/room/number/{id}/edit', 'editRoomNumber')->name('edit.room.number');
        Route::post('/room/number/{id}/update', 'updateRoomNumber')->name('update.room.number'); 
        Route::get('/room/number/{id}/delete', 'deleteRoomNumber')->name('delete.room.number');
    });

     // admin booking
     Route::controller(BookingController::class)->group(function(){
        Route::get('/booking/list', 'bookingList')->name('booking.list');
        Route::get('/edit_booking/{id}', 'editBooking')->name('edit_booking');
    });
});

/// Room All Route 
Route::controller(FrontendRoomController::class)->group(function(){
    Route::get('/rooms/', 'allRoomList')->name('all.rooms');
    Route::get('/room/details/{id}', 'roomDetailsPage');
    Route::get('/bookings/', 'bookingSearch')->name('booking.search');
    Route::get('/search/room/details/{id}', 'searchRoomDetails')->name('search.room.details');
    Route::get('/check_room_availability/', 'checkRoomAvailability')->name('check_room_availability');
});

// Auth Middleware User must have login for access this route 
Route::middleware(['auth'])->group(function(){
    /// CHECKOUT ALL Route 
    Route::controller(BookingController::class)->group(function(){
        Route::get('/checkout/', 'checkout')->name('checkout');
        Route::post('/booking/store/', 'bookingStore')->name('user_booking_store');
        Route::post('/checkout/store/', 'checkoutStore')->name('checkout.store');
        Route::post('/update/booking/status/{id}', 'updateBookingStatus')->name('update.booking.status');
        Route::post('/update/booking/{id}', 'updateBooking')->name('update.booking');
        Route::get('/assign_room/{id}', 'assignRoom')->name('assign_room');
        Route::get('/assign_room/store/{booking_id}/{room_number_id}', 'assignRoomStore')->name('assign_room_store');
        Route::get('/assign_room_delete/{id}', 'assignRoomDelete')->name('assign_room_delete');
    });
});

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
