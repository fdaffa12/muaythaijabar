@extends('admin.layouts.master')
@section('setting') active @endsection
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="row row-sm">
          <div class="col-md-8">
          	<div class="card">
          		<div class="card-header">Setting
          		</div>

          		<div class="card-body">
          			<div class="card pd-20 pd-sm-40">
			          <h6 class="card-body-title">Basic Responsive DataTable</h6>
			          	@if(session('Catupdated'))
	          			<div class="alert alert-success alert-dismissible fade show" role="alert">
	          			<strong>{{session('Catupdated')}}</strong>
	          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	          			</button>
	          			</div>
	          			@endif

	          			@if(session('delete'))
	          			<div class="alert alert-danger alert-dismissible fade show" role="alert">
	          			<strong>{{session('delete')}}</strong>
	          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	          			</button>
	          			</div>
	          			@endif
	          			<div class="table-wrapper">
				            <table id="datatable1" class="table display responsive nowrap">
				              <thead>
				                <tr>
				                  <th class="wd-15p">Address</th>
				                  <th class="wd-15p">Phone</th>
				                  <th class="wd-20p">Fax</th>
				                  <th class="wd-20p">Email</th>
				                  <th class="wd-20p">Social</th>
				                  <th class="wd-20p">About</th>
				                </tr>
				              </thead>
				              <tbody>
				              	@php
				              	 $i = 1;
				              	@endphp
				              	@foreach ($data as $d)
				                <tr>
				                  <td>{{$d->address}}</td>
				                  <td>{{$d->phone}}</td>
				                  <td>{{$d->fax}}</td>
				                  <td>{{$d->email}}</td>
				                  <td>{{$d->social}}</td>
				                  <td>{{$d->about}}</td>
				                </tr>
				                @endforeach
				              </tbody>
				            </table>
				          </div><!-- table-wrapper -->
	          		</div>
	          	</div>
          	</div>
          </div>

          <div class="col-md-4">
          	<div class="card">
          		<div class="card-header">Add Kelas
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

          			<form action="{{route ('addsetting')}}" method="POST">
          				@csrf
          				<div class="form-group">
					<label>Address</label>
					<textarea name="address" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input type="phone" name="phone" class="form-control" placeholder="Enter your phone number">	
					</div>
					<div class="form-group">
						<input type="fax" name="fax" class="form-control" placeholder="Enter your fax number">	
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Enter your email">	
					</div>
					<div class="form-group">
						<label>About Us</label>
						<textarea name="about" class="form-control" rows="10"></textarea>
					</div>
					<div id="socialFieldGroup">
						<div class="form-group">
							<label>Social</label>
							<input type="url" name="social" class="form-control" >
							<p class="text-muted">e.g https://www/facebook.com/webtrickshome</p>
						</div>
					</div>
					<div class="text-right form-group">
						<span class="btn btn-warning" id="addSocialField"><i class="fa fa-plus"></i></span>
					</div>
					<div class="form-group">
						<div class="alert alert-danger alert-dismissable noshow" id="socialAlert">
							<a href="#" class="close" data-dismiss="alert">&times;</a>
							<strong>Sorry !</strong> You've reached the social fields limit.
						</div>
					</div>
          				<button type="submit" class="btn btn-primary">Add</button>
          			</form>	
          			<script>
					var socialCounter = 1;
					$('#addSocialField').click(function(){
						socialCounter++;
						if(socialCounter > 5){
							$('#socialAlert').removeClass('noshow');
							return;
						}
							newDiv = $(document.createElement('div')).attr("class","form-group");
							newDiv.after().html('<input type="url" name="social[]" class="form-control" ></div>');
							newDiv.appendTo("#socialFieldGroup");
						})
					</script>
          		</div>
          	</div>
          </div>

        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection