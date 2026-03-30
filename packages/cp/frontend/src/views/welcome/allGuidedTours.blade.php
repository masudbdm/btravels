@extends('frontend::layouts.frontendMaster')
@section('title', "All packages")

@section('content')

<div role="main" class="main">
    <div role="main" class="main">
        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 class="text-dark w3-xlarge"><strong>All Guided Tours</strong></h1>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
       
    <div class="container pt-1">
        <div class="row mt-4 d-flex">
            @foreach ($tours as $tour)
            <div class="col-sm-4 d-flex mb-1">
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
@endsection




