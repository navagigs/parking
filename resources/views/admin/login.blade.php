<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $identitas->name }}</title>
	<meta name="description" content="{{ strip_tags($identitas->description) }}" />
	<meta name="keywords" content="{{ strip_tags($identitas->keyword) }}" />
	<meta name="author" content="{{ $identitas->author }}">
	<link rel="shortcut icon" href="{{ $identitas->favicon }}">
	<link href="{{ asset('admin/css/bootstrap.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('admin/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/ripple.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/hover.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/social-buttons.css') }}">
	<link href="{{ asset('admin/css/deluxe-admin.css') }}" rel="stylesheet">
</head>
<body id="pages">
	<article style="margin-top: 100px;">
		<div id="pages-form" class="container animated fadeIn">
			<section>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel box-shadow">
							<div class="panel-body center-block">
								<div class="pages-header text-center">
									<div class="pages-box-icon"><i class="zmdi zmdi-pin-drop"></i></div>
									<h4>Login Administrator</h4>
								</div>
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
                                            @if (Session::has('success'))
						                    <div class="alert alert-success alert-dismissible" role="alert">
						                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						                    <i class="fa fa-check-circle"></i> {!! session('success') !!}
						                  </div>
						            @elseif (Session::has('warning'))
						                  <div class="alert alert-warning alert-dismissible" role="alert">
						                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						                    <i class="fa fa-warning"></i> {!! session('warning') !!}
						                  </div>
						            @elseif (Session::has('error'))
						                  <div class="alert alert-danger alert-dismissible" role="alert">
						                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						                    <i class="fa fa-times-circle"></i> {!! session('error') !!}
						                  </div>

						            @endif
								<form role="form" method="POST" action="{{ route('internal.login.submit') }}">
									{{ csrf_field() }}        
									<fieldset>
										<div class="form-group">
											<input class="form-control" placeholder="E-mail" name="email" type="email" required autofocus>
										</div>
										<div class="form-group">
											<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
										</div>
										<div class="row pages-padbot" style="margin-top: 20px;">
										</div>

										<input type="submit" name="login" value="Login" class="btn m-amber btn-block">
										
										
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</article>
	</html>
