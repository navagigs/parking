@extends('layouts.admin')
@section('title','Lokasi Parkir')
@section('content')
@if ($action == 'view' || empty($action))
<main>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@yield('title')</h1>
				<ol class="breadcrumb">
					<li class="active">
						<a href="{{ route('internal.dashboard') }} ">Dashboard</a> <i class="zmdi zmdi-circle"></i> @yield('title')
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-left" style="margin-bottom: 15px; margin-top: 20px;">
							<a href="{{ route('internal.partner.create') }}" class="btn btn-primary" title="Tambah Data">Tambah Data</a>
						</div>
						<div class="dataTable_wrapper">
							<table style="width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Verifikasi</th>
										<th>Status</th>
										<th width="25%"></th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $no => $row)
									<tr class="odd gradeX">
										<td>{{ ++$no }} </td>
										<td>{{ $row->name }}</td>
										<td>{{ $row->email }}</td>
										<td class="center">
											<form action="{{ route('internal.partner.verified', $row->id) }}" method="GET" onSubmit="return validate()"> 
												<div class="material-switch pull-right">
													<input id="VerifiedsomeSwitchOptionWarning{{ $row->id }}" name="someSwitchOption001" type="checkbox" onClick="submit();"  {{ $verified = ($row->verified=='verified')?'checked':''}}  />
													<label for="VerifiedsomeSwitchOptionWarning{{ $row->id }}" class="label-warning" title="Verifikasi"></label>
												</div>
											</form>
											@if($row->verified=='verified') 
											<span class="label label-warning">{{ $row->verified }}</span>
											@else 
											<span class="label label-default">{{ $row->verified }}</span> 
											@endif
										</td>
										<td class="center">
											<form action="{{ route('internal.partner.status', $row->id) }}" method="GET" onSubmit="return validate()"> 
												<div class="material-switch pull-right">
													<input id="someSwitchOptionSuccess{{ $row->id }}" name="someSwitchOption001" type="checkbox" onClick="submit();" {{ $y = ($row->status=='active')?'checked':''}} />
													<label for="someSwitchOptionSuccess{{ $row->id }}" class="label-success" title="Status"></label>
												</div>
											</form>
											@if($row->status=='active') 
											<span class="label label-success">{{ $row->status }}</span>
											@else 
											<span class="label label-default">{{ $row->status }}</span> 
											@endif
										</td>
										<td class="center">
											<button type="button" class="btn btn-primary" onclick="window.location='{{ route('internal.floor', $row->id) }}'">Lantai Parkir</button>
											<div class="btn-group" role="group">
												<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Action
													<span class="caret"></span>
												</button>

												<ul class="dropdown-menu animated flipInX">
													<li><a href="javascript:void(0);" data-toggle="modal" data-target="#detailModal{{ $row->id }}"><i class="zmdi zmdi-zoom-in"></i> Detail</a></li>
													<li><a href="{{ route('internal.partner.update', $row->id) }}"><i class="zmdi zmdi-edit"></i> Edit</a></li>
													<li><a style="cursor: pointer;" data-href="{{ route('internal.partner.delete', $row->id) }}" data-toggle="modal" data-target="#confirm-delete" ><i class="zmdi zmdi-delete"></i> Delete</a></li>
												</ul>
											</div>
										</td>
									</tr>
									<!-- Modal Detail -->
									<div class="modal fade" id="detailModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel"><b>Detail.</b>  {{ $row->name }}</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="panel-body">
														<div class="col-sm-6">
															<div class="form-group">
																<label>Email :</label>
																<br>{{ $row->email }}
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Nama :</label>
																<br>{{ $row->name }}
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Alamat :</label>
																<br>{{ $row->address }}
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label>Telepon :</label>
																<br>{{ $row->phone }}
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<label>Deskripsi :</label>
																<br>{{ strip_tags($row->description) }}
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<label>Website :</label>
																<br><a target="_blank" href="{{ $row->website }}">{{ $row->website }}</a>
															</div>
														</div>
														<div class="col-sm-4">
															<div class="form-group">
																<label>Status :</label>
																<br>
																@if($row->status=='active') 
																<span class="label label-success">{{ $row->status }}</span>
																@else 
																<span class="label label-danger">{{ $row->status }}</span> 
																@endif
															</div>
														</div>
														<div class="col-sm-4">
															<div class="form-group">
																<label>Verifikasi :</label>
																<br>
																@if($row->verified=='verified') 
																<span class="label label-warning">{{ $row->verified }}</span>
																@else 
																<span class="label label-default">{{ $row->verified }}</span> 
																@endif
															</div>
														</div>
														<div class="col-sm-4">
															<div class="form-group">
																<label>Kategori Partner :</label>
																<br>
																<span class="label label-primary">{{ !empty($row->category->name) ? $row->category->name : '-' }}</span>

															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<label>Logo :</label>
																<br><img src="{{ $row->logo }}" width="90%">
															</div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<!-- End Modal Detail -->				
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
</main>

