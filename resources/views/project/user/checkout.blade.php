@extends('layouts.mainnn')

@section('content')


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

            <div class="shopper-informations">
				<div class="row">
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<h2>checkout</h2> <br></br>
							<div class="form-two">
								<form action="{{route('saveorder')}}" method="POST">
                                    @csrf
									<input type="text"  name="fullname"  placeholder="full name ">
									<input type="text"  name="phone" placeholder="Phone">
									<input type="text"  name="city" placeholder="City">
									<input type="text"  name="address" placeholder="Address ">
									<input type="text"  name="note" placeholder="note ">
                                    <button type="submit"  class="btn btn-lg btn-primary" >continue</button>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>
	</section> <!--/#cart_items-->





    @endsection
