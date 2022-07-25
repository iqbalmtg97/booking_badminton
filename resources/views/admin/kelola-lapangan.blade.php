@extends ('layouts.master')
@section('tittle',"Data Lapangan")
@section('conten')
<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title">Data Lapangan</h5>
                        
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

					<div class="panel-body">
                        <button type="button" class="btn btn-primary btn-xs btn-labeled btn-rounded" data-toggle="modal"data-target="#modal_form_horizontal"><b><i class="icon-"></i></b>Tambah</button>
					</div>

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>Nama Lapangan</th>
								<th>Nama Lapangan</th>
								<th>Nama Lapangan</th><th>Nama Lapangan</th>
								<th>Biaya Lapangan</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Lapangan A</td>
								<td>Lapangan A</td>
								<td>Lapangan A</td><td>Lapangan A</td>
								<td><a href="#">50.000</a></td>
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
                
    
                <!-- /form modal tambah -->
                <div id="modal_form_horizontal" class="modal fade">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">Tambah Lapangan</h5>
							</div>

							<form action="#" class="form-horizontal">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Laapangan</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Eugene" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Biaya Lapangan</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Kopyov" class="form-control">
										</div>
									</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
                <!-- /form modal -->

				<!-- /form modal edit -->
                <div id="modal_form_horizontal" class="modal fade">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">Tambah Lapangan</h5>
							</div>

							<form action="#" class="form-horizontal">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Laapangan</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Eugene" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Biaya Lapangan</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Kopyov" class="form-control">
										</div>
									</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
                <!-- /form modal -->
<!-- @push('detail') -->
    <!-- Theme JS files -->
        <!-- <script type="text/javascript" src="{{asset('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>

	    <script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
	    <script type="text/javascript" src="{{asset('assets/js/pages/datatables_basic.js')}}"></script> -->
	<!-- /theme JS files -->
<!-- @endpush -->
@endsection