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
            <h1>Client All</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Client All</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      {{-- <div class="card">
        <div class="card-header">
          <h3 class="card-title">Client All</h3>

          <div class="card-tools">

             <a class="btn btn-primary btn-xs" href="{{ route('admin.clientCreate') }}"> Create New Client</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#SL</th>
                  <th>Action</th>
                  <th>Tilte</th>
                  <th>Image</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Active</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clients as $client)
                <tr>
                  <td style="width: 10px">{{$i++}}</td>
                  <td style="width: 80px">
                      <div class="dropdown show">
                        <a class="btn btn-primary btn-xs dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a href="{{ route("admin.clientEdit",$client->id)}}" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>

                             <a href="{{ route("admin.clientShow",$client->id)}}" class="dropdown-item"><i class="fa fa-eye"></i> Details</a>


                            <form action="{{route('admin.clientDelete',$client->id)}}" method="post" onclick="return confirm('Are you sure to delete?')">
                              @csrf
                              <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </div>
                  </td>
                  <td>{{$client->title}}</td>
                  <td>
                      <img  src="{{ route('imagecache', ['template' => 'ppsm', 'filename' => $client->fi()]) }}" alt="Client">
                    </td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->mobile }}</td>
                    <td>
                        <input type="checkbox" name="toogle" data-url="{{route('admin.clientActive')}}" value="{{$client->id}}" data-toggle="toggle" data-size="sm" {{$client->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
      </div> --}}

      <div class="card card-widget" style="font-size: 16px;">
        <div class="card-header with-border">
            <h3 class="card-title"><i class="fa fa-th"></i> All Client</h3>
            <div class="card-tools">
                <a class="btn btn-primary btn-xs" href="{{ route('admin.clientCreate') }}"> Create New Client</a>
            </div>
        </div>

        <div class="card-body">
            <div class="card card-widget mb-0">
              <div class="card-body w3-gray pb-0">
                <div class="row data-container">
                  <div class="col-sm-12 connectedSortable ui-sortable" id="sortablePanel"  data-url="{{ route('admin.clientSort') }}">
                    @foreach ($clients as $client)
                      <div class="card card-widget ui-sortable-handle text-dark" id="{{ $client->id }}">
                        <div class="card-body">
                          <i title="Drag up or down" class="fas fa-arrows-alt-v" style="cursor: pointer"></i>
                          ID: <b>{{ $client->id }}</b>,
                          client Title: <b> {{ $client->title }}</b>,
                          Active:
                          @if($client->active == 1)
                          <b>
                              Yes
                          </b>,
                          @else
                          <b>
                              No
                          </b>,
                          @endif

                          Image: &nbsp;&nbsp; <img  src="{{ route('imagecache', ['template' => 'ppsm', 'filename' => $client->fi()]) }}" alt="Client">


                           <div class="float-right d-flex">
                              <a class="btn btn-primary btn-sm mr-1" href="{{ route("admin.clientEdit", $client->id)}}">Edit</a>&nbsp;
                              <input type="checkbox" name="toogle" data-url="{{route('admin.clientActive')}}" value="{{$client->id}}" data-toggle="toggle" data-size="sm" {{$client->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger"> &nbsp;
                              <form action="{{route('admin.clientDelete',$client->id)}}" method="post" onclick="return confirm('Do you really want to delete?');">
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
    <script>
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


    </script>

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



       $(document).on('click', '.copyboard', function(e) {
       e.preventDefault();

       $(".copyboard").text('Copy url');
       $(this).text('Coppied!');
       var copyText = $(this).attr('data-text');

       var textarea = document.createElement("textarea");
       textarea.textContent = copyText;
       textarea.style.position = "fixed";
       document.body.appendChild(textarea);
       textarea.select();
       document.execCommand("copy");

       document.body.removeChild(textarea);
      });

    });
</script>
@endpush
