@extends('frontend::layouts.frontendMaster')
@section('title', "All packages")

@section('content')

<div role="main" class="main">
    <div role="main" class="main">
        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 class="text-dark"><strong>All packages</strong></h1>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container"  style="padding-top: 30px; Padding-bottom: 30px;">
        <div class="row">
            <h3>Popular Packages</h3>
            <div class="col-md-9">
                <p>Our popular Umrah & Hajj packages have been meticulously crafted to ensure a seamless and
                    memorable journey. We prioritize our member's comfort, safety, and well-being throughout their Umrah &
                    Hajj pilgrimage, providing a worry-free experience.</p>
            </div>

            <div class="col-md-3">
                <a class="text-decoration-none custom-hover-underline w3-btn w3-text-black w3-round-xxlarge text-uppercase custom-btn-style-1 text-3 w3-center" href="{{ route('allPackages') }}"
                    style="background-color: #ffc265">{{ translate('view all packages') }}</a>
            </div>
        </div>
        {{-- <div class="row mt-4 d-flex">
            @foreach ($tourPackages as $tourPackage)
            <div class="col-sm-4 w3-round-xxlarge flex-fill mb-3">
                <div class="card shadow-lg " style="border-radius: 20px 20px 20px 20px">
                    <img src="{{ route('imagecache', ['template' => 'HajjPackage', 'filename' => $tourPackage->fi()]) }}"
                    alt class="img-fluid" style="border-radius: 20px 20px 0px 0px"/>
                    <div class="card-body- px-3 pt-2 mb-3">
                        <h3 class="mt-3"> {{ $tourPackage->title }}</h3>
                        <table class="table-striped">
                            <tr class="" style="margin-bottom: 20px!important;">
                                <td class=""> <i class="fas fa-tag"></i> &nbsp;Price</td>
                                <td class="">: {{ $tourPackage->price }}</td>
                            </tr>
                            <tr class="">
                                <td class="" width="155px"><i class="fas fa-clock"></i> &nbsp;Time & Duration
                                </td>
                                <td>: {{ $tourPackage->time_duration }}</td>
                            </tr>
                            <tr>
                                <td class="" width="155px"><i class="fas fa-plane"></i> &nbsp;Hotel Makkah
                                </td>
                                <td>: {{ $tourPackage->hotel_makka }}</td>
                            </tr>
                            <tr>
                                <td class="" width="155px"><i class="fas fa-plane"></i> &nbsp;Hotel Madina
                                </td>
                                <td>: {{ $tourPackage->hotel_madina }}</td>
                            </tr>
                            <tr>
                                <td class="" width="155px"><i class="fas fa-plane"></i> &nbsp;Flights Up</td>
                                <td>: {{ $tourPackage->flight_up }}</td>
                            </tr>
                            <tr>
                                <td class="" width="155px"><i class="fas fa-plane"></i> &nbsp;Flights Down
                                </td>
                                <td>: {{ $tourPackage->flight_down }}</td>
                            </tr>
                            <tr>
                                <td class="" width="155px"><i class="fas fa-utensils"></i> &nbsp;Food</td>
                                <td>: {{ $tourPackage->food }}</td>
                            </tr>
                            <tr>
                                <td class="" width="155px"><i class="fas fa-utensils"></i></i> &nbsp;Special
                                    Services</td>
                                <td>: {{ $tourPackage->special_service }}</td>
                            </tr>
                        </table>


                        <div class="theme-btn mt-3 mb-2 text-center"> <a class="w3-btn w3-text-black w3-round-xxlarge text-uppercase custom-btn-style-1 text-3" href="{{ asset('storage/tour_package_file/' . $tourPackage->tour_package_file) }}"
                            style="background-color: #ffc265" download="">{{ translate('Download prospectus') }}</a></div>

                        <div class="theme-btn mt-3 mb-2 text-center"> <a class="w3-btn w3-text-black w3-round-xxlarge text-uppercase custom-btn-style-1 text-3" href="{{route('tourPackageDetails', $tourPackage->id) }}"
                            style="background-color: #ffc265">{{ translate('Request for Booking') }}</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div> --}}
        <div class="row mt-4 d-flex">
            @foreach ($tourPackages as $tourPackage)
            <div class="col-sm-4 d-flex mb-3">
                <div class="card shadow-lg flex-fill" style="border-radius: 20px;">
                    <img src="{{ route('imagecache', ['template' => 'HajjPackage', 'filename' => $tourPackage->fi()]) }}"
                         alt="" class="img-fluid" style="border-radius: 20px 20px 0 0"/>
                    <div class="card-body px-3 pt-2">
                        <h3 class="mt-3">{{ $tourPackage->title }}</h3>
                        <table class="table-striped">
                            <tr style="margin-bottom: 20px!important;">
                                <td><i class="fas fa-tag"></i> &nbsp;Price</td>
                                <td>: {{ $tourPackage->price }}</td>
                            </tr>
                            <tr>
                                <td width="155px"><i class="fas fa-clock"></i> &nbsp;Time & Duration</td>
                                <td>: {{ $tourPackage->time_duration }}</td>
                            </tr>
                            <tr>
                                <td width="155px"><i class="fas fa-plane"></i> &nbsp;Hotel Makkah</td>
                                <td>: {{ $tourPackage->hotel_makka }}</td>
                            </tr>
                            <tr>
                                <td width="155px"><i class="fas fa-plane"></i> &nbsp;Hotel Madina</td>
                                <td>: {{ $tourPackage->hotel_madina }}</td>
                            </tr>
                            <tr>
                                <td width="155px"><i class="fas fa-plane"></i> &nbsp;Flights Up</td>
                                <td>: {{ $tourPackage->flight_up }}</td>
                            </tr>
                            <tr>
                                <td width="155px"><i class="fas fa-plane"></i> &nbsp;Flights Down</td>
                                <td>: {{ $tourPackage->flight_down }}</td>
                            </tr>
                            <tr>
                                <td width="155px"><i class="fas fa-utensils"></i> &nbsp;Food</td>
                                <td>: {{ $tourPackage->food }}</td>
                            </tr>
                            <tr>
                                <td width="155px"><i class="fas fa-utensils"></i> &nbsp;Special Services</td>
                                <td>: {{ $tourPackage->special_service }}</td>
                            </tr>
                        </table>

                    </div>
                    <div class="card-footer text-center" style="background-color: #FFFFFF!important">
                        <div class="theme-btn mt-3 mb-2">
                            <a class="text-decoration-none custom-hover-underline w3-btn w3-text-black w3-round-xxlarge text-uppercase custom-btn-style-1 text-3"
                               href="{{ asset('storage/tour_package_file/' . $tourPackage->tour_package_file) }}"
                               style="background-color: #ffc265" download="">
                                {{ translate('Download prospectus') }}
                            </a>
                        </div>
                        <div class="theme-btn mt-3 mb-2">
                            <a class="text-decoration-none custom-hover-underline w3-btn w3-text-black w3-round-xxlarge text-uppercase custom-btn-style-1 text-3"
                               href="{{ route('tourPackageDetails', $tourPackage->id) }}"
                               style="background-color: #ffc265">
                                {{ translate('Request for Booking') }}
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




