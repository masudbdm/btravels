<style>
    /* .bgimg-appointment {
        background-image: url("/img/444455.png");
        min-height: 350px;
        background-repeat: no-repeat;
        -webkit-background-size: cover;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
        position: relative;

    } */

    /* .bgimg-appointment .cms-overlay {
        background-color: #2e3a47;
        position: absolute;
        opacity: .98;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    } */


    #footer {
    position: relative;
    overflow: hidden;
}

.bgimg-appointment {
    height: 100vh; /* Adjust as necessary */
    background-size: cover;
    background-position: center center;
}

.gridient-footer{
    background: linear-gradient(to right,
    #7D5333 0%,
    #7D5333 30%,
        #696457 40%,
        #597174 60%,
        #497F92 80%,
        #2999CC 100%
    )
}


</style>


<section class="section- section-height-3 border-0 m-0 appear-animation" data-appear-animation="fadeIn">
    <div class="container py-5">
        <div class="row">
            <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                <div class="owl-carousel owl-theme stage-margin stage-margin-lg nav-dark nav-style-2 mb-0" data-plugin-options="{'items': 1, 'margin': 100, 'loop': true, 'nav': true, 'dots': true, 'stagePadding': 100, 'autoHeight': true, 'autoplay': true, 'autoplayTimeout': 5000, 'autoplayHoverPause': true}">
                    @foreach ($testimonials as $testimonial)
                    <div>
                        <div class="testimonial testimonial-style-2 mb-0">
                            <div class="testimonial-author">
                                <img src="{{ asset('storage/testimonial/' . $testimonial->image) }}" class="img-fluid rounded-circle" alt="{{ $testimonial->name }}">
                            </div>
                            <blockquote>
                                <p class="text-color-dark text-5 line-height-5 mb-0">{!! $testimonial->description !!}</p>
                            </blockquote>
                            <div class="testimonial-author">
                                <p><strong class="font-weight-extra-bold text-2">- {{ $testimonial->title }}. {{ $testimonial->company }}</strong></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>







@include('frontend::welcome.includes.swiperslider')


