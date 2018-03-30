@extends('layouts.admin')
@section('title','Setting')
@section('content')
@if ($action == 'identitas' || empty($action))
<main>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-md-12">
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
						<ul class="nav nav-tabs">
							<li class="active"><a href="{{ route('internal.setting') }}">Identitas Sistem</a></li>
							<li><a href="{{ route('internal.setting.profile') }}">Profile</a></li>
						
						</ul>
						<div class="tab-content" style="margin-top: 20px;">
							<div class="tab-pane fade in active">
								<form action="{{ route('internal.setting.update_identitas', $identitas->id) }}" method="POST" enctype="multipart/form-data"> 
									<input type="hidden" name="id" value="{{ $identitas->id }}">{{csrf_field()}}
									
									<table class="table " style="width: 65%; margin:0px auto;">
										<tr>
											<td><label>Nama Sistem</label></td>
											<td>:</td>
											<td><input type="text" name="name" class="form-control" value="{{ $identitas->name }}" required></td>
										</tr>
										<tr>
											<td><label>Deskripsi Sistem</label></td>
											<td>:</td>
											<td><textarea name="description" class="form-control" required>{{ $identitas->description }}</textarea></td>
										</tr>
										<tr>
											<td><label>Keyword Sistem</label></td>
											<td>:</td>
											<td><textarea name="keyword" class="form-control" required>{{ $identitas->keyword }}</textarea></td>
										</tr>
										<tr>
											<td><label>Telepon</label></td>
											<td>:</td>
											<td><input type="text" name="phone" class="form-control" value="{{ $identitas->phone }}" required></td>
										</tr>
										<tr>
											<td>
											<label>Email</label></td>
											<td>:</td>
											<td><input type="email" name="email" class="form-control" value="{{ $identitas->email }}" required></td>
										</tr>
										<tr>
											<td><label>Alamat</label></td>
											<td>:</td>
											<td><textarea name="address" class="form-control" required>{{ $identitas->address }}</textarea></td>
										</tr>
										<tr>
											<td><label>Fecebook</label></td>
											<td>:</td>
											<td><input type="text" name="facebook" class="form-control" value="{{ $identitas->facebook }}" required></td>
										</tr>
										<tr>
											<td><label>Twitter</label></td>
											<td>:</td>
											<td><input type="text" name="twitter" class="form-control" value="{{ $identitas->twitter }}" required></td>
										</tr>
										<tr>
											<td><label>Google plus</label></td>
											<td>:</td>
											<td><input type="text" name="googleplus" class="form-control" value="{{ $identitas->googleplus }}" required></td>
										</tr>
										<tr>
											<td><label>Youtube</label></td>
											<td>:</td>
											<td><input type="text" name="youtube" class="form-control" value="{{ $identitas->youtube }}" required></td>
										</tr>
										<tr>
											<td><label>location</label></td>
											<td>:</td>
											<td><input type="text" name="location" class="form-control" value="{{ $identitas->location }}" required></td>
										</tr>
										<tr>
											<td><label>Ganti Favicon</label> </td>
											<td>:</td>
											<td><input type="file" name="favicon"  class="form-control"><a data-toggle="modal" data-target="#logoModal" style="cursor: pointer;">Lihat Favicon</a></td>
										</tr>
										<tr>
											<td colspan="4"><input type="submit" class="btn m-blue" value="Simpan Data" name="simpan"></td>
										</tr>
									</table>
							</form>
						</div>
					</div>
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
				<h5 class="modal-title" id="exampleModalLabel">Favicon {{ $identitas->name }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img src="{{ $identitas->favicon }} " width="100%">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@elseif($action == 'profile')

<main>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-md-12">
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
						<ul class="nav nav-tabs">
							<li><a href="{{ route('internal.setting') }}">Identitas Sistem</a></li>
							<li  class="active"><a href="{{ route('internal.setting.profile') }}">Profile</a></li>
						</ul>
						<div class="tab-content" style="margin-top: 20px;">
							<div class="tab-pane fade in active">
								<form action="{{ route('internal.setting.update_profile', $profile->id) }}" method="POST" enctype="multipart/form-data"> 
									<input type="hidden" name="id" value="{{ $profile->id }}">{{csrf_field()}}
									
									<table class="table " style="width: 65%; margin:0px auto;">
										<tr>
											<td>
											<label>Email</label></td>
											<td>:</td>
											<td><input type="email" name="email" class="form-control" value="{{ $profile->email }}" readonly></td>
										</tr>
										<tr>
											<td><label>Nama</label></td>
											<td>:</td>
											<td><input type="text" name="name" class="form-control" value="{{ $profile->name }}" required></td>
										</tr>
										<tr>
											<td><label>Password</label> </td>
											<td>:</td>
											<td><input type="password" name="password" class="form-control"><span class="m-red"> *Kosongkan password bila tidak diedit</span></td>
										</tr>
										<tr>
											<td colspan="4"><input type="submit" class="btn m-blue" value="Simpan Data" name="simpan"></td>
										</tr>
									</table>
							</form>
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