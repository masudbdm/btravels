@extends('frontend::layouts.frontendMaster')
@section('title', 'All Question Answer')

@push('css')
  
@endpush

@section('content')
<div role="main" class="main">
    <div role="main" class="main">
        {{-- <section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                        <h1 class="text-dark"><strong> All Question Answer</strong></h1>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="section bg-color-grey-scale-1 section-height-3 section-no-border m-0">
            <div class="container">
                <div class="row">
                    <div class="col">
                        @includeIf('frontend::welcome.includes.questionAnswersPart')
                    </div>
                </div>

                <div class="pt-3 text-center">
                    {{$questionAnswers->render()}}
                </div>

            </div>
        </section>
    </div>
</div>


@endsection