@if (Agent::isDesktop())
<footer id="footer" class="border-top-0 p-0 m-0" style="background-color: white">
    <div class="bgimg-appointment" style="background-image: url('{{ asset('img/444455.png') }}');">
        <div class="cms-overlay">
            <div class="container py-5" style="padding-top: 370px!important">
                <div class="row py-1 justify-content-between">
                    <div class="col-md-3">
                        <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">
                            {{ translate('Office Address') }}</h5>
                        <ul class="list list-unstyled mt-3" style="color:rgb(207, 205, 205)">
                            {!! $ws->footer_address !!}
                        </ul>
                        <ul class="list list-unstyled mt-3" style="color:rgb(207, 205, 205)">
                            <a class="w3-text-white" href="https://www.google.com/maps/place/M.M.+Complex/@23.8241816,90.361488,17z/data=!4m10!1m2!2m1!1s301+M+M+Complex+(2nd+Floor),+Mirpur+2%2F11,+Pallabi,+Dhaka-1216!3m6!1s0x3755c1f9dc7f536d:0xeeba1c808fed2a38!8m2!3d23.8241767!4d90.3640629!15sCj0zMDEgTSBNIENvbXBsZXggKDJuZCBGbG9vciksIE1pcnB1ciAyLzExLCBQYWxsYWJpLCBEaGFrYS0xMjE2kgEPc2hvcHBpbmdfY2VudGVy4AEA!16s%2Fg%2F11nwcf941j?entry=ttu&g_ep=EgoyMDI0MDkxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank" style="height:80px; width:80px" title="Open in Google Maps">
                                <i class="fas fa-map-marker-alt fs-5"></i> View on Map
                            </a>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-2">
                            {{ translate('Contact Us') }}</h5>
                        <ul class="list list-unstyled" style="color:rgb(207, 205, 205)">
                            {!! $ws->footer_contact !!}
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">
                            {{ translate('Social Links') }}</h5>
                        <ul class="list list-unstyled" style="color:rgb(207, 205, 205)">
                            @if ($ws->fb_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->fb_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-facebook fs-5 w3-text-white"></i></a></li>
                            @endif
                            @if ($ws->youtube_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->youtube_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-youtube fs-5 w3-text-white"></i></a></li>
                            @endif
                            @if ($ws->twitter_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->twitter_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-twitter fs-5 w3-text-white"></i></a></li>
                            @endif
                            @if ($ws->whatsapp_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->whatsapp_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-whatsapp fs-5 w3-text-white"></i></a></li>
                            @endif
                            @if ($ws->instagram_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->instagram_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-instagram fs-5 w3-text-white"></i></a></li>
                            @endif

                            @if ($ws->linked_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->linked_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-linkedin fs-5 w3-text-white"></i></a></li>
                            @endif
                        </ul>
                    </div>

                    @if ($footerMenus->count())
                        @foreach ($footerMenus as $fmenu)
                            <div class="col-md-2">
                                <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-2">
                                    {{ translate($fmenu->name) }}</h5>
                                <ul class="list list-unstyled">
                                    @foreach ($fmenu->latestPages() as $page)
                                        <li class="mb-1 text-4">
                                            <a style="color:rgb(207, 205, 205)" href="{{ $page->link ?: route('page', ['id' => $page->id, 'slug' => page_slug($page->name)]) }}">
                                                {{ $page->name ?? '' }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>
@else
<footer id="footer" class="border-top-0 p-0 m-0" style="background-color: white">
    <div class="bgimg-appointment" style="background-image: url('{{ asset('img/444455.png') }}');">
        <div class="cms-overlay">
            <div class="container py-5" style="padding-top: 80%!important">
                <div class="row py-1">
                    <div class="col-6">
                        <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-2">
                            {{ translate('Office Address') }}</h5>
                        <ul class="list list-unstyled mt-0 mb-0" style="color:rgb(207, 205, 205); margin-top:0!important;">
                            {!! $ws->footer_address !!}
                        </ul>
                        <ul class="list list-unstyled mt-0" style="color:rgb(207, 205, 205)">
                            <a class="w3-text-white" href="https://www.google.com/maps/place/M.M.+Complex/@23.8241816,90.361488,17z/data=!4m10!1m2!2m1!1s301+M+M+Complex+(2nd+Floor),+Mirpur+2%2F11,+Pallabi,+Dhaka-1216!3m6!1s0x3755c1f9dc7f536d:0xeeba1c808fed2a38!8m2!3d23.8241767!4d90.3640629!15sCj0zMDEgTSBNIENvbXBsZXggKDJuZCBGbG9vciksIE1pcnB1ciAyLzExLCBQYWxsYWJpLCBEaGFrYS0xMjE2kgEPc2hvcHBpbmdfY2VudGVy4AEA!16s%2Fg%2F11nwcf941j?entry=ttu&g_ep=EgoyMDI0MDkxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank" style="height:80px; width:80px" title="Open in Google Maps">
                                <i class="fas fa-map-marker-alt fs-5"></i> View on Map
                            </a>
                        </ul>
                    </div>
                    <div class="col-6">
                        <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-2">
                            {{ translate('Social Links') }}</h5>
                        <ul class="list list-unstyled" style="color:rgb(207, 205, 205)">
                            @if ($ws->fb_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->fb_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-facebook fs-5 w3-text-white"></i></a></li>
                            @endif
                            @if ($ws->youtube_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->youtube_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-youtube fs-5 w3-text-white"></i></a></li>
                            @endif
                            @if ($ws->twitter_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->twitter_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-twitter fs-5 w3-text-white"></i></a></li>
                            @endif
                            @if ($ws->whatsapp_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->whatsapp_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-whatsapp fs-5 w3-text-white"></i></a></li>
                            @endif
                            @if ($ws->instagram_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->instagram_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-instagram fs-5 w3-text-white"></i></a></li>
                            @endif

                            @if ($ws->linked_url)
                            <li style="display: inline; margin-right:5px;"><a href="{{ $ws->linked_url }}" target="_blank" style="color: rgb(207, 205, 205);"><i class="fab fa-linkedin fs-5 w3-text-white"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    @if ($footerMenus->count())
                        @foreach ($footerMenus as $fmenu)
                            <div class="col-6">
                                <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-2">
                                    {{ translate($fmenu->name) }}</h5>
                                <ul class="list list-unstyled">
                                    @foreach ($fmenu->latestPages() as $page)
                                        <li class="mb-1 text-4">
                                            <a style="color:rgb(207, 205, 205)" href="{{ $page->link ?: route('page', ['id' => $page->id, 'slug' => page_slug($page->name)]) }}">
                                                {{ $page->name ?? '' }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    @endif

                    <div class="col-6">
                        <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-2">
                            {{ translate('Contact Us') }}</h5>
                        <ul class="list list-unstyled" style="color:rgb(207, 205, 205)">
                            {!! $ws->footer_contact !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@endif

<hr style="border: none; height: 1px; background-color: white; margin: 0;">
<footer id="footer" class="border-top-0 p-0 m-0"
    style="!important;background-image: url('{{ route('imagecache', ['template' => 'original', 'filename' => $ws->footerImage()]) }}'); background-size:cover; background-position: 0 100%;">
    <div class="footer-copyright footer-copyright-style-1 footer-top-light-border " style="background: linear-gradient(to right,
    #7D5333 25%,
    #5E6D6B 50%,
    #2A98C9 100%
);">
        <div class="container">
            <div class="row">
                <div class="col d-flex align-items-center justify-content-center mb-lg-0">
                    <p style="color:white" class="p-0 m-0">
                        &copy; Copyright {{ date('Y') }}. All Rights Reserved. Developed By : <a
                            style="color:white" href="https://a2sys.co/">a2sys</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    #footer .footer-copyright {
        padding: 15px 0px 15px 0px !important;
    }
</style>
