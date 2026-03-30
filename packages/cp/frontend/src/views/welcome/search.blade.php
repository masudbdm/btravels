@extends('frontend::layouts.frontendMaster')
@section('title', 'Search Result')
@section('content')

<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="text-dark"><strong>Search Result</strong></h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-2 mt-3">

        <div class="row">
            <div class="col">
                <h2 class="font-weight-normal text-7 mb-0">Showing results</h2>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-9">
                <hr class="my-4">
                <ul class="simple-post-list">
                   @foreach ($search_posts as $post)
                   <li>
                    <div class="post-image">
                        <div class="img-thumbnail img-thumbnail-no-borders d-block">
                            <a href="{{ route('singlePost', ['id' => $post->id, 'slug' => $post->slug])}}">
                            <img src="{{ route('imagecache', ['template' => 'cpsm', 'filename' => $post->fi()]) }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="post-info">
                        <a href="{{ route('singlePost', ['id' => $post->id, 'slug' => $post->slug])}}">{{ $post->title }}</a>
                        <div class="post-meta">
                            {!! Str::limit($post->excerpt,500) !!}
                        </div>
                    </div>
                </li>
                   @endforeach
				</ul>

                <div class="d-flex justify-content-center">
                    {{ $search_posts->links() }}
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="min-height: 600px">
                    <div class="card" style="min-height: 600px">
                        <div class="card-body">
                            <h4>Popular Articles  </h3>
                            @foreach ($popular_posts as $post)
                            <ul class="simple-post-list">
                               <li>
                                <div class="post-image">
                                    <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                        <a href="{{ route('singlePost', ['id' => $post->id, 'slug' => $post->slug])}}">
                                            <img src="{{ route('imagecache', ['template' => 'sbixs', 'filename' => $post->fi()]) }}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <a href="{{ route('singlePost', ['id' => $post->id, 'slug' => $post->slug])}}">{!! Str::limit($post->title,15) !!}</a>
                                    <a style="text-decoration:none" href="{{ route('singlePost', ['id' => $post->id, 'slug' => $post->slug])}}">
                                        <div class="post-meta">
                                            {!! Str::limit($post->excerpt,15) !!}
                                        </div>
                                    </a>
                                </div>
                            </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
