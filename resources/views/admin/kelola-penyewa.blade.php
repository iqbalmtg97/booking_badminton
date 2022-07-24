@extends ('layouts.master')
@section('tittle',"Data Penyewa")
@section('conten')
<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Data Penyewa</h5>
                        
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
                        <button type="button" class="btn btn-primary btn-xs btn-labeled btn-rounded"><b><i class="icon-people"></i></b>Tambah</button>
					</div>

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Job Title</th>
								<th>DOB</th>
								<th>Status</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Marth</td>
								<td><a href="#">Enright</a></td>
								<td>Traffic Court Referee</td>
								<td>22 Jun 1972</td>
								<td><span class="label label-success">Active</span></td>
								<td>
									<ul class="icons-list">
										<li class="text-primary-600" data-toggle="modal"data-target="#modal_form_horizontal"><a href="#"><i class="icon-pencil7"></i></a></li>
										<li class="text-danger-600"><a href="#"><i class="icon-trash"></i></a></li>
										<li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li>
									</ul>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
                
    
                <!-- /form modal -->
                <div id="modal_form_horizontal" class="modal fade">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">Horizontal form</h5>
							</div>

							<form action="#" class="form-horizontal">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">First name</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Eugene" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Last name</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Kopyov" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Email</label>
										<div class="col-sm-9">
											<input type="text" placeholder="eugene@kopyov.com" class="form-control">
											<span class="help-block">name@domain.com</span>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Phone #</label>
										<div class="col-sm-9">
											<input type="text" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999" class="form-control">
											<span class="help-block">+99-99-9999-9999</span>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Address line 1</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Ring street 12, building D, flat #67" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">City</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Munich" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">State/Province</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Bayern" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">ZIP code</label>
										<div class="col-sm-9">
											<input type="text" placeholder="1031" class="form-control">
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit form</button>
								</div>
							</form>
						</div>
					</div>
				</div>
                <!-- /form modal -->
@push('detail')
    <!-- Theme JS files -->
        <script type="text/javascript" src="{{asset('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>

	    <script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
	    <script type="text/javascript" src="{{asset('assets/js/pages/datatables_basic.js')}}"></script>
	<!-- /theme JS files -->
@endpush
@endsection