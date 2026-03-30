<section class="py-5" style="background-color: #f9f2e9!important">
    @php
        use Cp\Gallery\Models\Gallery;
        $galleries = Gallery::whereActive(true)->latest()->get();
    @endphp
    <div class="text-center">
        <h1 class="w3-xlarge pb-0">
            <b>
                <a href="{{ route('gallery') }}" style="color: inherit; text-decoration: none;">Gallery</a>
            </b>
        </h1>
        <p class="">Expand your travel horizons with new facets! Explore the world by choosing your ideal <br> travel destinations in Asia, Europe, America, Australia and more with bayyinah travels.</p>
    </div>
    <div class="container-demo">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($galleries as $gallery)
                    <div class="swiper-slide">
                        <img
                            class=""
                            src="{{ route('imagecache', ['template' => 'original', 'filename' => $gallery->fi()]) }}"
                            alt="{{ $gallery->title ?? 'Gallery Image' }}"
                        >
                    </div>
                @endforeach

                @if ($galleries->isEmpty())
                <div class="swiper-slide">

                    <img class=""
                        src="{{asset('img/slider/slider1.jpg')}}"
                        alt="Image 1">

               

                </div>
                <div class="swiper-slide">

                    <img class=""
                        src="{{asset('img/slider/slider2.jpg')}}"
                        alt="Image 2">


                </div>
                <div class="swiper-slide">

                    <img class=""
                        src="{{asset('img/slider/slider3.jpg')}}"
                        alt="Image 3">


                </div>

                <div class="swiper-slide">

                    <img class=""
                        src="{{asset('img/slider/slider4.jpg')}}"
                        alt="Image 1">


                </div>
                <div class="swiper-slide">

                    <img class=""
                        src="{{asset('img/slider/slider5.jpg')}}"
                        alt="Image 2">

                   

                </div>

                <div class="swiper-slide">

                    <img class=""
                        src="{{asset('img/slider/slider6.jpg')}}"
                        alt="Image 2">

                   

                </div>

                <div class="swiper-slide">

                    <img class=""
                        src="{{asset('img/slider/slider7.jpg')}}"
                        alt="Image 2">

                 

                </div>

                <div class="swiper-slide">

                    <img class=""
                        src="{{asset('img/slider/slider8.jpg')}}"
                        alt="Image 2">

                   

                </div>



                @endif

                <!-- Add more slides as needed -->
            </div>

            <div style="padding-top: 40px !important; "></div>

            <!-- Add Pagination (optional) -->
            <div class="swiper-pagination"></div>

        </div>

    </div>


</section>


