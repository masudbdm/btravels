@extends('frontend::layouts.frontendMaster')
@section('title', "Our Completed Projects")

@section('content')

<div role="main" class="main">
    <div role="main" class="main">
        <section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 class="text-dark"><strong>Our Completed Projects</strong></h1>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 text-center">
                <h2 class="font-weight-normal text-8 mb-5"> <strong class="font-weight-extra-bold">Our Completed Projects</strong></h2>
            </div>
        </div>

        <div class="row mb-">
            <div class="col">
                <div class="row">
                    @foreach ($ourProjects as $project)
                    <div class="col-6 col-sm-4 col-lg-3">
                        <a href="{{ route('projectDetails', ['id' => $project->id])}}">
                            <img  class="img-fluid rounded mb-4 img-thumbnail" src="{{ route('imagecache', ['template' => 'original', 'filename' => $project->fi()]) }}" alt="Client">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div>
                    {{ $ourProjects->links()}}
                </div>

            </div>
        </div>

    </div>

</div>
@endsection




