@extends('admin.layouts.master')
@section('event') active show-sub @endsection
@section('add-event') active @endsection
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
    	<nav class="breadcrumb s1-breadcrumb">
    		<a class="breadcrumb-item" href="{{url('admin/home')}}">Admin Dashboar</a>
    		<span class="breadcrumb-item active">Add Event</span>
    	</nav>
      <div class="sl-pagebody">
        <div class="row row-sm">

        	<div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add New Event</h6>
		<form action="{{route('store-events')}}" method="POST" enctype="multipart/form-data">
			@csrf
          <div class="form-layout">
          			@if(session('success'))
          			<div class="alert alert-success alert-dismissible fade show" role="alert">
          			<strong>{{session('success')}}</strong>
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
          			</button>
          			</div>
          			@endif
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Tittle: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="tittle" value="{{old('tittle')}}" placeholder="Enter Tittle">
                  @error('tittle')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                  <textarea name="long_description" id="summernote2"></textarea>
                  @error('long_description')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-12 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main thambnail: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image_one">
                  @error('image_one')
                  	<strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Add Event</button>
            </div><!-- form-layout-footer -->
        </form>
          </div><!-- form-layout -->
        </div><!-- card -->
        </div><!-- sl-page-title -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection