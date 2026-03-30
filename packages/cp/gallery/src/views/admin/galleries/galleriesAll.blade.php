@extends('admin::layouts.adminMaster')
@section('title')
    | Galleries All
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Galleries</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Galleries</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card shadow bg-info">
            <div class="card-header">
                <div class="card-title">Gallery</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 m-auto">
                <div class="card">
                    <div class="card-header text-info">
                        <div class="card-title">Add Gallery Feature</div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.galleryStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" placeholder="Title here" class="form-control" value="{{ old('title') }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="4" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="featured_image">Featured Image</label>
                                <input type="file" name="featured_image" id="featured_image" class="form-control" accept="image/*">
                                @error('featured_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <input type="submit" class="btn btn-info" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-info">
                <div class="card-title">All Gallery Features</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderd table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Action</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Featured Image</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = (($galleries->currentPage() - 1) * $galleries->perPage() + 1); ?>
                            @forelse($galleries as $gallery)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('admin.galleryEdit', $gallery) }}" class="text-success mr-2"><i class="fas fa-edit"></i></a>

                                        <form action="{{ route('admin.galleryDelete', $gallery) }}" method="post">
                                            @csrf
                                            <button class="text-danger" onclick="return confirm('Are you sure? you want to delete this Gallery?')" style="all:unset; cursor:pointer;"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>{{ $gallery->description }}</td>
                                    <td>
                                        <img src="{{ route('imagecache', ['template' => 'sbixs', 'filename' => $gallery->fi()]) }}" alt="">
                                    </td>
                                    <td>
                                        @if ($gallery->active)
                                            <span class="badge badge-success">Actived</span>
                                        @else
                                            <span class="badge badge-danger">Inactived</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-danger h5 text-center">No Gallery Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $galleries->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

