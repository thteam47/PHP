<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ChartController;

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

Route::post('register', [UserController::class, 'postRegister'])->name('postRegister');
Route::get('login', [UserController::class, 'getLogin'])->name('getLogin');
Route::post('login', [UserController::class, 'postLogin'])->name('postLogin');
Route::post('forget/password', [UserController::class, 'forgetPassword'])->name('forgetPassword');
Route::get('verify/send', [UserController::class, 'sendActivationCode'])->name('sendActivationCode');
Route::post('verify/email', [UserController::class, 'verifyEmail'])->name('verifyEmail');
Route::get('verify/email', [UserController::class, 'verification'])->name('verification.notice')->middleware('auth');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'manage', 'middleware' => 'verified'], function () {
    Route::get('/', [ChartController::class, 'index']);
    Route::group(['prefix' => 'department'], function () {
        Route::post('create/club', [DepartmentController::class, 'postCreateClub'])->name('postCreateClub');
        Route::post('create', [DepartmentController::class, 'postCreate'])->name('postCreateDepartment');
        Route::post('update/{department_id}', [DepartmentController::class, 'postUpdate'])->name('postUpdateDepartment');
    });
});
