@extends('layouts.mainn')

@section('content')
@foreach ($viewproducts as $viewproduct)
<div class="col-sm-9 padding-right">
  <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
            <div class="view-product">
                <img src="{{asset('frontend/images/nol/'.$viewproduct->image) }}" alt="" />
                <h3>ZOOM</h3>
            </div>
          </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$viewproduct->name}}</h2>
                <p>Color: {{$viewproduct->color}}</p>
                <span>
                    <span>{{$viewproduct->price}}</span>



                    <form action="{{ route('Addtocart',$viewproduct->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $viewproduct->id }}" name="id">
                        <input type="hidden" value="{{ $viewproduct->name }}" name="name">
                        <input type="hidden" value="{{ $viewproduct->price }}" name="price">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                    </form>



                </span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b>  {{$viewproduct->brand_name}}</p>
                <p><b>size:</b>  {{$viewproduct->size}}</p>
                <p><b>Category:</b>  {{$viewproduct->category_name}}</p>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->

    <div class="container"></div>

<div id="exTab2" class="container">
<ul class="nav nav-tabs">
			<li class="active">
        <a  href="#1" data-toggle="tab">detalis</a>
			</li>
			<li><a href="#2" data-toggle="tab">Without clearfix</a>
			</li>
			<li><a href="#3" data-toggle="tab">Reviews </a>
			</li>
		</ul>

			<div class="tab-content ">
			  <div class="tab-pane active" id="1">
          <h3>{{$viewproduct->long_description}}</h3>
				</div>
				<div class="tab-pane" id="2">
          <h3>Notice the gap between the content and tab after applying a background color</h3>
				</div>
        <div class="tab-pane" id="3">
            <div class="tab-pane fade active in" id="reviews" >
            <div class="col-sm-12">
                <BR>
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tem.</p>
                <p><b>Write Your Review</b></p>

                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="asds" ></textarea>
                    <button type="button" >
                        Submit
                    </button>
                </form>
            </div>
				</div>
            </div>

  </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      @endforeach
</div>

    @endsection
