<?php

use App\Http\Controllers\Admin\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AppointmentControler;

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
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
      
require __DIR__.'/auth.php';
Route::prefix('admin')->middleware('role:admin')->group(function(){
    // roles
    Route::controller(RoleController::class)->prefix('role')->name('role.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'destroy')->name('destroy');

        Route::get('/{id}/role-give-permission', 'givePermission')->name('give-permission');
        Route::post('/{id}/role-give-permission-store', 'givedPermissionStore')->name('gived-permission-store');
    });
    // permissions
    Route::controller(PermissionController::class)->prefix('permission')->name('permission.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'destroy')->name('destroy');
    });
    // users
    Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'destroy')->name('destroy');

        Route::get('/give-role/user/{id}', 'giveRole')->name('give-role');
        Route::post('/user-give-role-store/{id}', 'givedRoleStore')->name('gived-role-store');

        Route::get('/role-permissions/{id}', 'rolePermissions')->name('role-permissions');
        Route::get('/roles-permissions/{user_id}', 'rolesPermissions')->name('roles-permissions');
    });
    //Doctor
    Route::controller(DoctorController::class)->prefix('admin.doctor')->name('admin.doctor.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{companyId}/show', 'show')->name('show');
        Route::get('/{companyId}/edit', 'edit')->name('edit');
        Route::put('/{companyId}/update', 'update')->name('update');
        Route::delete('/{companyId}/delete', 'destroy')->name('destroy');
    });
    Route::controller(AppointmentControler::class)->prefix('admin.appointment')->name('admin.appointment.')->group(function () {
        Route::get('/index', 'index1')->name('index');
        Route::get('/{appointmentId}/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{appointmentId}/edit', 'edit')->name('edit');
        Route::put('/{appointmentId}/update', 'update')->name('update');
        Route::delete('/{appointmentId}/delete', 'destroy')->name('destroy');
    });

});

  Route::controller(AppointmentControler::class)->group(function () {
        Route::get('/ডাক্তার-খুঁজুন', 'index')->name('find_doctor');
        Route::post('/ডাক্তারদের-তালিকা-সমূহ', 'doctorPost')->name('find_doctors');
        Route::get('/অ্যাপোয়েন্টমেন্ট-বুক-করুন/{doctorId}', 'bookAppointment')->name('appointment.book');
        Route::post('appoinment-book-store', 'bookAppointmentStore')->name('appointment.book.store');
        Route::get('/সিরিয়াল-নাম্বার-দেখুন', 'checkSerialNumber')->name('check.serial.number');
        Route::get('/ডাক্তারদের-তালিকা', 'doctorList')->name('doctor.list');

        // Route::get('/{companyId}/show', 'show')->name('show');
        // Route::get('/{companyId}/edit', 'edit')->name('edit');
        // Route::put('/{companyId}/update', 'update')->name('update');
        // Route::delete('/{companyId}/delete', 'destroy')->name('destroy');
    });



