@extends('admin.master')

@section('body')

	<!-- Page Header-->
	<div class="page-header no-margin-bottom">
	  <div class="container-fluid">
	    <h2 class="h5 no-margin-bottom">Product</h2>
	  </div>
	</div>
	<div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">All product</li>
    </ul>
  </div>

  <section class="no-padding-top">
    <div class="container-fluid">
      <div class="row">

            <div class="col-lg-12">
              <div class="block margin-bottom-sm">
                <div class="title"><strong><a class="btn btn-primary" href="{{route('products.create')}}">Create</a></strong></div>

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
                    	@if($products)
	                    	@foreach($products as $key=> $product)
		                      <tr>
		                        <th scope="row">{{++$key}}</th>
		                        <td>{{$product->name ?? ''}}</td>
		                        <td>
		                        	<a href="{{route('products.edit',$product->id)}}">Edit</a>
		                        	<a class="confirm_delete" href="javascript:;" data-form-id="cat_delete-{{$product->id}}">Delete</a>

		                        	<form id="cat_delete-{{$product->id}}" action="{{route('products.destroy',$product->id)}}" method="post">
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