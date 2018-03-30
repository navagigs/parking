@extends('layouts.website')
@section('body',' ')
@section('header','listar-header cd-auto-hide-header listar-haslayout')
@section('container','container-fluid')
@section('logo','logo.png')
@section('content')
<div class="listar-innerbanner" style="background: url({{ $content->image }}) no-repeat 50% 50%;">
	<div class="listar-parallaxcolor listar-innerbannerparallaxcolor">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="listar-innerbannercontent">
						<div class="listar-pagetitle">
							<h1>Dashboard Member</h1>
						</div>
						<ol class="listar-breadcrumb">
							<li><a href="{{ route('website.home') }}">Home</a></li>
							<li class="listar-active"><span>Dashboard</span></li>
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
								<h1>Selamat datang, <span class="success">{{ Auth::user()->name }}</span></h1>
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
											<span>Mobil <span>{{ Auth::user()->size }}</span> </span>
										</li>
										<li>
											<i class="icon-mail"></i>
											<span>{{ Auth::user()->email }}</span>
										</li>
									</ul>
								</div>
							</div>

							<div class="listar-themetabs">
							<div class="form-group">
								<label for="title">Cari Tempat Parkir:</label>
								<select name="partner_id" class="form-control" style="width:350px">
									<option value="">--- Cari Tempat Parkir ---</option>
									@foreach ($partner as $key => $value)
										<option value="{{ $key }}">{{ $value }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
							<label for="title">Pilih Lantai:</label>
								<select name="floor" class="form-control" style="width:350px">
								</select>
           					 </div>		
						</div>
					</div>
				</div>
			</div>
		
		</main>

<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="partner_id"]').on('change', function() {
            var partnerID = $(this).val();
            if(partnerID) {
                $.ajax({
                    url: '/floor/'+partnerID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="floor"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="floor"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="floor"]').empty();
            }
        });
    });
</script>
@endsection