<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class AddCatagory extends Controller
{
    public function AddCatagory(){
        return view('project.admin.AddCatagory');
} 


public function saveCatagory(Request $request){

    Category::create([
        
        'category_name' => $request->category_name,
        'category_description' => $request->category_description,
        'publication_status' =>      $request->publication_status,
                  
    ]);
    return redirect()->back()->with(['success' => ' Categore added']);
    
} 

}
