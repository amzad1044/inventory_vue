@extends('admin.master')

@section('body')

	<!-- Page Header-->
	<div class="page-header no-margin-bottom">
	  <div class="container-fluid">
	    <h2 class="h5 no-margin-bottom">Categories</h2>
	  </div>
	</div>
	<div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">All category</li>
    </ul>
  </div>

  <section class="no-padding-top">
    <div class="container-fluid">
      <div class="row">

            <div class="col-lg-6">
              <div class="block margin-bottom-sm">
                <div class="title"><strong>Category Table</strong></div>
                <div class="table-responsive"> 
                  <table class="table" id="dataTable">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    	@if($cats)
	                    	@foreach($cats as $key=> $cat)
		                      <tr>
		                        <th scope="row">{{++$key}}</th>
		                        <td>{{$cat->name ?? ''}}</td>
		                        <td>
		                        	<a href="{{route('cats.edit',$cat->id)}}">Edit</a>
		                        	<a class="confirm_delete" href="javascript:;" data-form-id="cat_delete-{{$cat->id}}">Delete</a>

		                        	<form id="cat_delete-{{$cat->id}}" action="{{route('cats.destroy',$cat->id)}}" method="post">
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