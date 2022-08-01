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
                    <th>Nama</th>
                    <th>Lapangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Durasi</th>
                    <th>Biaya</th>
                    <th>Bukti Bayar</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $datas->user->nama }}</td>
                        <td>{{ $datas->lapangan->nama_lapangan }}</td>
                        <td>{{ $datas->tanggal }}</td>
                        <td>{{ $datas->jam }}</td>
                        <td>{{ $datas->durasi }} Jam</td>
                        <td>
                            @php
                                $durasi = $datas->durasi;
                                echo $biaya = $durasi * 50000;
                            @endphp
                        </td>
                        <td>
                            @if ($datas->bukti_bayar != null)
                                <img style="height: 120px; width: 90px; object-fit: cover; object-position: center;"
                                    class="card-img-top" src="{{ asset('images/' . $datas->bukti_bayar) }}" alt="">
                            @else
                                <a href="#" onclick="getdatas({{ $datas->id }})"
                                    class="btn btn-secondary btn-xs upload" data-toggle="modal" data-target="#upload">Upload
                                    Disini</a>
                            @endif
                        </td>
                        @if ($datas->status == 'Dalam Proses')
                            <td><span class="label label-warning">{{ $datas->status }}</span></td>
                        @elseif ($datas->status == 'Disetujui')
                            <td><span class="label label-success">{{ $datas->status }}</span></td>
                        @else
                            <td><span class="label label-danger">{{ $datas->status }}</span></td>
                        @endif
                        <td>
                            <ul class="icons-list">
                                <li class="text-danger-600"><a href="#" class="batal" id="{{ $datas->id }}"
                                        lapangan="{{ $datas->lapangan->nama_lapangan }}"><i class="icon-trash"></i></a>
                                </li>
                                <li class="text-teal-600"><a href="#"><i class="icon-cog7"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

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
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="url_getdata" id="url_getdata" value="{{ url('getdatas/') }}">
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

    <!-- /form modal -->
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
                                @foreach ($lapangan as $lap)
                                    <select name="lapangan_id" class="form-control" id="">
                                        <option value="">--Pilih Lapangan--</option>
                                        <option value="{{ $lap->id }}" {{ old('lapangan_id') ? 'selected' : '' }}>
                                            {{ $lap->nama_lapangan }}
                                        </option>
                                    </select>
                                @endforeach
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
        function getdatas(id) {
            console.log(id)
            var url = $('#url_getdata').val() + '/' + id
            console.log(url);

            $.ajax({
                url: url,
                cache: false,
                success: function(response) {
                    console.log(response);

                    $('#id').val(response.id);
                    // $('#bukti_bayar').val(response.bukti_bayar);
                }
            });
        }

        $('.batal').click(function() {
            var Id = $(this).attr('id');
            var Lapangan = $(this).attr('lapangan');
            // Swal.fire({
            //         title: 'Yakin?',
            //         text: "Mau Batal Booking di " + Lapangan + "?",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yakin',
            //         cancelButtonText: 'Tidak',
            //     })
            Swal.fire({
                    title: 'Yakin Mau Batal Booking di "+Lapangan+"?',
                    input: 'Tulis Alasan Pembatalan Booking',
                    inputLabel: 'Alasan',
                    inputValue: inputValue,
                    showCancelButton: true,
                    inputValidator: (value) => {
                        if (!value) {
                            return 'You need to write something!'
                        }
                    }
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "/kel-booking/batal/" + Id + "";
                    }
                });
        });
    </script>
@endsection
