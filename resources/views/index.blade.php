@extends('layouts.master')
@section('dashboard') active @endsection
@section ('content')
	
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<div class="carousel-inner" role="listbox">
			@foreach($banners as $key => $banner)
			<div class="carousel-item {{$key == 0 ? 'active' : '' }}">
				<div id="home" class="all-slider-box" style="background-image:url('{{asset($banner->image_one)}}');">
					<div class="dtab">
						<div class="container">
							<div class="row">
                                <div class="carousel-caption">
    								<div class="col-md-12 col-sm-12 text-right">
    									<div class="big-tagline">
    										<h2>{{$banner->news_tittle}}</h2>
    									</div>
                                        <div class="big-tagline">
                                                <a href="{{url('category/news/'.$banner->news_slug)}}" class="hover-btn-new orange" style="margin-top: 20px;"><span>Read More</span></a>
                                        </div>
    								</div>
                                </div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			@endforeach
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<hr style="size: 50px; color: yellow">

	<div class="all-event-box">
		<div class="container text-center">
			<h1>Event Terbaru</h1>
			<div class="blog-button">
                <a class="hover-btn-new orange" href="{{url('event')}}"><span>Read More<span></a>
            </div>
		</div>
	</div>

	<div id="overviews" class="section wb">
        <div class="container">
        	<div class="message-box">
        	<h4>Berita Terbaru</h4>
        	</div>
            <div class="row">
                    @foreach($posts->take(3) as $post)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="blog-item">
                            <div class="image-blog">
                                <img src="{{asset($post->image_one)}}" alt="" class="img-fluid" style="height: 250px;">
                            </div>
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i> <a href="#">{{ $post->created_at }}</a> </span>
                                <span><i class="fa fa-eye"></i> <a href="#">{{ $post->views + 1 }}
                                                @if($post->views !=0)
                                                Views 
                                                @else
                                                View
                                                @endif</a>
                                </span>
                            </div>
                            <div class="blog-title">
                                <h2><a href="{{url('category/news/'.$post->news_slug)}}" title="">{{$post->news_tittle}}</a></h2>
                            </div>
                            <div class="blog-desc">
                                <p>{!! substr($post->long_description,0,300) !!}</p>
                            </div>
                            <div class="blog-button">
                                <a class="hover-btn-new orange" href="{{url('category/news/'.$post->news_slug)}}"><span>Read More<span></a>
                            </div>
                        </div>
                    </div><!-- end col -->
                    @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection