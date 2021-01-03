@extends('admin.layouts.master')
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="row row-sm">

          <div class="col-md-8 m-auto">
          	<div class="card">
          		<div class="card-header">Edit Club
          		</div>

          		<div class="card-body">
          			@if(session('success'))
          			<div class="alert alert-success alert-dismissible fade show" role="alert">
          			<strong>{{session('success')}}</strong>
          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
          			</button>
          			</div>
          			@endif

          			<form action="{{route ('update.club')}}" method="POST">
          				@csrf
                  <input type="hidden" value="{{$club->id}}" name="id">
          				<div class="form-group">
          					<label for="exampleInputEmail">Edit Club</label>
          					<input type="text" name="club_name" class="form-control @error('club_name') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{$club->club_name}}">

          					@error('club_name')
          					<span class="text-danger">{{$message}}</span>
          					@enderror
          				</div>
          				<button type="submit" class="btn btn-primary">Update Club</button>
          			</form>	

          		</div>
          	</div>
          </div>

        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection