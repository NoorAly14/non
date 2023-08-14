<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
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




         //Demo all routes
Route::controller(DemoController::class)->group(function () {
    Route::get('/', 'HomeMain')->name('home');
});

        //admin all routes
route::middleware(['auth'])->group(function() {
route::controller(AdminController::class)->group(function () {
    route::get('/admin/logout', 'destroy')->name('admin.logout');
    route::get('/admin/profile','profile')->name('admin.profile');
    route::get('/admin/edit','edit')->name('admin.edit');
    route::post('/admin/store','StoreProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});
});


      // Home Silder  routes
route::controller(HomeSliderController::class)->group(function () {
    route::get('/home/slide', 'HomeSlider')->name('home.slide');
    route::post('/update/slide','UpdateSlider')->name('updatee.slider');
    
    
});
          // About Page  routes
route::controller(AboutController::class)->group(function () {
    route::get('/about/page', 'AboutPage')->name('about.page');
    route::post('/update/about', 'UpdatePage')->name('update.about');
    route::get('/about', 'HomeAbout')->name('home.about');
    route::get('/about/multi/iamge', 'AboutMultiImage')->name('about.multi.iamge');
    route::post('/store/multi/iamge', 'StoreMultiImage')->name('store.multi.image');
    route::get('/all/multi/iamge', 'AllMultiImage')->name('all.multi.iamge');
    route::get('/edit/multi/iamge/{id}', 'EditMultiImage')->name('edit.multi.image');
    route::post('/update/multi/iamge', 'UpdateMultiImage')->name('update.multi.image');
    route::get('/delete/multi/iamge/{id}', 'DeleteMultiImage')->name('delete.multi.image');
  
});
        //portfolio Page  routes
route::controller(PortfolioController::class)->group(function () {
    route::get('/all/Portfolio', 'AllPortfolio')->name('all.Portfolio');
    route::get('/add/Portfolio', 'AddPortfolio')->name('add.Portfolio');
    route::post('/store/Portfolio', 'StorePortfolio')->name('store.Portfolio');
    route::get('/edit/Portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
    route::post('/update/Portfolio', 'UpdatePortfolio')->name('update.portfolio');
    route::get('/delete/Portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
    route::get('/detalis/Portfolio/{id}', 'PortfolioDetalis')->name('portfolio.detalis');
    route::get('/portfolio', 'Portfolio')->name('portfolio');
});

        //blogcategoty  routes
route::controller(BlogCategoryController::class)->group(function () {
     route::get('/all/blog/Category', 'AllBlogCategory')->name('all.blog.category');
     route::get('/add/blog/Category', 'AddBlogCategory')->name('add.blog.category');
     route::post('/store/blog/Category', 'StoreBlogCategory')->name('store.blog.category');
     route::get('/edit/blog/Category/{id}', 'EditBlogCategory')->name('edit.blog.category');
     route::post('/update/blog/Category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
     route::get('/delete/blog/Category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
          
        });

       // blog routes
route::controller(BlogController::class)->group(function () {
    route::get('/all/blog', 'AllBlog')->name('all.blog');
    route::get('/add/blog', 'AddBlog')->name('add.blog');
    route::post('/store/blog', 'StoreBlog')->name('store.blog');
    route::get('/edit/blog/{id}', 'EditdBlog')->name('edit.blog');
    route::post('/update/blog', 'UpdatedBlog')->name('update.blog');
    route::get('/delete/blog/{id}', 'DeletedBlog')->name('delete.blog');
    route::get('/blog/detalils/{id}', 'BlogDetalils')->name('blog.detalils');
    Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');
    Route::get('/home/blog}', 'HomeBlog')->name('home.blog');
            
        });
          // footer routes
route::controller(FooterController::class)->group(function () {
    route::get('/footer/slide', 'FooterSetup')->name('footer.setup');
    route::post('/update/footer', 'UpdateFooter')->name('update.footer');      
          
        });

          // contact routes
route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::post('/store/message', 'StoreMessage')->name('store.messaga');  
    Route::get('/all/message', 'AllMessage')->name('all.message');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
    
         
                });


Route::get('/dashboard', function () {
    return view('admin.index');
    })->middleware(['auth',])->name('dashboard');
    require __DIR__.'/auth.php';
