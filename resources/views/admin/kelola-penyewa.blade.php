@extends ('layouts.master')
@section('tittle', 'Data Penyewa')
@section('kel-penyewa', 'active')
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

        <table class="table myTable">
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
                        <td>{{ $penyewa->nama }}</td>
                        <td>{{ $penyewa->alamat }}</td>
                        <td>{{ $penyewa->no_hp }}</td>
                        <td>{{ $penyewa->email }}</td>
                        <td>
                            <ul class="icons-list">
                                <li class="text-danger-600 delete" id="{{ $penyewa->id }}" nama="{{ $penyewa->nama }}"><a
                                        href="#"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- /basic datatable -->
@endsection
@section('footer')

    <script>
        $('.delete').click(function() {
            var Id = $(this).attr('id');
            var Nama = $(this).attr('nama');
            Swal.fire({
                    title: 'Yakin?',
                    text: "Mau Hapus " + Nama + "?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                })
                .then((result) => {
                    console.log(result);
                    if (result.value) {
                        window.location = "/kel-penyewa/destroy/" + Id + "";
                    }
                });
        });
    </script>

@endsection
