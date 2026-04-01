@extends('frontend::layouts.frontendMaster')
@section('title',$page->name)

@section('content')

<div role="main" class="main">
    <div role="main" class="main">
        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 order-2 order-md-1 text-center p-static">
                        <h1 class="text-dark"><strong>{{ $page->name }}</strong></h1>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container">


          {{-- contactUsPage start --}}
        @if($contactUsPage)
        @if($contactUsPage->id == $page->id)
        <style>
            .contact-hero {
                background: linear-gradient(135deg, rgba(41, 153, 204, 0.12), rgba(125, 83, 51, 0.10));
                border-radius: 16px;
                padding: 28px;
            }
            .contact-card {
                border: 0;
                border-radius: 16px;
            }
            .contact-icon {
                width: 40px;
                height: 40px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 12px;
                background: rgba(41, 153, 204, 0.12);
                color: #2999CC;
            }
            .contact-muted {
                color: #6c757d;
                font-size: 13px;
            }
        </style>

        <div class="contact-hero shadow mt-4">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h2 class="font-weight-bold mb-2">Let’s talk about your trip</h2>
                    <p class="mb-0 text-4">
                        Tell us what you need (Umrah, Hajj, Visa, Ticket) and we’ll get back quickly.
                    </p>
                </div>
                <div class="col-lg-5 mt-3 mt-lg-0">
                    <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                        <a class="btn btn-outline-primary btn-sm" href="tel:+8801898878633">Call Now</a>
                        <a class="btn btn-outline-primary btn-sm" href="mailto:contact@bayyinahtravels.com">Email</a>
                        <a class="btn btn-primary btn-sm" target="_blank" href="https://maps.app.goo.gl/ZUm8L8rcrhuTkaHC7">Open Map</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-lg-5 mb-4">
                <div class="card contact-card shadow">
                    <div class="card-body">
                        <h4 class="mb-3">Corporate Head Office</h4>

                        <div class="d-flex mb-3">
                            <div class="contact-icon mr-3"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <div class="font-weight-semibold">Address</div>
                                <div class="contact-muted">301 M M Complex (2nd Floor), Mirpur 2/11, Pallabi, Dhaka-1216</div>
                            </div>
                        </div>

                        <div class="d-flex mb-3">
                            <div class="contact-icon mr-3"><i class="fas fa-phone"></i></div>
                            <div>
                                <div class="font-weight-semibold">Phone</div>
                                <div class="contact-muted">
                                    <a href="tel:+8801898878633">+8801898878633</a>,
                                    <a href="tel:+8801898878634">+8801898878634</a><br>
                                    <a href="tel:+8801898878635">+8801898878635</a>,
                                    <a href="tel:+8801898878636">+8801898878636</a>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="contact-icon mr-3"><i class="fas fa-envelope"></i></div>
                            <div>
                                <div class="font-weight-semibold">Email</div>
                                <div class="contact-muted">
                                    <a href="mailto:contact@bayyinahtravels.com">contact@bayyinahtravels.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card contact-card shadow mt-4">
                    <div class="card-body">
                        <h5 class="mb-2">Quick Tips</h5>
                        <ul class="mb-0 contact-muted">
                            <li>Share your travel date & number of persons.</li>
                            <li>Write your preferred package type (Umrah/Hajj/Visa/Ticket).</li>
                            <li>We’ll reply as soon as possible.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card contact-card shadow">
                    <div class="card-body">
                        <h4 class="mb-3">Send us a message</h4>
                        <p class="contact-muted mb-3">Fields marked with * are required.</p>

                        <form action="{{ route('contactUs') }}" method="POST">
                            @csrf
                            {{-- Honeypot (anti-bot): keep empty --}}
                            <div style="position:absolute; left:-10000px; top:auto; width:1px; height:1px; overflow:hidden;" aria-hidden="true">
                                <label for="website">Website</label>
                                <input type="text" name="website" id="website" tabindex="-1" autocomplete="off" value="">
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    Please fill all required fields correctly.
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label mb-1 text-3">Full Name *</label>
                                        <input type="text" value="{{ old('full_name') }}" maxlength="100"
                                            class="form-control text-3 h-auto py-2 @error('full_name') is-invalid @enderror"
                                            name="full_name" placeholder="Enter your name" required>
                                        @error('full_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label mb-1 text-3">Email Address *</label>
                                        <input type="email" value="{{ old('email') }}"
                                            class="form-control text-3 h-auto py-2 @error('email') is-invalid @enderror"
                                            name="email" placeholder="Enter your email" required>
                                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label mb-1 text-3">Contact Number *</label>
                                        <input type="text" value="{{ old('number') }}" maxlength="100"
                                            class="form-control text-3 h-auto py-2 @error('number') is-invalid @enderror"
                                            name="number" placeholder="e.g. +8801XXXXXXXXX" required>
                                        @error('number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label mb-1 text-3">Subject</label>
                                        <input type="text" value="{{ old('subject') }}" maxlength="100"
                                            class="form-control text-3 h-auto py-2"
                                            name="subject" placeholder="Umrah / Hajj / Visa / Ticket">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label mb-1 text-3">Message *</label>
                                <textarea rows="4"
                                    class="form-control text-3 h-auto py-2 @error('message') is-invalid @enderror"
                                    name="message"
                                    placeholder="Write your message..." required>{{ old('message') }}</textarea>
                                @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <span class="contact-muted">We respect your privacy.</span>
                                <button type="submit" class="btn btn-primary btn-modern rounded-pill px-4">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                
            </div>
            <div class="col-12">
            <div class="card  p-3 w3-round shadow contact-card mt-4">
                    <div class="card-body p-0" style="overflow:hidden; border-radius: 16px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.8407499419104!2d90.36146687393432!3d23.824261285939343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c10065195f35%3A0x1ed4cb00c02c3a9a!2sBayyinah%20Travels!5e0!3m2!1sen!2sbd!4v1775037281022!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>

        @endif
        @endif
       {{-- contactUsPage end --}}


        <div class="row py-4 justify-content-center">
            <div class="col-lg-12">
                @foreach ($page->activePageItems() as $item)
                <p class="lead mb-0 text-4 text-justify-center">{!! $item->description !!}</p>
                @endforeach
            </div>
        </div>

        @if ($page->page_type == 'hajj')
        <div class="row py-4 justify-content-center">
            <div class="col-lg-12">
                @include('frontend::welcome.page_part.hajj_package_part')
            </div>
        </div>
        @endif


        @if ($page->page_type == 'umrah')
        <div class="row py-4 justify-content-center">
            <div class="col-lg-12">
                @include('frontend::welcome.page_part.umrah_package_part')
            </div>
        </div>
        @endif
    </div>

</div>
@endsection




