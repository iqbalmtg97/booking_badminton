@extends ('layouts.master')
@section('tittle', 'Dashboard')
@section('conten')
    <!-- Quick stats boxes -->
<div class="row">
    <div class="col-lg-6">
    <div class="row">
        <div class="col-lg-4">

            <!-- Members online -->
            <div class="panel bg-teal-400">
                <div class="panel-body">
                    <div class="heading-elements">
                        <span class="heading-text badge bg-teal-800">+53,6%</span>
                    </div>

                    <h3 class="no-margin">3,450</h3>
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
                <div class="panel-body">
                    <div class="heading-elements">
                        <span class="heading-text badge bg-teal-800">+53,6%</span>
                    </div>
                        <h3 class="no-margin">49.4%</h3>
                        Total Lapanagn
                </div>

                <div id="server-load"></div>
            </div>
            <!-- /current server load -->

        </div>

        <div class="col-lg-4">

            <!-- Today's revenue -->
            <div class="panel bg-blue-400">
                <div class="panel-body">
                    <div class="heading-elements">
                        <span class="heading-text badge bg-teal-800">+53,6%</span>
                    </div>

                    <h3 class="no-margin">$18,390</h3>
                        Total Booking
                </div>

                <div id="today-revenue"></div>
            </div>
            <!-- /today's revenue -->

        </div>
    </div>
    </div>
    <div class="col-lg-6">
        
    </div>
</div>
    
    <!-- /quick stats boxes -->
@endsection
