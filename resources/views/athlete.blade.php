@extends('layouts.master')
@section('athlete') active @endsection
@section ('tittle')
<title>Athlete</title>
@stop
@section ('content')

<div class="all-title-box">
		<div class="container text-center">
			<h1>Daftar Athlete</h1>
		</div>
</div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-12 right-single">
				<div class="widget-search" style="padding-top: 20px;">
					<div class="site-search-area">
						<form action="{{('search-athlete')}}" method="get" id="site-searchform">
							<div>
								<input type="text" id="query" name="query" value="{{ request()->input('query') }}" class="form-control" placeholder="Search Athlete" /><span>
								<input id="searchsubmit" value="Search" type="submit">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="teachers" class="section wb" style="padding: 0px;">
        <div class="container">
            <div class="row">
            	@foreach($athletes as $athlete)
				<div class="col-lg-3 col-md-6 col-12">
					<div class="our-team">
						<div class="team-img">
							<img src="{{asset($athlete->image_one)}}">
							<div class="social">
								<ul>
									<li><a href="{{url('athlete/details/'.$athlete->athlete_slug)}}" class="fa fa-link"></a></li>
								</ul>
							</div>
						</div>
						<div class="team-content">
							<h3 class="title">{{$athlete->athlete_name}}</h3>
							<span class="post">{{$athlete->pengcab->pengcab_name}}</span>
						</div>
					</div>
				</div>
				@endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->	

    

    @endsection