@extends('layouts.website')
@section('body',' ')
@section('header','listar-header cd-auto-hide-header listar-haslayout')
@section('container','container-fluid')
@section('logo','logo.png')
@section('content')
@if ($action == 'view' || empty($action))
<div class="listar-innerbanner" style="background: url({{ $content->image }}) no-repeat 50% 50%;">
	<div class="listar-parallaxcolor listar-innerbannerparallaxcolor">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="listar-innerbannercontent">
						<div class="listar-pagetitle">
							<h1>Booking</h1>
						</div>
						<ol class="listar-breadcrumb">
							<li><a href="{{ route('website.home') }}">Home</a></li>
							<li class="listar-active"><span>Booking</span></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate('Nava Kasep'))!!} "> -->
<main id="listar-main" class="listar-main listar-haslayout">
	<div class="listar-themepost listar-placespost listar-detail listar-detailvone">
		<!-- <figure class="listar-featuredimg"><img src="images/post/img-23.jpg" alt="image description"></figure> -->
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="listar-postcontent">
						<h1>Booking </h1>
						<div class="listar-reviewcategory">

						</div>
						<div class="listar-themepostfoot">
							<ul>
								<li>
									<i class="icon-telephone114"></i>
									<span>{{ Auth::user()->phone }}</span>
								</li>
								<li>
									<i class="icon-icons74"></i>
									<span>{{ Auth::user()->address }}</span>
								</li>
								<li>
									<i class="icon-car"></i>
									<span>Kendaraan <span>{{ Auth::user()->size }}</span> </span>
								</li>
								<li>
									<i class="icon-mail"></i>
									<span>{{ Auth::user()->email }}</span>
								</li>
							</ul>
						</div>
					</div>

					<div class="listar-themetabs">
						e
					</div>
				</div>
			</div>
		</div>
	</div>

</main>

@elseif ($action == 'bookinghistory')

