<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Controllers\Controller;

class AddProduct extends Controller
{
    public function AddProduct(){
        

       // $AllProduct = Product::get();
       $category =  Category::get();
       $Brand = Brand::get();
        return view('project.admin.AddProduct',compact('category','Brand'));
}  
public function saveproduct(Request $request){

    Product::create([
        
        'name' => $request->name,
        'short_description' => $request->short_description,
        'publication_status' =>      $request->publication_status,
        'long_description' => $request->long_description,
        'price' =>      $request->price,
        'image' => $request->image,
        'size' => $request->size,
        'color' =>      $request->color,
        'category_id' => $request->category_id,
        'brand_id' =>      $request->brand_id,
                  
    ]);
    return redirect()->back()->with(['success' => ' Categore added']);
    
} 
}
