@extends('admin.layouts.master')
@section('athlete') active show-sub @endsection
@section('manage-athlete') active @endsection
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
    	<nav class="breadcrumb s1-breadcrumb">
    		<a class="breadcrumb-item" href="{{url('admin/home')}}">Admin Dashboar</a>
    		<span class="breadcrumb-item active">Add Athlete</span>
    	</nav>
      <div class="sl-pagebody">
        <div class="row row-sm">

        	<div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Athletes</h6>
    		<form action="{{route('update-athletes')}}" method="POST" enctype="multipart/form-data">
    			@csrf
          <input type="hidden" name="id" value="{{$athlete->id}}">
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

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Athlete Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="athlete_name" value="{{$athlete->athlete_name}}" placeholder="Enter Athlete Name">
                  @error('athlete_name')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Address : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="address" value="{{$athlete->address}}" placeholder="Address">
                  @error('address')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Prestasi : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="prestasi" value="{{$athlete->prestasi}}" placeholder="Prestasi">
                  @error('prestasi')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Gender : <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="gender" data-placeholder="Choose Gender">
                    <option>{{$athlete->gender}}</option>
                    @if($athlete->gender == 'Perempuan')
                    <option>Laki-laki</option>
                    @else
                    <option>Perempuan</option>
                    @endif
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Birthday: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="date" name="birthday" value="{{$athlete->birthday}}" placeholder="Athlete Birthday">
                  @error('birthday')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id" data-placeholder="Choose Category">
                    <option label="Choose Category"></option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $athlete->category_id ? "selected":""}}>{{$category->category_name}}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Pengcab: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="pengcab_id" data-placeholder="Choose country">
                    <option label="Choose Pengcab"></option>
                    @foreach($pengcabs as $pengcab)
                    <option value="{{$pengcab->id}}" {{$pengcab->id == $athlete->pengcab_id ? "selected":""}}>{{$pengcab->pengcab_name}}</option>
                    @endforeach
                  </select>
                  @error('pengcab_id')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Club: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="club_id" data-placeholder="Choose country">
                    <option label="Choose Club"></option>
                    @foreach($clubs as $club)
                    <option value="{{$club->id}}" {{$club->id == $athlete->club_id ? "selected":""}}>{{$club->club_name}}</option>
                    @endforeach
                  </select>
                  @error('club_id')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Kelas: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="kelas_id" data-placeholder="Choose Class">
                    <option label="Choose Class"></option>
                    @foreach($kelass as $kelas)
                    <option value="{{$kelas->id}}" {{$kelas->id == $athlete->kelas_id ? "selected":""}}>{{$kelas->kelas_name}}</option>
                    @endforeach
                  </select>
                  @error('kelas_id')
                    <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
            </div>

                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5">Update Data</button>
                </div><!-- form-layout-footer -->

        </form>
              <div class="row mg-b-25">
                <form action="{{route('update-image')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$athlete->id}}">
                <input type="hidden" name="img_one" value="{{$athlete->image_one}}">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Main thambnail: <span class="tx-danger">*</span></label>
                      <img src="{{asset($athlete->image_one)}}" alt="">
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