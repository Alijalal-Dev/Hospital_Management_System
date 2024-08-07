<div class="main-sidemenu">
    <div class="app-sidebar__user clearfix">
        <div class="dropdown user-pro-body">
            <div class="">
                <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('Dashboard/img/faces/logo_user.png')}}">
            </div>
            <div class="user-info">
                <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li class="side-item side-item-category">{{trans('main-sidebar_trans.Main')}}</li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('dashboard.admin') }}"><i class="fas fa-home fa-lg"  style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;<span class="side-menu__label">{{trans('main-sidebar_trans.index')}}</a>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fas fa-clipboard-list fa-lg" style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;<span class="side-menu__label">{{trans('main-sidebar_trans.sections')}}</span><i class="angle fe fe-chevron-down"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('Sections.index') }}">{{trans('main-sidebar_trans.view_all')}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fas fa-user-doctor fa-lg" style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;
                <span class="side-menu__label">{{trans('main-sidebar_trans.doctors')}}</span><i class="angle fe fe-chevron-down"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('Doctors.index') }}">{{trans('main-sidebar_trans.view_all')}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fas fa-tty fa-lg"  style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;<span class="side-menu__label">{{trans('main-sidebar_trans.Services')}}</span><i class="angle fe fe-chevron-down"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{route('Service.index')}}">{{trans('main-sidebar_trans.Single_service')}}</a></li>
                <li><a class="slide-item" href="{{ route('Add_GroupServices') }}">{{trans('main-sidebar_trans.group_services')}}</a></li>
                <li><a class="slide-item" href="{{ route('insurance.index') }}">{{trans('main-sidebar_trans.Insurance')}}</a></li>
                <li><a class="slide-item" href="{{route('Ambulance.index')}}">{{trans('main-sidebar_trans.ambulance')}}</a></li>
                <li><a class="slide-item" href="{{ url('/' . $page='calendar') }}">{{trans('main-sidebar_trans.Ambulance_calls')}}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fas fa-hospital-user fa-lg"  style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;<span class="side-menu__label">{{ trans('main-sidebar_trans.Patients') }}</span><i class="angle fe fe-chevron-down"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{route('Patients.create')}}">{{ trans('main-sidebar_trans.Add_Patient') }}</a></li>
                <li><a class="slide-item" href="{{ route('Patients.index') }}">{{ trans('main-sidebar_trans.Patient_List') }}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fas fa-file-invoice fa-lg" style="color: #828997;" ></i>&nbsp;&nbsp;&nbsp;<span class="side-menu__label">{{ trans('main-sidebar_trans.Invoices') }}</span><i class="angle fe fe-chevron-down"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('single_invoices') }}">{{ trans('main-sidebar_trans.Single_Invoice') }}</a></li>
        <li><a class="slide-item" href="{{ route('group_invoices') }}">{{ trans('main-sidebar_trans.Group_Invoice') }}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fas fa-file-invoice-dollar fa-lg" style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;<span class="side-menu__label">{{ trans('main-sidebar_trans.Accounts') }}</span><i class="angle fe fe-chevron-down"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('Receipt.index') }}">{{ trans('main-sidebar_trans.Receipt') }}</a></li>
                <li><a class="slide-item" href="{{ route('Payment.index') }}">{{ trans('main-sidebar_trans.Payment') }}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                <i class="fas fa-x-ray fa-lg" style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;<span class="side-menu__label">{{ trans('main-sidebar_trans.Rays') }}</span><i class="angle fe fe-chevron-down"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('ray_employee.index') }}"> {{ trans('main-sidebar_trans.Rays_employee_List') }}</a></li>
                <li><a class="slide-item" href="{{ url('/' . $page='form-advanced') }}"> {{ trans('main-sidebar_trans.Rays_List') }}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fas fa-flask-vial " style="color: #828997;"></i>
                &nbsp;&nbsp;&nbsp;<span class="side-menu__label">{{ trans('main-sidebar_trans.Medical_Tests') }}</span><i class="angle fe fe-chevron-down"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('laboratorie_employee.index') }}"> {{ trans('main-sidebar_trans.Medical_employee_list') }}</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fas fa-calendar-check fa-lg" style="color: #828997;"></i>
                &nbsp;&nbsp;&nbsp;   <span class="side-menu__label">{{ trans('main-sidebar_trans.Appointments') }}</span><i class="angle fe fe-chevron-down"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="{{ route('appointments.index') }}">{{ trans('main-sidebar_trans.Appointment_List') }}</a></li>
                <li><a class="slide-item" href="{{ route('appointments.index2') }}">{{ trans('main-sidebar_trans.Confirmed_Appointments') }}</a></li>
                <li><a class="slide-item" href="{{ route('appointments.index3') }}">{{ trans('main-sidebar_trans.Completed_Appointments') }}</a></li>
            </ul>
        </li>
    </ul>
</div>
