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
		<a >Add Brand</a>
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
			<form class="form-horizontal" action="{{route('save.Brand')}}" method="POST" >
				@csrf
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="date01">Brand Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge " name="brand_name" >
				  </div>
				</div>       
				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Brand Description</label>
				  <div class="controls">
					<textarea class="cleditor" name="brand_description" ></textarea>
				  </div>
				</div>
				<div class="control-group hidden-phone">
					<label class="control-label" for="textarea2">Publication Status</label>
					<div class="controls">
					  <input type="checkbox" name="publication_status" rows="3" value="1"></textarea>
					</div>
				  </div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Brand</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->





@endsection