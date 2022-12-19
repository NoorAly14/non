<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
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

Route::get('/aa', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

############################# home page ######
route::get('elnon',[App\Http\Controllers\User\Home::class, 'home']) ->name('non');

#############################################
################# show data ################################
route::get('showCategory/{id}',[App\Http\Controllers\User\Home::class, 'showCategory'])->name('showCategory');
route::get('showBrand/{id}',[App\Http\Controllers\User\Home::class, 'showBrand'])->name('showBrand');
route::get('viewproducts/{id}',[App\Http\Controllers\User\Home::class, 'viewproducts'])->name('viewproducts');


############### add to cart ##########
route::get('addCart',[App\Http\Controllers\User\AddCart::class, 'Addcart'])->name('addCart');
route::post('addCart/{id}',[App\Http\Controllers\User\AddCart::class, 'Addtocart'])->name('Addtocart');
route::delete('addDelete/{id}',[App\Http\Controllers\User\AddCart::class, 'addDelete'])->name('addDelete');
route::get('update/{id}',[App\Http\Controllers\User\AddCart::class, 'update'])->name('update');
route::get('updatee/{id}',[App\Http\Controllers\User\AddCart::class, 'updatee'])->name('updatee');
############### check out ##########
route::get('checkout',[App\Http\Controllers\User\checkout::class, 'checkout'])->name('checkout');
route::post('saveorder',[App\Http\Controllers\User\checkout::class, 'saveorder'])->name('saveorder');
route::get('buy',[App\Http\Controllers\User\checkout::class, 'buy'])->name('buy');
route::get('thanks',[App\Http\Controllers\User\checkout::class, 'thanks'])->name('thanks');





route::get('naaaa',[App\Http\Controllers\HomeController::class, 'doct']);
Route::get('/as/{user}', function (User $user) {
    return $user->id;
});

