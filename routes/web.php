<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductFeatureController;
use App\Http\Controllers\ProductReceivedController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\YarnController;
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


// Role Permission
Route::get('/role/manager', [RoleController::class, 'role_manager'])->name('role.manage');
Route::post('/add/permission', [RoleController::class, 'add_permission']);
Route::post('/add/role', [RoleController::class, 'add_role']);
Route::post('/assign/role', [RoleController::class, 'assign_role']);
// Route::get('/edit/role/permissions/{user_id}', [RoleController::class, 'edit_role_permissions'])->name('edit.role.permissions');
Route::get('/edit/permissions/{role_id}', [RoleController::class, 'edit_permissions'])->name('edit.permissions');
// Route::post('/update/role/permission', [RoleController::class, 'update_role_permission']);
Route::post('/update/permission', [RoleController::class, 'update_permission']);
Route::get('/role/permission/{user_id}', [RoleController::class, 'role_permission'])->name('role.permission');
Route::get('/role/permission/delete/{role_id}', [RoleController::class, 'delete_role_permission'])->name('role.delete_role_permission');


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
Route::get('user/password/reset', [HomeController::class, 'userPassReset'])->name('userPassReset');
Route::post('user/password/store', [HomeController::class, 'passwordResetStore'])->name('passwordResetStore');
Route::get('user/password/reset/form/{token}', [HomeController::class, 'passwordResetForm'])->name('passwordResetForm');
Route::post('user/password/reset/update', [HomeController::class, 'passwordResetUpdate'])->name('passwordResetUpdate');

// Route::group(['namespace' => 'App\Http\Controllers'], function () {
//     Route::group(['middleware' => ['auth', 'permission', 'check_status']], function () {

// Route::get('/home', [HomeController::class, 'index'])->name('home');

//company
Route::get('/company', [CompanyController::class, 'index'])->name('company');
Route::get('/companyAdd', [CompanyController::class, 'companyAdd'])->name('companyAdd');
Route::post('/companyStore', [CompanyController::class, 'companyStore'])->name('companyStore');
Route::get('/companyEdit/{company_id}', [CompanyController::class, 'companyEdit'])->name('companyEdit');
Route::post('/companyUpdate', [CompanyController::class, 'companyUpdate'])->name('companyUpdate');
Route::post('/logoCompanyUpdate', [CompanyController::class, 'logoCompanyUpdate'])->name('logoCompanyUpdate');
Route::post('/mobilelogoCompanyUpdate', [CompanyController::class, 'mobilelogoCompanyUpdate'])->name('mobilelogoCompanyUpdate');
Route::post('/favIconCompanyUpdate', [CompanyController::class, 'favIconCompanyUpdate'])->name('favIconCompanyUpdate');
Route::get('/companyDelete/{id}', [CompanyController::class, 'companyDelete'])->name('companyDelete');


//product add/product feature
Route::get('product-feacture', [ProductFeatureController::class, 'index'])->name('product_feacture');
Route::get('product-feacture-add', [ProductFeatureController::class, 'product_feacture_add'])->name('product_feacture_add');
Route::post('product-feacture-store', [ProductFeatureController::class, 'productFeactureStore'])->name('productFeactureStore');
Route::get('product-feacture-edit/{product_feacture_id}', [ProductFeatureController::class, 'product_feacture_edit'])->name('product_feacture_edit');
Route::post('product-feacture-update', [ProductFeatureController::class, 'productFeactureUpdate'])->name('productFeactureUpdate');
Route::get('productFeactureDelete/{id}', [ProductFeatureController::class, 'productFeactureDelete'])->name('productFeactureDelete');


//product received
Route::get('product-received', [ProductReceivedController::class, 'index'])->name('product_received');
Route::get('product-received-add', [ProductReceivedController::class, 'product_received_add'])->name('product_received_add');
Route::post('productFeatureSearchData', [ProductReceivedController::class, 'productFeatureSearchData'])->name('productFeatureSearchData');
Route::post('product-received-store', [ProductReceivedController::class, 'product_received_store'])->name('product_received_store');
Route::get('product-received-edit/{product_received_id}', [ProductReceivedController::class, 'product_received_edit'])->name('product_received_edit');
Route::get('productReceivedDelete/{id}', [ProductReceivedController::class, 'productReceivedDelete'])->name('productReceivedDelete');
Route::post('/product-received-update', [ProductReceivedController::class, 'product_received_update'])->name('product_received_update');
// Route::post('product-received-store', [ProductReceivedController::class, 'store'])->name('cablelists.store');



//supplier
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::get('/supplierAdd', [SupplierController::class, 'supplierAdd'])->name('supplierAdd');
Route::post('/supplierStore', [SupplierController::class, 'supplierStore'])->name('supplierStore');
Route::get('/supplierEdit/{company_id}', [SupplierController::class, 'supplierEdit'])->name('supplierEdit');
Route::post('/supplierUpdate', [SupplierController::class, 'supplierUpdate'])->name('supplierUpdate');
Route::get('supplierDelete/{id}', [SupplierController::class, 'supplierDelete'])->name('supplierDelete');

//brand
Route::get('brand-name', [BrandController::class, 'index'])->name('brand');
Route::post('brand-name-store', [BrandController::class, 'store'])->name('brandNameStore');
Route::post('/brand-name-update', [BrandController::class, 'update'])->name('brandUpdate');
Route::get('/brandDelete/{id}', [BrandController::class, 'destroy'])->name('brandDelete');


//department
Route::get('department', [DepartmentController::class, 'index'])->name('department');
Route::post('department-store', [DepartmentController::class, 'store'])->name('departmentStore');
Route::post('/department-update', [DepartmentController::class, 'update'])->name('departmentUpdate');
Route::get('/departmentDelete/{id}', [DepartmentController::class, 'destroy'])->name('departmentDelete');


//yarn
Route::get('yarn', [YarnController::class, 'index'])->name('yarn');
Route::post('yarn-store', [YarnController::class, 'store'])->name('yarnStore');
Route::post('/yarn-update', [YarnController::class, 'update'])->name('yarnUpdate');
Route::get('/yarnDelete/{id}', [YarnController::class, 'destroy'])->name('yarnDelete');

//yarn
Route::get('material', [MaterialController::class, 'index'])->name('material');
Route::post('material-store', [MaterialController::class, 'store'])->name('materialStore');
Route::post('/material-update', [MaterialController::class, 'update'])->name('materialUpdate');
Route::get('/materialDelete/{id}', [MaterialController::class, 'destroy'])->name('materialDelete');


//yarn
Route::get('color', [ColorController::class, 'index'])->name('color');
Route::post('color-store', [ColorController::class, 'store'])->name('colorStore');
Route::post('/color-update', [ColorController::class, 'update'])->name('colorUpdate');
Route::get('/colorDelete/{id}', [ColorController::class, 'destroy'])->name('colorDelete');

//     });
// });
