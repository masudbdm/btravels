@extends('admin::layouts.adminMaster')
@section('title')
    | Sliders All
@endsection

@push('css')
@endpush

@section('content')
  
 <section class="content">

    <div class="container pt-3">
        <div class="row">
            <div class="col-12 col-md-8 m-auto">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="card-title">Add New Tour</div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.tourStore')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" placeholder="Title  here" class="form-control" value="{{ old('title')}}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tag">excerpt</label>
                                <textarea name="excerpt" id="excerpt" cols="30" rows="2" class="form-control" placeholder="Excerpt here">{{ old('excerpt')}}</textarea>
                                @error('excerpt')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="summernote form-control"  rows="5" placeholder="Description hear">{{old('description')}}</textarea>
                            </div>

                             <div class="form-group">
                                <label for="embedded_code">Embedded Code</label>
                                <textarea name="embedded_code" id="embedded_code" cols="30" rows="2" class="form-control" placeholder="Embedded Code Here">{{ old('embedded_code')}}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="location_name">Location Name</label>
                                <input type="text" name="location_name" id="location_name" class="form-control" placeholder="Location name here..." value="{{ old('location_name')}}">
                                @error('location_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="featured_image">Featured Image</label>
                                <input type="file" name="featured_image" id="featured_image" class="form-control">
                                @error('featured_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


</section>

@endsection



@push('js')

@endpush
