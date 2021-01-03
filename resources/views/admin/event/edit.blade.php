@extends('admin.layouts.master')
@section('event') active show-sub @endsection
@section('manage-events') active @endsection
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
          <h6 class="card-body-title">Update Event</h6>
        <form action="{{route('update-events')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$event->id}}">
          <div class="form-layout">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
            

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

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Tittle: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="tittle" value="{{$event->tittle}}" placeholder="Enter Title">
                  @error('tittle')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-12 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                  <textarea name="long_description" id="summernote2">{{$event->long_description}}</textarea>
                  @error('long_description')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div>
            </div>

                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Update Data</button>
                </div><!-- form-layout-footer -->

        </form>
              <div class="row mg-b-25">
                <form action="{{route('update-eventimg')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$event->id}}">
                <input type="hidden" name="img_one" value="{{$event->image_one}}">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Main thambnail: <span class="tx-danger">*</span></label>
                      <img src="{{asset($event->image_one)}}" alt="">
                    </div>
                  </div><!-- col-4 -->
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
                  <button class="btn btn-info mg-r-5">Update Image</button>
                </div><!-- form-layout-footer -->
              </form>
          </div><!-- form-layout -->
        </div><!-- card -->
        </div><!-- sl-page-title -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection