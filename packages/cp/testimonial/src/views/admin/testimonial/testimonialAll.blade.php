@extends('admin::layouts.adminMaster')
@section('title')
    | Sliders All
@endsection

@push('css')
@endpush

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sliders All</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Sliders All</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <section class="content">

   <div class="card shadow bg-info">
        <div class="card-header">
            <div class="card-title">testimonial</div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 m-auto">
            <div class="card">
                <div class="card-header text-info">
                    <div class="card-title">Add testimonial</div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.testimonialtore')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" placeholder="Title  here" class="form-control" value="{{ old('title')}}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" name="company" id="company" placeholder="company  here" class="form-control" value="{{ old('company')}}">
                            @error('company')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tag">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Description Here">
                                {{ old('description')}}
                            </textarea>
                        </div>


                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
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


     <div class="card">
        <div class="card-header bg-info">
            <div class="card-title">All testimonial</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderd table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = (($testimonials->currentPage() - 1) * $testimonials->perPage() + 1); ?>
                        @forelse($testimonials as $testimonial)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td class="d-flex">
                            <a href="{{route('admin.testimonialEdit',$testimonial)}}" class="text-success mr-2"><i class="fas fa-edit"></i></a>

                            <form action="{{route('admin.testimonialDelete', $testimonial) }}" method="post">
                                @csrf
                                <button class="text-danger" onclick="return confirm('Are you sure? you want to delete this Slider Item?')" style="all:unset;" style="cursor: pointer;"><i class="fas fa-trash"></i></button>
                            </form>

                            </td>

                            <td>{{ $testimonial->title}}</td>
                            <td>{{ $testimonial->company}}</td>
                            <td>{{ $testimonial->description }}</td>
                            <td><img src="{{ route('imagecache', [ 'template'=>'sbixs','filename' => $testimonial->fi() ]) }}" alt=""></td>
                            <td>
                            @if ($testimonial->active == 1)
                            <span class="badge badge-success">Actived</span>
                            @else
                            <span class="badge badge-danger">Inactived</span>
                            @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-danger h5 text-center">No testimonial Found</td>
                        </tr>
                       @endforelse
                    </tbody>
                </table>
                {{ $testimonials->links() }}
            </div>
        </div>
    </div>


</section>

@endsection



@push('js')

@endpush
