@extends('layouts.dash')

@section('content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Tables</a></li>
</ul>
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif


<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>id</th>
                      <th>Band Name </th>
                      <th>Band Description</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>  
              @foreach ($allbrand  as $allbrands)
                  
              <tbody>
                <tr>
                    <td>{{$allbrands->id}}</td>
                    <td class="center">{{$allbrands-> brand_name}}</td>
                    <td class="center">{{$allbrands-> brand_description}}</td>
                    <td class="center">
                        @if($allbrands-> publication_status == 1)
                        <span class="label label-success">Active</span>
                        @else
                        <span class="label label-denger">Unactive</span>
                        @endif
                    </td>
					<td class="center">
                        @if($allbrands-> publication_status == 1)
                        <a class="btn btn-success" href="{{route('unactive.Brand',$allbrands->id)}}">
                            <i class="halflings-icon white thumbs-down"></i>  
                        </a>
                        @else
                        <a class="btn btn-denger" href="{{route('active.Brand',$allbrands->id)}}">
                            <i class="halflings-icon white thumbs-up"></i>  
                        </a>
                        @endif
                        <a class="btn btn-info" href="{{route('edit.Brand',$allbrands->id)}}">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a class="btn btn-danger" href="{{route('delete.Brand',$allbrands->id)}}" id="delete">
                            <i class="halflings-icon white trash"></i> 
                        </a>
                    </td>
                </tr>                
              </tbody>
              @endforeach
          </table>  
                    
        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection
