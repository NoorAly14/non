<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Controllers\Controller;

class AddBrand extends Controller
{
    public function AddBrand(){
        return view('project.admin.AddBrand');
} 
public function saveBrand(Request $request){

    Brand::create([
        
        'brand_name' => $request->brand_name,
        'brand_description' => $request->brand_description,
        'publication_status' =>      $request->publication_status,
                  
    ]);
    return redirect()->back()->with(['success' => ' Categore added']);
    
} 
}
