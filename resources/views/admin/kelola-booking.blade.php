@extends ('layouts.master')
@section('tittle', 'Data Booking')
@section('conten')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Data Booking</h5>

            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        @if (auth()->user()->role == 'Admin')
        @else
            <div class="panel-body">
                <button type="button" data-toggle="modal"data-target="#tambahbooking"
                    class="btn btn-primary btn-xs btn-labeled btn-rounded"><b><i class="icon-people"></i></b>Booking
                    Sekarang</button>
            </div>
        @endif

        <table class="table datatable-basic" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lapangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Durasi</th>
                    <th>Biaya</th>
                    <th>Bukti Bayar</th>
                    <th>Status</th>
                    <th class="text-center">Pembatalan Booking</th>
                    @if (auth()->user()->role == 'Admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $datas->lapangan->nama_lapangan }}</td>
                        <td>{{ $datas->tanggal }}</td>
                        <td>{{ $datas->jam }}</td>
                        <td>{{ $datas->durasi }} Jam</td>
                        <td>Rp.
                            @php
                                $durasi = $datas->durasi;
                                $harga = $datas->lapangan->biaya_lapangan;
                                $biaya = $durasi * $harga;
                                echo $biaya;
                            @endphp
                        </td>
                        <td>
                            @if (auth()->user()->role == 'User')
                                @if ($datas->bukti_bayar != null)
                                    <img style="height: 120px; width: 90px; object-fit: cover; object-position: center;"
                                        class="card-img-top" src="{{ asset('images/' . $datas->bukti_bayar) }}"
                                        alt="">
                                @else
                                    <a href="#" onclick="getdatas({{ $datas->id }})"
                                        class="btn btn-secondary btn-xs upload" data-toggle="modal"
                                        data-target="#upload">Upload
                                        Disini</a>
                                @endif
                            @else
                                @if ($datas->bukti_bayar != null)
                                    <img style="height: 120px; width: 90px; object-fit: cover; object-position: center;"
                                        class="card-img-top" src="{{ asset('images/' . $datas->bukti_bayar) }}"
                                        alt="">
                                @else
                                    Belum Ada Bukti Bayar
                                @endif
                            @endif
                        </td>
                        @if (auth()->user()->role == 'User')
                            @if ($datas->alasan_batal == '')
                                @if ($datas->status == 'Disetujui')
                                    <td><span class="label label-success">{{ $datas->status }}</span></td>
                                @elseif ($datas->status == 'Dalam Proses')
                                    <td><span class="label label-warning">{{ $datas->status }}</span></td>
                                @else
                                    <td><span class="label label-danger">{{ $datas->status }}</span></td>
                                @endif
                            @else
                                <td><span class="label label-warning">Pengajuan Pembatalan</span></td>
                            @endif
                        @else
                            @if ($datas->alasan_batal == '')
                                @if ($datas->status == 'Disetujui')
                                    <td><a href="#"><span class="label label-success">{{ $datas->status }}</span></a>
                                    </td>
                                @elseif ($datas->status == 'Dalam Proses')
                                    <td><a href="#"><span class="label label-warning">{{ $datas->status }}</span></a>
                                    </td>
                                @else
                                    <td><a href="#"><span class="label label-danger">{{ $datas->status }}</span></a>
                                    </td>
                                @endif
                            @else
                                <td><a href="#"><span class="label label-warning">Pengajuan Pembatalan</span></a></td>
                            @endif
                        @endif

                        @if ($datas->alasan_batal == null)
                            <td>
                                <ul class="icons-list">
                                    {{-- <li class="text-danger-600"><a href="#" class="batal" id="{{ $datas->id }}"
                                        lapangan="{{ $datas->lapangan->nama_lapangan }}"><i class="icon-trash"></i></a>
                                </li>
                                <li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li> --}}
                                    <a href="#" onclick="getdatas({{ $datas->id }})" data-toggle="modal"
                                        data-target="#batal" class="btn btn-danger btn-sm">Batalkan Booking Lapangan</a>
                                </ul>
                            </td>
                        @else
                            <td><button disabled class="btn btn-success btn-sm">Terima Kasih</button>
                            </td>
                        @endif
                        @if (auth()->user()->role == 'Admin')
                            <td>
                                <ul class="icons-list">
                                    <li class="text-danger-600"><a href="#" class="hapus"
                                            id="{{ $datas->id }}"><i class="icon-trash"></i></a></li>
                                </ul>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

    {{-- modal batal booking --}}
    <div id="batal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Alasan Pembatalan Booking Lapangan</h5>
                </div>

                <form action="{{ url('/kel-booking/batal') }}" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id_batal" value="">
                    <input type="hidden" name="url_getdata" id="url_getdata" value="{{ url('getdata/') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Alasan Pembatalan</label>
                            <div class="col-sm-9">
                                <input name="alasan_batal" id="alasan_batal" type="text" class="form-control"
                                    value="">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal upload --}}
    <div id="upload" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Upload Bukti Bayar</h5>
                </div>

                <form action="{{ url('/kel-booking/update') }}" class="form-horizontal" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id_buktibayar" value="">
                    <input type="hidden" name="url_getdata" id="url_getdatas" value="{{ url('getdatas/') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Bukti Bayar</label>
                            <div class="col-sm-9">
                                <input name="bukti_bayar" id="bukti_bayar" type="file" class="form-control"
                                    value="">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /form modal Booking Lapangan -->
    <div id="tambahbooking" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Booking Lapangan</h5>
                </div>

                <form action="{{ url('/kel-booking/store') }}" class="form-horizontal" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" value="Dalam Proses">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" class="form-control">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Lapangan</label>
                            <div class="col-sm-9">
                                <select name="lapangan_id" class="form-control" id="">
                                    <option value="">--Pilih Lapangan--</option>
                                    @foreach ($lapangan as $lap)
                                        <option value="{{ $lap->id }}" {{ old('lapangan_id') ? 'selected' : '' }}>
                                            {{ $lap->nama_lapangan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nama_lapangan')
                                    <div class="text-danger ml-3 mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control">
                                @error('tanggal')
                                    <div class="text-danger ml-3 mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Jam</label>
                            <div class="col-sm-9">
                                <input name="jam" type="time" value="{{ old('jam') }}" class="form-control">
                                @error('jam')
                                    <div class="text-danger ml-3 mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Durasi</label>
                            <div class="col-sm-9">
                                <select name="durasi" class="form-control" value="">
                                    <option value="">--Pilih Durasi--</option>
                                    <option value="1" {{ old('durasi') ? 'selected' : '' }}>1 Jam</option>
                                    <option value="2" {{ old('durasi') ? 'selected' : '' }}>2 Jam</option>
                                    <option value="3" {{ old('durasi') ? 'selected' : '' }}>3 Jam</option>
                                    <option value="4" {{ old('durasi') ? 'selected' : '' }}>4 Jam</option>
                                    <option value="5" {{ old('durasi') ? 'selected' : '' }}>5 Jam</option>
                                </select>
                                @error('durasi')
                                    <div class="text-danger ml-3 mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label class="control-label col-sm-3">Biaya</label>
                            <div class="col-sm-9">
                                <input name="biaya" type="number" value="{{ old('biaya') }}" placeholder="Biaya"
                                    class="form-control" disabled>
                                @error('biaya')
                                    <div class="text-danger ml-3 mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- <div class="form-group">
                            <label class="control-label col-sm-3">Bukti Bayar</label>
                            <div class="col-sm-9">
                                <input name="bukti_bayar" type="file" class="form-control">
                            </div>
                        </div> --}}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /form modal -->
    @push('detail')
        <!-- Theme JS files -->
        <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
        <!-- /theme JS files -->
    @endpush

@endsection
@section('footer')
    <script>
        // function getdata(id) {
        //     console.log(id)
        //     var url = $('#url_getdata').val() + '/' + id
        //     console.log(url);

        //     $.ajax({
        //         url: url,
        //         cache: false,
        //         success: function(response) {
        //             console.log(response);

        //             $('#id_batal').val(response.id);
        //         }
        //     });
        // }

        function getdatas(id) {
            console.log(id)
            var url = $('#url_getdatas').val() + '/' + id
            console.log(url);

            $.ajax({
                url: url,
                cache: false,
                success: function(response) {
                    console.log(response);

                    $('#id_buktibayar').val(response.id);
                    $('#id_batal').val(response.id);
                }
            });
        }

        $('.hapus').click(function() {
            var Id = $(this).attr('id');
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Hapus Data Booking ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Tidak',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "/kel-booking/hapus/" + Id + "";
                    }
                });
        });
    </script>
@endsection
