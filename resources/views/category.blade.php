@extends('layouts.master')
@section('category') active @endsection
@section ('tittle')
<title>{{$category->newscat_name}}</title>
@stop
@section ('content')
   
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="message-box">
            <h4>{{$category->newscat_name}}</h4>
            </div>

            <div class="row">
                @if(count($posts) > 0)
                <div class="col-lg-12 blog-post-single">
                    @foreach($posts as $key=> $post)
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
                                <h2>{{$post->news_tittle}}</h2>
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
                                <p>{!! substr($post->long_description,0,300) !!}</p>
                                <a href="{{url('category/news/'.$post->news_slug)}}" class="hover-btn-new orange"><span>Read More</span></a>
                            </div><!-- end messagebox -->
                        </div><!-- end col -->
                        
                    </div><!-- end row -->
                    @endif
                    @endforeach
                </div>
                    @foreach($posts as $key=>$post)
                    @if($key > 0 && $key < 6)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="blog-item">
                            <div class="image-blog">
                                <img src="{{asset($post->image_one)}}" alt="" class="img-fluid" style="height: 200px;">
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
                    @endif
                    @endforeach
                @endif
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
@endsection