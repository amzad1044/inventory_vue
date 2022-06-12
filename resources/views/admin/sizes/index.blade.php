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
      <li class="breadcrumb-item active">All size</li>
    </ul>
  </div>

  <section class="no-padding-top">
    <div class="container-fluid">
      <div class="row">

            <div class="col-lg-6">
              <div class="block margin-bottom-sm">
                <div class="title"><strong><a class="btn btn-primary" href="{{route('sizes.create')}}">Create</a></strong></div>
                <div class="table-responsive"> 
                  <table class="table" id="dataTable">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Size</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    	@if($sizes)
	                    	@foreach($sizes as $key=> $size)
		                      <tr>
		                        <th scope="row">{{++$key}}</th>
		                        <td>{{$size->size ?? ''}}</td>
		                        <td>
		                        	<a href="{{route('sizes.edit',$size->id)}}">Edit</a>
		                        	<a class="confirm_delete" href="javascript:;" data-form-id="cat_delete-{{$size->id}}">Delete</a>

		                        	<form id="cat_delete-{{$size->id}}" action="{{route('sizes.destroy',$size->id)}}" method="post">
		                        			@csrf
		                        			@method('DELETE')
		                        	</form>
		                        </td>
		                      </tr>
		                     @endforeach
                      @endif

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

      </div>
    </div>
  </section>

@endsection