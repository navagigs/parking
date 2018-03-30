<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">s
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ $identitas->name }}</title>
	<meta name="description" content="{{ strip_tags($identitas->description) }}" />
	<meta name="keywords" content="{{ strip_tags($identitas->keyword) }}" />
	<meta name="author" content="{{ $identitas->author }}">
	<link rel="shortcut icon" href="{{ $identitas->favicon }}">
	<link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}">
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
	<link rel="stylesheet" href="{{ asset('website/css/dbstyle.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/color.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}">
	<link rel="stylesheet" href="{{ asset('website/css/dbresponsive.css') }}">

	<script src="{{ asset('website/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>
<body>
			<div id="listar-wrapper" class="listar-wrapper listar-haslayout">
		<!--************************************
				Header Start
				*************************************-->
				<header id="listar-dashboardheader" class="listar-dashboardheader listar-haslayout">
					<div class="cd-auto-hide-header listar-haslayout">
						<div class="container-fluid">
							<div class="row">
								<strong class="listar-logo"><a href="index-2.html"><img src="{{ asset('website/images/logo.png') }}" alt="company logo here"></a></strong>
								<nav class="listar-addnav">
									<ul>
										<li>
											<div class="dropdown listar-dropdown">
												<a class="listar-userlogin listar-btnuserlogin" href="javascript:void(0);" id="listar-dropdownuser" data-toggle="dropdown">
													<span><img src="{{ asset('website/images/author/img-10.jpg') }}" alt="image description"></span>
													<em>John Parker</em>
													<i class="fa fa-angle-down"></i>
												</a>
												<div class="dropdown-menu listar-dropdownmen" aria-labelledby="listar-dropdownuser">
													<ul>
														<li>
															<a href="dashboard.html">
																<i class="icon-speedometer2"></i>
																<span>Dashboard</span>
															</a>
														</li>
														<li>
															<a href="dashboardlisting.html">
																<i class="icon-layers"></i>
																<span>My Listings</span>
															</a>
														</li>
														<li>
															<a href="dashboardmyprofile.html">
																<i class="icon-user2"></i>
																<span>My Profile</span>
															</a>
														</li>
														<li>
															<a href="{{ route('member.logout') }}">
																<i class="icon-lock6"></i>
																<span>Logout</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</li>
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
								</nav>
							</div>
						</div>
					</div>
					<div class="listar-sidebarwrapper">
						<strong class="listar-logo"><a href="index-2.html"><img src="{{ asset('website/images/logo.png') }}" alt="company logo here"></a></strong>
					</nav>
				</div>
			</div>
		</header>
		<!--************************************
				Header End
				*************************************-->
		<!--************************************
				Main Start
				*************************************-->
				<main id="listar-main" class="listar-main listar-haslayout">
				@yield('content')
					</main>
		<!--************************************
					Main End
					*************************************-->
		<!--************************************
					Footer Start
					*************************************-->
					<footer id="listar-footer" class="listar-footer listar-haslayout">
						<div class="listar-footerbar">
							<div class="container-fluid">
								<div class="row">
									<span class="listar-copyright">Copyright &copy; 2018 Listingstar. All rights reserved.</span>
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

				<script src="{{ asset('website/js/vendor/jquery-library.js') }}"></script>
				<script src="{{ asset('website/js/vendor/bootstrap.min.js') }}"></script>
				<script src="{{ asset('website/js/mapclustering/data.json') }}"></script>
				<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
				<script src="{{ asset('website/js/tinymce/tinymce.min4bb5.js?apiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci') }}"></script>
				<script src="{{ asset('website/js/mapclustering/markerclusterer.min.js') }}"></script>
				<script src="{{ asset('website/js/mapclustering/infobox.js') }}"></script>
				<script src="{{ asset('website/js/mapclustering/map.js') }}"></script>
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
				<script src="{{ asset('website/js/gmap3.js') }}"></script>
				<script src="{{ asset('website/js/dev_themefunction.js') }}"></script>

				</html>