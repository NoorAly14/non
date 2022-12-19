<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class relation extends Controller
{
    public function hosp(){
    
     
     
     
     $user = \App\Models\Product:: with('brand')->find(18);
     return $user;
}
}