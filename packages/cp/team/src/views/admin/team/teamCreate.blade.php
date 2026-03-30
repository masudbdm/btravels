@extends('admin::layouts.adminMaster')
@section('title')
    | Add Team Member
@endsection

@push('css')
@endpush

@section('content')


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Team Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Add Team Member</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card ">
          <div class="card-header bg-info">
              <h3 class="card-title">Add Team Member</h3>
          </div>

          <form action="{{ route('admin.teamStore')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body" style="background-color: rgba(128, 128, 128, 0.37)">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-7">
                        <div class="card card-default" style="margin-bottom: 5px;">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                  <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter name">
                                    @error('name')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mobile1">Mobile No</label>
                                  <input type="text" name="mobile1" value="{{old('mobile1')}}" class="form-control" placeholder="Enter mobile">
                                    @error('mobile1')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mobile2">Alternate Mobile No</label>
                                  <input type="text" name="mobile2" value="{{old('mobile2')}}" class="form-control" placeholder="Enter alter mobile">
                                    @error('mobile2')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                  <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter email">
                                    @error('email')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                  <input type="text" name="designation" value="{{old('designation')}}" class="form-control" placeholder="Enter designation">
                                    @error('designation')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="profession">Profession</label>
                                  <input type="text" name="profession" value="{{old('profession')}}" class="form-control" placeholder="Enter profession">
                                    @error('profession')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="joining_date">Joining Date</label>
                                  <input type="date" id="yourInputId" name="joining_date" value="{{old('joining_date')}}" class="form-control">
                                    @error('joining_date')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="leave_date">Leave Date</label>
                                  <input type="date" name="leave_date" value="{{old('leave_date')}}" class="form-control">
                                    @error('leave_date')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                  <label for="short_bio">Short Bio-Data</label>
                                  <textarea name="short_bio" class="form-control" rows="5" placeholder="Enter short bio-data">{{old('short_bio')}}</textarea>
                                </div>
                                <div class="form-group">
                                  <label for="details">Details</label>
                                  <textarea name="details" id="summernote" class="form-control" rows="5">{{old('details')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="gender">Gender</label>&nbsp;&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" checked>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                      </div>
                                      @error('address')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                  <label class="mr-3"><input type="checkbox"  name="active" value="1" {{  old('active') == 1 ? 'checked' : '' }}> Active</label>
                                </div>
                                <div class="form-group">
                                  <label class="mr-3"><input type="checkbox"  name="contact_hide" value="1" {{  old('contact_hide') == 1 ? 'checked' : '' }}> Contact Hide</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="card card-default" style="margin-bottom: 20px;">
                            <div class="card-header">
                                <h3 class="card-title">Add Image</h3>
                            </div>
                              <div class="card-body">
                                <div class="form-group row">
                                    <label for="profile_pic" class="col-sm-4 col-form-label">Profile Picture</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control-file" id="profile_pic" name="profile_pic">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cover_pic" class="col-sm-4 col-form-label">Cover Picture</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control-file" id="cover_pic" name="cover_pic">
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





