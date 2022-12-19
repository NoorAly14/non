<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Controllers\Controller;


class allbrand extends Controller
{
    public function Allbrand(){
        $allbrand = Brand::get();
        return view('project.admin.AllBrand',compact('allbrand'));
} 
############## active ###############################################
public function unactive($id){

    DB::table('brands')->where('id',$id)->update(['publication_status'=> 0]);
     
   return  redirect()->back();
}   


public function active($id){

    DB::table('brands')->where('id',$id)->update(['publication_status'=> 1]);
    return  redirect()->back();
     
  
}  
############### edit and update and delete ###########################
public function edit($id){

    $edit = Brand::find($id);
    if (!$id)
            return redirect()->back();
        return view('project.admin.EditBrand',compact('edit'));   
  }


     public function update(Request $request,$id){

    $update=  Brand::find($id);
    if (!$update)
        return redirect()->back();
    $update ->update($request->all());

    return redirect()->route('Allbrand')->with(['success' => 'brand updated']);
 
}
     public function delete($id)
    {

        $Brand = Brand::where('id', $id)->first();

            if (!$Brand)
                return redirect()->back()->with(['error' => 'brand not existing']);
        $Brand->delete();
                return redirect()->route('Allbrand')->with(['success' => 'brand Deleted']);

        }


}
