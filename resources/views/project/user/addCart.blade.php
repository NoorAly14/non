@extends('layouts.mainnn')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">

                    <td class="view-product">image</td>
                    <td class="description">Name</td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td>Action</td>
                    <td></td>
                </tr>
                @foreach($cartItems as $cartItem)
                <tbody>
                <tr>

                    <div class="view-product">
                        <td> <img src="{{ asset('frontend/images/nol/'.$cartItem->model->image)}}" width="70px" height="70px" alt=""></td>
                    </td>

                    <td class="cart_description">
                        <p>{{$cartItem->name}}</p>
                    </td>
                    <td class="cart_price">
                        <p>{{$cartItem->price}}</p>
                    </td>
                    <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        <a class="cart_quantity_up" href="{{route('update',$cartItem->rowId )}}"> + </a>
                        <input class="cart_quantity_input" type="view" name="quantity" value="{{$cartItem->qty}}" autocomplete="off" size="2">
                        <a class="cart_quantity_down" href="{{route('updatee',$cartItem->rowId )}}"> - </a>
                    </div>
                </td>
                    <td>
                    <form action="{{route('addDelete',$cartItem->rowId )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 text-white bg-blue-800 rounded">DELETE</button>
                       </form>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
       <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>SubTotal <span>{{Cart::subtotal() }}</span></li>
                        <li>Tax<span>{{Cart::tax()}}</span></li>
                        <li>Total <span>{{Cart::total()}}</span></li>
                    </ul>

                    <a href="{{route('checkout')}}"  class="btn btn-default check_out"> Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection
