@extends('layouts.admin')
@section('title','Lantai Parkir')
@section('content')
@if ($action == 'view' || empty($action))
<main>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@yield('title')</h1>
				<ol class="breadcrumb">
					<li class="active">
						<a href="{{ route('internal.dashboard') }}">Dashboard</a> <i class="zmdi zmdi-circle"></i> 
						<a href="{{ route('internal.partner') }}">Lokasi Parkir</a>
						<i class="zmdi zmdi-circle"></i> {{ $partner->name }}
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body"> 
						<div class="pull-left" style="margin-bottom: 15px; margin-top: 20px;">
							<a data-toggle="modal" data-target="#addModal" class="btn btn-primary" title="Tambah Data">Tambah Data</a>
						</div>

						<!-- Modal Add -->
						<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel"><b>Tambah</b> @yield('title')</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="{{ route('internal.floor.create_submit', $partner->id) }}" method="POST" enctype="multipart/form-data"> {{csrf_field()}}
											<div class="multi-rows">
												<div>
													<div class="col-sm-12">
														<div class="form-group">
															<label>Nama</label>
															<input type="text" name="name" class="form-control" required>
														</div>
													</div>

													<div class="col-sm-12">
														<div class="form-group">
															<label>Deskripsi</label>
															<textarea name="description" class="form-control" required></textarea>
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<label>Image</label>
															<input type="file" name="image"  class="form-control" required>
															<!-- <a href="javascript:void(0);" class="add_button" title="Add field">tambah</a> -->
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label></label>
												<!-- <input type="file" name="image"  class="form-control" required> -->
											</div>
										</div>
										<br>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<input type="submit" class="btn m-blue" value="Simpan Data" name="simpan">
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="dataTable_wrapper">
							<table style="width:100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>No</th>
										<th>@yield('title')</th>
										<th>Deskripsi</th>
										<th>Image</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								@foreach($data as $no => $row)
								<tr class="odd gradeX">
									<td>{{ ++$no }} </td>
									<td>{{ $row->name }}</td>
									<td>{{ $row->description }}</td>
									<td><img src="{{ $row->image }}" width="80px"></td>
									<td class="center">
										<form action="{{ route('internal.floor.status', $row->id, $row->partner_id) }}" method="GET" onSubmit="return validate()"> 
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
											<button type="button" class="btn btn-primary" onclick="window.location='{{ route('internal.block', $row->id, $row->partner_id) }}'">Blok Parkir</button>
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Action
												<span class="caret"></span>
											</button>

											<ul class="dropdown-menu animated flipInX">
												<li><a href="javascript:void(0);" data-toggle="modal" data-target="#detailModal{{ $row->id }}"><i class="zmdi zmdi-zoom-in"></i> Detail</a></li>
												<li><a style="cursor: pointer;" data-toggle="modal" data-target="#editFloor{{ $row->id }}"><i class="zmdi zmdi-edit"></i> Edit</a></li>
												<li><a style="cursor: pointer;" data-href="{{ route('internal.floor.delete', $row->id) }}" data-toggle="modal" data-target="#confirm-delete" ><i class="zmdi zmdi-delete"></i> Delete</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<!-- Modal Edit -->
								<div class="modal fade" id="editFloor{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel"><b>Edit</b> @yield('title')</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="{{ route('internal.floor.update_submit', $row->id) }}" method="POST" enctype="multipart/form-data"> {{csrf_field()}}
													<input type="hidden" name="id" value="{{ $row->id }}">
													<input type="hidden" name="partner_id" value="{{ $row->partner_id }}">
													<div class="form-group">
														<label>Nama</label>
														<input type="text" name="name" value="{{ $row->name }}" class="form-control" required>
													</div>
													<div class="form-group">
														<label>Deskripsi</label>
														<textarea name="description" class="form-control" >{{ $row->description }}</textarea>
													</div>
													<div class="form-group">
														<label>Ganti Image</label>
														<input type="file" name="image"  class="form-control">
													</div>
													<div class="form-group">
														<img src="{{ $row->image }} " width="100%">
													</div>
												</div>
												<br>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<input type="submit" class="btn m-blue" value="Simpan Data" name="simpan">
												</div>
											</div>
										</form>
									</div>
								</div>
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
															<label>Nama :</label>
															<br>{{ $row->name }}
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<label>Deskripsi :</label>
															<br>{{ $row->description }}
														</div>
													</div>
													<div class="col-sm-12">
														<div class="form-group">
															<label>Image :</label>
															<br><img src="{{ $row->image }}" width="90%">
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


<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    var maxField = 20; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.multi-rows'); //Input field wrapper
    var fieldHTML = '<div><div class="col-sm-4"><div class="form-group"><label>Nama</label><input type="text" name="floor[][name]" class="form-control" required></div></div><div class="col-sm-4"><div class="form-group"><label>Deskripsi</label><input type="text" name="floor[][description]" class="form-control" required></div> </div><div class="col-sm-4"><div class="form-group"><label>Image</label><input type="file" name="floor[][image]"  class="form-control" required></div></div><a href="javascript:void(0);" class="remove_button" title="Remove field">Hapus</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
    	e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script> -->
@endif
@endsection