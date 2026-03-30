@extends('admin::layouts.adminMaster')
@section('title')
    | Edit Testimonial
@endsection

@push('css')
@endpush

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Testimonial</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Testimonial</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <section class="content">

   <div class="card shadow bg-info">
        <div class="card-header">
            <h4 class="card-title">Testimonial</h4>
            <div class="card-tools">
                <a class="btn btn-primary btn-xs" href="{{ route('admin.testimonialAll') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 m-auto">
            <div class="card">
                <div class="card-header text-info">
                    <div class="card-title">Edit testimonial</div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.testimonialUpdate',$testimonial->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" placeholder="Title  here"
                                class="form-control @error('title') is_invalid @enderror" value="{{ $testimonial->title }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" name="company" id="company" placeholder="company  here" class="form-control" value="{{ $testimonial->company }}">
                            @error('company')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tag">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Description Here"> {{ $testimonial->description }}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="image">Iamge</label><br>
                            <input type="file" name="image" id="image">
                            <img src="{{ route('imagecache', [ 'template'=>'sbixs','filename' => $testimonial->fi() ]) }}" alt="">
                        </div>

                        <div class="form-group">
                            <label for="active"><input type="checkbox" {{$testimonial->active == 1 ? 'checked' : ''}} name="active" id="active"> Active</label>
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
