<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Payment\PaymentForm;
use App\Livewire\Admin\Supplier\SupplierForm;
use App\Livewire\Admin\Supplier\SupplierIndex;
use App\Livewire\Admin\Supplier\SupplierShow;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
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
        Route::get('suppliers/create', SupplierForm::class)->name('admin.supplier.create');
        Route::get('suppliers/{supplier}/edit', SupplierForm::class)->name('admin.supplier.edit');
        Route::get('suppliers/{supplier}', SupplierShow::class)->name('admin.supplier.show');
        Route::get('suppliers/{supplier}/payments/create', PaymentForm::class)->name('admin.supplier.payments.create');
    });
});
