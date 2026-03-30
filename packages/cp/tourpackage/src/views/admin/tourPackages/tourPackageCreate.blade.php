@extends('admin::layouts.adminMaster')
@section('title')
    | Tour Package Create
@endsection

@push('css')
@endpush

@section('content')


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tour Package Create</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Tour Package Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card ">
          <div class="card-header bg-info-">
              <h3 class="card-title">Create New Tour Package</h3>
              <div class="card-tools">
                <a class="btn btn-primary btn-xs" href="{{ route('admin.tourPackagesAll') }}"> Back</a>
            </div>
          </div>

          <form action="{{ route('admin.tourPackageStore')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body" style="background-color: rgba(128, 128, 128, 0.37)">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-12">
                        <div class="card card-default" style="margin-bottom: 5px;">
                            <div class="card-body row">
                                <div class="form-group col-sm-6">
                                    <label for="name">Title</label>
                                  <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Enter title">
                                    @error('title')
                                    <span style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-6">
                                  <label for="tour_package_image">Package Image</label>
                                  <input type="file" class="form-control" name="tour_package_image" id="tour_package_image" placeholder="tour_package_image">
                                  @error('tour_package_image')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="form-group col-sm-6">
                                  <label for="tour_package_file">Package File  (Pdf/Image)</label>
                                  <input type="file" class="form-control" name="tour_package_file" id="tour_package_file" placeholder="tour_package_file">
                                  @error('tour_package_file')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="form-group  col-sm-6">
                                  <label for="package_type">Package Type</label>
                                  <select name="package_type" id="package_type" class="form-control">
                                    <option value="hajj">Hajj</option>
                                    <option value="umrah">Umrah</option>
                                  </select>
                                  {{-- <input type="text" class="form-control" name="package_type" id="package_type" placeholder="package_type"> --}}
                                  @error('package_type')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group  col-sm-6">
                                  <label for="price">Price</label>
                                  <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                                  @error('price')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="form-group col-sm-6">
                                  <label for="time_duration">Time & Duration</label>
                                  <input type="text" class="form-control" name="time_duration" id="time_duration" placeholder="Time Duration">
                                  @error('time_duration')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="form-group col-sm-6">
                                  <label for="hotel_makka">Hotel Makka</label>
                                  <input type="text" class="form-control" name="hotel_makka" id="hotel_makka" placeholder="Hotel Makka">
                                  @error('hotel_makka')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="form-group col-sm-6">
                                  <label for="hotel_madina">Hotel Madina</label>
                                  <input type="text" class="form-control" name="hotel_madina" id="hotel_madina" placeholder="Motel Madina">
                                  @error('hotel_madina')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                  <label for="flight_up">Flight Up</label>
                                  <input type="text" class="form-control" name="flight_up" id="flight_up" placeholder="Flight Up">
                                  @error('flight_up')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                  <label for="flight_down">Flight Down</label>
                                  <input type="text" class="form-control" name="flight_down" id="flight_down" placeholder="Flight Down">
                                  @error('flight_down')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                  <label for="food">Food</label>
                                  <input type="text" class="form-control" name="food" id="food" placeholder="food">
                                  @error('food')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                  <label for="special_service">Speacial Service</label>
                                  <input type="text" class="form-control" name="special_service" id="special_service" placeholder="Special Service">
                                  @error('special_service')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="form-group col-sm-12">
                                  <label class="mr-3"><input type="checkbox"  name="active" value="1" {{  old('active') == 1 ? 'checked' : '' }} checked> Active</label>
                                </div>

                            </div>
                        </div>
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



