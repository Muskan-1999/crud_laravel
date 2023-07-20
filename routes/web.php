<?php

use App\Http\Controllers\EmployeeController;
// use App\Http\Controllers\auth\ResetPasswordController;
// use App\Http\Controllers\auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotResetPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;


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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
//middleware implementation
Route::middleware('adminAccess')->group(function(){
Route::get('/employees',[EmployeeController::class,'index'])->name('employees.index');
Route::get('/employees/create',[EmployeeController::class,'create'])->name('employees.create');
Route::post('/employees',[EmployeeController::class,'store'])->name('employees.store');
Route::get('/employees/{employee}/edit',[EmployeeController::class,'edit'])->name('employees.edit');
Route::put('/employees/{employee}',[EmployeeController::class,'update'])->name('employees.update');
Route::get('/employees/{employee}',[EmployeeController::class,'destroy'])->name('employees.destroy')->withTrashed();
Route::get('/archive',[EmployeeController::class,'archive'])->name('employees.archive');
Route::get('/restore/{id?}',[EmployeeController::class,'restore'])->name('employees.restore')->withTrashed();
Route::get('/export-employee',[EmployeeController::class,'exportEmployee'])->name('export.employee');
Route::get('/file-import',[EmployeeController::class,'importView'])->name('import.view');
Route::post('/import-employee',[EmployeeController::class,'importEmployee'])->name('import.employee');


Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
Route::get('/categories/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/categories',[CategoryController::class,'store'])->name('category.store');
Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/categories/{category}',[CategoryController::class,'update'])->name('category.update');
Route::get('/categories/{category}',[CategoryController::class,'destroy'])->name('category.destroy');

// Route::resource('products', ProductController::class);

Route::get('subcatgories/{id}', [ProductController::class, 'loadSubCategories']);



Route::get('/subcategories',[SubcategoryController::class,'index'])->name('subcategory.index');
Route::get('/subcategories/create',[SubcategoryController::class,'create'])->name('subcategory.create');
Route::post('/subcategories',[SubcategoryController::class,'store'])->name('subcategory.store');
Route::get('/subcategories/{subcategory}/edit',[SubcategoryController::class,'edit'])->name('subcategory.edit');
Route::put('/subcategories/{subcategory}',[SubcategoryController::class,'update'])->name('subcategory.update');
Route::get('/subcategories/{subcategory}',[SubcategoryController::class,'destroy'])->name('subcategory.destroy');

Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('/status-update/{id}',[UserController::class,'status_update']);
});



Route::get('forget-password', [ForgotResetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotResetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotResetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');





// Route::post('/products/update/{id}', [ ProductController::class , 'update'] );


Route::resource('products', ProductController::class);