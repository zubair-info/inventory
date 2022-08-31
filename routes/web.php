<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('check_status')->name('home');

//user
Route::get('/user/list', [HomeController::class, 'userList'])->name('user');
Route::get('/userDelete/{id}', [HomeController::class, 'userDelete'])->name('user.delete');
Route::get('/changeStatus', [HomeController::class, 'userChangeStatus']);
Route::get('/userEdit/{user_id}', [HomeController::class, 'userEdit'])->name('userEdit');
Route::get('/profile/change', [HomeController::class, 'profileChange'])->name('profile.change');
Route::post('/profile/name/update', [HomeController::class, 'nameChange']);
Route::post('/profile/password/update', [HomeController::class, 'passwordUpdate']);
Route::post('/profile/picture/update', [HomeController::class, 'picture_update']);
Route::post('user/profile/update', [HomeController::class, 'userUpdate'])->name('userUpdate');

Route::get('/company', [CompanyController::class, 'index'])->name('company');
Route::get('/companyAdd', [CompanyController::class, 'companyAdd'])->name('companyAdd');
Route::post('/companyStore', [CompanyController::class, 'companyStore'])->name('companyStore');
Route::get('/companyEdit/{company_id}', [CompanyController::class, 'companyEdit'])->name('companyEdit');
Route::post('/companyUpdate', [CompanyController::class, 'companyUpdate'])->name('companyUpdate');
Route::get('/companyDelete/{id}', [CompanyController::class, 'companyDelete'])->name('companyDelete');
