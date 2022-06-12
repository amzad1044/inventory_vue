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
        <li class="breadcrumb-item active">Product</li>
      </ul>
    </div>

    <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
            	<div class="col-lg-6">
                    <productadd />

                </div>
            </div>
          </div>
    </section>
@endsection