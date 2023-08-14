<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Image;
use App\Models\MultiImage;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function AboutPage() {
                 $aboutpage = About::find(1);
                 return view('admin.about_page.about_page_all',compact('aboutpage'));
    }

    public function UpdatePage(Request $request){

                $Page = $request->id;
                if($request->file('about_image')) {
                $image = $request->file('about_image');
                $name_iamge = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
                Image::make($image)->resize(523,605)->save('upload/about_page/'.$name_iamge);
                $save_url ='upload/about_page/'.$name_iamge;
                About::findOrFail($Page)->update([
                'title'=>$request->title ,
                'short_title'=>$request->short_title,
                'short_description'=>$request->short_description,
                'long_description'=>$request->long_description,
                'about_image'=>$save_url,
                 ]);
                $notifaction = array('message' => 'About Page Updated With Image successfully' ,  'alert-type' => 'success'); 
                return redirect()->back()->with($notifaction);
 
               } else {
                About::findOrFail($Page)->update([
                'title'=>$request->title ,
                'short_title'=>$request->short_title,
                'short_description'=>$request->short_description,
                'long_description'=>$request->long_description,
             
         ]);
               $notifaction = array('message' => 'About Page Updated Without Image successfully' ,  'alert-type' => 'success'); 
               return redirect()->back()->with($notifaction);
 
           }
        }
    public function HomeAbout(){

               $homeabout = About::find(1);
               return view('frontend.about_page',compact('homeabout'));
        }

     public function AboutMultiImage(){

                return view('admin.about_page.multiamge');
        }

    public function StoreMultiImage(Request $request){

                $image = $request->file('multi_image');
                foreach ($image as $multi_images ) {
                $name_iamge = hexdec(uniqid()). '.' .$multi_images->getClientOriginalExtension();
                Image::make($multi_images)->resize(342,340)->save('upload/multi/'.$name_iamge);
                $save_url ='upload/multi/'.$name_iamge;      
                MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' =>Carbon::now()
                ]);
            }
                $notifaction = array('message' => 'Multi Image Insert successfully' ,  'alert-type' => 'success'); 
                return redirect()->back()->with($notifaction);

              }

    public function AllMultiImage(){

                $allMultiImage = MultiImage::all();
                return view ('admin.about_page.all_multiimage',compact('allMultiImage'));
       }     
       
    public function EditMultiImage($id){
                $multiImage = MultiImage::findOrFail($id);
                return view ('admin.about_page.edit_MultiImage',compact('multiImage'));

       }

    public function UpdateMultiImage(Request $request) {
                $multi_image_id = $request->id;
                if($request->file('multi_image')) {
                $image = $request->file('multi_image');
                $name_iamge = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
                Image::make($image)->resize(342,340)->save('upload/multi/'.$name_iamge);
                $save_url ='upload/multi/'.$name_iamge;
                MultiImage::findOrFail($multi_image_id)->update([
                'multi_image' => $save_url, 
                ]);
                $notifaction = array('message' => 'Multi Image updated successfully' ,  'alert-type' => 'success'); 
                return redirect()->route('all.multi.iamge')->with($notifaction);
         }
       
        
       }
    public function DeleteMultiImage($id){

               $deleteiImage = MultiImage::findOrFail($id);
               $img = $deleteiImage->multi_image;
               unlink($img);
               MultiImage::findOrFail($id)->delete();
               $notifaction = array('message' => 'Multi Image delete successfully' ,  'alert-type' => 'success'); 
               return redirect()->back()->with($notifaction);

       }
           
     
    }
