@extends('layouts.master')
@section('athlete') active @endsection
@section ('tittle')
<title>{{$athlete->athlete_name}}</title>
@stop
@section ('content')

<div class="all-title-box">
<!-- Product Details Section Begin -->
    <div id="teachers" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{asset($athlete->image_one)}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><b>{{$athlete->athlete_name}}</b></h3>
                        <a href="#" class="primary-btn">{{$athlete->pengcab->pengcab_name}}</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Alamat :</b> <span>{{$athlete->address}}</span></li>
                            <li><b>Jenis Kelamin :</b> <span>{{$athlete->gender}}</span></li>
                            <li><b>Tanggal Lahir :</b> <span>{{$athlete->birthday}}</span></li>
                            <li><b>Prestasi :</b> <span>{{$athlete->prestasi}}</span></li>
                            <li><b>Klub :</b> <span>{{$athlete->club->club_name}}</span></li>
                            <li><b>Kategori :</b> <span>{{$athlete->category->category_name}}</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Section End -->
</div>

@endsection