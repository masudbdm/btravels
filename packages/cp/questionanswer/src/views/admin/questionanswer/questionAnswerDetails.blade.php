@extends('admin::layouts.adminMaster')
@section('title')
    | Question Answer Details
@endsection

@push('css')
@endpush

@section('content') 


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Question Answer Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Question Answer Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

     <!-- Default box -->
      <div class="card">
        <div class="card-body">
            <div class="card-header bg-info">
                <h3 class="card-title">Question Answer Details</h3>
                <div class="card-tools">
                    <a class="btn btn-primary btn-xs" href="{{ route('admin.questionAnswersAll') }}"> Back</a>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <td>{{$qa->id}}</td>
                </tr>
                <tr>
                    <th>Question</th>
                    <td>{{$qa->localeQuestionShow()}}</td>
                </tr>

                 <tr>
                    <th>Answer</th>
                    <td>{{$qa->localeAnswerShow()}}</td>
                </tr>

                <tr>
                    <th>Active</th>
                    <td>{{$qa->active == 1 ? 'Yes' : 'No'}}</td>
                </tr>

            </table>
        </div>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection



@push('js')
    <script>
        
    </script>
@endpush
