<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class AllProduct extends Controller
{
    public function AllProduct(){

         $allProduct = DB::table('products')
         ->join('categories','products.category_id','categories.id')
         ->join('brands','products.brand_id','brands.id')
         ->select('products.*','categories.category_name','brands.brand_name')
        ->get();
  //$Productss =  Product::get();
         return view('project.admin.allproduct',compact('allProduct'));
}
############## active ###############################################
public function unactive($id){

    DB::table('products')->where('id',$id)->update(['publication_status'=> 0]);

   return  redirect()->back();
}

public function active($id){

    DB::table('products')->where('id',$id)->update(['publication_status'=> 1]);
    return  redirect()->back();


}
############### edit and update and delete ###########################
public function edit($id){


    $edit = Product::find($id);
    if (!$id)
        return redirect()->back();


            $category =  Category::get();
            $Brand = Brand::get();
        return view('project.admin.EditProduct',compact('edit','category','Brand'));
  }

  public function update(Request $request,$id){

    $update=  Product::find($id);
    if (!$id)
        return redirect()->back();
    $update ->update($request->all());

    return redirect()->route('AllProduct')->with(['success' => 'Product updated']);

}
public function delete($id)
{

    $Product = Product::where('id', $id)->first();

        if (!$Product)
            return redirect()->back()->with(['error' => 'Product not existing']);
    $Product->delete();
            return redirect()->route('AllProduct')->with(['success' => 'Product Deleted']);

    }

}
