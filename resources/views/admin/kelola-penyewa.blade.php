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
                        <button type="button" class="btn btn-primary btn-xs btn-labeled btn-rounded" data-toggle="modal"data-target="#modal_form_horizontal"><b><i class="icon-add"></i></b>Tambah</button>
					</div>

						<table class="table" id="myTable">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Email</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($penyewas as $penyewa)
							<tr>
								<td>{{$penyewa->nama}}</td>
								<td>{{$penyewa->alamat}}</td>
								<td>{{$penyewa->no_hp}}</td>
								<td>{{$penyewa->email}}</td>
								<td>
									<ul class="icons-list">
										<li class="text-primary-600" data-toggle="modal"data-target="#modal_form_horizontal"><a href="#"><i class="icon-pencil7"></i></a></li>
										<li class="text-danger-600"><a href="#"><i class="icon-trash"></i></a></li>
										<li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li>
									</ul>
								</td>
							</tr>
						@endforeach
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
								<h5 class="modal-title">Tambah Penyewa</h5>
							</div>

							<form action="#" class="form-horizontal">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Nama anda" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Alamat</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Alamat anda" class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Telepon</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Nomor handphone anda" data-mask="0812345678901" class="form-control">
											<span class="help-block">0812345678901</span>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Email</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Email anda" class="form-control">
											<span class="help-block">nama@gmail.com</span>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Password</label>
										<div class="col-sm-9">
											<input type="password" placeholder="eugene@kopyov.com" class="form-control">
											<!-- <span class="help-block">name@domain.com</span> -->
										</div>
									</div>

									<div class="form-group">
									<label class="control-label col-lg-3">Single select</label>
									<div class="col-lg-9">
										<select name="select" class="form-control">
		                                    <option value="opt1">Admin</option>
		                                    <option value="opt2">User</option>
		                                </select>
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


@endsection