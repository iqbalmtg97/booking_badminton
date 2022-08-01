@extends ('layouts.master')
@section('tittle', 'Data Lapangan')
@section('kel-lapangan', 'active')
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
            <button type="button" class="btn btn-primary btn-xs btn-labeled btn-rounded"
                data-toggle="modal"data-target="#tambah_lapangan"><b><i class="icon-add"></i></b>Tambah</button>
        </div>

        <table class="table datatable-basiccl" id="myTable">
            <thead>
                <tr>
                    <th>Nama Lapangan</th>
                    <th>Biaya Lapangan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $datas->nama_lapangan }}</td>
                        <td><a href="#">Rp. {{ $datas->biaya_lapangan }} </a></td>
                        <td>
                            <ul class="icons-list">
                                <li class="text-primary-600" data-toggle="modal" data-target="#edit_lapangan">
                                    <a href="#" class="edit_lapangan" onclick="getdata({{ $datas->id }})"
                                        id="{{ $datas->id }}"><i class="icon-pencil7"></i></a>
                                </li>
                                <li class="text-danger-600"><a href="#" class="delete"
                                        nama_lapangan="{{ $datas->nama_lapangan }}" id="{{ $datas->id }}"><i
                                            class="icon-trash"></i></a></li>
                                {{-- <a href="#" class="btn btn-danger delete" namalapangan="{{ $datas->nama_lapangan }}"
                                    id="{{ $datas->id }}">Hapus</a> --}}
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->


    <!-- /form modal tambah -->
    <div class="modal fade" id="tambah_lapangan" tabindex="-1" role="dialog" aria-labelledby="tambah_lapangan"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Lapangan</h5>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/kel-lapangan/store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Lapangan</label>
                            <input type="text" class="form-control" name="nama_lapangan"
                                value="{{ old('nama_lapangan') }}" placeholder="Masukkan Nama Lapangan ..." autofocus>
                            @error('nama_lapangan')
                                <div class="text-danger ml-3 mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Biaya Lapangan</label>
                            <input type="text" class="form-control" name="biaya_lapangan"
                                value="{{ old('biaya_lapangan') }}" placeholder="Masukkan Biaya Lapangan ...">
                            @error('biaya_lapangan')
                                <div class="text-danger ml-3 mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /form modal -->

    <!-- /form modal edit -->
    <div class="modal fade" id="edit_lapangan" tabindex="-1" role="dialog" aria-labelledby="edit_lapangan"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Lapangan</h5>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/kel-lapangan/update') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" id="id" name="id" value="">
                        <input type="hidden" id="url_getdata" name="url_getdata" value="{{ url('getdata/') }}">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Lapangan</label>
                            <input type="text" class="form-control" name="nama_lapangan" id="nama_lapangan"
                                value="{{ old('nama_lapangan') }}" placeholder="Masukkan Nama Lapangan ..." autofocus>
                            @error('nama_lapangan')
                                <div class="text-danger ml-3 mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Biaya Lapangan</label>
                            <input type="text" class="form-control" name="biaya_lapangan" id="biaya_lapangan"
                                value="{{ old('biaya_lapangan') }}" placeholder="Masukkan Biaya Lapangan ...">
                            @error('biaya_lapangan')
                                <div class="text-danger ml-3 mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /form modal -->



    <!-- @push('detail')
        -->
        <!-- Theme JS files -->
        <!-- <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script> -->
        <!-- /theme JS files -->
        <!--
    @endpush -->
@endsection
@section('footer')
    {{-- get data lapangan --}}
    <script>
        function getdata(id) {
            console.log(id)
            var url = $('#url_getdata').val() + '/' + id
            console.log(url);

            $.ajax({
                url: url,
                cache: false,
                success: function(response) {
                    console.log(response);

                    $('#id').val(response.id);
                    $('#nama_lapangan').val(response.nama_lapangan);
                    $('#biaya_lapangan').val(response.biaya_lapangan);
                }
            });
        }

        $('.delete').click(function() {
            var Id = $(this).attr('id');
            var Namalapangan = $(this).attr('nama_lapangan');
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Hapus " + Namalapangan + "?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "/kel-lapangan/destroy/" + Id + "";
                    }
                });
        });
    </script>
@endsection
