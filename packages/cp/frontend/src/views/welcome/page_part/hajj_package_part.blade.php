
<div class="row">
    <h3>Popular Hajj Packages</h3>
    <div class="col-md-9">
        <p>Our popular Hajj packages have been meticulously crafted to ensure a seamless and
            memorable journey. We prioritize our member's comfort, safety, and well-being throughout their
            Hajj pilgrimage, providing a worry-free experience.</p>
    </div>

    <div class="col-md-3">
        @if ($hajjPackages->count() > 3)
        <a class="text-decoration-none custom-hover-underline w3-btn w3-text-black w3-round-xxlarge text-uppercase custom-btn-style-1 text-3 w3-center" href="{{ route('allPackages') }}"
        style="background-color: #ffc265">{{ translate('view all packages') }}</a>
        @endif
    </div>
</div>
<div class="row mt-4 d-flex">
    @foreach ($hajjPackages as $tourPackage)
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
