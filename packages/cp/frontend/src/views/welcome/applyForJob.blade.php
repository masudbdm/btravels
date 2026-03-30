@extends('frontend::layouts.frontendMaster')
@section('title', $ws->website_title)


@section('content')

<div role="main" class="main pt-3 mt-3">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm mb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-dark"><strong>Apply For Job</strong></h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5 mt-3">
        <div class="row">
            <div class="col-lg-8">
                <div class="overflow-hidden mb-2">
                    <h2 class="font-weight-normal text-7 mb-2 ">
                        {{ $jobPost->title}}
                    </h2>
                </div>
              
                <p>{!! $jobPost->description !!}</p>
             

                <form action="{{ route('applyForJopStore') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" value="{{ $jobPost->id }}" name="job_post_id">
                    <div class="form-group col-md-6">
                        <label class="form-label mb-1 text-4">Submit For file</label>
                        <input type="file" class="form-control text-3 h-auto py-2" name="cv" required="">
                    </div>

                
                    <button type="submit" class="btn btn-modern btn-dark">Sumbmit</button>
                </form>

                
            </div>
            
        </div>

    </div>

</div>

@endsection









































