@extends('layouts.admin')
@section('title','Kategori')
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
						<div class="pull-left" style="margin-bottom: 15px;">
							<a data-toggle="modal" data-target="#addModal" class="btn btn-primary" title="Tambah Data">Tambah Data</a>
						</div>

						<!-- Modal Add -->
						<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel"><b>Tambah</b> @yield('title')</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="{{ route('internal.category.create_submit') }}" method="POST" enctype="multipart/form-data"> {{csrf_field()}}
											<div class="form-group">
												<label>Nama</label>
												<input type="text" name="name" class="form-control" required>
											</div>
											<div class="form-group">
												<label>Type</label><br>
												<input type="radio" name="type" id="optionsRadiosInline1" value="partner" checked>Partner
												<input type="radio" name="type" id="optionsRadiosInline1" value="news">News
											</div>
											<div class="form-group">
												<label>Icon</label>
												<input type="text" name="icon" class="form-control" required>
											</div>
											<div class="form-group">
												<label>Deskripsi</label>
												<textarea name="description"  class="form-control"  required></textarea>
											</div>
											<div class="form-group">
												<label>Image</label>
												<input type="file" name="image"  class="form-control" required>
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
										<th>Nama @yield('title')</th>
										<th>Type @yield('title')</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								@foreach($data as $no => $row)
								<tr class="odd gradeX">
									<td>{{ ++$no }} </td>
									<td>{{ $row->name }}</td>
									<td>{{ $row->type }}</td>
									<td class="center">
										<form action="{{ route('internal.category.status', $row->id) }}" method="GET" onSubmit="return validate()"> 
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
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Action
												<span class="caret"></span>
											</button>

											<ul class="dropdown-menu animated flipInX">
												<li><a href="javascript:void(0);" data-toggle="modal" data-target="#detailModal{{ $row->id }}"><i class="zmdi zmdi-zoom-in"></i> Detail</a></li>
												<li><a style="cursor: pointer;" data-toggle="modal" data-target="#editModal{{ $row->id }}"><i class="zmdi zmdi-edit"></i> Edit</a></li>
												<li><a style="cursor: pointer;" data-href="{{ route('internal.category.delete', $row->id) }}" data-toggle="modal" data-target="#confirm-delete" ><i class="zmdi zmdi-delete"></i> Delete</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<!-- Modal Edit -->
								<div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel"><b>Edit</b> @yield('title')</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="{{ route('internal.category.update_submit', $row->id) }}" method="POST" enctype="multipart/form-data"> {{csrf_field()}}
													<input type="hidden" name="id" value="{{ $row->id }}">
													<div class="form-group">
														<label>Nama</label>
														<input type="text" name="name" value="{{ $row->name }}" class="form-control" required>
													</div>
													<div class="form-group">
														<label>Type</label><br>
														<input type="radio" name="type" id="optionsRadiosInline1" value="partner" {{ $a = ($row->type=='partner')?'checked':''}}>Partner
														<input type="radio" name="type" id="optionsRadiosInline1" value="news" {{ $b = ($row->type=='news')?'checked':''}}>News
													</div>
													<div class="form-group">
														<label>Icon</label>
														<input type="text" name="icon" value="{{ $row->icon }}" class="form-control" required>
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

													<div class="col-sm-6">
														<div class="form-group">
															<label>Type</label>
															<br>{{ $row->type }}
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label>Icon :</label>
															<br>{{ $row->icon }}
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
@endif
@endsection