<?php

namespace App\Http\Controllers\Home;

use Image;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function AllPortfolio(){

            $portfolio = Portfolio::latest()->get();
            return view('admin.portfolio.portfolio_all',compact('portfolio'));
    }

    public function AddPortfolio(){

             return view('admin.portfolio.portfolio_add');

    }

    public function StorePortfolio(Request $request){
            $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_iamge' => 'required',    
            ],[
            'portfolio_name.required' => 'Portfolio Name is Required',
            'portfolio_title.required' => 'Portfolio Title is Required',
             ]); 
            if($request->file('portfolio_iamge')) {
            $image = $request->file('portfolio_iamge');
            $name_iamge = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
            Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_iamge);
            $save_url ='upload/portfolio/'.$name_iamge;
    
            Portfolio::insert([
            'portfolio_name'=> $request->portfolio_name ,
            'portfolio_title'=> $request->portfolio_title,
            'portfolio_description'=> $request->portfolio_description,
            'portfolio_iamge'=> $save_url,
            'created_at' => Carbon::now(),
                 ]);
            $notification = array(
            'message' => 'Portfolio Inserted Successfully', 'alert-type' => 'success' );  
    }
            return redirect()->route('all.Portfolio')->with($notification);
}

    public function EditPortfolio($id){

             $editportfolio = Portfolio::findOrFail($id);
             return view('admin.portfolio.portfolio_edit',compact('editportfolio'));
    }

    public function UpdatePortfolio(Request $request){

             $update = $request->id;
             if($request->file('portfolio_iamge')) {
             $image = $request->file('portfolio_iamge');
             $name_iamge = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
             Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_iamge);
             $save_url ='upload/portfolio/'.$name_iamge;
             Portfolio::findOrFail($update)->update([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' =>$request->portfolio_title,
            'portfolio_description' =>$request->portfolio_description,
            'portfolio_iamge' =>$save_url,
                     ]);
             $notification = array(
            'message' => 'Portfolio updated Successfully', 'alert-type' => 'success' );  
             return redirect()->route('all.Portfolio')->with($notification);
                  } else {
             Portfolio::findOrFail($update)->update([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' =>$request->portfolio_title,
            'portfolio_description' =>$request->portfolio_description,
                 ]);
            $notification = array(
            'message' => 'Portfolio iamge not updated Successfully', 'alert-type' => 'success' );  
            return redirect()->route('all.Portfolio')->with($notification);
         }
              }

     public function DeletePortfolio($id){
            $deleteportfolio = Portfolio::findOrFail($id);
            $img = $deleteportfolio->portfolio_iamge;
            unlink($img);
            Portfolio::findOrFail($id)->delete();
            $notifaction = array('message' => 'portfoliio delete successfully' ,  'alert-type' => 'success'); 
             return redirect()->route('all.Portfolio')->with($notifaction);
             
           }

     public function PortfolioDetalis($id){
            $detalisportfolio = Portfolio::findOrFail($id);
            return view('frontend.portfolio_detalis',compact('detalisportfolio'));

           }
     
     public function Portfolio(){

          $port =  Portfolio::latest()->get();
          return view('frontend.portfolio',compact('port'));
     }      
} 

