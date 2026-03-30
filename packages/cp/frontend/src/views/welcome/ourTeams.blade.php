@extends('frontend::layouts.frontendMaster')
@section('title', "Our Teams")

@section('content')


<div role="main" class="main">
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-dark"><strong>Our Team Members</strong></h1>
                </div>
            </div>
        </div>
    </section>

    @includeIf('team::frontend.ourTeams')

</div>

@endsection
