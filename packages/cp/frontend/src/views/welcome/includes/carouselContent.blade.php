<div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark" data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': true, 'dots': true,'autoplay': true}">
    @foreach ($front_sliders as $slider)
        <div>
            <div class="img-thumbnail border-0 p-0 d-block">
                <a target="_blank" href="{{ $slider->link }}">
                    <img class="img-fluid border-radius-0" width="100%" height="300px" src="{{ route('imagecache', [ 'template'=>'original','filename' => $slider->fi() ]) }}" alt="">
                </a>
            </div>
        </div>
    @endforeach
</div>


{{-- <style>
    body {
        margin: 0;
        font-family: 'Open Sans', sans-serif;
    }

    .video-background {
        position: relative;
        width: 100%;
        height: 80vh;
        overflow: hidden;
    }

    .video-background video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .video-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    .content {
        text-align: center;
        color: #fefefe;
        text-shadow: 1px 1px 1px #000;
    }

    .content h1 {
        font-size: 4rem;
        font-weight: 800;
        font-family: 'Open Sans', sans-serif;
    }

    .content p {
        font-family: 'Droid Serif', serif;
    }

    .content button {
        cursor: pointer;
        padding: 0.5rem 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        color: #fefefe;
        background-color: #e55;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .content button:hover {
        background-color: #c44;
    }
</style>



<section class="video-background">
    <video src="{{ asset('img/video/background_video.mp4') }}" autoplay loop muted></video>
    <div class="video-overlay">
        <div class="content">
            @if (Agent::isDesktop())
                <span class="text-white w3-xxxlarge">BAYYINAH TRAVELS</span><br>
            @else
                <span class="text-white w3-xxlarge">BAYYINAH TRAVELS</span><br>
            @endif
            <span class="text-white w3-xxlarge">UMRAH & HAJJ SERVICE</span> <br><br>
            <p class="text-white w3-xlarge">The <em>Bayyinah Travels </em> established in July 2024. Aiming to provide a
                comprehensive and <br> all-in-one experience for individuals undertaking the holy pilgrimage of Hajj and
                Umrah from any city in Bangladesh.</p>
        </div>
    </div>
</section> --}}

