@extends('layouts.master')
@section('category') active @endsection
@section ('tittle')
<title>{{$events->tittle}}</title>
@stop
@section ('content')

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
						<div class="image-blog">
							<img src="{{asset($events->image_one)}}" alt="" class="img-fluid" style="height: 500px;">
						</div>
						<div class="post-content">
							<div class="blog-title">
								<h2><a href="#" title="">{{$events->news_tittle}}</a></h2>
							</div>
							<div class="blog-desc">
								<p>{!! $events->long_description !!}</p>
							</div>							
						</div>
					</div>
					
                </div><!-- end col -->
				<div class="col-lg-3 col-12 right-single">
					<div class="widget-categories">
						<h3 class="widget-title">Categories</h3>
						@foreach($newscats as $cat)
						<ul>
							<li><a href="{{url('category/'.$cat->id)}}">{{$cat->newscat_name}}</a></li>
						</ul>
						@endforeach
					</div>

                    <div class="widget-categories">
                        <h3 class="widget-title">Berita Terbaru</h3>
                        <div class="blog-list-widget">
                            @foreach($latest->take(7) as $last)
                            <div class="list-group">
                                <a href="{{url('category/news/'.$last->news_slug)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset($last->image_one)}}" alt="" class="img-fluid float-left" style="width: 100%; height: 150px">
                                        <h5 class="mb-1">{{$last->news_tittle}}</h5>
                                        <i class="fa fa-calendar"></i>
                                        <small>{{$last->created_at}}  / </small>
                                        <i class="fa fa-eye"></i>
                                        <small>{{ $last->views + 1 }}
                                        @if($last->views !=0)
                                        Views 
                                        @else
                                        View
                                        @endif
                                    </small>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

@endsection