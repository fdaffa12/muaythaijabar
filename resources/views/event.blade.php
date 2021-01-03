@extends('layouts.master')
@section('category') active @endsection
@section ('tittle')
<title>Event</title>
@stop
@section ('content')
   
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="message-box">
            <h4>Event Terbaru</h4>
            </div>

            <div class="row">
                @if(count($events) > 0)
                <div class="col-lg-12 blog-post-single">
                    @foreach($events as $key=> $post)
                    @if($key == 0)
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="blog-item">
                                <div class="image-blog">
                                    <img src="{{asset($post->image_one)}}" alt="" class="img-fluid" style="height: 300px;">
                                </div>
                            </div>
                        </div><!-- end col -->
                        
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="message-box">
                                <h2>{{$post->tittle}}</h2>
                                <p>{!! substr($post->long_description,0,300) !!}</p>
                                <a href="{{url('event/details/'.$post->tittle_slug)}}" class="hover-btn-new orange"><span>Read More</span></a>
                            </div><!-- end messagebox -->
                        </div><!-- end col -->
                        
                    </div><!-- end row -->
                    @endif
                    @endforeach
                </div>
                @endif
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection