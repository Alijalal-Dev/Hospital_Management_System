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
					<div class="user-info">
						<h4 class="font-weight-semibold mt-3 mb-0">{{ auth()->user()->name }}</h4>
						<span class="mb-0 text-muted">{{ auth()->user()->email }}</span>
					</div>
				</div>
			</div>
			<ul class="side-menu">
				<li class="side-item side-item-category">{{trans('main-sidebar_trans.Main')}}</li>

				<li class="slide">
					<a class="side-menu__item" href="{{ route('dashboard.laboratorie_employee') }}"><i class="fas fa-home fa-lg" style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;<span class="side-menu__label">{{trans('main-sidebar_trans.index')}}</a>
				</li>

				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">
					<i class="fas fa-book-medical fa-lg" style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;
										<span class="side-menu__label">{{ trans('patient_sidebar.medical_records') }}</span><i class="angle fe fe-chevron-down"></i></a>
					<ul class="slide-menu">
						<li><a class="slide-item" href="{{route('invoices.patient')}}">{{ trans('patient_sidebar.invoices') }}</a></li>
						<li><a class="slide-item" href="{{route('laboratories.patient')}}">{{ trans('patient_sidebar.laboratories') }}</a></li>
						<li><a class="slide-item" href="{{route('rays.patient')}}">{{ trans('patient_sidebar.rays') }}</a></li>
					</ul>
				</li>

				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"> <i class="fas fa-comment-medical fa-lg" style="color: #828997;"></i>&nbsp;&nbsp;&nbsp;<span class="side-menu__label">{{ trans('patient_sidebar.messages') }}</span><i class="angle fe fe-chevron-down"></i></a>
					<ul class="slide-menu">
						<li><a class="slide-item" href="{{route('list.doctors')}}">{{ trans('patient_sidebar.doctors_list') }}</a></li>
						<li><a class="slide-item" href="{{route('chat.doctors')}}">{{ trans('patient_sidebar.recent_chats') }}</a></li>
					</ul>
				</li>

			</ul>
		</div>
</aside>
<!-- main-sidebar -->