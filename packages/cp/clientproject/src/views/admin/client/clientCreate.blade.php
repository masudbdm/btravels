@extends('admin::layouts.adminMaster')
@section('title')
    | Client Create
@endsection

@push('css')
@endpush

@section('content')


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Client Create</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Client Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card ">
          <div class="card-header bg-info">
              <h3 class="card-title">Create New Client</h3>
          </div>

          <form action="{{ route('admin.clientStore')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body" style="background-color: rgba(128, 128, 128, 0.37)">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-7">
                        <div class="card card-default" style="margin-bottom: 5px;">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                  <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Enter title">
                                    @error('title')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Address</label>
                                  <textarea name="address" class="form-control" value="{{old('address')}}" id="" cols="30" rows="3" ></textarea>
                                    @error('address')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Mobile</label>
                                  <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control" placeholder="Enter mobile">
                                    @error('mobile')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                  <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter email">
                                    @error('email')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                  <label for="">Description</label>
                                  <textarea name="description" id="summernote" class="form-control" rows="5" placeholder="Enter Description">{{old('description')}}</textarea>
                                </div>

                                <div class="form-group">
                                  <label class="mr-3"><input type="checkbox"  name="active" value="1" {{  old('active') == 1 ? 'checked' : '' }}> Active</label>
                                </div>
                                <div class="form-group">
                                  <label class="mr-3"><input type="checkbox"  name="featured" value="1" {{  old('featured') == 1 ? 'checked' : '' }}> Featured</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="card card-default" style="margin-bottom: 20px;">
                            <div class="card-header">
                                <h3 class="card-title">Add Client Image</h3>
                            </div>
                              <div class="card-body">
                                <div class="form-group row">
                                    <label for="feature_image" class="col-sm-4 col-form-label">Client Image</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control-file" id="image_name" name="image_name">
                                    </div>
                                </div>
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



