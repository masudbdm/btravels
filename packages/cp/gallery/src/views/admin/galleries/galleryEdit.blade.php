@extends('admin::layouts.adminMaster')
@section('title')
    | Edit Gallery
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.galleriesAll') }}">Galleries</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card shadow bg-info">
            <div class="card-header">
                <h4 class="card-title">Gallery</h4>
                <div class="card-tools">
                    <a class="btn btn-primary btn-xs" href="{{ route('admin.galleriesAll') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 m-auto">
                <div class="card">
                    <div class="card-header text-info">
                        <div class="card-title">Update Gallery Feature</div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.galleryUpdate', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $gallery->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ $gallery->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_image">Featured Image</label><br>
                                <input type="file" name="featured_image" id="featured_image" class="form-control" accept="image/*">
                                <div class="mt-2">
                                    <img src="{{ route('imagecache', ['template' => 'sbixs', 'filename' => $gallery->fi()]) }}" alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="active">
                                    <input type="checkbox" {{ $gallery->active ? 'checked' : '' }} name="active" id="active">
                                    Active
                                </label>
                            </div>

                            <div class="form-group mb-0">
                                <input type="submit" class="btn btn-info" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-info">
                <div class="card-title">Add Gallery Item (Under This Feature)</div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.galleryItemStore', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="item_description">Description</label>
                                <textarea name="description" id="item_description" rows="3" class="form-control" placeholder="Item description (optional)"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-info" type="submit">Add Item</button>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-info">
                <div class="card-title">Gallery Items</div>
            </div>
            <div class="card-body">
                @if ($gallery->items->count())
                    <div class="row">
                        @foreach ($gallery->items as $item)
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                                <div class="card h-100">
                                    <img class="card-img-top" style="height: 160px; object-fit: cover;" src="{{ route('imagecache', ['template' => 'original', 'filename' => $item->fi()]) }}" alt="">
                                    <div class="card-body p-2">
                                        @if ($item->description)
                                            <div style="font-size: 12px;">{{ $item->description }}</div>
                                        @else
                                            <div class="text-muted" style="font-size: 12px;">(No description)</div>
                                        @endif
                                    </div>
                                    <div class="card-footer p-2">
                                        <form action="{{ route('admin.galleryItemDelete', $item) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Delete this item?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted mb-0">No items found.</p>
                @endif
            </div>
        </div>
    </section>
@endsection

