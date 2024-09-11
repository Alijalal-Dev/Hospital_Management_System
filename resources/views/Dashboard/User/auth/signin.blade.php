@extends('Dashboard.layouts.master2')
@section('css')

    <style>
        .panel {display: none;}
    </style>


    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <img src="{{URL::asset('Dashboard/img/login2.jpg')}}" class="my-auto" alt="logo" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"><img src="{{URL::asset('Dashboard/img/brand/logohospital3.png')}}" class="sign-favicon" style="height: 80px; width: auto;"  alt="logo"></div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{ trans('signin.Welcome') }}</h2>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">{{ trans('signin.Select_Enter') }}</label>
                                                <select class="form-control" id="sectionChooser">
                                                    <option value="" selected disabled>{{ trans('signin.Choose_list') }}</option>
                                                    <option value="user">{{ trans('signin.user') }}</option>
                                                    <option value="admin">{{ trans('signin.admin') }}</option>
                                                    <option value="doctor">{{ trans('signin.doctor') }}</option>
                                                    <option value="ray_employee">{{ trans('signin.ray_employee') }}</option>
                                                    <option value="laboratorie_employee">{{ trans('signin.laboratorie_employee') }}</option>
                                                </select>
                                            </div>


                                            {{--form user--}}
                                            <div class="panel" id="user">
                                                <h2>{{ trans('signin.patient_login') }}</h2>
                                                <form method="POST" action="{{ route('login.patient') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('signin.email') }}</label>
                                                        <input class="form-control" placeholder="{{ trans('signin.email') }}" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('signin.password') }}</label>
                                                        <input class="form-control" placeholder="{{ trans('signin.password') }}" type="password" name="password" required autocomplete="current-password">
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">{{ trans('signin.sign_in') }}</button>

                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">{{ trans('signin.forgot_password') }}</a></p>
                                                </div>
                                            </div>

                                            {{--form admin--}}
                                            <div class="panel" id="admin">
                                                <h2>{{ trans('signin.admin_login') }}</h2>
                                                <form method="POST" action="{{ route('login.admin') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('signin.email') }}</label>
                                                        <input class="form-control" placeholder="{{ trans('signin.email') }}" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('signin.password') }}</label>
                                                        <input class="form-control" placeholder="{{ trans('signin.password') }}" type="password" name="password" required autocomplete="current-password">
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">{{ trans('signin.sign_in') }}</button>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">{{ trans('signin.forgot_password') }}</a></p>
                                                </div>
                                            </div>

                                            {{--form doctor--}}
                                            <div class="panel" id="doctor">
                                                <h2>{{ trans('signin.doctor_login') }}</h2>
                                                <form method="POST" action="{{ route('login.doctor') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('signin.email') }}</label>
                                                        <input class="form-control" placeholder="{{ trans('signin.email') }}" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('signin.password') }}</label>
                                                        <input class="form-control" placeholder="{{ trans('signin.password') }}" type="password" name="password" required autocomplete="current-password">
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">{{ trans('signin.sign_in') }}</button>

                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">{{ trans('signin.forgot_password') }}</a></p>
                                                </div>
                                            </div>

                                            {{--form ray_employee--}}
                                            <div class="panel" id="ray_employee">
                                                <h2>{{ trans('signin.ray_employee_login') }}</h2>
                                                <form method="POST" action="{{ route('login.ray_employee') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('signin.email') }}</label>
                                                        <input class="form-control" placeholder="{{ trans('signin.email') }}" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('signin.password') }}</label>
                                                        <input class="form-control" placeholder="{{ trans('signin.password') }}" type="password" name="password" required autocomplete="current-password">
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">{{ trans('signin.sign_in') }}</button>

                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">{{ trans('signin.forgot_password') }}</a></p>
                                                </div>
                                            </div>

                                            {{--form laboratorie_employee--}}
                                            <div class="panel" id="laboratorie_employee">
                                                <h2>{{ trans('signin.laboratorie_employee_login') }}</h2>
                                                <form method="POST" action="{{ route('login.laboratorie_employee') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('signin.email') }}</label>
                                                        <input class="form-control" placeholder="{{ trans('signin.email') }}" type="email" name="email" :value="old('email')" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('signin.password') }}</label>
                                                        <input class="form-control" placeholder="{{ trans('signin.password') }}" type="password" name="password" required autocomplete="current-password">
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">{{ trans('signin.sign_in') }}</button>

                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">{{ trans('signin.forgot_password') }}</a></p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')


    <script>
        $('#sectionChooser').change(function(){
            var myID = $(this).val();
            $('.panel').each(function(){
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
