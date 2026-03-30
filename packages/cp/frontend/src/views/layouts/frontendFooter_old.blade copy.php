<footer id="footer" class="border-top-0 p-0 m-0" style="!important;background-image: url('{{ route('imagecache', ['template' => 'original', 'filename' => $ws->footerImage()]) }}'); background-size:cover; background-position: 0 100%;" >
    <div class="container py-5">
        {{-- @dd($footerMenus) --}}
      
        <div class="row py-1 justify-content-between">
            <div class="col-md-3">
                <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">{{ translate('Office Address')}}</h5>
                <ul class="list list-unstyled mt-3" style="color:rgb(207, 205, 205)">
                    {!! $ws->footer_address !!}
                </ul>
            </div>

            <div class="col-md-3">
                <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">{{ translate('Contact Us')}}</h5>
                <ul class="list list-unstyled" style="color:rgb(207, 205, 205)">
                    {!! $ws->footer_contact !!}
                </ul>
            </div>

            @if($footerMenus->count())
            @foreach($footerMenus as $fmenu)
            @if($fmenu->count() == 3)
            <div class="col-md-2">
            @elseif($fmenu->count() == 2)
            <div class="col-md-2">
            @else
            <div class="col-md-2">
            @endif
                <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">{{ translate($fmenu->name)}}</h5>
                <ul class="list list-unstyled">

                    @foreach($fmenu->pages as $page)
                    @if($page->link)
                    <li class="mb-1 text-4">
                        <a style="color:rgb(207, 205, 205)" href="{{ $page->link  }}">
                            {{ $page->name ?? '' }}
                        </a>
                   </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            @endforeach
            @endif
        </div>
        
    </div>

     <div class="footer-copyright footer-copyright-style-1 footer-top-light-border" style="background: #0F1F38">
        <div class="container">
            <div class="row">
                <div class="col d-flex align-items-center justify-content-center mb-lg-0">
                     <p style="color:white" class="p-0 m-0">
                       &copy; Copyright {{ date('Y')}}. All Rights Reserved. Developed By : <a style="color:white" href="https://a2sys.co/">a2sys</a>
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


