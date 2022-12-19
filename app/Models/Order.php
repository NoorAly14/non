<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=['id','fullname','phone','city','address','note','user_id'];

    protected $hidden=['created_at','updated_at'];

    public function user(){
        return $this -> belongsTo('App\Models\User', 'user_id');

}
public function item(){
    return $this -> hasOne('App\Models\Item','order_id');

}
}
