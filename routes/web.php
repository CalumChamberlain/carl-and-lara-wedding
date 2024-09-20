<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Guest\GuestForm;
use App\Livewire\Admin\Guest\GuestIndex;
use App\Livewire\Admin\Guest\GuestShow;
use App\Livewire\Admin\Payment\PaymentForm;
use App\Livewire\Admin\Supplier\SupplierForm;
use App\Livewire\Admin\Supplier\SupplierIndex;
use App\Livewire\Admin\Supplier\SupplierShow;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Profile\Edit;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/admin/dashboard')->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/password/reset', ForgotPassword::class)->name('password.request');
Route::get('/password/reset/{token}', ResetPassword::class)->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');
    Route::post('logout', LogoutController::class)
        ->name('logout');

    Route::prefix('admin')->group(function () {
        Route::get('dashboard', Dashboard::class)->name('admin.dashboard');

        Route::get('suppliers', SupplierIndex::class)->name('admin.suppliers.index');
        Route::get('suppliers/create', SupplierForm::class)->name('admin.suppliers.create');
        Route::get('suppliers/{supplier}/edit', SupplierForm::class)->name('admin.suppliers.edit');
        Route::get('suppliers/{supplier}', SupplierShow::class)->name('admin.suppliers.show');
        Route::get('suppliers/{supplier}/payments/create', PaymentForm::class)->name('admin.suppliers.payments.create');

        Route::get('profile', Edit::class)->name('admin.profile');
        Route::get('settings', \App\Livewire\Admin\Settings::class)->name('admin.settings');

        Route::get('guests', GuestIndex::class)->name('admin.guests.index');
        Route::get('guests/create', GuestForm::class)->name('admin.guests.create');
        Route::get('guests/{guest}/edit', GuestForm::class)->name('admin.guests.edit');
        Route::get('guests/{guest}', GuestShow::class)->name('admin.guests.show');
    });
});
