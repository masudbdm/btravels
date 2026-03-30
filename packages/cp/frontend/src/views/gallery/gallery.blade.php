@extends('frontend::layouts.frontendMaster')

@section('title', 'Gallery')

@push('css')
    <style>
        .gallery-feature-thumb {
            width: 140px;
            height: 90px;
            object-fit: cover;
            border-radius: 10px;
        }

        .gallery-item-thumb {
            width: 100%;
            height: 170px;
            object-fit: cover;
            border-radius: 10px;
        }

        .gallery-item-desc {
            font-size: 13px;
            line-height: 1.3;
            margin-top: 8px;
            color: #666;
        }

        .gallery-feature-toggle {
            cursor: pointer;
        }

        .gallery-preview-thumb {
            width: 64px;
            height: 48px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid transparent;
            cursor: pointer;
        }

        .gallery-preview-thumb.active {
            border-color: #0d6efd;
        }

        .gallery-modal-img {
            width: 100%;
            max-height: 70vh;
            object-fit: contain;
            background: #111;
            border-radius: 10px;
        }
    </style>
@endpush

@section('content')
    <div role="main" class="main">
        <section class="section section-no-border bg-color-light m-0 p-0" style="background-color: #f9f2e9!important">
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h1 class="w3-xxlarge font-weight-bold"><b>Gallery</b></h1>
                </div>

                @forelse($features as $feature)
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            @php
                                $featureImages = [];
                                $featureImages[] = [
                                    'src' => route('imagecache', ['template' => 'original', 'filename' => $feature->fi()]),
                                    'title' => $feature->title ?? '',
                                    'description' => $feature->description ?? '',
                                ];

                                foreach ($feature->items as $it) {
                                    $featureImages[] = [
                                        'src' => route('imagecache', ['template' => 'original', 'filename' => $it->fi()]),
                                        'title' => $feature->title ?? '',
                                        'description' => $it->description ?? '',
                                    ];
                                }
                            @endphp

                            <script type="application/json" id="gallery-data-{{ $feature->id }}">
                                @json($featureImages)
                            </script>

                            <button
                                type="button"
                                class="btn btn-link p-0 gallery-feature-toggle d-flex align-items-center"
                                data-target="#gallery-panel-{{ $feature->id }}"
                                aria-controls="gallery-panel-{{ $feature->id }}"
                            >
                                <img
                                    src="{{ route('imagecache', ['template' => 'original', 'filename' => $feature->fi()]) }}"
                                    class="gallery-feature-thumb mr-3"
                                    alt="{{ $feature->title ?? 'Feature' }}"
                                >
                                <div class="text-left">
                                    <span class="h4 mb-0">{{ $feature->title ?? '' }}</span>
                                    @if (!empty($feature->description))
                                        <div class="text-muted" style="font-size: 13px; margin-top: 3px;">
                                            {{ $feature->description }}
                                        </div>
                                    @endif
                                </div>
                            </button>

                            <div class="mt-2">
                                <a
                                    class="btn btn-sm btn-outline-secondary gallery-preview-btn"
                                    data-feature-id="{{ $feature->id }}"
                                    data-start-index="0"
                                >
                                    Preview
                                </a>
                            </div>

                            <div id="gallery-panel-{{ $feature->id }}" class="gallery-feature-panel mt-4" style="display:none;">
                                @if ($feature->items->count())
                                    <div class="row">
                                        @php $idx = 1; @endphp
                                        @foreach ($feature->items as $item)
                                            <div class="col-6 col-md-4 col-lg-3 mb-4">
                                                <a
                                                    href="javascript:void(0)"
                                                    class="d-block gallery-thumb-open"
                                                    data-feature-id="{{ $feature->id }}"
                                                    data-start-index="{{ $idx }}"
                                                >
                                                    <img
                                                        src="{{ route('imagecache', ['template' => 'original', 'filename' => $item->fi()]) }}"
                                                        class="gallery-item-thumb"
                                                        alt="{{ $item->description ?? 'Gallery item' }}"
                                                    >
                                                </a>

                                                @if ($item->description)
                                                    <div class="gallery-item-desc">
                                                        {{ $item->description }}
                                                    </div>
                                                @endif
                                            </div>
                                            @php $idx++; @endphp
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted mb-0">
                                        No gallery items found. Click <b>Preview</b> to view the feature image.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted mb-0">No features found.</p>
                @endforelse
            </div>
        </section>
    </div>

    {{-- Gallery Viewer Modal --}}
    <div class="modal fade" id="galleryViewerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <div class="h5 mb-0" id="galleryViewerTitle">Gallery</div>
                        <div class="text-muted" style="font-size: 13px;" id="galleryViewerCounter"></div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="galleryViewerImage" class="gallery-modal-img" src="" alt="">
                    <div class="mt-3" id="galleryViewerDesc" style="white-space: pre-wrap;"></div>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <button type="button" class="btn btn-outline-secondary btn-sm" id="galleryPrevBtn">Prev</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" id="galleryNextBtn">Next</button>
                    </div>

                    <div class="mt-3 d-flex flex-wrap gap-2" id="galleryThumbStrip"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        (function () {
            var current = {
                images: [],
                index: 0,
                title: ''
            };

            function getFeatureImages(featureId) {
                var el = document.getElementById('gallery-data-' + featureId);
                if (!el) return [];
                try {
                    return JSON.parse(el.textContent || '[]') || [];
                } catch (e) {
                    return [];
                }
            }

            function renderThumbs() {
                var strip = document.getElementById('galleryThumbStrip');
                strip.innerHTML = '';

                current.images.forEach(function (img, idx) {
                    var thumb = document.createElement('img');
                    thumb.src = img.src;
                    thumb.className = 'gallery-preview-thumb' + (idx === current.index ? ' active' : '');
                    thumb.alt = img.description || 'thumb';
                    thumb.addEventListener('click', function () {
                        showIndex(idx);
                    });
                    strip.appendChild(thumb);
                });
            }

            function showIndex(idx) {
                if (!current.images.length) return;
                if (idx < 0) idx = 0;
                if (idx >= current.images.length) idx = current.images.length - 1;
                current.index = idx;

                var img = current.images[current.index];
                document.getElementById('galleryViewerImage').src = img.src;
                document.getElementById('galleryViewerDesc').textContent = img.description || '';
                document.getElementById('galleryViewerTitle').textContent = img.title || 'Gallery';
                document.getElementById('galleryViewerCounter').textContent = (current.index + 1) + ' / ' + current.images.length;

                renderThumbs();
            }

            function openViewer(featureId, startIndex) {
                var images = getFeatureImages(featureId);
                if (!images.length) return;
                current.images = images;
                current.index = parseInt(startIndex || 0, 10) || 0;

                showIndex(current.index);

                var modalEl = document.getElementById('galleryViewerModal');
                if (window.bootstrap && bootstrap.Modal) {
                    var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                    modal.show();
                } else {
                    // fallback
                    window.open(images[current.index].src, '_blank');
                }
            }

            document.getElementById('galleryPrevBtn').addEventListener('click', function () {
                showIndex(current.index - 1);
            });

            document.getElementById('galleryNextBtn').addEventListener('click', function () {
                showIndex(current.index + 1);
            });

            // Preview button
            $(document).on('click', '.gallery-preview-btn', function (e) {
                e.preventDefault();
                openViewer($(this).data('feature-id'), $(this).data('start-index'));
            });

            // Thumbnail click (items)
            $(document).on('click', '.gallery-thumb-open', function (e) {
                e.preventDefault();
                openViewer($(this).data('feature-id'), $(this).data('start-index'));
            });

            // Accordion toggle
            $(document).on('click', '.gallery-feature-toggle', function (e) {
                e.preventDefault();

                var target = $(this).data('target');
                if (!target) return;

                $('.gallery-feature-panel').not(target).slideUp(150);
                $(target).slideToggle(150);
            });
        })();

    </script>
@endpush

