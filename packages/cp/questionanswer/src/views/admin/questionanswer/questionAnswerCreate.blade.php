@extends('admin::layouts.adminMaster')
@section('title')
    | Question Answer Create
@endsection

@push('css')
@endpush

@section('content')


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Question Answer Create</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Question Answer Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card ">
          <div class="card-header bg-info">
              <h3 class="card-title">Create New Question Answer</h3>
          </div>

          <form action="{{ route('admin.questionAnswerStore')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body" style="background-color: rgba(128, 128, 128, 0.37)">
                <div class="row justify-content-center" style="margin-bottom: 20px;">
                    <div class="col-sm-8">
                        <div class="card card-default" style="margin-bottom: 5px;">
                            <div class="card-body">
                                @foreach (Cp\Language\Models\Language::where('active', 1)->get() as $key => $language)
                                <div class="form-group">
                                    <label for="question">Question {{$language->title}}</label>
                                    <textarea name="question[{{$language->language_code}}]" id="question" class="form-control" rows="2" placeholder="question {{$language->title}}">{{old('question')}}</textarea>
                                      @error('question')
                                      <span style="color:red">{{ $message }}</span>
                                      @enderror
                                  </div>

                                  <div class="form-group">
                                    <label for="">Answer {{$language->title}}</label>
                                    <textarea name="answer[{{$language->language_code}}]" id="excerpt" class="form-control" rows="2" placeholder="Answer {{$language->title}}">{{old('answer')}}</textarea>
                                  </div>
                                @endforeach
                                
                                <div class="form-group">
                                  <label class="mr-3"><input type="checkbox"  name="active"  {{  old('active') == 1 ? 'checked' : '' }} checked> Active</label>
                                </div>


                                <div class="form-group text-right">
                                  <input type="submit" class="btn btn-primary" value="Save">
                                </div>

                            </div>
                        </div>
                    </div>
                  
                </div>
              </div>

              {{-- <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary" value="Save">
              </div> --}}

          </form>
      </div>

    </section>
    <!-- /.content -->

@endsection

@push('js')
<script>
  
</script>
@endpush



