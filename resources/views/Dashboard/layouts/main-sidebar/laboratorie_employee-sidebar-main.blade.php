<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'index')) }}">
            <img src="{{ URL::asset('Dashboard/img/brand/logohospital3.png') }}" class="main-logo" alt="logo">
        </a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}">
            <img src="{{ URL::asset('Dashboard/img/brand/logo_hospital.png') }}" class="logo-icon" alt="logo">
        </a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('Dashboard/img/faces/logo_user.png')}}">
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ auth()->user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">{{trans('dashboard_labo.index')}}</li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('dashboard.laboratorie_employee') }}">
                    <i class="fas fa-home fa-lg"  style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;
                    <span class="side-menu__label">{{trans('dashboard_labo.Main')}}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
                    <i class="fas fa-flask-vial " style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;
                    <span class="side-menu__label">{{trans('dashboard_labo.Radiology Reports')}}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('invoices_laboratorie_employee.index') }}">{{trans('dashboard_labo.Reports List')}}</a></li>
                    <li><a class="slide-item" href="{{route('completed_invoices')}}">{{trans('dashboard_labo.Completed Reports List')}}</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
