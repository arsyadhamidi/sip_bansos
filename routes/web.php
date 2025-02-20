<?php

use App\Http\Controllers\Admin\AdminBerasController;
use App\Http\Controllers\Admin\AdminBpntController;
use App\Http\Controllers\Admin\AdminLansiaController;
use App\Http\Controllers\Admin\AdminPKHController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Masyarakat\MasyarakatBerasController;
use App\Http\Controllers\Masyarakat\MasyarakatBpntController;
use App\Http\Controllers\Masyarakat\MasyarakatLansiaController;
use App\Http\Controllers\Masyarakat\MasyarakatPkhController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Middleware\CekLevel;
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

// Landing
Route::get('/', [LandingController::class, 'index'])->name('landing.index');

// Login
Route::get("/login", [LoginController::class, "index"])->name("login")->middleware('guest');
Route::post("/login/authenticate", [LoginController::class, "authenticate"])->name("login.authenticate");
Route::get("/login/logout", [LoginController::class, "logout"])->name("login.logout");

// Dashboard
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard.index");

    // Setting
    Route::get("/setting/index", [SettingController::class, "index"])->name("setting.index");
    Route::post('/setting/updateprofile', [SettingController::class, 'updateprofile'])->name('setting.updateprofile');
    Route::post('/setting/updateusername', [SettingController::class, 'updateusername'])->name('setting.updateusername');
    Route::post('/setting/updatepassword', [SettingController::class, 'updatepassword'])->name('setting.updatepassword');
    Route::post('/setting/updategambar', [SettingController::class, 'updategambar'])->name('setting.updategambar');
    Route::post('/setting/deletegambar', [SettingController::class, 'deletegambar'])->name('setting.deletegambar');

    // Admin
    Route::group(['middleware' => [CekLevel::class . ':Operator']], function () {

        // Beras
        Route::get('/data-beras', [AdminBerasController::class, 'index'])->name('data-beras.index');
        Route::get('/data-beras/generateexcel', [AdminBerasController::class, 'generateexcel'])->name('data-beras.generateexcel');
        Route::get('/data-beras/create', [AdminBerasController::class, 'create'])->name('data-beras.create');
        Route::get('/data-beras/generatepdf/{id}', [AdminBerasController::class, 'generatepdf'])->name('data-beras.generatepdf');
        Route::get('/data-beras/edit/{id}', [AdminBerasController::class, 'edit'])->name('data-beras.edit');
        Route::post('/data-beras/store', [AdminBerasController::class, 'store'])->name('data-beras.store');
        Route::post('/data-beras/update/{id}', [AdminBerasController::class, 'update'])->name('data-beras.update');
        Route::post('/data-beras/destroy/{id}', [AdminBerasController::class, 'destroy'])->name('data-beras.destroy');
        Route::post('/data-beras/importberas', [AdminBerasController::class, 'importberas'])->name('data-beras.importberas');

        // Lansia
        Route::get('/data-lansia', [AdminLansiaController::class, 'index'])->name('data-lansia.index');
        Route::get('/data-lansia/generateexcel', [AdminLansiaController::class, 'generateexcel'])->name('data-lansia.generateexcel');
        Route::get('/data-lansia/create', [AdminLansiaController::class, 'create'])->name('data-lansia.create');
        Route::get('/data-lansia/generatepdf/{id}', [AdminLansiaController::class, 'generatepdf'])->name('data-lansia.generatepdf');
        Route::get('/data-lansia/edit/{id}', [AdminLansiaController::class, 'edit'])->name('data-lansia.edit');
        Route::post('/data-lansia/store', [AdminLansiaController::class, 'store'])->name('data-lansia.store');
        Route::post('/data-lansia/update/{id}', [AdminLansiaController::class, 'update'])->name('data-lansia.update');
        Route::post('/data-lansia/destroy/{id}', [AdminLansiaController::class, 'destroy'])->name('data-lansia.destroy');
        Route::post('/data-lansia/importlansia', [AdminLansiaController::class, 'importlansia'])->name('data-lansia.importlansia');

        // PKH
        Route::get('/data-bpnt', [AdminBpntController::class, 'index'])->name('data-bpnt.index');
        Route::get('/data-bpnt/generateexcel', [AdminBpntController::class, 'generateexcel'])->name('data-bpnt.generateexcel');
        Route::get('/data-bpnt/create', [AdminBpntController::class, 'create'])->name('data-bpnt.create');
        Route::get('/data-bpnt/generatepdf/{id}', [AdminBpntController::class, 'generatepdf'])->name('data-bpnt.generatepdf');
        Route::get('/data-bpnt/edit/{id}', [AdminBpntController::class, 'edit'])->name('data-bpnt.edit');
        Route::post('/data-bpnt/store', [AdminBpntController::class, 'store'])->name('data-bpnt.store');
        Route::post('/data-bpnt/update/{id}', [AdminBpntController::class, 'update'])->name('data-bpnt.update');
        Route::post('/data-bpnt/destroy/{id}', [AdminBpntController::class, 'destroy'])->name('data-bpnt.destroy');
        Route::post('/data-bpnt/importbpnt', [AdminBpntController::class, 'importbpnt'])->name('data-bpnt.importbpnt');

        // PKH
        Route::get('/data-pkh', [AdminPKHController::class, 'index'])->name('data-pkh.index');
        Route::get('/data-pkh/generateexcel', [AdminPKHController::class, 'generateexcel'])->name('data-pkh.generateexcel');
        Route::get('/data-pkh/create', [AdminPKHController::class, 'create'])->name('data-pkh.create');
        Route::get('/data-pkh/generatepdf/{id}', [AdminPKHController::class, 'generatepdf'])->name('data-pkh.generatepdf');
        Route::get('/data-pkh/edit/{id}', [AdminPKHController::class, 'edit'])->name('data-pkh.edit');
        Route::post('/data-pkh/store', [AdminPKHController::class, 'store'])->name('data-pkh.store');
        Route::post('/data-pkh/update/{id}', [AdminPKHController::class, 'update'])->name('data-pkh.update');
        Route::post('/data-pkh/destroy/{id}', [AdminPKHController::class, 'destroy'])->name('data-pkh.destroy');
        Route::post('/data-pkh/importpkh', [AdminPKHController::class, 'importpkh'])->name('data-pkh.importpkh');

        // User
        Route::get('/data-user', [AdminUserController::class, 'index'])->name('data-user.index');
        Route::get('/data-user/create', [AdminUserController::class, 'create'])->name('data-user.create');
        Route::get('/data-user/edit/{id}', [AdminUserController::class, 'edit'])->name('data-user.edit');
        Route::post('/data-user/store', [AdminUserController::class, 'store'])->name('data-user.store');
        Route::post('/data-user/update/{id}', [AdminUserController::class, 'update'])->name('data-user.update');
        Route::post('/data-user/destroy/{id}', [AdminUserController::class, 'destroy'])->name('data-user.destroy');
    });

    // Masyarakat
    Route::group(['middleware' => [CekLevel::class . ':Masyarakat']], function () {

        Route::get('/masyarakat-beras', [MasyarakatBerasController::class, 'index'])->name('masyarakat-beras.index');
        Route::get('/masyarakat-lansia', [MasyarakatLansiaController::class, 'index'])->name('masyarakat-lansia.index');
        Route::get('/masyarakat-bpnt', [MasyarakatBpntController::class, 'index'])->name('masyarakat-bpnt.index');
        Route::get('/masyarakat-pkh', [MasyarakatPkhController::class, 'index'])->name('masyarakat-pkh.index');
    });
});
