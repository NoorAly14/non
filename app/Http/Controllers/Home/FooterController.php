<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
        public function FooterSetup(){

                    $footer = Footer::find(1);
                    return view('admin.footer.footer_all', compact('footer'));
        }


        public function UpdateFooter(Request $request){

                    $foote_id = $request->id;
                     Footer::findOrFail($foote_id)->update([
                    'number' => $request->number,
                    'short_description' => $request->short_description,
                    'adress' => $request->adress,
                    'email' => $request->email,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'copyright' => $request->copyright,

                ]);
                $notification = array(
                    'message' => 'footer updated Successfully', 'alert-type' => 'success');
                     return redirect()->route('footer.setup')->with($notification);
        }

}
