<?php

namespace App\Http\Controllers\Home;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function AllBlog(){
            $allblog = Blog::latest()->get();
            return view('admin.blogs.blogs_all',compact('allblog'));
                
          }
 
    public function AddBlog(){
    
             $categoried = BlogCategory::orderBy('blog_category','ASC')->get();
             return view('admin.blogs.blogs_add',compact('categoried'));
           }
    
    public function StoreBlog(Request $request){

            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;
            Blog::insert([
               'blog_category_id' => $request->blog_category_id,
               'blog_title' => $request->blog_title,
               'blog_tags' => $request->blog_tags,
               'blog_description' => $request->blog_description,
               'blog_image' => $save_url,
               'created_at' => Carbon::now(),
                 ]); 
              $notification = array(
              'message' => 'Blog Inserted Successfully', 'alert-type' => 'success');
               return redirect()->route('all.blog')->with($notification);
                     }   

    public function EditdBlog($id){
             $editblog = Blog::findOrfail($id);
             $categorys = BlogCategory::orderBy('blog_category','ASC')->get();
             return view('admin.blogs.blogs_edit',compact('editblog', 'categorys'));

    }

    public function UpdatedBlog(Request $request){

            $updateblog = $request->id;
            if($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(430,327)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;
            Blog::findOrFail($updateblog)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
                'created_at' => Carbon::now(),
 
            ]);
            $notification = array(
            'message' => 'Blog updated Successfully', 'alert-type' => 'success');
             return redirect()->route('all.blog')->with($notification);
             }  else  { 
                  Blog::findOrFail($updateblog)->update([
                        'blog_category_id' => $request->blog_category_id,
                        'blog_title' => $request->blog_title,
                        'blog_tags' => $request->blog_tags,
                        'blog_description' => $request->blog_description, 
                       ]); 
                         $notification = array(
                         'message' => 'Blog Updated without Image Successfully', 'alert-type' => 'success'  );    
                          return redirect()->route('all.blog')->with($notification);

                          }
    }
    
    public function DeletedBlog($id){

            $blog = Blog::findOrFail($id);   
            $img = $blog->blog_image;
            unlink($img);
            Blog::findOrFail($id)->delete();  
            $notification = array(
            'message' => 'Blog deleted Successfully', 'alert-type' => 'success' );  
            return redirect()->route('all.blog')->with($notification);

    }

    public function BlogDetalils($id){
      
            $blogdetalils = Blog::findOrFail($id);
            $allblog = Blog::latest()->limit(5)->get();
            $BlogCategory = BlogCategory::orderBy('blog_category','ASC')->get();
            return view('frontend.blog_details',compact('blogdetalils','allblog','BlogCategory')) ; 
     }

     public function CategoryBlog($id){

      $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
      $allblogs = Blog::latest()->limit(5)->get();
      $categories = BlogCategory::orderBy('blog_category','ASC')->get();
      $catname = BlogCategory::findOrFail($id);
      return view('frontend.cat_blog_details',compact('blogpost','allblogs','categories','catname'));
      
    }
    
      public function HomeBlog(){
         
       $allcat = BlogCategory::orderBy('blog_category','ASC')->get();
       $allblogs = Blog::latest()->paginate(2);
       return view('frontend.blog',compact('allcat','allblogs'));
      }

  }

        

