@extends('layouts.website')
@section('body',' ')
@section('header','listar-header listar-fixedheader listar-haslayout')
@section('container','container-fluid')
@section('logo','logo.png')
@section('content')
@if ($action == 'view' || empty($action))
<main id="listar-main" class="listar-main listar-haslayout">
	<div id="listar-content" class="listar-content">
		<div class="listar-listing listar-listingvone">
			<div id="listar-mapclustring" class="listar-mapclustring">
				<div class="listar-maparea">
					<div id="listar-listingmap" class="listar-listingmap"></div> 
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left">
				<div class="row">
					<div class="listar-listingarea">
						<div class="listar-innerpagesearch">
							<div class="listar-innersearch">
								<div class="listar-searchstatus"><h1><span> Temukan </span>tempat parkir terbaik anda</h1></div>
								<form class="listar-formtheme listar-formsearchlisting">
									<fieldset>
										<div class="form-group listar-inputwithicon">
											<i class="icon-global"></i>
											<div class="listar-select listar-selectlocation">
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
											<i class="icon-icons185"></i>
											<input type="text" name="q" id="listar-autosearch" class="form-control" placeholder="Cari tempat parkir">
										</div>

										<button type="button" class="listar-btn listar-btngreen">Submit Result</button>
									</form>
								</div>
							</div>
							<div class="listar-themeposts listar-placesposts listar-gridview">
								@if (count($partner) > 0)
								@foreach($partner as $row_partner)
								<div class="listar-themepost listar-placespost">
									<figure class="listar-featuredimg"><a href="{{ url('/location/detail') }}/{{ $row_partner->id }}-{{ str_slug($row_partner->name) }}"><img src="{{ $row_partner->logo }}" alt="{{ $row_partner->name }}" class="mCS_img_loaded"></a></figure>
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
											<a href="javascript:void(0);" class="listar-category">
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
												<a class="listar-btnquickinfo" href="#" data-toggle="modal" data-target=".listar-placequickview"><i class="icon-expand"></i></a>
												<a class="listar-btnquickinfo" href="javascript:void(0);"><i class="icon-heart2"></i></a>
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
								<div class="row">
									<div class="col-md-2 col-md-offset-5">{{ $partner->links() }}</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBMnj6Gqf0MIGbsrjEoyqOoRMVs4af-FfM&sensor=false"></script>
	<script type="text/javascript">
		function initialize() {
			var locations = [
			<?php if (count($partner_location) > 0) {
				foreach($partner_location as $row_partner) { ?>
					['<h5><?php echo $row_partner->name; ?> </h5>', <?php echo $row_partner->latittude; ?>, <?php echo $row_partner->longtitude; ?> ], 
					<?php } } else { }?>
					];
					var infowindow = new google.maps.InfoWindow();

					var options = {
						zoom: 14, 
						center: new google.maps.LatLng(-6.8972548,107.6093393,20.75 ),
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};

       // Pembuatan petanya
       var map = new google.maps.Map(document.getElementById('listar-listingmap'), options);

       var marker, i;
    // proses penambahan marker pada masing-masing lokasi yang berbeda
    for (i = 0; i < locations.length; i++) {  
    	marker = new google.maps.Marker({
    		position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    		map: map,

    	});

      // Menampilkan informasi pada masing-masing marker yang diklik    
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
      	return function() {
      		infowindow.setContent(locations[i][0]);
      		infowindow.open(map, marker);
      	}
      })(marker, i));
  }
  
};
google.maps.event.addDomListener(window, 'load', initialize);
</script>

@elseif ($action == 'detail')
		</main>


