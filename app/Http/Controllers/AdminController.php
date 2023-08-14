<?php

namespace App\Http\Controllers;


use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
  
 
    public function profile( ){
        $adminData =  Auth::user();
        return view('admin.admin_profile',compact('adminData'));
    }
      

    public function edit( ){
        $editData =  Auth::user();
        return view('admin.admin_edit',compact('editData'));
    }


    public function StoreProfile(Request $request ){
        $data =  Auth::user();
        $data->name = $request ->name;
        $data->email = $request ->email;

        if ($request ->file('Profile_image')) {
            $file = $request ->file('Profile_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] =$filename; 
        }
                 $data->save();

        $notifaction = array('message' => 'updated successfully' ,  'alert-type' => 'success'); 

        return redirect()->route('admin.profile')->with($notifaction);
        }

        public function ChangePassword() {
            return view('admin.admin_change_pass');
        }

        public function UpdatePassword(Request $request) {
            $validatee = $request->validate([
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'confirm_password'=>'required|same:newpassword',
                

            ]);

            $password = Auth::user()->password;
            if(Hash::check($request->oldpassword,$password)) {
                $users = User::find(Auth::id());
                $users->password =bcrypt($request->newpassword);
                $users->save();
                session()->flash('message','password updated successfully');
                return redirect()->back();
            }else{
                session()->flash('message','old password in not match');
                return redirect()->back();
            }
        }
       

    }

