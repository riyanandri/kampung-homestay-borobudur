<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\OwnerController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Frontend\FrontendRoomController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Backend\RoomTypeController;
use App\Http\Controllers\Backend\RoomListController;
use App\Http\Controllers\Backend\SettingController;
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
        Route::get('/download/invoice/{id}', 'downloadInvoice')->name('download.invoice');
    });

    // admin room list
    Route::controller(RoomListController::class)->group(function(){
        Route::get('/view/room/list', 'viewRoomList')->name('view.room.list');
        Route::get('/add/room/list', 'addRoomList')->name('add.room.list');
        Route::post('/store/room/list', 'storeRoomList')->name('store.room.list');
    });

    // admin setting
    Route::controller(SettingController::class)->group(function(){
        Route::get('/smtp/setting', 'smtpSetting')->name('smtp.setting');
        Route::post('/smtp/update', 'smtpUpdate')->name('smtp.update');
        Route::get('/site/setting', 'siteSetting')->name('site.setting');
        Route::post('/site/update', 'siteUpdate')->name('site.update');
    });

    // admin report
    Route::controller(ReportController::class)->group(function(){
        Route::get('/booking/report/', 'bookingReport')->name('booking.report');
        Route::post('/search-by-date', 'searchByDate')->name('search-by-date');
    });

      // Permission
      Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission', 'allPermission')->name('all.permission');
        Route::get('/add/permission', 'addPermission')->name('add.permission');
        Route::post('/store/permission', 'storePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'editPermission')->name('edit.permission');
        Route::post('/update/permission', 'updatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'deletePermission')->name('delete.permission');
    });

    // Roles
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles', 'allRoles')->name('all.roles');
        Route::get('/add/roles', 'addRoles')->name('add.roles');
        Route::post('/store/roles', 'storeRoles')->name('store.roles');
        Route::get('/edit/roles/{id}', 'editRoles')->name('edit.roles');
        Route::post('/update/roles', 'updateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}', 'deleteRoles')->name('delete.roles');

        Route::get('/import/permission', 'importPermission')->name('import.permission');
        Route::get('/export', 'export')->name('export');
        Route::post('/import', 'import')->name('import');

        Route::get('/add/roles/permission', 'addRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'rolePermissionStore')->name('role.permission.store');
        Route::get('/all/roles/permission', 'allRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}', 'adminEditRoles')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}', 'adminRolesUpdate')->name('admin.roles.update');
        Route::get('/admin/delete/roles/{id}', 'adminDeleteRoles')->name('admin.delete.roles');
    });

    Route::controller(ContactController::class)->group(function(){
        Route::get('/contact/message', 'adminContactMessage')->name('contact.message');
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

Route::controller(ContactController::class)->group(function(){
    Route::get('/contact-us', 'contactUs')->name('contact.us');
    Route::post('/store/contact', 'StoreContactUs')->name('store.contact');
});

// Auth Middleware User must have login for access this route 
Route::middleware(['auth'])->group(function(){
    /// CHECKOUT ALL Route 
    Route::controller(BookingController::class)->group(function(){
        Route::get('/checkout/', 'checkout')->name('checkout');
        Route::post('/booking/store/', 'bookingStore')->name('user_booking_store');
        Route::post('/checkout/store/', 'checkoutStore')->name('checkout.store');

        // booking update
        Route::post('/update/booking/status/{id}', 'updateBookingStatus')->name('update.booking.status');
        Route::post('/update/booking/{id}', 'updateBooking')->name('update.booking');

        // assign room route
        Route::get('/assign_room/{id}', 'assignRoom')->name('assign_room');
        Route::get('/assign_room/store/{booking_id}/{room_number_id}', 'assignRoomStore')->name('assign_room_store');
        Route::get('/assign_room_delete/{id}', 'assignRoomDelete')->name('assign_room_delete');

        // user booking route
        Route::get('/user/booking', 'userBooking')->name('user.booking');
        Route::get('/user/invoice/{id}', 'userInvoice')->name('user.invoice');
    });
});

/// Notification All Route 
Route::controller(BookingController::class)->group(function(){
    Route::post('/mark-notification-as-read/{notification}', 'markAsRead');
});

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
