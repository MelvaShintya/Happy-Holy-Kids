<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('website.contents.beranda.beranda');
})->name('home');

Route::get('/profil', function () {
    return view('website.contents.profil.profil');
})->name('profil');

Route::controller(RegistrationController::class)
    ->group(function ($registration) {
        $registration->view('/pendaftaran', 'website.contents.pendaftaran.pendaftaran')->name('registration');
        $registration->post('/pendaftaran', 'store')->name('registration.store');
    });

Route::prefix('admin')->group(function () {

    Route::controller(LoginController::class)->group(function ($login) {
        $login->get('/', function() {
            return auth()->check() ? redirect()->route('dashboard') : view('admin.login.login');
        })->name('login');
        $login->post('/login', 'login')->name('login.store');
        $login->get('/logout', 'logout')->name('logout');
    });

    Route::middleware(['auth'])->group(function () {
        Route::controller(DashboardController::class)
            ->group(function ($dashboard) {
                // $dashboard->view('/dashboard', 'admin.dashboard.dashboard')->name('dashboard');
                $dashboard->get('/dashboard', 'dashboard')->name('dashboard');
        });
        Route::controller(RegistrationController::class)
            ->group(function ($registration) {
                $registration->get('/pendaftaran', 'list')->name('registration.list');
                $registration->get('/laporan', 'report')->name('report.list');
                $registration->get('/pendaftaran/export', 'export')->name('registration.export');
                $registration->get('/pendaftaran/form', 'form')->name('registration.form');
                $registration->get('/pendaftaran/form/{id?}', 'form')->name('registration.form');
                $registration->post('/pendaftaran/form/{id?}', 'store')->name('registration.admin.store');
                $registration->put('/pendaftaran/form/{id?}', 'store')->name('registration.admin.store');
                $registration->get('/pendaftaran/view/{id?}', 'view')->name('registration.view');
                $registration->delete('/pendaftaran/delete/{id}', 'destroy')->name('registration.delete');
        });
    });

});