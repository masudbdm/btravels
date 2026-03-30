@extends('admin::layouts.adminMaster')
@section('title')
    | Edit Slider
@endsection

@push('css')
@endpush

@section('content') 
    
 <section class="content pt-3">
    

    <div class="row">
        <div class="col-12 col-md-8 m-auto">

            <div class="card">
                <div class="card-header">
                     <h4 class="card-title">Tour Edit</h4>
                    <div class="card-tools">
                        <a class="btn btn-primary btn-xs" href="{{ route('admin.toursAll') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.tourUpdate',$tour->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" placeholder="Title  here" class="form-control" value="{{$tour->title}}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tag">excerpt</label>
                            <textarea name="excerpt" id="excerpt" cols="30" rows="2" class="form-control" placeholder="Excerpt here">{{$tour->excerpt}}</textarea>
                            @error('excerpt')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="summernote form-control"  rows="5" placeholder="Description hear">{{$tour->description}}</textarea>
                        </div>

                            <div class="form-group">
                            <label for="embedded_code">Embedded Code</label>
                            <textarea name="embedded_code" id="embedded_code" cols="30" rows="2" class="form-control" placeholder="Embedded Code Here">{{ $tour->embedded_code }}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="location_name">Location Name</label>
                            <input type="text" name="location_name" id="location_name" class="form-control" placeholder="Location name here..." value="{{ $tour->location_name }}">
                            @error('location_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="featured_image">Featured Image</label>
                            <input type="file" name="featured_image" id="featured_image" class="form-control">
                             <img src="{{ route('imagecache', [ 'template'=>'sbixs','filename' => $tour->fi() ]) }}" alt="">
                            @error('featured_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="active"><input type="checkbox" {{$tour->active? 'checked' : ''}} name="active" id="active"> Active</label>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Update">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</section>

@endsection



@push('js')
    
@endpush
