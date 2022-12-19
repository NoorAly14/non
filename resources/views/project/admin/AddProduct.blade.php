@extends('layouts.dash')
@section('content')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a >Add Product</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Elements</h2>
		</div>
		@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session::get('success') }}
		</div>
	@endif

		<div class="box-content">
			<form class="form-horizontal" action="{{route('save.product')}}" method="POST" >
				@csrf
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="date01">Product Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge " name="name" >
				  </div>
				</div> 
				
			
				<div class="control-group"  >		
					<label class="control-label"  for="selectError1">Product Category</label>	
					<div class="controls" >
					  <select  id="selectError1" name="category_id">
						<option>select Category</option>
						@foreach ($category as $categorys)
						<option value="{{$categorys->id}}">{{$categorys->category_name}} </option>
						@endforeach
					  </select>
					</div>	
				  </div>	  
				  <div class="control-group"  >
					<label class="control-label" for="selectError1">Product Brand </label>
					<div class="controls" >
					  <select id="selectError1" name="brand_id" >
						<option>select Brand</option>
						@foreach ($Brand as  $Brands)
						<option value="{{$Brands->id}}">{{$Brands->brand_name}} </option>
						@endforeach
					  </select>
					</div>
				  </div> 

				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Product Short Description</label>
				  <div class="controls">
					<textarea class="cleditor" name="short_description" ></textarea>
				  </div>
				</div>
				<div class="control-group hidden-phone">
					<label class="control-label" for="textarea2">Product Long Description</label>
					<div class="controls">
					  <textarea class="cleditor" name="long_description" ></textarea>
					</div>
				  </div>

				  <div class="control-group">
					<label class="control-label" for="date01">Product Price</label>
					<div class="controls">
					  <input type="text" class="input-xlarge " name="price" >
					</div>
				  </div> 

				  <div class="control-group">
					<label class="control-label"  for="fileInput">Product Image</label>
					<div class="controls">
					  <input class="input-file uniform_on"  name="image"  id="fileInput" type="file">
					</div>
				  </div> 
				  
				  <div class="control-group">
					<label class="control-label"  for="date01">Product Size</label>
					<div class="controls">
					  <input type="text" class="input-xlarge " name="size" >
					</div>
				  </div> 

				  <div class="control-group">
					<label class="control-label"   for="date01">Product Color</label>
					<div class="controls">
					  <input type="text" class="input-xlarge " name="color" >
					</div>
				  </div> 

				<div class="control-group hidden-phone">
					<label class="control-label" for="textarea2">Publication Status</label>
					<div class="controls">
					  <input type="checkbox" name="publication_status" rows="3" value="1"></textarea>
					</div>
				</div>

				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Product</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->





@endsection