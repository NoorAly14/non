<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    
    use HasFactory;
    
    protected $table ="brands";
    protected $fillable=['id','brand_name','brand_description','publication_status'];
    protected $hidden=['created_at','updated_at'];

public function products(){
    return $this -> hasMany('App\Models\Product','brand_id');

}
}