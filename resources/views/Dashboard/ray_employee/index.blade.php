@extends('Dashboard.layouts.master')
@section('title')
   {{ trans('ray.title') }}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('ray.ray') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('ray.employee_list') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                           {{ trans('ray.add_new_employee') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="text-align: center" class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th>{{ trans('ray.id') }}</th>
                                <th>{{ trans('ray.name') }}</th>
                                <th>{{ trans('ray.email') }}</th>
                                <th>{{ trans('ray.created_at') }}</th>
                                <th>{{ trans('ray.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                               @foreach($ray_employees as $ray_employee)
                                   <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{$ray_employee->name}}</td>
                                       <td>{{ $ray_employee->email }}</td>
                                       <td>{{ $ray_employee->created_at->diffForHumans() }}</td>
                                       <td>
                                           <a class="modal-effect btn btn-sm btn-primary" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$ray_employee->id}}"><i class="fas fa-edit"></i></a>
                                           <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$ray_employee->id}}"> <i class="fa fa-trash"></i> </a>
                                       </td>
                                   </tr>

                                   @include('Dashboard.ray_employee.edit')
                                   @include('Dashboard.ray_employee.delete')

                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

    @include('Dashboard.ray_employee.add')
    <!-- /row -->

</div>
<!-- row closed -->

<!-- Container closed -->

<!-- main-content closed -->
@endsection
@section('js')

    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
