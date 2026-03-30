@extends('frontend::layouts.frontendMaster')
@section('title', $team->name)

@push('css')
  <style>
    .style-li{
        padding-left: 0px !important;
    }
  </style>
@endpush

@section('content')
<div role="main" class="main">
    <div role="main" class="main">
        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 class="text-dark"><strong>Team Member Details</strong></h1>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <div class="container pb-5">
        <div class="row">
            <div class="col-md-7 order-2">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="300" style="animation-delay: 300ms;">{{$team->name}}</h2>
                </div>
                <div class="overflow-hidden mb-3">
                    <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="500" style="animation-delay: 500ms;">{{$team->designation}}</p>
                </div>
                <div class="overflow-hidden mb-3">
                    <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="500" style="animation-delay: 500ms;">{{$team->mobile1}}</p>
                </div>
                <div class="overflow-hidden mb-3">
                    <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="500" style="animation-delay: 500ms;">{{$team->email}}</p>
                </div>
                <hr class="solid my-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900" style="animation-delay: 900ms;">

                <p class="lead appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700" style="animation-delay: 700ms;"><strong><br></strong>{!! $team->short_bio !!}</p>
                <hr class="solid my-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900" style="animation-delay: 900ms;">

                <p class="pb-3 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" style="animation-delay: 800ms;"><strong><br></strong>{!! $team->details !!}</p>
                <hr class="solid my-4 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900" style="animation-delay: 900ms;">
                <div class="row align-items-center appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" style="animation-delay: 1000ms;">
                    <div class="col-lg-6">

                    </div>
                    {{-- <div class="col-sm-6 text-lg-end my-4 my-lg-0">
                        <strong class="text-uppercase text-1 me-3 text-dark">follow me</strong>
                        <ul class="social-icons float-lg-end">
                            <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" style="animation-delay: 100ms;">
                <img class="w-100" src="{{ route('imagecache', ['template' => 'original', 'filename' => $team->fi()]) }}" alt="Team Member">
            </div>
        </div>
    </div>

</div>
@endsection



@push('scripts')
   <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-63cb82946c9120ee"></script>
@endpush

