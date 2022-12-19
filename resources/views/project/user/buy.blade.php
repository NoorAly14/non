@extends('layouts.mainnn')

@section('content')


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Buy</li>
				</ol>
			</div><!--/breadcrums-->
            <div class="table-responsive cart_info">
                <table class="table table-condensed">

                    <tr class="cart_menu">
                        <td class="view-product">image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td>Action</td>
                        <td></td>
                    </tr>
                    @foreach($order as $orders)
                    <tbody>
                    <tr>
                        <div class="view-product">
                            <td> <img src="{{ asset('frontend/images/nol/'.$orders->model->image)}}" width="70px" height="70px" alt=""></td>
                        </td>

                        <td class="cart_description">
                            <p>{{$orders->name}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{$orders->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <p>{{$orders->qty}}</p>
                        </td>
                    </td>
                    @endforeach
                </table>
                    <section id="do_action">
                        <div class="container">
                           <div class="col-sm-6">
                                    <div class="total_area">
                                        <ul>
                                            <li>SubTotal <span>{{Cart::subtotal() }}</span></li>
                                            <li>Tax<span>{{Cart::tax()}}</span></li>
                                            <li>Total <span>{{Cart::total()}}</span></li>
                                        </ul>

                                        <a href="{{route('thanks')}}"  class="btn btn-default check_out"> Buy</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
    @endsection






