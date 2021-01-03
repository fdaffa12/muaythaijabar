<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
     @yield ('tittle')
    <title>Muay Thai Jawa Barat</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('frontend')}}/images/muaylogo.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('frontend')}}/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="{{asset('frontend')}}/js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body customer-box">
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form action="{{url('search')}}" id='search-form' method="GET" target='_top'>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" id="query" name="query" value="{{ request()->input('query') }}" class="form-control" placeholder="Search" /><span>
										<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										<i class="fa fa-search"></i>
									</button>
									</span>
									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
	
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{url('/')}}">
					<img src="{{asset('frontend')}}/images/muaylogo.png" alt="" style="height: 70px;" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item @yield('dashboard')"><a class="nav-link" href="{{url('/')}}">Home</a></li>
						<!--<li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>-->
						<li class="nav-item dropdown @yield('category')">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">News </a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								@foreach($newscats as $cat)
								<a class="dropdown-item" href="{{url('category/'.$cat->id)}}">{{$cat->newscat_name}}</a>
								@endforeach
							</div>
						</li>
						<li class="nav-item @yield('athlete')"><a class="nav-link" href="{{url('athlete')}}">Athlete</a></li>
						<!--<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>-->
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log" href="#" data-toggle="modal" data-target="#login"><span class="fa fa-search"></span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	@yield('content');

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>About US</h3>
                        </div>
                        <p> Muay Thai Jawa Barat</p>
                        <div class="footer-right">
							<ul class="footer-links-soi">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							</ul><!-- end links -->
						</div>
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Information Link</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('athlete')}}">Athlete</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">halloprakarsagaluh@gmail.com</a></li>
                            <li><a href="#">www.muaythaijabar.xyz</a></li>
                            <li>0896-0435-9899</li>
                            <li>Karanganyar, Subang, Subang Regency, West Java 41211</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

	<div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2020 <a href="#">Muay Thai Jawa Barat</a> Design By : <a href="https://html.design/">html design</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

	    <!-- ALL JS FILES -->
    <script src="{{asset('frontend')}}/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('frontend')}}/js/custom.js"></script>
	<script src="{{asset('frontend')}}/js/timeline.min.js"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
	<!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
</body>
</html>