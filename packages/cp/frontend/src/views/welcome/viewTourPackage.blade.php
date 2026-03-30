@extends('frontend::layouts.frontendMaster')
@section('title', $ws->website_title)




@section('content')

<section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm mb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1 class="text-dark"><strong>{{ translate('Tour Package Details') }}</strong></h1>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="featured-boxes featured-boxes-style-3 featured-boxes-flat">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="featured-box featured-box-effect-3">
                        <div class="box-content box-content-border-0 shadow-lg">
                            {{-- <i class="icon-featured far fa-user"></i> --}}
                            <img class="icon-featured" src="{{ route('imagecache', [ 'template'=>'ppmd','filename' => $tourPackage->fi()]) }}" alt="">
                                <h4 class="card-title text-color-primary mt-2 mb-2 text-5 font-weight-bold">
                                    {{ translate($tourPackage->title) }}
                                </h4>
                            <h4 class="card-title mt-2 mb-2 text-5 font-weight-bold"> {{translate($tourPackage->price)}} {{translate('BDT')}}</h4>

                            <div class="text-start">
                                <ul class="list list-icons list-icons-md px-2 text-2 ">
                                    <li class="text-3-5 mb-1" style="padding-left: 4px !important; background:#f8f8f8;">
                                        <span>
                                        <i class="fa fa-check-circle" style="color: #00934D;"></i>
                                        <span>Time & Duration : {{$tourPackage->time_duration}}</span>
                                        </span>
                                    </li>
                                    <li class="text-3-5  mb-1" style="padding-left: 4px !important; background:#f8f8f8;">
                                        <span>
                                            <i class="fa fa-check-circle" style="color: #00934D"></i>
                                            <span >Hotel Makka : {{$tourPackage->hotel_makka}} </span>

                                        </span>

                                    </li>

                                    <li class="text-3-5 mb-1" style="padding-left: 4px !important; background:#f8f8f8;">
                                    <span>
                                        <i class="fa fa-check-circle" style="color: #00934D"></i>
                                        <span class="mt-1">Hotel Madina : {{$tourPackage->hotel_madina}}
                                          {{-- {{translate('contact')}} --}}
                                        </span>
                                    </span>
                                    </li>
                                    <li class="text-3-5 mb-1" style="padding-left: 4px !important; background:#f8f8f8;">
                                        <span>
                                            <i class="fa fa-check-circle" style="color: #00934D"></i>
                                            <span >
                                                Flight Up : {{$tourPackage->flight_up}}
                                                   {{-- {{translate('contact')}} --}}
                                            </span>
                                        </span>
                                    </li>

                                    <li class="text-3-5 mb-1" style="padding-left: 4px !important; background:#f8f8f8;">
                                        <span>
                                            <i class="fa fa-check-circle" style="color: #00934D"></i>
                                            <span >
                                                Flights Down : {{$tourPackage->flight_down}}
                                            </span>
                                        </span>
                                    </li>

                                    <li class="text-3-5 mb-1" style="padding-left: 4px !important; background:#f8f8f8;">
                                        <span>
                                            <i class="fa fa-check-circle" style="color: #00934D"></i>
                                            <span >
                                                Food : {{$tourPackage->food}}
                                            </span>
                                        </span>
                                    </li>

                                    <li class="text-3-5 mb-1" style="padding-left: 4px !important; background:#f8f8f8;">
                                        <span>
                                            <i class="fa fa-check-circle" style="color: #00934D"></i>
                                            <span >Special Services : {{$tourPackage->special_service}}</span>
                                        </span>
                                    </li>


                                     <p class="card-text text-justify text-4" style="padding-left: 4px !important; background:#f8f8f8;"></p>
                                </ul>



                            </div>

                            <h4 class="card-title mt-4 mb-2 text-5 font-weight-bold"> Contact For :  {{$ws->contact_mobile}}</h4>








                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5 pt-4">
                   <div class="card shadow-lg w3-round">
                    <div class="card-body">
                        <form class="" action="{{route('contactUs')}}" method="POST">
                            @csrf
                            <input type="hidden" name="package_id" id="" value="{{$tourPackage->id}}">
                            <div class="contact-form-error alert alert-danger d-none mt-4">
                                <strong>Error!</strong> There was an error sending your message.
                                <span class="mail-error-message text-1 d-block"></span>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label class="form-label mb-1 text-2">Full Name</label>
                                    <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 h-auto py-2" name="full_name" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="form-label mb-1 text-2">Email Address</label>
                                    <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label mb-1 text-2">Mobile</label>
                                    <input type="text" value="" data-msg-required="Please enter the mobile no." maxlength="100" class="form-control text-3 h-auto py-2" name="number" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label mb-1 text-2">Message</label>
                                    <textarea maxlength="5000" data-msg-required="Please enter your message." rows="2" class="form-control text-3 h-auto py-2" name="message" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <input type="submit" value="Send Message" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                                </div>
                            </div>
                        </form>
                    </div>
                   </div>
                </div>
            </div>
            @if ($tourPackage->tour_package_file)
            <div class="row mt-5">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ asset('storage/tour_package_file/' . $tourPackage->tour_package_file) }}" target="_blank" download="" class="btn btn-primary btn-sm">
                        <i class="fas fa-download"></i> Download
                    </a>
                </div>

            </div>

            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center">
                    <iframe src="{{ asset('storage/tour_package_file/' . $tourPackage->tour_package_file) }}" width="100%" height="600" style="border: none;">
                    </iframe>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>

@endsection


