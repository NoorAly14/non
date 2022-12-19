<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ="products";
    protected $fillable=['id','name','short_description','long_description',
              'price','image','size','color','publication_status','category_id','brand_id',];

    protected $hidden=['created_at','updated_at'];

    public function category(){
        return $this -> belongsTo('App\Models\Category','category_id');



}
public function brand(){
    return $this -> belongsTo('App\Models\Brand','brand_id');



}
public function cart(){
    return $this -> hasOne('App\Models\Cart','product_id');

}
public function item(){
    return $this -> hasOne('App\Models\Item','product_id');

}
}
