<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable=['id','productName','productPrice','productQty','productTotal','order_id','product_id'];

    protected $hidden=['created_at','updated_at'];

    public function order(){
        return $this -> belongsTo('App\Models\Order', 'order_id');

}
public function product(){
    return $this -> belongsTo('App\Models\Product', 'product_id');

}
}
