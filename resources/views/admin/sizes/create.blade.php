@extends('admin.master')

@section('body')
	<!-- Page Header-->
	<div class="page-header no-margin-bottom">
	  <div class="container-fluid">
	    <h2 class="h5 no-margin-bottom">Size</h2>
	  </div>
	</div>
	<div class="container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Size</li>
      </ul>
    </div>

    <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
            	<div class="col-lg-6">
	                <div class="block">
	                  <div class="title"><strong class="d-block">New</strong></div>
	                  <div class="block-body">
	                    <form action="{{route('sizes.store')}}" method="post" >
	                    	@csrf
	                      <div class="form-group">
	                        <label class="form-control-label">Name</label>
	                        <input name="size" type="text" placeholder="New size" class="form-control">

	                        <span class="text-danger">{{$errors->has('size') ? $errors->first('size') : ' '}}</span>
	                        
	                      </div>
	                      <div class="form-group">       
	                        <button type="submit" class="btn btn-primary">Submit</button>  
	                      </div>
	                    </form>
	                  </div>
	                </div>
                </div>

            </div>
          </div>
    </section>
@endsection