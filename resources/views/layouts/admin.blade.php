<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrator | {{ $identitas->name }}</title>
	<meta name="description" content="{{ strip_tags($identitas->description) }}" />
	<meta name="keywords" content="{{ strip_tags($identitas->keyword) }}" />
	<meta name="author" content="{{ $identitas->author }}">
	<link rel="shortcut icon" href="{{ $identitas->favicon }}">
	<link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('admin/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{ asset('admin/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/ripple.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/hover.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/jquery-jvectormap.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/deluxe-admin.css') }}" >
	<link rel="stylesheet" href="{{ asset('admin/css/fileinput.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/sweetalert.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/datatables.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/dataTables.responsive.css') }}" />
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMnj6Gqf0MIGbsrjEoyqOoRMVs4af-FfM&sensor=false&libraries=places"></script>
	<style type="text/css">
		.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('{{ asset('loadpage.gif') }}') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
	</style>
</head>
<body>
	<div id="wrapper">
		<header class="navbar navbar-white navbar-fixed-top">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="zmdi zmdi-view-headline zmdi-hc-2x"></span>
				</button>
				<a class="navbar-brand" href="{{ route('internal.dashboard') }}" title="{{ $identitas->name }}"><i class="zmdi zmdi-pin-drop"></i> {{ $identitas->name }}</a>
			</div>
			<nav>
				<ul class="nav navbar-top-links navbar-left">
					<li>
						<a href="javascript:void(0);" class="toggle-sidebar hvr-underline-from-center" title="Show/Hide Sidebar">
							<i class="zmdi zmdi-menu"></i>
						</a>
					</li>
					<li class="dropdown">
						<a class="fullscreen hvr-underline-from-center" title="Full Screen" data-toggle="dropdown" href="javascript:void(0);" >
							<i class="zmdi zmdi-fullscreen"></i>
						</a>					
					</li>
				</ul>


				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle hvr-underline-from-center" data-toggle="dropdown" href="javascript:void(0);" >
							<i class="zmdi zmdi-settings"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="{{ route('internal.setting.profile') }}"><i class="zmdi zmdi-account"></i> View Profile</a></li>
							<li><a href="{{ route('internal.setting') }}"><i class="zmdi zmdi-settings"></i> Settings</a></li>
							<li class="divider-horizontal"></li>
							<li><a href="{{ route('internal.logout') }}"><i class="zmdi zmdi-sign-in"></i> Logout</a></li>
						</ul>					
					</li>
				</div>
			</ul>
		</nav>
	</header>

	<aside>
		<div class="navbar-default sidebar">
			<div class="sidebar-nav navbar-collapse">
				<div class="nav side-nav-white" id="side-menu">
					<ul class="list-unstyled">
						<li class="profile">
							<a href="javascript:void(0);">
								<div class="avatar">
									<img src="{{ asset('admin/img/avatar.jpg') }}" alt="Avatar">
								</div>
								<div class="info">{{ Auth::user()->name }}</div>
							</a>
						</li>
					</ul>
					
					@include('layouts.menu_admin')
				</div>
			</div>
		</div>

	</aside>
	@yield('content')
</div>

@include('layouts.flash_admin')
@include('layouts.flash_delete')
<div class="loader"></div>
<footer id="footer">Copyright © 2018 <a href="#" target="_blank" title="{{ $identitas->name }}">{{ $identitas->name }}</a></footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{ asset('admin/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/js/scripts/init.js') }}"></script>
<script src="{{ asset('admin/js/waypoints.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('admin/js/ripple.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-notify.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/js/dataTables.responsive.js') }}"></script>
<script src="{{ asset('admin/js/fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset('admin/js/fileinput/fileinput.script.js') }}"></script>
<script type="text/javascript">
	$('#dataTables-example').DataTable({
		responsive: true
	});
</script>
<script>
	$('#confirmationModal').modal('show');
	$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
</script>
<script type="text/javascript">
// function check(){
 $(document ).ready(function(){
            $('.loader').fadeIn('slow', function(){
               $('.loader').delay().fadeOut(1); 
            });
        });
 // }
</script>
@ckeditor('bodyField')
@ckeditor('bodyField2')
</html>
