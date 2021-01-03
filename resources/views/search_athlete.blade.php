@extends('layouts.master')
@section('athlete') active @endsection
@section ('tittle')
<title>{{ $posts->count() }} result(s) for '{{ request()->input('query') }}'</title>
@stop
@section ('content')

	
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-12 right-single">
				<div class="widget-search" style="padding-top: 20px;">
					<div class="site-search-area">
						<form method="get" id="site-searchform" action="#">
							<div>
								<input class="input-text form-control" name="search-k" id="search-k" placeholder="Search athlete..." type="text">
								<input id="searchsubmit" value="Search" type="submit">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-12 right-single">
				<p>  {{ $posts->count() }} result(s) for '{{ request()->input('query') }}'</p>
			</div>
		</div>
	</div>

	<div id="teachers" class="section wb" style="padding: 0px;">
        <div class="container">
            <div class="row">
            	@foreach($posts as $athlete)
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