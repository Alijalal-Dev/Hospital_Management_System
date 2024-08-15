@extends('Dashboard.layouts.master')
@section('css')
  <!-- Internal Data table css -->
  <link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
  <!--Internal   Notify -->
  <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

@endsection

@section('title')
    {{$section->name}} / {{trans('sections_trans.section_doctors')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{$section->name}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('sections_trans.section_doctors')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('doctors.name')}}</th>
                                <th>{{trans('doctors.email')}}</th>
                                <th>{{trans('doctors.section')}}</th>
                                <th>{{trans('doctors.phone')}}</th>
                                <th>{{trans('doctors.number_of_statements')}}</th>
                                <th>{{trans('doctors.Status')}}</th>
                                <th>{{trans('doctors.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$doctor->name}}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>{{ $doctor->section->name}}</td>
                                <td>{{ $doctor->phone}}</td>
                                <td>{{ $doctor->number_of_statements}}</td>
                                <td>
                                    <div
                                        class="dot-label bg-{{$doctor->status == 1 ? 'success':'danger'}} ml-1"></div>
                                    {{$doctor->status == 1 ? trans('doctors.Enabled'):trans('doctors.Not_enabled')}}
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('doctors.Processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                        <div class="dropdown-menu tx-13">
                                            <a class="dropdown-item" href="{{route('Doctors.edit',$doctor->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password{{$doctor->id}}"><i   class="text-primary ti-key"></i>&nbsp;&nbsp;تغير كلمة المرور</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$doctor->id}}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;تغير الحالة</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$doctor->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @include('Dashboard.Doctors.delete')
                            @include('Dashboard.Doctors.delete_select')
                            @include('Dashboard.Doctors.update_password')
                            @include('Dashboard.Doctors.update_status')
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

    <!-- Internal Data tables -->
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('Dashboard/js/table-data.js')}}"></script>
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
