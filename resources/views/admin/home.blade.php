@extends('layouts.admin')
@section('content')
<main>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-header">Dashboard</h1>
				<ol class="breadcrumb">
					<li class="active"> <i class="zmdi zmdi-circle"></i> Dashboard
					</li>
				</ol>
			</div>
		</div>


		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Launch demo modal
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-3 col-md-6">
				<div class="panel panel-red">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="zmdi zmdi-comment-outline zmdi-hc-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><a href="javascript:void(0);" title="View Details" target="_blank" class="counter">686</a></div>
								<div>New Comments!</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-md-6">
				<div class="panel m-green">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="zmdi zmdi-view-day zmdi-hc-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><a href="javascript:void(0);" title="View Details" target="_blank" class="counter">456</a></div>
								<div>New Tasks!</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-md-6">
				<div class="panel m-teal">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="zmdi zmdi-shopping-basket zmdi-hc-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><a href="javascript:void(0);" title="View Details" target="_blank" class="counter">226</a></div>
								<div>New Orders!</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-md-6">
				<div class="panel m-purple">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="zmdi zmdi-border-color zmdi-hc-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><a href="javascript:void(0);" title="View Details" target="_blank" class="counter">279</a></div>
								<div>Support Tickets!</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
</main>
@endsection