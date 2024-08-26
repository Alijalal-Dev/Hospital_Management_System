@extends('Dashboard.layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('title')
{{ trans('Payment.add_new_payment_voucher') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Payment.accounts') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Payment.add_new_payment_voucher') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')

    @include('Dashboard.messages_alert')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('Payment.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="pd-30 pd-sm-40 bg-gray-200">

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label>{{ trans('Payment.patient_name') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                   <select name="patient_id" class="form-control select2" required>
                                      @foreach($Patients as $Patient)
                                           <option value=""></option>
                                           <option value="{{$Patient->id}}">{{$Patient->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label>{{ trans('Payment.amount') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" name="credit" type="number">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label>{{ trans('Payment.description') }}</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success pd-x-30 mg-r-5 mg-t-5">{{ trans('Doctors.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('Dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('Dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('Dashboard/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('Dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('Dashboard/js/form-elements.js')}}"></script>
@endsection
