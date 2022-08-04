@extends ('layouts.master')
@section('tittle', 'Dashboard')
@section('dashboard', 'active')
@section('conten')
    <!-- Quick stats boxes -->
    <div class="row">
        {{-- <div class="col-lg-12"> --}}
        <div class="row">
            <div class="col-lg-4">

                <!-- Members online -->
                <div class="panel bg-teal-400">
                    <div class="panel-body text-center">

                        <h3 class="no-margin">{{ App\Models\User::where('role', 'User')->get()->count() }}</h3>
                        Total Penyewa
                    </div>

                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->

            </div>

            <div class="col-lg-4">

                <!-- Current server load -->
                <div class="panel bg-pink-400">
                    <div class="panel-body text-center">
                        <h3 class="no-margin">{{ App\Models\Lapangan::all()->count() }}</h3>
                        Total Lapangan
                    </div>

                    <div id="server-load"></div>
                </div>
                <!-- /current server load -->

            </div>

            <div class="col-lg-4">

                <!-- Today's revenue -->
                <div class="panel bg-blue-400">
                    <div class="panel-body text-center">
                        <h3 class="no-margin">{{ App\Models\Booking::all()->count() }}</h3>
                        Total Booking
                    </div>

                    <div id="today-revenue"></div>
                </div>
                <!-- /today's revenue -->

            </div>
        </div>
    </div>
    {{-- <div class="col-lg-6"> --}}

    </div>
    </div>

    <!-- /quick stats boxes -->
@endsection
