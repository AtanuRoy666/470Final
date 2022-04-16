<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\memberController;

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
    return view('welcome');
});

Route::get('admin/login', [AdminController::class,'login']);

Route::get('admin', [AdminController::class,'index']);

Route::post('admin/login', [AdminController::class,'submit_login']);

Route::get('admin/logout', [AdminController::class,'logout']);

//Department Resources
Route::get('depart/{id}/delete', [DepartmentController::class, 'destroy']);
Route::resource('depart', DepartmentController::class);

//Employee Resources
Route::get('employee/{id}/delete', [EmployeeController::class, 'destroy']);
Route::resource('employee', EmployeeController::class);

//Member Resources
Route::get('member/{id}/delete', [MemberController::class, 'destroy']);
Route::resource('member', MemberController::class);