<div class="listar-innerbanner" style="background: url({{ $content->image }}) no-repeat 50% 50%;">
	<div class="listar-parallaxcolor listar-innerbannerparallaxcolor">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="listar-innerbannercontent">
						<div class="listar-pagetitle">
							<h1>Booking</h1>
						</div>
						<ol class="listar-breadcrumb">
							<li><a href="{{ route('website.home') }}">Home</a></li>
							<li class="listar-active"><span>Booking</span></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<main id="listar-main" class="listar-main listar-haslayout">
	<div class="listar-themepost listar-placespost listar-detail listar-detailvone">
		<!-- <figure class="listar-featuredimg"><img src="images/post/img-23.jpg" alt="image description"></figure> -->
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="listar-postcontent">
						<h1>Booking</h1>
						<div class="listar-reviewcategory">

						</div>
						<div class="listar-themepostfoot">
							<ul>
								<li>
									<i class="icon-telephone114"></i>
									<span>{{ Auth::user()->phone }}</span>
								</li>
								<li>
									<i class="icon-icons74"></i>
									<span>{{ Auth::user()->address }}</span>
								</li>
								<li>
									<i class="icon-car"></i>
									<span>Kendaraan <span>{{ Auth::user()->size }}</span> </span>
								</li>
								<li>
									<i class="icon-mail"></i>
									<span>{{ Auth::user()->email }}</span>
								</li>
							</ul>
						</div>
					</div>
					<div class="checkout-wrap">
						<ul class="checkout-bar">
							<li class="visited first"><a href="{{ route('website.location') }}">Lokasi Parkir</a></li>
							<li class="active"><a href="{{ route('member.booking.history') }}">Masuk Parkir</a></li>
							<li>Memilih Tempat Parkir</li>
							<li>Sedang Parkir</li>
							<li class="">Selesai Parkir</li>
						</ul>
					</div>
					<div class="listar-themetabs">
						<div class="row">
						<!-- 	<div class="col-md-6 col-md-offset-3">
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
							</div> -->
						</div>
						<div class="container">

							<div class="row">
								@if(!empty($booking->booking_code))
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-4">
									<div id="listar-content" class="listar-content">
										<div class="listar-pricingplans">
											<div class="listar-pricingplan">
												<div class="listar-pricingplanhead">
													<h2>{{ !empty($booking->partner->name) ? $booking->partner->name : '-' }}</h2>
												</div>
												<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(800)->generate($booking->booking_code)) !!}">
												<h4>{{ $booking->booking_code }}</h4>
												<div class="listar-pricingplanfoot">
													<a class="listar-btn listar-btngreen" href="{{ url('/member/booking/in/') }}/{{ $booking->partner_id }}-{{ $booking->booking_code }}">Masuk Tempat Parkir</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								@else
								@endif
							</div>
						</div>

					</main>

					@elseif ($action == 'bookingin')

					<div class="listar-innerbanner" style="background: url({{ $content->image }}) no-repeat 50% 50%;">
						<div class="listar-parallaxcolor listar-innerbannerparallaxcolor">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="listar-innerbannercontent">
											<div class="listar-pagetitle">
												<h1>Booking</h1>
											</div>
											<ol class="listar-breadcrumb">
												<li><a href="{{ route('website.home') }}">Home</a></li>
												<li class="listar-active"><span>Booking</span></li>
											</ol>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<main id="listar-main" class="listar-main listar-haslayout">
						<div class="listar-themepost listar-placespost listar-detail listar-detailvone">
							<!-- <figure class="listar-featuredimg"><img src="images/post/img-23.jpg" alt="image description"></figure> -->
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="listar-postcontent">
											<h1>Cari Blok Tempat Parkir</h1>
											<div class="listar-reviewcategory">

											</div>
											<div class="listar-themepostfoot">
												<ul>
													<li>
														<i class="icon-telephone114"></i>
														<span>{{ Auth::user()->phone }}</span>
													</li>
													<li>
														<i class="icon-icons74"></i>
														<span>{{ Auth::user()->address }}</span>
													</li>
													<li>
														<i class="icon-car"></i>
														<span>Kendaraan <span>{{ Auth::user()->size }}</span> </span>
													</li>
													<li>
														<i class="icon-mail"></i>
														<span>{{ Auth::user()->email }}</span>
													</li>
												</ul>
											</div>
										</div>
										<div class="checkout-wrap">
											<ul class="checkout-bar">
												<li class="visited first"><a href="{{ route('website.location') }}">Lokasi Parkir</a></li>
												<li class="visited first"><a href="{{ route('member.booking.history') }}">Masuk Parkir</a></li>
												<li class="active">Memilih Tempat Parkir</li>
												<li>Sedang Parkir</li>
												<li class="">Selesai Parkir</li>
											</ul>
										</div>
										<div class="listar-themetabs">
											<div class="container">
												<div class="row">
												<!-- 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-1">
														<form action="{{ url('/member/booking/in/') }}/{{ $get_data['partner_id'] }}-{{ $get_data['booking_code'] }}/dijkstra" method="GET" id="form-dijsktra">
															<div class="col-sm-4">	
																{!! Form::select('start', $block, (! empty($name) ? $name : null), ['name' => 'start', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Rute Awal']) !!}
															</div>
															<div class="col-sm-4">					
																{!! Form::select('end', $block, (! empty($name) ? $name : null), ['name' => 'end', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Rute Akhir']) !!}
															</div>
															<div class="col-sm-4">
																{!! Form::button('Cari Route Terbaik', ['class' => 'listar-btn listar-btngreen', 'type' => 'submit']) !!}</div>
															</div>
														</div>
													</form>
												</div>

												<div class="listar-themetabs">
													<table>
														<tr>
															<th>Rute Awal</th>
															<th>Rute Tujuan</th>
															<th>Rute Yang dilalui</th>
															<th>Total Rute yang ditempuh</th>
														</tr>
														@if (count($list_route) > 0)
														@foreach($list_route as $row_route)
														<tr>
															<td>{{ $row_route->route_start }}</td>
															<td><a href="{{ url('/member/booking/in/') }}/{{ $get_data['partner_id'] }}-{{ $get_data['booking_code'] }}/block/{{ $row_route->end }}"> {{ $row_route->route_end }}</a></td>
															<td><?php
															$data = array($row_route->path); 
															echo implode(" ", $data); ?></td>
															<td>{{ $row_route->range }}</td>
														</tr>
														@endforeach
														@else
														<tr>
															<td colspan="4"><p><b>tidak ada route.</b></p></td>
														</tr>
														@endif

													</table> -->

													<div class="col-xs-5 col-md-offset-3">
														<div style="overflow-y: scroll; height: 350px;">
															@foreach($list_block as $row)
															@if($row->blocktype->size == 'small')
															@if($row->status_rent == 'no-rent')
															<a href="{{ url('/member/booking/in/') }}/{{ $get_data['partner_id'] }}-{{ $get_data['booking_code'] }}/rent/{{$row->id}}-{{$row->blocktype->size}}-{{ Auth::user()->id }}"><div id="block-small"><p class="text-title">{{ $row->name }}</p></div></a>
															@else
															<div id="block-small" style="background:#5c5c5c; "><p class="text-title">{{ $row->name }}</p></div>
															@endif
															@elseif($row->blocktype->size == 'medium')
															@if($row->status_rent == 'no-rent')
															<a href="{{ url('/member/booking/in/') }}/{{ $get_data['partner_id'] }}-{{ $get_data['booking_code'] }}/rent/{{$row->id}}-{{$row->blocktype->size}}-{{ Auth::user()->id }}"><div id="block-medium"><p class="text-title">{{ $row->name }}</p></div></a>
															@else
															<div id="block-medium" style="background:#5c5c5c; "><p class="text-title">{{ $row->name }}</p></div>
															@endif
															@elseif($row->blocktype->size == 'big')
															@if($row->status_rent == 'no-rent')
															<a href="{{ url('/member/booking/in/') }}/{{ $get_data['partner_id'] }}-{{ $get_data['booking_code'] }}/rent/{{$row->id}}-{{$row->blocktype->size}}-{{ Auth::user()->id }}"><div id="block-big"><p class="text-title">{{ $row->name }}</p></div> </a>
															@else
															<div id="block-big" style="background:#5c5c5c; "><p class="text-title">{{ $row->name }}</p></div>
															@endif
															@else
															?
															@endif
															@endforeach
														</div>
													</div>
												</div>

											</div>									

										</main>

					@elseif ($action == 'bookingstay')

					<div class="listar-innerbanner" style="background: url({{ $content->image }}) no-repeat 50% 50%;">
						<div class="listar-parallaxcolor listar-innerbannerparallaxcolor">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="listar-innerbannercontent">
											<div class="listar-pagetitle">
												<h1>Booking</h1>
											</div>
											<ol class="listar-breadcrumb">
												<li><a href="{{ route('website.home') }}">Home</a></li>
												<li class="listar-active"><span>Booking</span></li>
											</ol>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<main id="listar-main" class="listar-main listar-haslayout">
						<div class="listar-themepost listar-placespost listar-detail listar-detailvone">
							<!-- <figure class="listar-featuredimg"><img src="images/post/img-23.jpg" alt="image description"></figure> -->
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="listar-postcontent">
											<h1>Sedang Parkir</h1>
											<div class="listar-reviewcategory">

											</div>
											<div class="listar-themepostfoot">
												<ul>
													<li>
														<i class="icon-telephone114"></i>
														<span>{{ Auth::user()->phone }}</span>
													</li>
													<li>
														<i class="icon-icons74"></i>
														<span>{{ Auth::user()->address }}</span>
													</li>
													<li>
														<i class="icon-car"></i>
														<span>Kendaraan <span>{{ Auth::user()->size }}</span> </span>
													</li>
													<li>
														<i class="icon-mail"></i>
														<span>{{ Auth::user()->email }}</span>
													</li>
												</ul>
											</div>
										</div>
										<div class="checkout-wrap">
											<ul class="checkout-bar">
												<li class="visited first">Lokasi Parkir</li>
												<li class="visited first">Masuk Parkir</li>
												<li class="visited first">Memilih Tempat Parkir</li>
												<li  class="active">Sedang Parkir</li>
												<li class="next">Selesai Parkir</li>
											</ul>
										</div>
										<div class="listar-themetabs">
											<div class="container">
												<div class="row">
													<div class="col-xs-5 col-md-offset-3">
													sssssssssssssss
													</div>
												</div>

											</div>									

										</main>
									@endif

									@endsection