<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Image;

class BlogCategoryController extends Controller
{

    public function AllBlogCategory() {

        $categoty = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all',compact('categoty'));
    }

    public function AddBlogCategory() {
 
        return view('admin.blog_category.blog_category_add');
    }

    public function StoreBlogCategory(Request $request){

        $request->validate([
            'blog_category'=>'required'
        ],[
            'blog_category.required' => 'The Blog Category Is Required',
        ]);
        BlogCategory::insert([
            'blog_category' => $request->blog_category,
        ]);
        $notification = array(
            'message' => 'Blog Category Inserted Successfully', 'alert-type' => 'success' );  
            return redirect()->route('all.blog.category')->with($notification);

    }


    public function EditBlogCategory($id){
        $editcat = BlogCategory::findOrFail($id);
        return view ('admin.blog_category.blog_category_edit',compact('editcat'));
    }


    public function UpdateBlogCategory(Request $request,$id){

        
        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,
           ]);
        $notification = array(
            'message' => 'Blog Category Updated Successfully', 'alert-type' => 'success' );  
             return redirect()->route('all.blog.category')->with($notification);


    }

    public function DeleteBlogCategory($id){
         BlogCategory::findOrFail($id)->delete();       
         $notification = array(
            'message' => 'Blog Category deleted Successfully', 'alert-type' => 'success' );  
            return redirect()->route('all.blog.category')->with($notification);

    }

    
}
