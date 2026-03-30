@extends('admin::layouts.adminMaster')
@section('title')
    | Question Answer Edit
@endsection

@push('css')
@endpush

@section('content')


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Client Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Question Answer Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card ">
          <div class="card-header bg-info">
              <h4 class="card-title">Edit Question Answer</h4>
            <div class="card-tools">
                <a class="btn btn-primary btn-xs" href="{{ route('admin.questionAnswersAll') }}"> Back</a>
            </div>
          </div>
          <form action="{{ route('admin.questionAnswerUpdate',$qa)}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="card-body" style="background-color: rgba(128, 128, 128, 0.37)">
                <div class="row justify-content-center" style="margin-bottom: 20px;">
                    <div class="col-sm-8">
                        <div class="card card-default" style="margin-bottom: 5px;">
                           
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="question">Question</label>
                                  <textarea name="question" class="form-control" value="" id="question" rows="2" >{{ $qa->question}}</textarea>
                                  @error('question')
                                    <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="answer">Answer</label>
                                  <textarea name="answer" 
                                      @if($qa->editor)
                                      class="summernote form-control"
                                      @else
                                      class="summernote- form-control"
                                      @endif  
                                      id="answer"  >{{ $qa->answer}}</textarea>
                                  @error('answer')
                                    <span style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>


                              @foreach (Cp\Language\Models\Language::where('active', 1)->get() as $key => $language)
                              <div class="form-group">
                                <label for="question">Question {{$language->title}}</label>
                                <textarea name="question[{{$language->language_code}}]" id="question" class="form-control" rows="2" placeholder=" Question {{$language->excerpt}}">{{ $qa->localeExcerpt($language->language_code)  }}</textarea>
                                  @error('Question')
                                  <span style="color:red">{{ $message }}</span>
                                  @enderror
                              </div>

                              <div class="form-group">
                                <label for="answer">Answer {{$language->title}}</label>
                                <textarea name="answer[{{$language->language_code}}]" id="answer" class="form-control" rows="2" placeholder=" Answer {{$language->excerpt}}">{{ $qa->localeExcerpt($language->language_code)  }}</textarea>
                              </div>
                              @endforeach
                                
                                <div class="form-group">
                                  <label class="mr-3"><input type="checkbox"  name="active"  {{ $qa->active == 1 ? 'checked' : '' }}> Active</label>
                                </div>

                                <div class="form-group text-right">
                                  <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

              </div>

              

          </form>
      </div>

    </section>
    <!-- /.content -->

@endsection

@push('js')
<script>
   

</script>
@endpush


