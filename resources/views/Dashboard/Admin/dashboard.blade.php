@extends('Dashboard.layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('Dashboard/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('Dashboard/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <style>
        .chart-container,
        .list-group {
            height: 100%;
        }

        .card-dashboard-eight {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ trans('Traduction.Admin_Dashboard') }}</h2>
            </div>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <label class="tx-13">عدد الخدمات المفردة</label>
                <h5>{{ \App\Models\Service::count() }}</h5>
            </div>
            <div>
                <label class="tx-13">عدد الخدمات المجمعة</label>
                <h5>{{ \App\Models\Group::count() }}</h5>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0" style="background-color: #00C2CD;">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">
                            <strong style="font-size: 13.5px;">{{ trans('Traduction.Number_of_Patients') }}</strong>
                        </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ App\Models\Patient::count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0" style="background-color: #02D9B0;">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"><strong style="font-size: 13.5px;">
                                {{ trans('Traduction.Number_of_Doctors') }}</strong></h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ App\Models\Doctor::count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0" style="background-color: #00C6C9;">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"><strong style="font-size: 13.5px;">
                                {{ trans('Traduction.Number_of_Radiology_Staff') }}</strong></h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ App\Models\RayEmployee::count() }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0" style="background-color: #01E69F;">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"><strong
                                style="font-size: 13.5px;">{{ trans('Traduction.Number_of_Examination_Staff') }}</strong>
                        </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    {{ App\Models\LaboratorieEmployee::count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm d-flex align-items-stretch">
        <!-- Chart Container -->
        <div class="col-md-12 col-lg-12 col-xl-7 d-flex align-items-stretch">
            <div class="card card-dashboard-eight pb-2 w-100">
                <div class="chart-container" style="height: 100%;"> <!-- Full height of the card -->
                    <h4 class="text-center">{{ trans('Traduction.Confirmed_Appointments_per_Day') }}</h4>
                    <canvas id="appointmentsChart" style="height: 100%;"></canvas>
                </div>
            </div>
        </div>

        <!-- Insurance List Container -->
        <div class="col-md-12 col-lg-4 col-xl-5 d-flex align-items-stretch">
            <div class="card card-dashboard-eight pb-2 w-100">
                <h4 class="text-center">{{ trans('Traduction.Insurance_companies') }}</h4>
                <span class="d-block mg-b-10 text-muted tx-12">{{ trans('Traduction.Insurance_Status') }}</span>
                <div class="list-group" style="max-height: 300px; overflow-y: auto;">
                    @foreach ($insurances as $insurance)
                        <div class="list-group-item border-top-0">
                            <p>{{ $insurance->name }}</p>
                            <span
                                style="color: {{ $insurance->status == 1 ? '#02D9B0' : '#F89C0E' }}">{{ $insurance->status == 1 ? 'مفعل' : 'غير مفعل' }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <!-- row closed -->
    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Prepare the data
        var dates = @json($dates); // Pass the dates array
        var counts = @json($counts); // Pass the counts array
        console.log(counts)
        // Create the chart
        var ctx = document.getElementById('appointmentsChart').getContext('2d');
        var appointmentsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Confirmed Appointments',
                    data: counts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            }

        });
    </script>


    <script>
        // Example data for charts
        var ctx1 = document.getElementById('patientChart').getContext('2d');
        var patientChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Admissions',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            }
        });
    </script>
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('Dashboard/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('Dashboard/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('Dashboard/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('Dashboard/js/index.js') }}"></script>
    <script src="{{ URL::asset('Dashboard/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
