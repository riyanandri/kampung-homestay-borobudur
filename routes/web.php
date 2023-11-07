<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\OwnerController;
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
});

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
