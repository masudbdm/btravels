<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
    <title>@yield('title')</title>

		{{-- Default SEO (can be overridden per page) --}}
		<meta name="description" content="@yield('meta_description', ($ws->meta_description ?? $ws->website_title ?? ''))">
		<link rel="canonical" href="@yield('canonical', url()->current())">
		<meta name="robots" content="@yield('meta_robots', 'index,follow')">

		{{-- Open Graph --}}
		<meta property="og:site_name" content="{{ $ws->website_title ?? config('app.name') }}">
		<meta property="og:title" content="@yield('og_title', trim($__env->yieldContent('title')))">
		<meta property="og:description" content="@yield('og_description', trim($__env->yieldContent('meta_description', ($ws->meta_description ?? $ws->website_title ?? ''))))">
		<meta property="og:type" content="@yield('og_type', 'website')">
		<meta property="og:url" content="@yield('og_url', url()->current())">
		<meta property="og:image" content="@yield('og_image', route('imagecache', ['template' => 'original', 'filename' => $ws->logo()]))">

		{{-- Twitter --}}
		<meta name="twitter:card" content="@yield('twitter_card', 'summary_large_image')">
		<meta name="twitter:title" content="@yield('twitter_title', trim($__env->yieldContent('title')))">
		<meta name="twitter:description" content="@yield('twitter_description', trim($__env->yieldContent('meta_description', ($ws->meta_description ?? $ws->website_title ?? ''))))">
		<meta name="twitter:image" content="@yield('twitter_image', route('imagecache', ['template' => 'original', 'filename' => $ws->logo()]))">

		@stack('seo')
		@yield('schema')

        @if($ws->google_analytics_code)
        {!! $ws->google_analytics_code !!}
        @endif

        @if($ws->google_search_console)
        {!! $ws->google_search_console !!}
        @endif
        
        @if($ws->facebook_pixel_code)
        {!! $ws->facebook_pixel_code !!}
        @endif


    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">


		<!-- Favicon -->
		{{-- <link rel="shortcut icon" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
        <link rel="icon" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}" type="image/x-icon"> --}}


        <link rel="apple-touch-icon" sizes="57x57" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="apple-touch-icon" sizes="60x60" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="icon" type="image/png" sizes="192x192"  href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="icon" type="image/png" sizes="96x96" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<link rel="manifest" href="fav/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="{{ route('imagecache', ['template' => 'original', 'filename' => $ws->favicon()]) }}">
		<meta name="theme-color" content="#ffffff">



		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">
        <link href="https://fonts.cdnfonts.com/css/helvetica-neue-9" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('https://www.w3schools.com/w3css/4/w3.css') }}">





		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset("/frontend/vendor/bootstrap/css/bootstrap.min.css")}}">
		<link rel="stylesheet" href="{{asset("/frontend/vendor/fontawesome-free/css/all.min.css")}}">
		<link rel="stylesheet" href="{{asset("/frontend/vendor/animate/animate.compat.css")}}">
		<link rel="stylesheet" href="{{asset("/frontend/vendor/simple-line-icons/css/simple-line-icons.min.css")}}">
		<link rel="stylesheet" href="{{asset("/frontend/vendor/owl.carousel/assets/owl.carousel.min.css")}}">
		<link rel="stylesheet" href="{{asset("/frontend/vendor/owl.carousel/assets/owl.theme.default.min.css")}}">
		<link rel="stylesheet" href="{{asset("/frontend/vendor/magnific-popup/magnific-popup.min.css")}}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset("/frontend/css/theme.css")}}">
		<link rel="stylesheet" href="{{asset("/frontend/css/theme-elements.css")}}">
		<link rel="stylesheet" href="{{asset("/frontend/css/theme-blog.css")}}">


        <!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="{{asset("/frontend/css/skins/default.css")}}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset("/frontend/css/custom.css")}}">

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

		<!-- Head Libs -->
		<script src="{{asset("/frontend/vendor/modernizr/modernizr.min.js")}}"></script>



        <style>



            .container-demo {

                 height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden; /* Prevents overflow */
            }



            /* Ensure the Swiper container has a fixed height */
            .swiper-container {

              width: 100%;



            overflow: hidden; /* Hide overflow to prevent scrollbar */

            }

             .swiper-slide {
                width:100%;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
            }


            .swiper-slide img {
                width: inherit;
                height: auto;
                display: block;
                 object-fit: cover; /* Ensures the image covers the element without distortion */

                border-radius: 20px;
                object-fit: cover;
            }


            .text-container {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                padding-top: 10px;
                padding-bottom: 10px;
                color: white;
                background: rgba(0, 0, 0, .4);
                text-align: center;
                border-radius: 0 0 15px 15px; /* Round the bottom corners to match the image */
            }
            .title {
                font-size: 18px;
                font-weight: bold;
                color: white;
            }
            .subtitle {
                font-size: 14px;
                color: white;
            }

        </style>
        {{-- <style>
            body{
                font-family: 'Helvetica Neue', sans-serif;
            }
        </style> --}}
        @stack('css')




	</head>

	{{-- <body data-plugin-page-transition class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 0, 'effect': 'pulse'}"> --}}
		<body>
		<div class="body">
          @include('frontend::layouts.frontendHeader')
            @include('sweetalert::alert')
            @yield('content')

          @include('frontend::layouts.frontendFooter')
		</div>



			<!-- Vendor -->
		<script src="{{asset("/frontend/vendor/jquery/jquery.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/jquery.appear/jquery.appear.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/jquery.easing/jquery.easing.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/jquery.cookie/jquery.cookie.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/jquery.validation/jquery.validate.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/jquery.gmap/jquery.gmap.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/lazysizes/lazysizes.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/isotope/jquery.isotope.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/owl.carousel/owl.carousel.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/magnific-popup/jquery.magnific-popup.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/vide/jquery.vide.min.js")}}"></script>
		<script src="{{asset("/frontend/vendor/vivus/vivus.min.js")}}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{asset("/frontend/js/theme.js")}}"></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{asset("/frontend/js/views/view.contact.js")}}"></script>

		<!-- Theme Custom -->
		<script src="{{asset("/frontend/js/custom.js")}}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{asset("/frontend/js/theme.init.js")}}"></script>

        <script class="" src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper('.swiper-container', {
                loop: true,
                loopFillGroupWithBlank: false,  /* Fills in the blanks to avoid white spaces */
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 4,  /* Set to show 7 slides at once */
                spaceBetween: 30,  /* Space between slides in pixels */

                breakpoints: {
                    0: {
                        slidesPerView: 1,  /* 1 slide per view on small screens (mobile) */
                        spaceBetween: 20,  /* Smaller space between slides on mobile */
                    },
                    768: {
                        slidesPerView: 4,  /* 3 slides per view on tablets */
                        spaceBetween: 30,
                    },

                },

                coverflowEffect: {
                    rotate: 30,
                    stretch: 5,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,


                },


                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
            });
        </script>

        @stack('scripts')

    </body>

</html>
