@extends('frontend::layouts.frontendMaster')
@section('title', "Tour Guide Details")

@section('content')

<div role="main" class="main">
    <div role="main" class="main">
        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 class="text-dark w3-xlarge"><strong>Tour Guide Details</strong></h1>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <div class="container">
        <div class="row pt-5">
           <div class="col-md-9">
                <div class="card" style="min-height: 600px">
                    <div class="card-body">
                        <div class="blog-posts single-post">

                            <article class="post post-large blog-single-post border-0 m-0 p-0">
                                <div class="post-content ms-0">

                                    <h2 class="font-weight-semi-bold"><a href="">{{ $tour->title }}</a></h2>

                                     <br>
                                    <img style="width: 100%" src="{{ route('imagecache', ['template' => 'pnimd', 'filename' => $tour->fi()]) }}" alt="">

                                    
                                    <i class="fas fa-map-marker-alt w3-small pt-3"></i>&nbsp;<span class="text-dark font-weight-bold">{{ $tour->location_name}}</span>
                                    <p style="white-space:pre-wrap;" class="pt-0">{!! $tour->description !!}</p>

                                    
                                </div>
                            </article>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
               <div class="card">
                    <div class="card-header text-dark font-weight-bold">
                        Loaction: {{ $tour->location_name }}
                    </div>
                    <div class="card-body p-0 shadow-lg rounded">
                        
                        <iframe src="https://www.google.com/maps/embed?pb={{$tour->embedded_code}}" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-md-12">
                 <div class="card" style="min-height: 600px">
                     <div class="card-body p-0">
                        <div class="container py-2">
                            <h4 class="mb-2 mt-3 text-5 text-uppercase font-weight-bold">Book Now</h4>
                            <div class="row mt-4 d-flex">
                                @foreach ($tours as $tour)
                                <div class="col-sm-4 d-flex mb-2">
                                    <div class="card shadow-lg flex-fill" style="border-radius: 20px;">
                                        <a href="{{ route('tourGuideDetails',  $tour->id) }}">
                                        <img src="{{ route('imagecache', ['template' => 'HajjPackage', 'filename' => $tour->fi()]) }}"
                                            alt="" class="img-fluid" style="border-radius: 20px 20px 0 0"/>
                                        </a>
                                        <div class="card-body pb-3 px-2 pt-2">
                                            <a href="{{ route('tourGuideDetails',  $tour->id) }}" class="text-decoration-none">
                                            <i class="fas fa-map-marker-alt w3-small"></i>&nbsp;<span class="text-dark font-weight-bold">{{ $tour->location_name}}</span>
                                            <h4 class="mt-1 mb-0">{{ $tour->title }}</h3>
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
                     </div>
                 </div>
            </div>
        </div>
    </div>
        
    
</div>
@endsection




