<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashbord extends Controller
{

        public function AdminDashbord(){
            return view('project.admin.dash');
}  
}
