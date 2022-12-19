<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class AllCategory extends Controller
{
    public function AllCategory(){
        $allcategory = Category::get();
        return view('project.admin.allcategory',compact('allcategory'));
}
############## active ###############################################
    public function unactive($id){

        DB::table('categories')->where('id',$id)->update(['publication_status'=> 0]);


       return redirect()->route('AllCategory')->with(['success' => ' updated']);
    }


    public function active($id){

        DB::table('categories')->where('id',$id)->update(['publication_status'=> 1]);
        return redirect()->route('AllCategory')->with(['success' => ' updated']);


    }
############### edit and update and delete ###########################
     public function edit($id){

    $edit = Category::find($id);
    if (!$id)
            return redirect()->back();
        return view('project.admin.EditCategory',compact('edit'));
  }


     public function update(Request $request,$id){

    $update=  Category::find($id);
    if (!$id)
        return redirect()->back();
    $update ->update($request->all());

    return redirect()->route('AllCategory')->with(['success' => 'category updated']);

}
     public function delete($id)
    {

        $Category = Category::where('id', $id)->first();

            if (!$Category)
                return redirect()->back()->with(['error' => 'Category not existing']);
        $Category->delete();
                return redirect()->route('AllCategory')->with(['success' => 'Category Deleted']);

        }

}
