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
                    @if (Auth::user()->image)
                        <img alt="user-img" class="avatar avatar-xl brround"
                            src="{{ asset('Dashboard/img/doctors/' . Auth::user()->image->filename) }}" />
                    @else
                        <img alt="user-img" class="avatar avatar-xl brround"
                            src="{{ URL::asset('Dashboard/img/faces/logo_user.png') }}">
                    @endif
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">{{ trans('doctor_sidebar.Dr_Dashboard') }}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('dashboard.admin') }}">
                    <i class="fas fa-home fa-lg" style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;
                    <span class="side-menu__label">{{ trans('doctor_sidebar.Main') }}</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fas fa-file-medical fa-lg" style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;
                    <span class="side-menu__label">{{ trans('doctor_sidebar.DoctorStatements') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('invoices.index') }}">{{ trans('doctor_sidebar.DoctorStatementsList') }}</a></li>
                    <li><a class="slide-item" href="{{ route('completedInvoices') }}">{{ trans('doctor_sidebar.CompletedStatements') }}</a></li>
                    <li><a class="slide-item" href="{{ route('reviewInvoices') }}">{{ trans('doctor_sidebar.ReviewStatements') }}</a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fas fa-comment-medical fa-lg" style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;
                    <span class="side-menu__label">{{ trans('doctor_sidebar.Conversations') }}</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('list.patients') }}">{{ trans('doctor_sidebar.PatientsList') }}</a></li>
                    <li><a class="slide-item" href="{{ route('chat.patients') }}">{{ trans('doctor_sidebar.RecentChats') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
