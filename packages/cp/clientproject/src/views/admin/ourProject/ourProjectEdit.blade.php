@extends('admin::layouts.adminMaster')
@section('title')
    | Our Project Edit
@endsection

@push('css')
@endpush

@section('content')


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Our Project Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Our Project Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card ">
          <div class="card-header bg-info">
              <h4 class="card-title">Edit Our Project</h4>
            <div class="card-tools">
                <a class="btn btn-primary btn-xs" href="{{ route('admin.ourProjectAll') }}"> Back</a>
            </div>
          </div>

          <form action="{{ route('admin.ourProjectUpdate',$ourProject->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="card-body" style="background-color: rgba(128, 128, 128, 0.37)">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-7">
                        <div class="card card-default" style="margin-bottom: 5px;">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                  <input type="text" name="title" value="{{old('title') ? : $ourProject->title }}" class="form-control" placeholder="Enter title">
                                    @error('title')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Link</label>
                                  <input type="text" name="link"  value="{{old('link') ? : $ourProject->link }}" class="form-control" placeholder="Enter link">
                                    @error('link')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Client</label>
                                    <select name="client_id" id="" class="form-control">
                                      <option value="">Choose Status</option>
                                      @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" {{ $client->id == $ourProject->client_id ? 'selected' : '' }}   >{{ $client->title }}</option>
                                      @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                  <label for="">Description</label>
                                  <textarea name="description" id="summernote" class="form-control" rows="5" placeholder="Enter Description">{{old('description') ? : $ourProject->description }}</textarea>
                                </div>
                                <div class="form-group">
                                  <label class="mr-3"><input type="checkbox"  name="active" value="1" {{ $ourProject->active == 1 ? 'checked' : '' }}> Active</label>
                                </div>
                                <div class="form-group">
                                    <label class="mr-3"><input type="checkbox"  name="featured" value="1" {{ $client->featured == 1 ? 'checked' : '' }}> Featured</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="card card-default" style="margin-bottom: 20px;">
                            <div class="card-header">
                                <h3 class="card-title">Add Featured Image</h3>
                            </div>
                              <div class="card-body">
                                <div class="form-group row">
                                    <label for="feature_image" class="col-sm-4 col-form-label">Featured Image</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control-file" id="image_name" name="image_name">
                                    </div>
                                </div>
                                   <br>
                                    <img  src="{{ route('imagecache', ['template' => 'ppsm', 'filename' => $ourProject->fi()]) }}" >
                            </div>
                        </div>


                          @includeIf('media::admin.medias.mediaContainer')

                    </div>
                </div>


              </div>

              <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary" value="Save">
              </div>

          </form>
      </div>

    </section>
    <!-- /.content -->

@endsection

@push('js')
<script>
    $(document).ready(function(){

    //  $('.select2').select2({});

     $('.select2bs4').select2({
            minimumInputLength: 1,
            tags:true,
            tokenSeparators: [','],
            ajax: {
            data: function (params) {
                return {
                q: params.term, // search term
                page: params.page
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                var data = $.map(data, function (obj) {
                obj.id = obj.id || obj.name;
                return obj;
                });
                var data = $.map(data, function (obj) {
                obj.text = obj.text || obj.name;
                return obj;
                });
                return {
                results: data,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            }
            },
        });

     });

</script>
@endpush


