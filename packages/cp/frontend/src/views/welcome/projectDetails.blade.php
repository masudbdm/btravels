@extends('frontend::layouts.frontendMaster')
@section('title', $project->title)

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
                        <h1 class="text-dark"><strong>project Details</strong></h1>
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

                                    <h2 class="font-weight-semi-bold"><a href="">{{ $project->title }}</a></h2>

                                     <br>
                                    <img class="w-100" src="{{ route('imagecache', ['template' => 'original', 'filename' => $project->fi()]) }}" alt="">

                                    <br><br>

                                    <p style="white-space:pre-wrap;">{!! $project->description !!}</p>

                                </div>

                                <div class="post-block mt-1 post-share w3-small">
                                    @if($project->link)
                                    <h4 class="m-0 p-0">Company Website :
                                        <a href="{{$project->link}}" target="_blank">{{$project->link}}</a>
                                    </h4>
                                    @endif
                                </div>
                            </article>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection



@push('scripts')
   <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-63cb82946c9120ee"></script>
@endpush

