<?php

namespace App\Http\Controllers\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class AddCart extends Controller
{
    public function Addcart()
    {
        $cartItems = Cart::content();
        return view('project.user.addCart',compact('cartItems'));
    }
    //  {
    //  $n =auth()->user()->id;
    /// $cartItems = DB::table('carts')
    //  ->join('products', 'carts.product_id', '=', 'products.id')
    //  ->where('carts.user_id', $n)
    //  ->select()
    //  ->get();
    //  $cartItemss = DB::table('carts')
    //  ->join('products', 'carts.product_id', '=', 'products.id')
    //  ->where('carts.user_id', $n)
    //  ->sum('products.price');
    //  return view('project.user.addCart', compact('cartItems','cartItemss'));
    //  }


public function Addtocart(Request $request)
{

    Cart::add($request->id, $request-> name, 1, $request->price)
    ->associate('App\Models\Product');
    return redirect()->route('addCart');

}



public function addDelete($rowId )
{
    Cart::remove($rowId );
    return redirect()->route('addCart');
}


public function update($rowId )
{
    $row = Cart::get($rowId);
    Cart::update($rowId, $row->qty + 1);
    return redirect()->route('addCart');
}

public function updatee($rowId )
{
    $row = Cart::get($rowId);
    Cart::update($rowId, $row->qty - 1);
    return redirect()->route('addCart');
}



}
