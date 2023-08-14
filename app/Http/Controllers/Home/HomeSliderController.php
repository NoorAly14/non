<?php

namespace App\Http\Controllers\Home;

use Image;
use App\Models\Blog;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeSliderController extends Controller
{
    public function HomeSlider(){
                $homeslide = HomeSlide::find(1);
                return view('admin.home_slide.home_slide_all',compact('homeslide'));

    }

    public function UpdateSlider(Request $request){

                $sider = $request->id;
                if($request->file('home_slide')) {
                $image = $request->file('home_slide');
                $name_iamge = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
                Image::make($image)->resize(636,852)->save('upload/home_slide/'.$name_iamge);
                $save_url ='upload/home_slide/'.$name_iamge;
                HomeSlide::findOrFail($sider)->update([
                'title'=>$request->title ,
                'short_title'=>$request->short_title,
                'video_url'=>$request->video_url,
                'home_slide'=>$save_url,
                 ]);
                $notifaction = array('message' => 'Home Slide Updated With Image successfully' ,  'alert-type' => 'success'); 
                return redirect()->back()->with($notifaction);
                } else {
                HomeSlide::findOrFail($sider)->update([
                'title'=>$request->title ,
                'short_title'=>$request->short_title,
                'video_url'=>$request->video_url,      
                 ]);
                 $notifaction = array('message' => 'Home Slide Updated Without Image successfully' ,  'alert-type' => 'success'); 
                 return redirect()->back()->with($notifaction);

                  }
             
                }
                public function AllBlog(){

                    $allblog =Blog::lastest()->get();
                    return view('admin.blogs.blogs_all',compact('allblog'));
           }
        }
        
            