<div class="listar-innerbanner" style="background: url({{ $content->image }}) no-repeat 50% 50%;">
	<div class="listar-parallaxcolor listar-innerbannerparallaxcolor">
		<div class="container">
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
								<h1>{{ $partner->name }}	
									@if($partner->verified=='verified')
										<i class="icon-checkmark listar-postverified listar-themetooltip" data-toggle="tooltip" data-placement="top" title="Verified"></i>
									@endif
								</h1>
								<div class="listar-reviewcategory">
									<div class="listar-review">
										<span class="listar-stars"><span></span></span>
										<em>({{ $partner->statistics }} Review)</em>
									</div>
									@if(Auth::guard('member')->check())
									<form action="{{ route('website.booking') }}" method="POST">
										{{csrf_field()}}
										<input type="hidden" name="user_id" value="{{ Auth::guard('member')->user()->id }}" >
										<input type="hidden" name="partner_id" value="{{ $partner->id }}" >
										<input type="submit" name="booking" value="Booking Tempat Parkir"class="btn btn-danger">
									</form>
									@else
									<a id="listar-btnsignin" class="listar-btn listar-btngreen" href="#listar-loginsingup">
									<span>Login Untuk Booking Tempat Parkir</span>
									</a>
									@endif
									<!-- <ul class="listar-postinfotags">
										<li><a href="javascript:void(0);"><i class="icon-heart2"></i><span>23</span></a></li>
										<li>
											<div class="listar-btnquickinfo">
												<a class="listar-btnshare" href="javascript:void(0);">
													<i class="icon-share3"></i>
													<span>share</span>
												</a>
												<div class="listar-btnquickinfo">
													<div class="listar-shareicons">
														<a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
														<a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
														<a href="javascript:void(0);"><i class="fa fa-pinterest-p"></i></a>
													</div>
												</div>
											</div>
										</li>
										<li><span class="listar-tagviews"><i class="icon-eye2"></i><span>52</span></span></li>
									</ul> -->
								</div>
								<div class="listar-themepostfoot">
									<ul>
										<li>
											<i class="icon-telephone114"></i>
											<span>{{ $partner->phone }}	</span>
										</li>
										<li>
											<i class="icon-icons74"></i>
											<span>{{ $partner->address }}	</span>
										</li>
										<!-- <li>
											<i class="icon-icons20"></i>
											<span>Today <span>Closed Now</span> 10:00 AM - 5:00 PM</span>
										</li> -->
										<li>
											<i class="icon-global"></i>
											<span><a href="{{ $partner->website }}">{{ $partner->website }}</a></span>
										</li>
									</ul>
								</div>
							</div>
							<div class="listar-themetabs">
								<ul class="listar-themetabnav" role="tablist">
									<li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Deskripsi</a></li>
									<li role="presentation"><a href="#pricing" aria-controls="pricing" role="tab" data-toggle="tab">Tempat Parkir</a></li>
									<li role="presentation"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">Lokasi</a></li>
									<li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews</a></li>
									<li role="presentation"><a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">Gallery</a></li>
								</ul>
								<div class="tab-content listar-themetabcontent">
									<div role="tabpanel" class="tab-pane active listar-overview" id="overview">
										<!-- <div class="listar-leftbox"> -->
											<p>{{ strip_tags($partner->description) }}</p>
											<!-- <div class="listar-videobox">
												<iframe src="https://player.vimeo.com/video/234265016?byline=0&amp;portrait=0"></iframe>
											</div> -->
										<!-- </div> -->
										<!-- <div class="listar-rightbox">
											<div class="listar-amenitiesarea">
												<div class="listar-title">
													<h3>Amenities</h3>
												</div>
												<ul class="listar-amenities">
													<li>Pets allowed</li>
													<li>Kitchen</li>
													<li>Internet</li>
													<li>Suitable for events</li>
													<li>Gym</li>
													<li>Dryer</li>
													<li>Hot tub</li>
													<li>Family/kid friendly</li>
													<li>Doorman</li>
													<li>Cable TV</li>
													<li>Wheelchair accessible</li>
													<li>Wireless Internet</li>
													<li>Pool</li>
												</ul>
											</div>
											<div class="listar-openinghoursarea">
												<div class="listar-title">
													<h3>Opening Hours</h3>
												</div>
												<ul class="listar-openinghours">
													<li>
														<span>Monday</span>
														<span>10:00 AM - 5:00 PM</span>
													</li>
													<li>
														<span>Tuesday</span>
														<span>10:00 AM - 5:00 PM</span>
													</li>
													<li>
														<span>Wednesday</span>
														<span>10:00 AM - 5:00 PM</span>
													</li>
													<li>
														<span>Thursday</span>
														<span>10:00 AM - 5:00 PM</span>
													</li>
													<li>
														<span>Friday</span>
														<span>10:00 AM - 5:00 PM</span>
													</li>
													<li>
														<span>Saturday</span>
														<span>10:00 AM - 3:00 PM</span>
													</li>
													<li>
														<span>Sunday</span>
														<span>Closed</span>
													</li>
												</ul>
											</div>
										</div> -->
									</div>
									<div role="tabpanel" class="tab-pane listar-pricing" id="pricing">
										<ul class="listar-prices">
											@foreach($floor as $row_floor)
											<li>
												<div class="listar-pricebox">
													<h3>{{ $row_floor->name }}</h3>
													<p>{{ $row_floor->description }}</p>
													<!-- <span class="listar-price">$12</span> -->
												</div>
											</li>
											@endforeach
										</ul>
									</div>
									<div role="tabpanel" class="tab-pane listar-addressmaplocation" id="location">
										<div id="listar-postlocationmap" class="listar-postlocationmap"></div>
									</div>
									<div role="tabpanel" class="tab-pane" id="reviews">
										<ul id="listar-comments" class="listar-comments">
											<li>
												<div class="listar-comment">
													<div class="listar-commentauthorbox">
														<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
														<div class="listar-authorinfo">
															<h3>Katie</h3>
															<em>Family Vacation</em>
															<span class="listar-stars"><span></span></span>
														</div>
													</div>
													<a class="listar-helpful" href="javascript:void(0);">
														<i class="icon-thumb-up2"></i>
														<span>Helpful</span>
														<span>1</span>
													</a>
													<div class="listar-commentcontent">
														<time datetime="2017-09-09">
															<i class="icon-alarmclock"></i>
															<span>January 25, 2017</span>
														</time>
														<div class="listar-description">
															<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue Sed non mauris vitae;erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra.</p>
															<ul class="listar-authorgallery">
																<li><figure><a href="images/img-03.jpg" data-rel="prettyPhoto[userimgone]"><img src="images/img-03.jpg" alt="image description"></a></figure></li>
																<li><figure><a href="images/img-04.jpg" data-rel="prettyPhoto[userimgone]"><img src="images/img-04.jpg" alt="image description"></a></figure></li>
															</ul>
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="listar-comment">
													<div class="listar-commentauthorbox">
														<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
														<div class="listar-authorinfo">
															<h3>Katie</h3>
															<em>Family Vacation</em>
															<span class="listar-stars"><span></span></span>
														</div>
													</div>
													<a class="listar-helpful" href="javascript:void(0);">
														<i class="icon-thumb-up2"></i>
														<span>Helpful</span>
													</a>
													<div class="listar-commentcontent">
														<time datetime="2017-09-09">
															<i class="icon-alarmclock"></i>
															<span>January 25, 2017</span>
														</time>
														<div class="listar-description">
															<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue Sed non mauris vitae;erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra justo.</p>
															<p>First, please don’t fall sick. However, if in case something does catchup with you, we will airlift you to hospital but your insurance will have to pay for this. Ulins aliquam massa nisl quis neque. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut liquam massa nisl quis neque.</p>
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="listar-comment">
													<div class="listar-commentauthorbox">
														<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
														<div class="listar-authorinfo">
															<h3>Katie</h3>
															<em>Family Vacation</em>
															<span class="listar-stars"><span></span></span>
														</div>
													</div>
													<a class="listar-helpful" href="javascript:void(0);">
														<i class="icon-thumb-up2"></i>
														<span>Helpful</span>
													</a>
													<div class="listar-commentcontent">
														<time datetime="2017-09-09">
															<i class="icon-alarmclock"></i>
															<span>January 25, 2017</span>
														</time>
														<div class="listar-description">
															<p>What a magical place, even better than I imagined! Teresa and Daniella were so helpful and awesome</p>
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="listar-comment">
													<div class="listar-commentauthorbox">
														<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
														<div class="listar-authorinfo">
															<h3>Katie</h3>
															<em>Family Vacation</em>
															<span class="listar-stars"><span></span></span>
														</div>
													</div>
													<a class="listar-helpful" href="javascript:void(0);">
														<i class="icon-thumb-up2"></i>
														<span>Helpful</span>
														<span>1</span>
													</a>
													<div class="listar-commentcontent">
														<time datetime="2017-09-09">
															<i class="icon-alarmclock"></i>
															<span>January 25, 2017</span>
														</time>
														<div class="listar-description">
															<p>Very nice place</p>
															<ul class="listar-authorgallery">
																<li><figure><a href="images/img-04.jpg" data-rel="prettyPhoto[userimgtwo]"><img src="images/img-04.jpg" alt="image description"></a></figure></li>
															</ul>
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="listar-comment">
													<div class="listar-commentauthorbox">
														<figure><a href="javascript:void(0);"><img src="images/img-02.jpg" alt="image description"></a></figure>
														<div class="listar-authorinfo">
															<h3>Katie</h3>
															<em>Family Vacation</em>
															<span class="listar-stars"><span></span></span>
														</div>
													</div>
													<a class="listar-helpful" href="javascript:void(0);">
														<i class="icon-thumb-up2"></i>
														<span>Helpful</span>
														<span>5</span>
													</a>
													<div class="listar-commentcontent">
														<time datetime="2017-09-09">
															<i class="icon-alarmclock"></i>
															<span>January 25, 2017</span>
														</time>
														<div class="listar-description">
															<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue Sed non mauris vitae;erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo First, please don’t fall sick. However, if in case something does catchup.</p>
														</div>
													</div>
												</div>
											</li>
										</ul>
										<nav class="listar-pagination">
											<ul>
												<li class="listar-prevpage"><a href="javascript:void(0);"><i class="fa fa-angle-left"></i></a></li>
												<li><a href="javascript:void(0);">1</a></li>
												<li><a href="javascript:void(0);">2</a></li>
												<li><a href="javascript:void(0);">3</a></li>
												<li class="listar-nextpage"><a href="javascript:void(0);"><i class="fa fa-angle-right"></i></a></li>
											</ul>
										</nav>
										<div class="listar-formreviewarea">
											<h3>Add Review</h3>
											<form class="listar-formtheme listar-formaddreview">
												<fieldset>
													<div class="row">
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
															<div class="listar-rating">
																<p>Your rating for this listing</p>
																<span class="listar-stars"></span>
															</div>
														</div>
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
															<label class="listar-fileuploadlabel" for="listar-photogallery">
																<i class="icon-upload3"></i>
																<span>Upload Images</span>
																<input id="listar-photogallery" class="listar-fileinput" type="file" name="file">
															</label>
														</div>
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
															<div class="form-group">
																<input type="text" name="yourname" class="form-control" placeholder="Your Name">
															</div>
														</div>
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
															<div class="form-group">
																<input type="text" name="emailaddress" class="form-control" placeholder="Email Address">
															</div>
														</div>
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
															<div class="form-group">
																<span class="listar-select">
																	<select>
																		<option>Family Vacation</option>
																		<option>Family Vacation</option>
																		<option>Family Vacation</option>
																	</select>
																</span>
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
															<div class="form-group">
																<textarea name="review" class="form-control" placeholder="Review"></textarea>
															</div>
														</div>
														<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
															<button class="listar-btn listar-btngreen" type="button">Submit Review</button>
														</div>
													</div>
												</fieldset>
											</form>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="gallery">
										<div id="listar-postgallery" class="listar-postgallery">
											<div class="listar-masnory"><figure><a href="images/gallery/img-01.jpg" data-rel="prettyPhoto[gallery]"><img src="images/gallery/img-01.jpg" alt="image description"></a></figure></div>
											<div class="listar-masnory"><figure><a href="images/gallery/img-02.jpg" data-rel="prettyPhoto[gallery]"><img src="images/gallery/img-02.jpg" alt="image description"></a></figure></div>
											<div class="listar-masnory"><figure><a href="images/gallery/img-03.jpg" data-rel="prettyPhoto[gallery]"><img src="images/gallery/img-03.jpg" alt="image description"></a></figure></div>
											<div class="listar-masnory"><figure><a href="images/gallery/img-05.jpg" data-rel="prettyPhoto[gallery]"><img src="images/gallery/img-05.jpg" alt="image description"></a></figure></div>
											<div class="listar-masnory"><figure><a href="images/gallery/img-04.jpg" data-rel="prettyPhoto[gallery]"><img src="images/gallery/img-04.jpg" alt="image description"></a></figure></div>
											<div class="listar-masnory"><figure><a href="images/gallery/img-06.jpg" data-rel="prettyPhoto[gallery]"><img src="images/gallery/img-06.jpg" alt="image description"></a></figure></div>
											<div class="listar-masnory"><figure><a href="images/gallery/img-07.jpg" data-rel="prettyPhoto[gallery]"><img src="images/gallery/img-07.jpg" alt="image description"></a></figure></div>
											<div class="listar-masnory"><figure><a href="images/gallery/img-08.jpg" data-rel="prettyPhoto[gallery]"><img src="images/gallery/img-08.jpg" alt="image description"></a></figure></div>
											<div class="listar-masnory"><figure><a href="images/gallery/img-09.jpg" data-rel="prettyPhoto[gallery]"><img src="images/gallery/img-09.jpg" alt="image description"></a></figure></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</main>
@endif
@endsection