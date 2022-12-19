<?php

namespace App\Http\Controllers\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class checkout extends Controller
{
    public function checkout()
    {
        {
            $order = Cart::content();
            return view('project.user.checkout', compact('order'));
        }
    }

    public function saveorder(Request $request)
    {
        Order::create([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'note' => $request->note,

        ]);
        return redirect()->route('buy');
    }

    public function buy()
    {
        $rr=array();
        $rr['order_id']=Session::get('order_id');
        $rr['product_id']=Session::get('product_id');
        $order_id=DB::table('orders')->insertGetId($rr);


                $con= Cart::content();
                $data=array();
                foreach ($con as $cont) {
                    $data['order_id']=$order_id;
                    $data['product_id']=$cont->id;
                    $data['productName']=$cont->name;
                    $data['productPrice']=$cont->price;
                    $data['productQty']=$cont->qty;
                    DB::table('items')->insert($data);

                }


        $order = Cart::content();
        return view('project.user.buy', compact('order'));
    }

    public  function thanks()
    {

       return view('project.user.thanks');

    }
}
