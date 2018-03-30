<!doctype html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ $identitas->name }}</title>
	<meta name="description" content="{{ strip_tags($identitas->description) }}" />
	<meta name="keywords" content="{{ strip_tags($identitas->keyword) }}" />
	<meta name="author" content="{{ $identitas->author }}">
	<link rel="shortcut icon" href="{{ $identitas->favicon }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('website/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/bootstrap-slider.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/chosen.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/prettyPhoto.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/scrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/morris.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/YouTubePopUp.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/auto-complete.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/jquery.navhideshow.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/transitions.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/color.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/sweetalert.min.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/style-costume.css') }}">
</head>
<body class="@yield('body')">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Preloader Start
			*************************************-->
			<!-- <div class="preloader-outer">
				<div class="pin"></div>
				<div class="pulse"></div>
			</div> -->
	<!--************************************
			Preloader End
			*************************************-->
	<!--************************************
			Wrapper Start
			*************************************-->
			<div id="listar-wrapper" class="listar-wrapper listar-haslayout">
		<!--************************************
				Header Start
				*************************************-->
				<header id="listar-header" class="@yield('header')">
					<div class="@yield('container')">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<strong class="listar-logo"><a href="index-2.html"><img src="{{ asset('website/images/logo.png') }}" alt="company logo here"></a></strong>
								<nav class="listar-addnav">
									<ul>
										@if(Auth::guard('member')->check())
										<li>
											<a id="listar-btnsignin" class="listar-btn listar-btngreen" href="{{ route('member.logout') }}">
												<i class="icon-smiling-face"></i>
												<span>Logout</span>
											</a>
										</li>
										@else
										<li>
											<a id="listar-btnsignin" class="listar-btn listar-btngreen" href="#listar-loginsingup">
												<i class="icon-smiling-face"></i>
												<span>Daftar Member</span>
											</a>
										</li>
										@endif

									</ul>
								</nav>
								<nav id="listar-nav" class="listar-nav">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#listar-navigation" aria-expanded="false">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>
									<div id="listar-navigation" class="collapse navbar-collapse listar-navigation">
										<ul>
											<li class="{{ (\Request::route()->getName() == 'website.home') ? 'current-menu-item' : '' }}"><a href="{{ route('website.home') }}">Home</a></li>
											<li class="menu-item-has-children {{ (\Request::route()->getName() == 'website.location') ? 'current-menu-item' : '' }}"><a href="javascript:void(0);">Lokasi Parkir</a>
												<ul class="sub-menu">
													<li><a href="{{ route('website.location') }}">Semua Lokasi</a></li>
													@if (count($category) > 0)
													@foreach($category as $row_category)
													<li><a href="{{ url('/location/category') }}/{{  $row_category->id }}/{{ str_slug($row_category->name) }}">{{ $row_category->name }}</a></li>	
													@endforeach
													@else
													@endif		
												</ul>
											</li>
											<li><a href="javascript:void(0);">Tentang Kami</a></li>
											<li><a href="javascript:void(0);">Berita</a></li>
											<li><a href="dashboard.html">Hubungi Kami</a></li>
											<li class="menu-item-has-children">
												@if(Auth::guard('member')->check())
												<a href="javascript:void(0);">Dashboard</a>
												<ul class="sub-menu">
													<li><a href="{{ route('member.dashboard') }}">Dashboard</a></li>
													<li><a href="{{ route('member.account') }}">Akun</a></li>
													<li><a href="">Log Parkir</a></li>
												</ul>
											</li>
											@endif
										</ul>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</header>
		<!--************************************
				Header End
				*************************************-->
				@yield('content')
		<!--************************************
				Footer Start
				*************************************-->
				<footer id="listar-footer" class="listar-footer listar-haslayout">
					<div class="listar-footeraboutarea">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="listar-upperbox">
										<strong class="listar-logo"><a href="javascript:void(0);"><img src="{{ asset('website/images/logo.png') }}" alt="image description"></a></strong>
										<ul class="listar-socialicons">
											<li class="listar-facebook"><a href="{{ $identitas->twitter }}"><i class="fa fa-facebook"></i></a></li>
											<li class="listar-twitter"><a href="{{ $identitas->facebook }}"><i class="fa fa-twitter"></i></a></li>
											<li class="listar-googleplus"><a href="{{ $identitas->googleplus }}"><i class="fa fa-google-plus"></i></a></li>
										</ul>
										<nav class="listar-navfooter">
											<ul>
												<li><a href="javascript:void(0);">Home</a></li>
												<li><a href="javascript:void(0);">how it work</a></li>
												<li><a href="javascript:void(0);">Shop</a></li>
												<li><a href="javascript:void(0);">Packages</a></li>
												<li><a href="javascript:void(0);">News</a></li>
												<li><a href="javascript:void(0);">Contact Us</a></li>
											</ul>
										</nav>
									</div>
									<div class="listar-lowerbox">
										<div class="listar-description">
											<p>{{ $identitas->description }}</p>
										</div>
										<address><strong>Alamat:</strong> {{ $identitas->address }}<span><strong>Tel:</strong> {{ $identitas->phone }}</span></address>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="listar-footerbar">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<span class="listar-copyright">Copyright &copy; 2018 {{ $identitas->name }}. All rights reserved.</span>
								</div>
							</div>
						</div>
					</div>
				</footer>
		<!--************************************
				Footer End
				*************************************-->
			</div>
	<!--************************************
			Wrapper End
			*************************************-->

	<!--************************************
			Login Singup Start
			*************************************-->
			<div id="listar-loginsingup" class="listar-loginsingup">
				<button type="button" class="listar-btnclose">x</button>
				<figure class="listar-loginsingupimg" data-vide-bg="poster: {{ $content->image }}" data-vide-options="position: 50% 50%"></figure>
				<div class="listar-contentarea">
					<div class="listar-themescrollbar">
						<div class="listar-logincontent">
							<div class="listar-themetabs">
								<ul class="listar-tabnavloginregistered" role="tablist">
									<li role="presentation" class="active"><a href="#listar-loging" data-toggle="tab">Log in</a></li>
									<li role="presentation"><a href="#listar-register" data-toggle="tab">Register</a></li>
								</ul>
								<div class="tab-content listar-tabcontentloginregistered">
									<div role="tabpanel" class="tab-pane active fade in" id="listar-loging">
										<form  method="POST" action="{{ route('member.login.submit') }}" class="listar-formtheme listar-formlogin">	
											{{csrf_field()}}
											@if ($errors->has('email'))
											<div class="alert alert-danger alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<i class="fa fa-times-circle"></i> {{ $errors->first('email') }}
											</div>
											@elseif ($errors->has('password'))
											<div class="alert alert-danger alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<i class="fa fa-times-circle"></i> {{ $errors->first('password') }}
											</div>
											@endif
											<fieldset>
												<div class="form-group listar-inputwithicon">
													<i class="icon-profile-male"></i>
													<input type="text" name="email" class="form-control" placeholder="Email">
												</div>
												<div class="form-group listar-inputwithicon">
													<i class="icon-icons208"></i>
													<input type="password" name="password" class="form-control" placeholder="Password">
												</div>
												<div class="form-group">
													<div class="listar-checkbox">
														<input type="checkbox" name="remember" id="rememberpass2">
														<label for="rememberpass2">Remember me</label>
													</div>
													<span><a href="#">Lost your Password?</a></span>
												</div>
												<button class="listar-btn listar-btngreen">Register</button>
											</fieldset>
										</form>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="listar-register">
										<form class="listar-formtheme listar-formlogin">
											<fieldset>
												<div class="form-group listar-inputwithicon">
													<i class="icon-profile-male"></i>
													<input type="text" name="username" class="form-control" placeholder="Username">
												</div>
												<div class="form-group listar-inputwithicon">
													<i class="icon-icons208"></i>
													<input type="email" name="emailaddress" class="form-control" placeholder="Email Address">
												</div>
												<div class="form-group listar-inputwithicon">
													<i class="icon-lock-stripes"></i>
													<input type="password" name="password" class="form-control" placeholder="Password">
												</div>
												<div class="form-group listar-inputwithicon">
													<i class="icon-lock-stripes"></i>
													<input type="password" name="confirmpassword" class="form-control" placeholder="Password">
												</div>
												<button class="listar-btn listar-btngreen">login</button>
											</fieldset>
										</form>
									</div>
								</div>
							</div>
							<div class="listar-shareor"><span>or</span></div>
							<div class="listar-signupwith">
								<h2>Sign in With...</h2>
								<ul class="listar-signinloginwithsocialaccount">
									<li class="listar-facebook"><a href="javascript:void(0);"><i class="icon-facebook-1"></i><span>Facebook</span></a></li>
									<li class="listar-twitter"><a href="javascript:void(0);"><i class="icon-twitter-1"></i><span>Twitter</span></a></li>
									<li class="listar-googleplus"><a href="javascript:void(0);"><i class="icon-google4"></i><span>Google +</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('layouts.flash_website')

			<script src="{{ asset('website/js/vendor/jquery-library.js') }}"></script>
			<script src="{{ asset('website/js/vendor/bootstrap.min.js') }}"></script>
			<script src="{{ asset('website/js/mapclustering/data.json') }}"></script>
			<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
			<script src="{{ asset('website/js/tinymce/tinymce.min4bb5.js?apiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci') }}"></script>
			<!-- <script src="{{ asset('website/js/mapclustering/markerclusterer.min.js') }}"></script> -->
			<!-- <script src="{{ asset('website/js/mapclustering/infobox.js') }}"></script> -->
			<!-- <script src="{{ asset('website/js/mapclustering/map.js') }}"></script> -->
			<script src="{{ asset('website/js/ResizeSensor.js.js') }}"></script>
			<script src="{{ asset('website/js/jquery.sticky-sidebar.js') }}"></script>
			<script src="{{ asset('website/js/YouTubePopUp.jquery.js') }}"></script>
			<script src="{{ asset('website/js/jquery.navhideshow.js') }}"></script>
			<script src="{{ asset('website/js/backgroundstretch.js') }}"></script>
			<script src="{{ asset('website/js/jquery.sticky-kit.js') }}"></script>
			<script src="{{ asset('website/js/bootstrap-slider.js') }}"></script>
			<script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
			<script src="{{ asset('website/js/jquery.vide.min.js') }}"></script>
			<script src="{{ asset('website/JS/auto-complete.html') }}"></script>
			<script src="{{ asset('website/js/chosen.jquery.js') }}"></script>
			<script src="{{ asset('website/js/scrollbar.min.js') }}"></script>
			<script src="{{ asset('website/js/isotope.pkgd.js') }}"></script>
			<script src="{{ asset('website/js/jquery.steps.js') }}"></script>
			<script src="{{ asset('website/js/prettyPhoto.js') }}"></script>
			<script src="{{ asset('website/js/raphael-min.js') }}"></script>
			<script src="{{ asset('website/js/parallax.js') }}"></script>
			<script src="{{ asset('website/js/sortable.js') }}"></script>
			<script src="{{ asset('website/js/countTo.js') }}"></script>
			<script src="{{ asset('website/js/appear.js') }}"></script>
			<!-- <script src="{{ asset('website/js/gmap3.js') }}"></script> -->
			<script src="{{ asset('website/js/dev_themefunction.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-notify.js') }}"></script>
			
			<script>
				$('#confirmationModal').modal('show');
			</script>
		</body>
			</html>