@extends('layouts.website')
@section('body','listar-home listar-homeone')
@section('header','listar-header cd-auto-hide-header listar-haslayout')
@section('container','container')
@section('logo','logo.png')
@section('content')
<div class="listar-homebannerslider">
	<div id="listar-homeslider" class="listar-homeslider owl-carousel">
		@foreach($media as $row_media)
		<div class="item"><figure><img src="{{ $row_media->image }}" alt="image description"></figure></div>
		@endforeach
	</div>
	<div class="listar-homebanner">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="listar-bannercontent">
						<h1>Cari Lokasi Tempat Parkir</h1>
						<div class="listar-description">
							<p>Temukan tempat parkir terbaik anda</p>
						</div>
						<form class="listar-formtheme listar-formsearchlisting">
							<fieldset>
								<div class="form-group listar-inputwithicon">
									<i class="icon-layers"></i>
									<div class="listar-select">
										<select id="listar-categorieschosen" class="listar-categorieschosen listar-chosendropdown">
											<option>Kategori tempat</option>
											@if (count($category) > 0)
											@foreach($category as $row_category)
											<option value="{{ $row_category->id }}" class="{{ $row_category->icon }}">{{ $row_category->name }}</option>
											@endforeach
											@else
											@endif
										</select>
									</div>
								</div>
								<div class="form-group listar-inputwithicon">
									<input type="text" class="search-location" placeholder="Cari tempat parkir yang akan dikunjungi" >
								</div>
								<button type="button" class="listar-btn listar-btngreen">Cari</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		<!--************************************
				Home Slider End
				*************************************-->
		<!--************************************
				Main Start
				*************************************-->
				<main id="listar-main" class="listar-main listar-haslayout">
			<!--************************************
					Explore The City Start
					*************************************-->
					<section class="listar-sectionspace listar-haslayout">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="listar-sectionhead">
										<div class="listar-sectiontitle">
											<h2>Jelajahi Tempat Parkir ini</h2>
										</div>
										<div class="listar-description">
											<p>Banyak tempat parkir yang luas dan aman</p>
										</div>
									</div>
								</div>
								<div class="listar-themeposts listar-categoryposts">
									@if (count($category) > 0)
									@foreach($category as $row_category)
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
										<div class="listar-themepost listar-categorypost">
											<figure class="listar-featuredimg">
												<a href="javascript:void(0);">
													<img src="{{ $row_category->image }}" alt="image description">
													<div class="listar-contentbox">
														<div class="listar-postcontent">
															<span class="listar-categoryicon listar-flip"><i class="{{ $row_category->icon }}"></i></span>
															<h3>{{ $row_category->name }}</h3>
															<h4>{{ $row_category->description }}</h4>
														</div>
													</div>
												</a>
											</figure>
										</div>
									</div>
									@endforeach
									@else
									@endif

								</div>
							</div>
						</div>
					</section>
			<!--************************************
					Explore The City End
					*************************************-->
			<!--************************************
					Best Theme Video Start
					*************************************-->
					<section class="listar-themeparallax" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ $content->image }}">
						<div class="listar-parallaxcolor">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-push-2 col-md-8 col-lg-push-2 col-lg-8">
										<div class="listar-videobox listar-prettyPhoto">
											<h2>Tujuan Utama kami -<span>Tema Terbaik untuk Bisnis Anda</span></h2>
											<figure>
												<img src="{{ $content->image }}" alt="image description">
												<figcaption>
													<a id="lister-video" class="listar-btnplay" href="{{ $identitas->youtube }}"><i class="icon-play3"></i></a>
												</figcaption>
											</figure>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
			<!--************************************
					Best Theme Video End
					*************************************-->
			<!--************************************
					Theme Features Start
					*************************************-->
					<section class="listar-sectionspace listar-overlapcontent listar-haslayout">
						<div class="container">
							<div class="row">
								<div class="listar-features">
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<div class="listar-feature">
											<span class="listar-featureicon"><i class="icon-layers"></i></span>
											<h2><span class="listar-bluethemecolor">01</span> Choose a Category</h2>
											<div class="listar-description">
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer nihil imperdiet doming...</p>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<div class="listar-feature">
											<span class="listar-featureicon"><i class="icon-map3"></i></span>
											<h2><span class="listar-bluethemecolor">02</span> Find Location</h2>
											<div class="listar-description">
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer nihil imperdiet doming...</p>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<div class="listar-feature">
											<span class="listar-featureicon"><i class="icon-hotairballoon"></i></span>
											<h2><span class="listar-bluethemecolor">03</span> Go have Fun</h2>
											<div class="listar-description">
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer nihil imperdiet doming...</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
			<!--************************************
					Theme Features End
					*************************************-->
			<!--************************************
					Discover New Places Start
					*************************************-->
					<section class="listar-sectionspace listar-bglight listar-haslayout">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="listar-sectionhead">
										<div class="listar-sectiontitle">
											<h2>Temukan tempat parkir baru</h2>
										</div>
										<div class="listar-description">
											<p>tempat parkir baru dengan berbagai macam fasilitas yang menarik</p>
										</div>
									</div>
									<div class="listar-horizontalthemescrollbar">
										@if (count($partner) > 0)
										@foreach($partner as $row_partner)
										<div class="listar-themepost listar-placespost">
											<figure class="listar-featuredimg"><a href="{{ url('/location/detail') }}/{{ $row_partner->id }}-{{ str_slug($row_partner->name) }}"><img src="{{ $row_partner->logo }}" alt="{{ $row_partner->name }}" width="200"></a></figure>
											<div class="listar-postcontent">
												<h3><a href="{{ url('/location/detail') }}/{{ $row_partner->id }}-{{ str_slug($row_partner->name) }}">{{ $row_partner->name }}</a>
													@if($row_partner->verified=='verified')
													<i class="icon-checkmark listar-postverified listar-themetooltip" data-toggle="tooltip" data-placement="top" title="Verified"></i>
													@endif
												</h3>
												<div class="listar-description">
													<p>{{ strip_tags(substr($row_partner->description, 0, 150)) }}</p>
												</div>
												<div class="listar-reviewcategory">
													<div class="listar-review">
														<span class="listar-stars"><span></span></span>
														<em>({{ $row_partner->statistics }} Review)</em>
													</div>
													<a href="listingv1.html" class="listar-category">
														<i class="{{ $row_partner->category->icon }}"></i>
														<span>{{ !empty($row_partner->category->name) ? $row_partner->category->name : '-' }}</span>
													</a>
												</div>
												<div class="listar-themepostfoot">
													<a class="listar-location" href="javascript:void(0);">
														<i class="icon-icons74"></i>
														<em>{{ !empty($row_partner->city->name) ? $row_partner->city->name : '-'  }} </em>
													</a>
													<div class="listar-postbtns">
														<!-- <a class="listar-btnquickinfo" href="#" data-toggle="modal" data-target=".listar-placequickview"><i class="icon-expand"></i></a> -->
														<a class="listar-btnquickinfo listar-liked" href="javascript:void(0);"><i class="icon-heart2"></i></a>
														<div class="listar-btnquickinfo">
															<div class="listar-shareicons">
																<a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
																<a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
																<a href="javascript:void(0);"><i class="fa fa-pinterest-p"></i></a>
															</div>
															<a class="listar-btnshare" href="javascript:void(0);">
																<i class="icon-share3"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>



										@endforeach
										@else
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!--************************************
					Discover New Places End
					*************************************-->
			<!--************************************
					Add Listing Start
					*************************************-->
					<section class="listar-themeparallax" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{ $content->image }}">
						<div class="listar-parallaxcolor listar-parallaxaddlisting">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-push-2 col-md-8 col-lg-push-2 col-lg-8">
										<div class="listar-addlisting">
											<h2>Jalankan dan Kembangkan Bisnis Anda disini</h2>
											<a class="listar-btn listar-btngreen" href="javascript:void(0);">
												<i class="icon-plus"></i>
												<span>Daftar Sekarang</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
			<!--************************************
					Add Listing End
					*************************************-->
			<!--************************************
					Blog Post Start
					*************************************-->
					<section class="listar-sectionspace listar-haslayout listar-bglight">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="listar-sectionhead">
										<div class="listar-sectiontitle">
											<h2>Latest News Posts</h2>
										</div>
										<div class="listar-description">
											<p>Checkout Latest News and Articles from <a class="listar-bluethemecolor" href="javascript:void(0);">Our Blog</a></p>
										</div>
									</div>
								</div>
								<div class="listar-themeposts listar-blogposts">
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
										<div class="listar-themepost listar-post">
											<figure class="listar-featuredimg">
												<a href="newsdetail.html"><img src="{{ asset('website/images/post/img-17.jpg') }}" alt="image description"></a>
												<a class="listar-postcategory" href="newsv1.html">Fitness</a>
											</figure>
											<div class="listar-postcontent">
												<figure class="listar-authorimg"><img src="{{ asset('website/images/author/img-01.jpg') }}" height="54" width="54" alt="image description"></figure>
												<h3><a href="newsdetail.html">The most common mistakes people make at the gym</a></h3>
												<div class="listar-themepostfoot">
													<time datetime="2017-08-08">
														<i class="icon-clock4"></i>
														<span>Apr 22, 2018</span>
													</time>
													<span class="listar-postcomment">
														<i class="icon-comment"></i>
														<span>3 Comments</span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
										<div class="listar-themepost listar-post">
											<figure class="listar-featuredimg">
												<a href="newsdetail.html"><img src="{{ asset('website/images/post/img-18.jpg') }}" alt="image description"></a>
												<a class="listar-postcategory" href="newsv2.html">Enjoy Life</a>
											</figure>
											<div class="listar-postcontent">
												<figure class="listar-authorimg"><img src="{{ asset('website/images/author/img-02.jpg') }}" alt="image description"></figure>
												<h3><a href="newsdetail.html">Here's how drinking can be good for your wellbeing</a></h3>
												<div class="listar-themepostfoot">
													<time datetime="2017-08-08">
														<i class="icon-clock4"></i>
														<span>Apr 22, 2018</span>
													</time>
													<span class="listar-postcomment">
														<i class="icon-comment"></i>
														<span>3 Comments</span>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
										<div class="listar-themepost listar-post">
											<figure class="listar-featuredimg">
												<a href="newsdetail.html"><img src="{{ asset('website/images/post/img-19.jpg') }}" alt="image description"></a>
												<a class="listar-postcategory" href="newsv1.html">Travel</a>
											</figure>
											<div class="listar-postcontent">
												<figure class="listar-authorimg"><img src="{{ asset('website/images/author/img-03.jpg') }}" alt="image description"></figure>
												<h3><a href="newsdetail.html">12 of the best family days out in the Melbourne</a></h3>
												<div class="listar-themepostfoot">
													<time datetime="2017-08-08">
														<i class="icon-clock4"></i>
														<span>Apr 22, 2018</span>
													</time>
													<span class="listar-postcomment">
														<i class="icon-comment"></i>
														<span>3 Comments</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
			<!--************************************
					Blog Post End
					*************************************-->
			<!--************************************
					Testimonials Start
					*************************************-->
					<section class="listar-sectionspace listar-haslayout">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="listar-sectionhead">
										<div class="listar-sectiontitle">
											<h2>People Feedback</h2>
										</div>
										<div class="listar-description">
											<p>What our Clients Says <a class="listar-bluethemecolor" href="javascript:void(0);">View All</a></p>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-push-2 col-lg-8">
									<div id="listar-testimonialslider" class="listar-testimonialslider listar-testimonials owl-carousel">
										<div class="item listar-testimonial">
											<figure>
												<img src="{{ asset('website/images/author/img-04.jpg') }}" alt="image description">
												<figcaption>
													<h3>John Doe</h3>
													<h4>Manager at GreenTech</h4>
												</figcaption>
											</figure>
											<blockquote>
												<h5>Good Design</h5>
												<q>Lorem ipsum dolor sit amet, eu per legimus referrentur. Ius ne viris repudiare, nominavi sententiae eos in. Et duo salutatus consequat Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, eu per legimus referrentur. Ius ne viris repudiare, nominavi sententiae eos in. Et duo salutatus consequat.</q>
											</blockquote>
										</div>
										<div class="item listar-testimonial">
											<figure>
												<img src="{{ asset('website/images/author/img-04.jpg') }}" alt="image description">
												<figcaption>
													<h3>John Doe</h3>
													<h4>Manager at GreenTech</h4>
												</figcaption>
											</figure>
											<blockquote>
												<h5>Good Design</h5>
												<q>Lorem ipsum dolor sit amet, eu per legimus referrentur. Ius ne viris repudiare, nominavi sententiae eos in. Et duo salutatus consequat Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, eu per legimus referrentur. Ius ne viris repudiare, nominavi sententiae eos in. Et duo salutatus consequat.</q>
											</blockquote>
										</div>
										<div class="item listar-testimonial">
											<figure>
												<img src="{{ asset('website/images/author/img-04.jpg') }}" alt="image description">
												<figcaption>
													<h3>John Doe</h3>
													<h4>Manager at GreenTech</h4>
												</figcaption>
											</figure>
											<blockquote>
												<h5>Good Design</h5>
												<q>Lorem ipsum dolor sit amet, eu per legimus referrentur. Ius ne viris repudiare, nominavi sententiae eos in. Et duo salutatus consequat Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, eu per legimus referrentur. Ius ne viris repudiare, nominavi sententiae eos in. Et duo salutatus consequat.</q>
											</blockquote>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
			<!--************************************
					Testimonials End
					*************************************-->
			<!--************************************
					Three Columns Start
					*************************************-->
					<section class="listar-haslayout">
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 pull-left">
							<div class="row">
								<div class="listar-postfirstlisting">
									<figure><a href="#listar-loginsingup"><img src="{{ asset('website/images/placeholder-03.png') }}" alt="image description"></a></figure>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 pull-right">
							<div class="row">
								<div class="listar-followus">
									<figure><a href="{{ $identitas->instagram }}"><img src="{{ asset('website/images/placeholder-04.png') }}" alt="image description"></a></figure>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="row">
								<div class="listar-newsletter">
									<div class="listar-newsletteroverlay">
										<h2>Newsletter</h2>
										<div class="listar-description">
											<p>Lorem ipsum dolor sit amet, eu per legimus referrentur. Ius ne viris repudiare, nominavi sententiae eos in. Et duo salutatus consequat.</p>
										</div>
										<form class="listar-formtheme listar-formnewsletter">
											<fieldset>
												<input type="email" name="email" class="form-control" placeholder="Your email address">
												<button type="button"><i class="icon-arrow-right2"></i></button>
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
			<!--************************************
					Three Columns End
					*************************************-->
				</main>
		<!--************************************
				Main End
				*************************************-->
				@endsection