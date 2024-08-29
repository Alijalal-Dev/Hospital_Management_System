@extends('Dashboard.layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('Dashboard/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('Dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ trans('dashboard_labo.Laboratory Staff Dashboard') }}</h2><br>
                <p class="mg-b-0">{{ trans('dashboard_labo.Welcome Back') }} {{auth()->user()->name}}</p>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0"  style="background-color: #00C2CD;">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"><strong style="font-size: 13.5px;">
                            {{ trans('dashboard_labo.Total Invoices') }}</strong></h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Laboratorie::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0" style="background-color: #01E69F;">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"><strong style="font-size: 13.5px;">
                            {{ trans('dashboard_labo.Pending Invoices') }}</strong></h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Laboratorie::where('case',0)->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0" style="background-color: #00C6C9;">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"><strong style="font-size: 13.5px;">
                            {{ trans('dashboard_labo.Completed Invoices') }}</strong></h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Laboratorie::where('case',1)->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->

    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h2 class="card-title mb-1">{{ trans('dashboard_labo.Last 5 Invoices') }}</h2>
                </div><br>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('dashboard_labo.Invoice Date') }}</th>
                            <th>{{ trans('dashboard_labo.Patient Name') }}</th>
                            <th>{{ trans('dashboard_labo.Doctor Name') }}</th>
                            <th>{{ trans('dashboard_labo.Required') }}</th>
                            <th>{{ trans('dashboard_labo.Invoice Status') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse(\App\Models\Laboratorie::latest()->take(5)->get() as $invoice )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td class="tx-right tx-medium tx-inverse">{{$invoice->created_at}}</td>
                                <td class="tx-right tx-medium tx-danger">{{$invoice->patient->name}}</td>
                                <td class="tx-right tx-medium tx-inverse">{{$invoice->doctor->name}}</td>
                                <td class="tx-right tx-medium tx-danger">{{$invoice->description}}</td>
                                <td class="tx-right tx-medium tx-inverse">
                                    @if($invoice->case == 0)
                                        <span class="badge badge-danger">{{ trans('dashboard_labo.Pending') }}</span>
                                    @else
                                        <span class="badge badge-success">{{ trans('dashboard_labo.Completed') }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            {{ trans('dashboard_labo.No Data Available') }}
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
</div>
<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('Dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('Dashboard/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('Dashboard/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('Dashboard/js/index.js')}}"></script>
<script src="{{URL::asset('Dashboard/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
