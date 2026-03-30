    {{-- @if (isset($homePage))
    <div style="" class="m-0 p-0">@foreach ($homePage->activePageItems() as $item){!! $item->description !!}@endforeach</div>
    @endif --}}


    <style>
        .image-container {
            text-align: center;
        }

        .rotateImg {
            height: 100px;
            transition: transform 1.0s ease;
        }

        .rotateImg:hover {
            transform: rotate(-360deg);
        }
    </style>


    <section id="blog" class="section section-no-border bg-color-light m-0 p-0" style="background-color: #f9f2e9!important">
        <div class="container ml-2 mr-2" style="padding-top: 60px; padding-bottom:60px;">
            <h1 class="text-center font-weight-bold w3-xxlarge"><b>Service</b></h1>
            <div class="row">

                <div class="col-md-3 text-center <?php echo (!Agent::isDesktop()) ? 'order-3' : ''; ?>">
                    <div class="image-container pb-sm-2 pb-md-5">
                        <img src="{{ asset('img/visa.png') }}" alt="" class="rotateImg"
                            style="height:70px; width:70px">
                    </div>
                    @if ($visa_page)
                        <span class="h4">
                            <a
                                href="https://bayyinahhajjnumrah.com/page/{{ $visa_page->id }}/{{ $visa_page->page_type }}">Visa</a>
                        </span>
                    @else
                        <span class="h4">Visa</span>
                    @endif
                    <p class="mt-3">Our expert visa services ensure a smooth and hassle-free process for your Hajj, Umrah. From document preparation to final approval, we handle everything with care and precision, making your journey stress-free from the start.</p>
                </div>
                <div class="col-md-3 text-center <?php echo (!Agent::isDesktop()) ? 'order-4' : ''; ?>">
                    <div class="image-container pb-sm-2 pb-md-5">
                        <img src="{{ asset('img/ticket.png') }}" alt="" class="rotateImg"
                            style="height:70px; width:70px">
                    </div>
                    @if ($ticket_page)
                        <span class="h4">
                            <a
                                href="https://bayyinahhajjnumrah.com/page/{{ $ticket_page->id }}/{{ $ticket_page->page_type }}">Ticket</a>
                        </span>
                    @else
                        <span class="h4">Ticket</span>
                    @endif
                    <p class="mt-3">Secure your flights with ease through our reliable ticketing services. Whether for Hajj, Umrah, we offer competitive rates and seamless booking options to ensure a smooth and stress-free travel experience</p>
                </div>
                <div class="col-md-3 text-center <?php echo (!Agent::isDesktop()) ? 'order-1' : ''; ?>">
                    <div class="image-container pb-sm-2 pb-md-5">
                        <img src="{{ asset('img/umrah.png') }}" alt="" class="rotateImg"
                            style="height:70px; width:70px">
                    </div>
                    @if ($umrah_page)
                        <span class="h4">
                            {{-- <a href="https://bayyinahhajjnumrah.com/page/29/umrah-page">Umrah</a> --}}
                            <a
                                href="https://bayyinahhajjnumrah.com/page/{{ $umrah_page->id }}/{{ $umrah_page->page_type }}">Umrah</a>

                        </span>
                    @else
                        <span class="h4">Umrah</span>
                    @endif

                    <p class="mt-3">Embark on a spiritually fulfilling journey with our tailored Umrah packages. From flights and accommodation to ground transportation, we provide comprehensive services designed to ensure a peaceful and well-organized pilgrimage, allowing you to focus solely on your worship.</p>
                </div>
                <div class="col-md-3 text-center <?php echo (!Agent::isDesktop()) ? 'order-2' : ''; ?>">
                    <div class="image-container pb-sm-2 pb-md-5">
                        <img src="{{ asset('img/hajj.png') }}" alt="" class="rotateImg"
                            style="height:70px; width:70px">
                    </div>
                    @if ($hajj_page)
                        <span class="h4">
                            <a
                                href="https://bayyinahhajjnumrah.com/page/{{ $hajj_page->id }}/{{ $hajj_page->page_type }}">Hajj</a>
                            {{-- <a href="https://bayyinahhajjnumrah.com/page/28/hajj-package">Hajj</a> --}}
                        </span>
                    @else
                        <span class="h4">Hajj</span>
                    @endif
                    <p class="mt-3">Experience the spiritual journey of a lifetime with Bayyinah Travels. Our comprehensive Hajj packages offer a seamless and unforgettable experience, ensuring you fulfill your religious obligations while immersing yourself in the rich history and culture of the Holy Land.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="blog" class="section section-no-border bg-color-light m-0 p-0">
        <article class="container" style="padding-top: 40px; padding-bottom:40px;">
            <div class="row align-items-center">
                @php
                    $locale = session('locale', 'en'); // Default to 'en' if not set
                @endphp
                @if ($locale == 'en')
                    <div class="col-xl-6 order-xl-last mb-5 mt-0  mb-xl-0 ">
                        <h1 class="text-7 font-weight-bold mb-2"
                            @if (Agent::isDesktop()) style="margin-top: -190px !important;" @endif>BAYYINAH
                            TRAVELS <br> UMRAH &amp; HAJJ SERVICE
                        </h1>
                        <h3 class="text-5 font-weight-bold mb-2" style="color:#0F964A">We are among the 5% of companies you can trust.</h3>
                        <p class="text-justify">
                            Bayyinah Travels established in July 2024.
                            Aiming to
                            provide a
                            <em>comprehensive and all-in-one experience</em> for individuals undertaking the holy
                            pilgrimage
                            of
                            Hajj and
                            Umrah from any city in Bangladesh.
                        </p>
                        <div class="row text-center">
                            <div class="col-4 mb-5">
                                <span class="text-8 counter" data-count="10">3+</span> <br>
                                <span class="text-4"><a href="#"> Consultant </a></span>
                            </div>
                            <div class="col-4 mb-5">
                                <span class="text-8">5+</span> <br>
                                <span class="text-4"><a href="#">Umrah<br> Guides</a></span>
                            </div>
                            <div class="col-4 mb-5">
                                <span class="text-8">2</span> <br>
                                <span class="text-4"><a href="#">Office in<br> Dhaka</a></span>
                            </div>
                        </div>
                    </div>
                @elseif ($locale == 'bn')
                    <div class="col-xl-6 order-xl-last mb-5 mb-xl-0">
                        <h1 class="text-7 font-weight-bold mb-2"
                            @if (Agent::isDesktop()) style="margin-top: -190px !important;" @endif><b>বায়্যিনাহ
                                ট্রাভেলস <br> উমরাহ এবং হজ্জ সার্ভিস </b></h1>
                        <h3 class="text-5 font-weight-bold mb-2" style="color: #0F964A">আপনি বিশ্বাস করতে পারেন এমন 5% কোম্পানির মধ্যে আমরা আছি।</h3>

                        <p>
                            বায়্যিনাহ ট্রাভেলস ২০২৪ সালের জুলাই মাসে প্রতিষ্ঠিত হয়েছিল।
                            বাংলাদেশের যেকোনো শহর থেকে পবিত্র হজ এবং ওমরাহ পালনকারী ব্যক্তিদের জন্য একটি ব্যাপক এবং
                            সর্বাত্মক অভিজ্ঞতা অর্জনের লক্ষ্য।
                        </p>
                        <div class="row text-center">
                            <div class="col-sm-4 col-md-4 sm-box mb-5 mb-md-0">
                                <span class="text-8 counter" data-count="10">১০+</span> <br>
                                <span class="text-4"><a href="#">শরীয়াহ <br> পরামর্শদাতা</a></span>
                            </div>
                            <div class="col-sm-4 col-md-4 sm-box">
                                <span class="text-8"> ২০+</span> <br>
                                <span class="text-4"><a href="#">ওমরাহ<br> গাইড</a></span>
                            </div>
                            <div class="col-sm-4 col-md-4 sm-box">
                                <span class="text-8">2</span> <br>
                                <span class="text-4"><a href="#">ঢাকায়<br> অফিস</a></span>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-6 d-flex justify-content-center">
                    <img class="img-fluid w3-round" src="{{ asset('img/side-image-final.png') }}"
                        alt="Best Umrah Agency in Dhaka Bangladesh">
                </div>

            </div>
        </article>
    </section> <br>

    <section class="section section-no-border bg-color-light m-0" style="background-color: #f9f2e9!important">
        @include('frontend::welcome.page_part.home_package_part')
    </section>

    <section class="section bg-color-grey-scale-1 section-height-3 section-no-border mb-3"
        style="background-color: #ffffff!important">
        @if (Agent::isDesktop())
          
            <div class="w3-display-container w3-card-" style="width:100%">
                <div class="pin"></div>
                <div class="pin2"></div>
                <div class="mapimage">
                    <img class="" style="width: 100%;" src="{{ asset('img/scribblemaps.png') }}"
                        alt="">
                </div>
                <div class="w3-white w3-display-left w3-card-4" id="googlemapsAnimatedPin"
                    style="width:50%;height:50%;  border-radius: 0px 50px 50px 0px; padding:70px">
                    <h3 class="text-7">Bayyinah Travels Service Area</h3>
                    <p class="text-justify">Find your nearby travels agency associated with Bayyinah Travels
                        Bangladesh. Identify the trusted Umrah & Hajj agents in your area and get in touch with them to
                        facilitate your next holy journey to <b>Makkah</b> and <b>Madina</b>.</p>
                </div>
            </div>
        @endif


       
        @if (Agent::isMobile())
            <div class="container">
                <div class="w3-card w3-white p-3 w3-round-xlarge w3-card-4">
                    <h3 class="text-5">Bayyinah Travels Service Area</h3>
                    <p>Find your nearby travels agency associated with Bayyinah Travels Bangladesh. Identify the trusted
                        Umrah & Hajj agents in your area and get in touch with them to facilitate your next holy journey
                        to <b>Makkah</b> and <b>Madina</b>.</p>
                </div>
                <img class="mt-5 w3-round-xlarge" style="width: 100%; " src="{{ asset('img/map.png') }}"
                    alt="">
            </div>
        @endif
    </section>


    <section class="section section-no-border bg-color-light m-0" style="background-color: #f9f2e9!important">
    <div class="container" style="padding-top: 30px; Padding-bottom: 30px;">
        <div class="row">
            <h3 class="w3-xlarge fontweight bold">Guided Tours & Experiences</h3>
            

            <div class="col-md-3">
                @if (Cp\Tour\Models\Tour::whereActive(true)->count() > 3)
                <a class="text-decoration-none custom-hover-underline w3-btn w3-text-black w3-round-xxlarge text-uppercase custom-btn-style-1 text-3 w3-center" href="{{ route('allGuidedTours') }}"
                style="background-color: #ffc265">{{ translate('All Guided Tours') }}</a>
                @endif
            </div>
        </div>
        <div class="row mt-4 d-flex">
            @foreach ($tours as $tour)
            <div class="col-sm-4 d-flex mb-3">
                <div class="card shadow-lg flex-fill" style="border-radius: 20px;">
                    <a href="{{ route('tourGuideDetails',  $tour->id) }}">
                    <img src="{{ route('imagecache', ['template' => 'HajjPackage', 'filename' => $tour->fi()]) }}"
                        alt="" class="img-fluid" style="border-radius: 20px 20px 0 0"/>
                    </a>
                    <div class="card-body pb-3 px-2 pt-2" >
                        <a href="{{ route('tourGuideDetails',  $tour->id) }}" class="text-decoration-none">
                        <i class="fas fa-map-marker-alt w3-small"></i>&nbsp;<span class="text-dark font-weight-bold">{{ $tour->location_name}}</span>
                        <h4 class="mt-1 mb-0">{{ $tour->title }}</h3>
                        </a>
                    </a>
                        
                    </div>
                    <div class="card-footer text-center" style="background-color: #FFFFFF!important">
                        <div class="theme-btn mt-1 mb-1">
                            <a class="text-decoration-none font-weight-bold custom-hover-underline w3-btn w3-text-black w3-round-xxlarge text-uppercase custom-btn-style-1 text-3 px-5"
                            href="{{asset('page/2/contact-us')}}" style="background-color: #ffc265";>
                                Book Now
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>

    <section class="section- section-height-3 section-no-border" >
        <div class="container py-5">
            <div class="row">
                <div class="col mb-4 mb-lg-0">
                    @includeIf('frontend::welcome.includes.questionAnswersPart')
                </div>
            </div>
            <div class="pt-3 text-center">
                <a href="{{ route('questionAnswerAll') }}"
                    class="w3-btn w3-white w3-border w3-border-blue w3-round text-primary text-decoration-none w3-large"
                    style="width: 300px"><b>{{ translate('See All') }}</b></a>
            </div>

        </div>
    </section>

    <section id="blog" class="section section-no-border bg-color-light m-0 p-0" style="background-color: #f9f2e9!important">
        <div class="container pt-1">
            <div class="row mt-4">
                <div class="col">
                    <h2 class="text-color-quaternary text-center font-weight-extra-bold text-uppercase text-8 mt-4">
                        {{ translate('Latest Blogs') }}</h2>
                    <div class="row">
                        @foreach ($blogPosts as $post)
                            <div class="col-lg-6 mt-4 mb-lg-0">
                                <article class="thumb-info custom-thumb-info-2 custom-box-shadow-1">
                                    <div class="thumb-info-wrapper">
                                        <a
                                            href="{{ route('singlePost', ['id' => $post->id, 'slug' => $post->slug]) }}">
                                            <img src="{{ route('imagecache', ['template' => 'cplg', 'filename' => $post->fi()]) }}"
                                                alt class="img-fluid" />
                                        </a>
                                    </div>
                                    <div class="thumb-info-caption">
                                        <div class="thumb-info-caption-text">
                                            <h4 class="mb-2">
                                                <a href="{{ route('singlePost', ['id' => $post->id, 'slug' => $post->slug]) }}"
                                                    class="text-decoration-none text-color-dark font-weight-semibold">
                                                    {{ Str::limit($post->localeTitleShow(), 80, '...') }}
                                                </a>
                                            </h4>
                                            <p class="custom-text-color-2 text-justify">
                                                {{ Str::limit($post->localeExcerptShow(), 120, '...') }}
                                            </p>
                                        </div>

                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 pt-4 mt-0 pb-4 text-center">
                    <a class="w3-btn w3-text-black w3-round-xxlarge btn-danger text-uppercase custom-btn-style-1 text-4"
                        href="{{ asset('/') }}blog"
                        style="background-color: #ffc265">{{ translate('All Blogs') }}</a>
                </div>
            </div>
        </div>
    </section>

  



  
