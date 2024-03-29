@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content">
<div class="container-fluid">


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Footer Setup</h4>
                <form method="POST" action="{{route('update.footer')}}" enctype="multipart/form-data"> 
                    @csrf
                    
                 <input type="hidden" name="id" value="{{$footer->id }}" >
                            <!-- Number  -->
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <input name="number" class="form-control" type="text" value="{{ $footer->number }}" id="example-text-input">
                        </div>
                    </div>
                    <!-- Short Description  -->
                       <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                            <textarea  required="" name="short_description" class="form-control"  rows="5">{{ $footer->short_description }}
                            </textarea>
                        </div>
                        
                    </div>
                                <!-- Adress  -->
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Adress</label>
                        <div class="col-sm-10">
                            <input name="adress" class="form-control" type="text" value="{{ $footer->adress }}" id="example-text-input">
                        </div>
                        
                    </div>
                            <!-- Email  -->
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" class="form-control" type="text" value="{{ $footer->email }}" id="example-text-input">
                        </div>
                        
                    </div>
                            <!-- Facebook  -->
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">
                            <input name="facebook" class="form-control" type="text" value="{{ $footer->facebook }}" id="example-text-input">
                        </div>
                       
                    </div>
                         <!-- Twitter  -->
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                            <input name="twitter" class="form-control" type="text" value="{{ $footer->twitter }}" id="example-text-input">
                        </div>
                       
                    </div>
                             <!-- Copyright -->
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                        <div class="col-sm-10">
                            <input name="copyright" class="form-control" type="text" value="{{ $footer->copyright }}" id="example-text-input">
                        </div>
                        
                    </div>

              
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Footer" />
                     
                </form>
                   
                </div>
            </div>
        </div> <!-- end col -->
    </div>


</div>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection