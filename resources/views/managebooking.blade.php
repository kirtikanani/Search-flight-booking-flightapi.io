@extends('layouts.main')

@section('contente')

<div class="ManageBookingLogin">
    <div class="container">
        <div class="login_container">
            <div class="row">
                <div class="col-md-6">
                    <div class="ManageBookingLogin_column">
                        <form action="{{url('/booking-reference')}}" method="POST">
                            @isset($error)
                            <div class="alert alert-danger">{{$error}} </div>
                            @endisset
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="ManageBookingLogin_form">
                                <h4>Manage your booking</h4>
                                <p>If you have an existing booking with us please enter your booking details below
                                    to get tailored advice</p>
                            </div>
                            <div class="ctl_title ctl_second_int queted_mark_icon ">
                                <label for="title_a1">Booking reference</label>
                                <input type="text" name="reference_id" placeholder="Booking reference">
                                @error('reference_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="que_svg_sec">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="TextInput_tooltip__icon__AEbY3">
                                        <path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3M12 17h.01"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ctl_title ctl_second_int ">
                                <label for="title_a1">Email address</label>
                                <input type="text" name="email" placeholder="Email address">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button class="login_btn_botom " type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ManageBookingLogin_column__WZ_Ss">
                        <svg xmlns="http://www.w3.org/2000/svg" width="560" height="500" viewBox="0 0 560 500"
                            fill="none" preserveAspectRatio="xMidYMid slice"
                            class="ManageBookingLogin_contrails__X4M_O">
                            <mask id="contrails_svg__mask0_2154:1422" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                x="0" y="0" width="560" height="500">
                                <path fill="url(#contrails_svg__paint0_linear_2154:1422)" d="M0 0h560v500H0z">
                                </path>
                                <path fill="#2563EB" d="M0 0h560v500H0z"></path>
                            </mask>
                            <g mask="url(#contrails_svg__mask0_2154:1422)">
                                <path fill="url(#contrails_svg__paint1_linear_2154:1422)" d="M0 0h560v500H0z">
                                </path>
                                <path fill="#2563EB" d="M0 0h560v500H0z"></path>
                                <circle cx="560" r="120" stroke="#000" stroke-opacity="0.05" stroke-width="60">
                                </circle>
                                <circle cx="-15" cy="233" r="120" stroke="#000" stroke-opacity="0.05" stroke-width="60">
                                </circle>
                                <g filter="url(#contrails_svg__filter0_f_2154:1422)">
                                    <rect x="180" y="-136" width="200" height="200" rx="100" fill="#fff"></rect>
                                </g>
                            </g>
                            <defs>
                                <linearGradient id="contrails_svg__paint0_linear_2154:1422" x1="280" y1="0" x2="280"
                                    y2="500" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#2563EB"></stop>
                                    <stop offset="1" stop-color="#154FCE"></stop>
                                </linearGradient>
                                <linearGradient id="contrails_svg__paint1_linear_2154:1422" x1="280" y1="0" x2="280"
                                    y2="500" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#2563EB"></stop>
                                    <stop offset="1" stop-color="#154FCE"></stop>
                                </linearGradient>
                                <filter id="contrails_svg__filter0_f_2154:1422" x="-70" y="-386" width="700"
                                    height="700" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                    <feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
                                    <feGaussianBlur stdDeviation="125" result="effect1_foregroundBlur_2154:1422">
                                    </feGaussianBlur>
                                </filter>
                            </defs>
                        </svg>
                        <div class="ManageBookingLogin_slider__a2Gaz">
                            <div class="slider_caption_kvRMc">
                                <h4>Benefits of manage my booking</h4>
                            </div>
                            <div class="manage_carousel_wrap">

                                <div class="container_1">
                                    <div class="owl-carousel owl-theme carousel-main">
                                        <div class="your_itinerary_wrap">
                                            <h4>Your itinerary</h4>
                                            <p>Review, download and print your itinerary</p>
                                        </div>
                                        <div class="your_itinerary_wrap">
                                            <h4>Select your seat</h4>
                                            <p>Review, download and print your itinerary</p>
                                        </div>
                                        <div class="your_itinerary_wrap">
                                            <h4>Download your e-tickets</h4>
                                            <p>Review, download and print your itinerary</p>
                                        </div>
                                        <div class="your_itinerary_wrap">
                                            <h4>Need to cancel?</h4>
                                            <p>Review, download and print your itinerary</p>
                                        </div>
                                        <div class="your_itinerary_wrap">
                                            <h4>Your invoice</h4>
                                            <p>Review, download and print your itinerary</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('jsfile')
<script>
 setTimeout(function() {
    $(".alert-danger").slideUp(1000, function() {
    $(this).remove();
    }); 
   }, 5000);  
   
    jQuery('.carousel-main').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 1500,
        nav: true,
        dots: true,
        navText: ['<span class="fas fa-chevron-left fa-3x"></span>', '<span class="fas fa-chevron-right fa-3x"></span>'],
    })
</script>
@endsection