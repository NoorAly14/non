<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['prefix' => 'admin'], function () {
    route::get('login', [App\Http\Controllers\Admin\adminController::class,'admin']);
    route::get('dashbord', [App\Http\Controllers\Admin\AdminDashbord::class,'AdminDashbord']) ->name('dashbord');
    route::get('AllCategory', [App\Http\Controllers\Admin\AllCategory::class,'AllCategory']) ->name('AllCategory');
    route::get('AddCatagory', [App\Http\Controllers\Admin\AddCatagory::class,'AddCatagory']) ->name('AddCatagory');
    route::post('AddCatagory', [App\Http\Controllers\Admin\AddCatagory::class,'saveCatagory']) ->name('save.category');
    route::get('unactiveCategory/{id}', [App\Http\Controllers\Admin\AllCategory::class,'unactive']) ->name('un');
    route::get('activeCategory/{id}', [App\Http\Controllers\Admin\AllCategory::class,'active']) ->name('active.category');
    route::get('editCategory/{id}', [App\Http\Controllers\Admin\AllCategory::class,'edit']) ->name('edit.category');
    route::post('updateCategory/{id}', [App\Http\Controllers\Admin\AllCategory::class,'update']) ->name('update.category');
    route::get('deleteCategory/{id}', [App\Http\Controllers\Admin\AllCategory::class,'delete']) ->name('delete.category');
                            ####### brand #######
    route::get('AllBrand', [App\Http\Controllers\Admin\AllBrand::class,'Allbrand']) ->name('Allbrand');
    route::get('AddBrand', [App\Http\Controllers\Admin\AddBrand::class,'AddBrand']) ->name('AddBrand');
    route::post('AddBrand', [App\Http\Controllers\Admin\AddBrand::class,'saveBrand']) ->name('save.Brand');
    route::get('unactiveBrand/{id}', [App\Http\Controllers\Admin\AllBrand::class,'unactive']) ->name('unactive.Brand');
    route::get('activeBrand/{id}', [App\Http\Controllers\Admin\AllBrand::class,'active']) ->name('active.Brand');
    route::get('editBrand/{id}', [App\Http\Controllers\Admin\AllBrand::class,'edit']) ->name('edit.Brand');
    route::post('updateBrand/{id}', [App\Http\Controllers\Admin\AllBrand::class,'update']) ->name('update.Brand');
    route::get('deleteBrand/{id}', [App\Http\Controllers\Admin\AllBrand::class,'delete']) ->name('delete.Brand');
                            ########## product ###########
    route::get('AllProduct', [App\Http\Controllers\Admin\AllProduct::class,'AllProduct']) ->name('AllProduct');
    route::get('AddProduct', [App\Http\Controllers\Admin\AddProduct::class,'AddProduct']) ->name('AddProduct');
    route::post('AddProduct', [App\Http\Controllers\Admin\AddProduct::class,'saveproduct']) ->name('save.product');
    route::get('unactiveProducts/{id}', [App\Http\Controllers\Admin\AllProduct::class,'unactive']) ->name('unactive.Product');
    route::get('activeProducta/{id}', [App\Http\Controllers\Admin\AllProduct::class,'active']) ->name('active.Product');
    route::get('editProduct/{ids}', [App\Http\Controllers\Admin\AllProduct::class,'edit']) ->name('edit.Product');
    route::post('updateProduct/{id}', [App\Http\Controllers\Admin\AllProduct::class,'update']) ->name('update.Product');
    route::get('deleteProduct/{id}', [App\Http\Controllers\Admin\AllProduct::class      ,'delete']) ->name('delete.Product');





});
