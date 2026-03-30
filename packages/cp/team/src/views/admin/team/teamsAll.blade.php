@extends('admin::layouts.adminMaster')
@section('title')
    | Client All
@endsection

@push('css')
@endpush

@section('content')


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Team Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">All Team Member</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-widget" style="font-size: 16px;">
        <div class="card-header with-border">
            <h3 class="card-title"><i class="fa fa-th"></i>All Team Member</h3>
            <div class="card-tools">
                <a class="btn btn-primary btn-xs" href="{{ route('admin.teamCreate') }}"> Add Team Member</a>
            </div>
        </div>

        <div class="card-body">
            <div class="card card-widget mb-0">
              <div class="card-body w3-gray pb-0">
                <div class="row data-container">
                  <div class="col-sm-12 connectedSortable ui-sortable" id="sortablePanel"  data-url="{{ route('admin.teamSort') }}">
                    @foreach ($teams as $team)
                      <div class="card card-widget ui-sortable-handle text-dark" id="{{ $team->id }}">
                        <div class="card-body">
                          <i title="Drag up or down" class="fas fa-arrows-alt-v" style="cursor: pointer"></i>
                          ID: <b>{{ $team->id }}</b>,
                          Name: <b> {{ $team->name }}</b>,
                          Active:
                          @if($team->active == 1)
                          <b>
                              Yes
                          </b>,
                          @else
                          <b>
                              No
                          </b>,
                          @endif

                          Image: &nbsp;&nbsp; <img  src="{{ route('imagecache', ['template' => 'ppsm', 'filename' => $team->fi()]) }}" alt="Client">


                           <div class="float-right d-flex">
                              <a class="btn btn-primary btn-sm mr-1" href="{{ route("admin.teamEdit", $team->id)}}">Edit</a>&nbsp;
                              <input type="checkbox" name="toogle" data-url="{{route('admin.teamActive')}}" value="{{$team->id}}" data-toggle="toggle" data-size="sm" {{$team->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger"> &nbsp;
                              <form action="{{ route('admin.teamDelete', $team)}}" method="post" onclick="return confirm('Do you really want to delete?');">
                                @csrf
                                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                              </form>
                            </div>
                        </div>
                      </div>
                    @endforeach

                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>
@endsection



@push('js')
    {{-- <script>
        $( document ).ready(function() {
            $('input[name=toogle]').change(function(){
                var that = $( this );
                var url  = that.attr('data-url');
                var id   = that.val()
                var mode = that.prop('checked');
                alert(mode);
                $.ajax({
                    url : url,
                    type: "POST",
                    data:{
                        _token:'{{csrf_token()}}',
                        mode:mode,
                        id:id,
                    },
                    success:function(response){
                        if(response.status){
                            alert(response.msg);
                        }
                        else{
                            alert('please try again');
                        }
                    }
                })
            });
        });


    </script> --}}

<script>
    $( document ).ready(function() {
       $("#sortablePanel").sortable({
         connectWith: ".connectedSortable",
         distance: 5,
         delay: 300,
         opacity: 0.6,
         cursor: 'move',

         update: function() {
             var order = $('#sortablePanel').sortable('toArray'),
                 url = $("#sortablePanel").attr('data-url');
             $.ajax({
                 url: url,
                 type: 'get',
                 cache: false,
                 dataType: 'json',
                 data: {
                     sorted_data: order
                 },
                 success: function(response) {
                     if (response.success == true) {} else {
                         alert('fail');
                     }
                 },
                 error: function() {}
             }); //ajax
         }
       }).disableSelection();

    });
</script>

<script>
    $( document ).ready(function() {
        $('input[name=toogle]').change(function(){
            var that = $( this );
            var url  = that.attr('data-url');
            var id   = that.val()
            var mode = that.prop('checked');
            $.ajax({
                url : url,
                type: "POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function(response){
                    if(response.status){
                        alert(response.msg);
                    }
                    else{
                        alert('please try again');
                    }
                }
            })
        });
    });


</script>
@endpush
