<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class home extends Controller
{
    public function home(){

        $category = Category::get();
        $brand = Brand::get();
        $Product = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->where('products.publication_status',1)
        ->inRandomOrder()
        ->limit(6)
        ->get();

        return view('project.user.home',compact('Product','category','brand'));
    }
    ######## show category #####
    public function showCategory($id){
        $category = Category::get();
        $brand = Brand::get();
        $showcategory = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->where('categories.id',$id)
        ->where('products.publication_status',1)
        ->get();

        return view('project.user.showCategory',compact('showcategory','category','brand'));
    }
########### show brands ##############
    public function showBrand($id){
        $category = Category::get();
        $brand = Brand::get();
        $showbrand = DB::table('products')
        ->join('brands','products.brand_id','=','brands.id')
        ->select('products.*','brands.brand_name',)
        ->where('brands.id',$id)
        ->where('products.publication_status',1)
        ->get();

        return view('project.user.showBrand',compact('showbrand','category','brand'));
    }
########################## show products ###########
public function viewproducts($id){
    $category = Category::get();
    $brand = Brand::get();
    $viewproducts = DB::table('products')
    ->join('categories','products.category_id','=','categories.id')
    ->join('brands','products.brand_id','=','brands.id')
    ->select('products.*','categories.category_name','brands.brand_name')
    ->where('products.publication_status',1)
    ->where('products.id',$id)
    ->get();

    return view('project.user.viewProducts',compact('viewproducts','category','brand'));
}


}
