<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table ="categories";
    protected $fillable=['id','category_name','category_description','publication_status'];
    protected $hidden=['created_at','updated_at'];

    public function product(){
        return $this -> hasMany('App\Models\Product','category_id');

    }
}






