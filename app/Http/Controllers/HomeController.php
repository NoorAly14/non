<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\product;
use App\Models\cart;
use App\Models\user;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::get();
        $brand = Brand::get();
        $Product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->where('products.publication_status', 1)
            ->inRandomOrder()
            ->limit(6)
            ->get();
        return view('project.user.home', compact('Product', 'category', 'brand'));
    }
    public function admin()
    {
        return view('admin');
    }

    public function doct()
    {
        $phone =  \App\Models\cart:: find('2');
   return  $phone -> user ;
    // return  $user -> name;

    }
}