@elseif ($action == 'create')
<main>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@yield('title')</h1>
				<ol class="breadcrumb">
					<li class="active">
						<a href="{{ route('internal.dashboard') }} ">Dashboard</a> <i class="zmdi zmdi-circle"></i> <a href="{{ route('internal.partner') }} ">@yield('title')</a> <i class="zmdi zmdi-circle"></i> Tambah
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">		
						<form action="{{ route('internal.partner.create_submit') }}" method="POST" enctype="multipart/form-data"> {{csrf_field()}}
							<div class="col-sm-6">
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="name" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea name="description" id="bodyField"></textarea>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Telepon</label>
									<input type="text" name="phone" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Website</label>
									<input type="text" name="website" class="form-control" >
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label>Alamat</label>						
									<input id="searchInput" class="input-controls" type="text" placeholder="Cari alamat disini">
									<div class="map" id="map" style="width: 100%; height: 300px;"></div>
									<input type="hidden" name="address" class="form-control" value=""  id="location">
									<input type="hidden" name="longtitude" class="form-control"   id="lng" >
									<input type="hidden" name="latittude" class="form-control"  id="lat" >
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Logo</label>
									<input type="file" name="logo" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Kategori Partner</label>
									<select class="form-control" name="category_id" required>>
										<option value="">-- Pilih --</option>
										@foreach ($category as $row)
										<option value="{{ $row->id }}">{{ $row->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										Untuk harga/jam parkiran perkategori kendaraan.
									</div>
									<div class="panel-body">
										<p>
											<?php
											$cars = array('small','medium','big');
											$arrlength = count($cars);
											for($x = 0; $x < $arrlength; $x++) { ?>
											<div class="col-sm-4">
												<div class="form-group">
													<label>ukuran <span class="m-blue"> {{  $cars[$x] }}</span> </label>
													<input type="hidden" name="block_type[{{ $x }}][size]" value="{{ $cars[$x] }}" class="form-control" required>
													<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
													type = "number"
													maxlength = "6"  name="block_type[{{ $x }}][price]" value="" class="form-control" required>
												</div>
											</div>
											<?php }?></p>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="submit" class="btn m-blue" value="Simpan Data" name="simpan">
											<button type="button" class="btn btn-default" onclick="window.location='{{ route('internal.partner') }}'">Batal</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

		@elseif ($action == 'update')
		<main>
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">@yield('title')</h1>
						<ol class="breadcrumb">
							<li class="active">
								<a href="{{ route('internal.dashboard') }} ">Dashboard</a> <i class="zmdi zmdi-circle"></i> <a href="{{ route('internal.partner') }} ">@yield('title')</a> <i class="zmdi zmdi-circle"></i> Edit
							</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<form action="{{ route('internal.partner.update_submit', $partner->id) }}" method="POST" enctype="multipart/form-data"> {{csrf_field()}}
									<input type="hidden" name="id" value="{{ $partner->id }}">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Email</label>
											<input type="text" name="email" value="{{ $partner->email }}" class="form-control" readonly >
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Password </label> <span class="m-red"> *Kosongkan password bila tidak diedit</span>
											<input type="password" name="password" class="form-control">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Nama</label>
											<input type="text" name="name"  value="{{ $partner->name }}" class="form-control">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Deskripsi</label>
											<textarea name="description" id="bodyField">{{ $partner->description }}</textarea>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Telepon</label>
											<input type="text" name="phone" class="form-control" value="{{ $partner->phone }}">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Website</label>
											<input type="text" name="website" class="form-control" value="{{ $partner->website }}">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<label>Alamat</label>						
											<input id="searchInput" class="input-controls" type="text" placeholder="Cari alamat disini" value="{{ $partner->address }}">
											<div class="map" id="map" style="width: 100%; height: 300px;"></div>
											<input type="hidden" name="address" class="form-control" id="location">
											<input type="hidden" name="longtitude" class="form-control"   id="lng" >
											<input type="hidden" name="latittude" class="form-control"  id="lat" >
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Ganti Logo</label> 
											<a data-toggle="modal" data-target="#logoModal" style="cursor: pointer;">Lihat</a>
											<input type="file" name="logo"  class="form-control">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Kategori Partner</label>
											<select class="form-control" name="category_id"="">
												<option value="">-- Pilih --</option>
												@foreach ($category as $row)
												<option value="{{ $row->id }}" {{ $y = ($row->id == $partner->category_id)?'selected':''}}>{{ $row->name }}</option>
												@endforeach
											</select>

										</div>    
									</div>
									<div class="col-lg-12">
										<div class="panel panel-primary">
											<div class="panel-heading">
												Untuk harga/jam parkiran perkategori kendaraan.
											</div>
											<div class="panel-body">
												<p>
													<?php
													$cars = array('small','medium','big');
													$arrlength = count($cars);
													foreach ($block_type as $x) { ?>

													<div class="col-sm-4">
														<div class="form-group">
															<label>ukuran <span class="m-blue"> {{ $x->size }}</span> </label>
															<input type="hidden" name="block_type[{{ $x->id }}][size]" value="{{ $x->size }}" class="form-control" required>
															<input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
															type = "number"
															maxlength = "6"  name="block_type[{{ $x->id }}][price]" class="form-control" value="{{ $x->price }}" required>
														</div>
													</div>
													<?php }?></p>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group">
													<input type="submit" class="btn m-blue" value="Simpan Data" name="simpan">
													<button type="button" class="btn btn-default" onclick="window.location='{{ route('internal.partner') }}'">Batal</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</main>
				<!-- Modal -->
				<div class="modal fade" id="logoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Logo {{ $partner->name }}</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<img src="{{ $partner->logo }} " width="100%">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>

				@endif
				<style type="text/css">
				.input-controls {
					margin-top: 10px;
					border: 1px solid transparent;
					border-radius: 2px 0 0 2px;
					box-sizing: border-box;
					-moz-box-sizing: border-box;
					height: 32px;
					outline: none;
					box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
				}
				#searchInput {
					background-color: #fff;
					font-family: Roboto;
					font-size: 15px;
					font-weight: 100;
					margin-left: 12px;
					padding: 5px;
					text-overflow: ellipsis;
					width: 65%;
				}
				#searchInput:focus {
					border-color: #4d90fe;
				}
			</style>
			>
			<script>
				/* script */
				function initialize() {
					var latlng = new google.maps.LatLng(-6.9202047, 107.6138110);
					var map = new google.maps.Map(document.getElementById('map'), {
						center: latlng,
						zoom: 13
					});
					var marker = new google.maps.Marker({
						map: map,
						position: latlng,
						draggable: true,
						anchorPoint: new google.maps.Point(0, -29)
					});
					var input = document.getElementById('searchInput');
					map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
					var geocoder = new google.maps.Geocoder();
					var autocomplete = new google.maps.places.Autocomplete(input);
					autocomplete.bindTo('bounds', map);
					var infowindow = new google.maps.InfoWindow();   
					autocomplete.addListener('place_changed', function() {
						infowindow.close();
						marker.setVisible(false);
						var place = autocomplete.getPlace();
						if (!place.geometry) {
							window.alert("Autocomplete's returned place contains no geometry");
							return;
						}

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
        	map.fitBounds(place.geometry.viewport);
        } else {
        	map.setCenter(place.geometry.location);
        	map.setZoom(17);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);          

        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);

    });
    // this function will work on marker move event into map 
    google.maps.event.addListener(marker, 'dragend', function() {
    	geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
    		if (status == google.maps.GeocoderStatus.OK) {
    			if (results[0]) {        
    				bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
    				infowindow.setContent(results[0].formatted_address);
    				infowindow.open(map, marker);
    			}
    		}
    	});
    });
}
function bindDataToForm(address,lat,lng){
	document.getElementById('location').value = address;
	document.getElementById('lat').value = lat;
	document.getElementById('lng').value = lng;
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection