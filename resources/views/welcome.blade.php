@extends('WebSite.layouts.master')

@section('content')
    <!-- Main Slider Three -->
    <section class="main-slider-three" id="master">
        <div class="banner-carousel">
            <!-- Swiper -->
            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <div class="auto-container">
                        <div class="row clearfix">

                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <h2> {{ trans('frontend.title') }}</h2>
                                    <div class="text">
                                        {{ trans('frontend.title2') }}
                                    </div>
                                    <div class="btn-box">
                                        <a href="#appointment-form" class="theme-btn services-btn"><span
                                                class="txt">{{ trans('frontend.book_appointment') }}</span></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="image">
                                        <img src="{{ URL::asset('WebSite/images/main-slider/3.png') }}" alt="" />
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End Main Slider -->

    <!-- Health Section -->
    <section class="health-section" id="about-us">
        <div class="auto-container">
            <div class="inner-container">

                <div class="row clearfix">

                    <!-- Content Column -->
                    <div class="content-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="border-line"></div>
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <h2>{{ trans('frontend.about') }}</h2>
                                <div class="separator"></div>
                            </div>
                            <div class="text">{{ trans('frontend.description') }}&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="image-column col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="{{ URL::asset('WebSite/images/imageweb1.jpg') }}" alt="" />
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- End Health Section -->

    <!-- Featured Section -->
    <section class="featured-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon flaticon-doctor-stethoscope"></div>
                            <h3><a href="#">{{ trans('frontend.Medical Treatment') }}</a></h3>
                        </div>
                    </div>
                </div>

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon flaticon-ambulance-side-view"></div>
                            <h3><a href="#">{{ trans('frontend.Emergency Assistance') }}</a></h3>
                        </div>
                    </div>
                </div>

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon fas fa-user-md"></div>
                            <h3><a href="#"> {{ trans('frontend.Qualified Doctors') }}</a></h3>
                        </div>
                    </div>
                </div>

                <!-- Feature Block -->
                <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="750ms" data-wow-duration="1500ms">
                        <div class="upper-box">
                            <div class="icon fas fa-briefcase-medical"></div>
                            <h3><a href="#">{{ trans('frontend.Medical Professionals') }}</a></h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Featured Section -->
    @php
        $sections = \App\Models\Section::with('doctors')->get();
    @endphp

    <!-- Department Section Three -->
    <section class="department-section-three" id="section">
        <div class="image-layer" style="background-image:url(images/background/6.jpg)"></div>
        <div class="auto-container">
            <!-- Department Tabs-->
            <div class="department-tabs tabs-box">
                <div class="row clearfix">
                    <!--Column-->
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <!-- Sec Title -->
                        <div class="sec-title light">
                            <h2>{{ trans('frontend.sections') }}</h2>
                            <div class="separator"></div>
                        </div>
                        <!--Tab Btns-->
                        <ul class="tab-btns tab-buttons clearfix">
                            @foreach ($sections as $section)
                                @php
                                    $slug = Str::slug($section->name, '-');
                                @endphp
                                <li data-tab="#tab-{{ $slug }}"
                                    class="tab-btn {{ $loop->first ? 'active-btn' : '' }}">
                                    {{ $section->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--Column-->
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <!--Tabs Container-->
                        <div class="tabs-content">
                            @foreach ($sections as $section)
                                @php
                                    $slug = Str::slug($section->name, '-');
                                @endphp
                                <div class="tab {{ $loop->first ? 'active-tab' : '' }}" id="tab-{{ $slug }}">
                                    <div class="content">
                                        <h2>{{ $section->name }}</h2>
                                        <div class="text">
                                            <p>{{ $section->description }}</p>
                                        </div>
                                    </div>
                                    <div class="doctors">
                                        <h3>{{ trans('frontend.Doctors') }}</h3>
                                        <ul>
                                            @foreach ($section->doctors as $doctor)
                                                <li>{{ $doctor->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Department Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">

            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ trans('frontend.Specialists') }}</h2>
                <div class="separator"></div>
            </div>

            <div class="row clearfix">



            </div>

        </div>
    </section>
    <!-- End Team Section -->


    <!-- Appointment Section Two -->
    <section class="appointment-section-two">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <img src="Website/images/appt2.jpg" alt="" />
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12" id="appointment-form">
                        <div class="inner-column">
                            <!-- Sec Title -->
                            <div class="sec-title">
                                <h2>{{ trans('frontend.Appointment') }}</h2>
                                <div class="separator"></div>
                            </div>

                            <!-- Appointment Form -->
                            <div class="appointment-form">
                                <livewire:appointments.create />
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section Two -->
    <section class="testimonial-section-two" id="patients">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>{{ trans('frontend.patient_comment') }}</h2>
                <div class="separator"></div>
            </div>
            <div class="testimonial-carousel owl-carousel owl-theme">

                <!-- Tesimonial Block Two - Arabic -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="images/resource/author-1.jpg" alt="" />
                        </div>
                        <div class="text">
                            لقد كان المركز الطبي ممتازًا في تقديم الرعاية. تلقيت استشارة طبية فورية وكاملة. أشكر الطاقم على
                            جهودهم واحترافيتهم. أوصي بشدة بخدماتهم.
                        </div>
                        <div class="lower-box">
                            <div class="clearfix">
                                <div class="pull-right">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-left">
                                    <div class="author-info">
                                        <h3>محمد العلوي</h3>
                                        <div class="author">مريض السكري</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tesimonial Block Two - Arabic -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="images/resource/author-2.jpg" alt="" />
                        </div>
                        <div class="text">
                            الخدمة في هذا المركز الطبي كانت رائعة. تم الاعتناء بي بطريقة ممتازة من اللحظة التي دخلت فيها.
                            الشكر الجزيل لكل الأطباء والممرضين.
                        </div>
                        <div class="lower-box">
                            <div class="clearfix">
                                <div class="pull-right">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-left">
                                    <div class="author-info">
                                        <h3>فاطمة الزهراء</h3>
                                        <div class="author">مريضة القلب</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tesimonial Block Two - English -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="images/resource/author-3.jpg" alt="" />
                        </div>
                        <div class="text">
                            The hospital provided outstanding service during my visit. I was attended to promptly and
                            professionally. My thanks go to the entire staff for their dedication and care.
                        </div>
                        <div class="lower-box">
                            <div class="clearfix">
                                <div class="pull-right">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-left">
                                    <div class="author-info">
                                        <h3>Sarah Johnson</h3>
                                        <div class="author">Cardiology Patient</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tesimonial Block Two - English -->
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="images/resource/author-4.jpg" alt="" />
                        </div>
                        <div class="text">
                            I had an excellent experience at the medical center. The care I received was thorough and
                            efficient. I am grateful to the doctors and nurses for their professionalism and compassion.
                        </div>
                        <div class="lower-box">
                            <div class="clearfix">
                                <div class="pull-right">
                                    <div class="quote-icon flaticon-quote"></div>
                                </div>
                                <div class="pull-left">
                                    <div class="author-info">
                                        <h3>John Doe</h3>
                                        <div class="author">General Patient</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Testimonial Section Two -->

    <!-- Counter Section -->
    <section class="counter-section style-two" style="background-image: url(images/background/pattern-3.png); height:100px" id="contact">
        <div class="auto-container">

            <!-- Fact Counter -->
            <div class="fact-counter style-two">
                <div class="row clearfix">

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <i class="fas fa-hospital-user" style="color: #ffffff; font-size: 3rem;"></i>&nbsp;&nbsp;
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="2500" data-stop="2350">0</span>
                                </div>
                                <h4 class="counter-title">{{ trans('frontend.satisfied_patients') }}</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="content">
                                <i class="fas fa-user-doctor" style="color: #ffffff; font-size: 3rem;"></i>&nbsp;&nbsp;
                                <div class="count-outer count-box alternate">
                                    +<span class="count-text" data-speed="3000" data-stop="350">0</span>
                                </div>
                                <h4 class="counter-title">{{ trans('frontend.medical_team') }}</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="content">
                                <i class="fas fa-circle-check" style="color: #ffffff; font-size: 3rem;"></i>&nbsp;&nbsp;
                                <div class="count-outer count-box">
                                    <span class="count-text" data-speed="3000" data-stop="2150">0</span>
                                </div>
                                <h4 class="counter-title">{{ trans('frontend.successful_missions') }}</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">
                            <div class="content">
                                <i class="fas fa-syringe" style="color: #ffffff; font-size: 3rem;"></i>&nbsp;&nbsp;
                                <div class="count-outer count-box">
                                    +<span class="count-text" data-speed="2500" data-stop="225">0</span>
                                </div>
                                <h4 class="counter-title">{{ trans('frontend.successful_surgeries') }}</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Section -->
                    <div class="row clearfix" style="margin-top: 20px; color: white;">
                        <div class="contact-list d-flex align-items-center">
                            <ul class="contact-list d-flex align-items-center"
                                style="list-style: none; padding: 0; margin: 0; flex-wrap: wrap;">
                                <li style="margin-right: 20px;">
                                    <span class="icon flaticon-placeholder" style="color: white;"></span>
                                    {{ trans('frontend.address') }}<br>
                                    CA 94117-1080 {{ trans('frontend.usa') }}
                                </li>
                                <li style="margin-right: 20px;">
                                    <span class="icon flaticon-call" style="color: white;"></span>
                                    {{ trans('frontend.working_hours') }}<br>
                                    <a href="tel:+898-68679-575-09" style="color: white;">+898 68679 575 09</a>
                                </li>
                                <li style="margin-right: 20px; margin-Bottom: 21px;">
                                    <span class="icon flaticon-message" style="color: white;"></span>
                                    {{ trans('frontend.have_question') }}
                                    <a href="mailto:info@gmail.com" style="color: white;"> info@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
