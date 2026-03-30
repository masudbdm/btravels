@extends('admin::layouts.adminMaster')
@section('title')
    | Tour Package All
@endsection

@push('css')
@endpush

@section('content')


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tour Package All</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Tour Package All</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tour Package</h3>

          <div class="card-tools">

             <a class="btn btn-primary btn-xs" href="{{ route('admin.tourPackageCreate') }}"> Create New Job Post</a>

            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="sortableTable">
              <thead>
                <tr>
                  <th style="width: 10px">#SL</th>
                  <th>Action</th>
                  <th>Image</th>
                  <th>Tilte</th>
                  <th>Package Type</th>
                  <th>Price</th>
                  <th>Time & Duration</th>
                  <th>Hotel Makka</th>
                  <th>Hotel Madina</th>
                  <th>Flight Up</th>
                  <th>Flight Down</th>
                  <th>Food</th>
                  <th>Special Service</th>
                  <th>Active</th>
                </tr>
              </thead>
              <tbody id="sortable">
                <?php $i = (($tourPackages->currentPage() - 1) * $tourPackages->perPage() + 1); ?>
                @foreach($tourPackages as $tourPackage)
                <tr data-id="{{ $tourPackage->id }}" draggable="true">
                  <td style="width: 10px">{{$i++}}</td>
                  <td style="width: 80px">
                      <div class="dropdown show">
                        <a class="btn btn-primary btn-xs dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a href="{{ route("admin.tourPackageEdit",$tourPackage->id)}}" class="dropdown-item"><i class="fa fa-edit"></i> Edit</a>

                            <form action="{{route('admin.tourPackageDelete',$tourPackage->id)}}" method="post" onclick="return confirm('Are you sure to delete?')">
                              @csrf
                              <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </div>
                  </td>
                  <td>
                    <img  src="{{ route('imagecache', ['template' => 'ppsm', 'filename' => $tourPackage->fi()]) }}" alt="post">
                </td>
                  <td>{{ $tourPackage->title }}</td>
                  <td>{{ucfirst($tourPackage->package_type)}} </td>
                  <td>{{$tourPackage->price}}</td>
                  <td>{{ $tourPackage->time_duration }}</td>
                  <td>{{ $tourPackage->hotel_makka }}</td>
                  <td>{{ $tourPackage->hotel_madina }}</td>
                  <td>{{ $tourPackage->flight_up }}</td>
                  <td>{{ $tourPackage->flight_down }}</td>
                  <td>{{ $tourPackage->food }}</td>
                  <td>{{ $tourPackage->special_service }}</td>
                  <td>
                      <input type="checkbox" name="toogle" data-url="{{route('admin.tourPackageActive')}}" value="{{$tourPackage->id}}" data-toggle="toggle" data-size="sm" {{$tourPackage->active==1 ? 'checked' : '' }} data-on="On"  data-off="Off" data-onstyle="success" data-offstyle="danger">
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="card-footer">
           {{ $tourPackages->render()}}
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
    const tableBody = document.getElementById('sortable');
    let draggedRow = null;

    // Dragging events
    tableBody.addEventListener('dragstart', function (e) {
        draggedRow = e.target;
        e.target.style.opacity = 0.5;
    });

    tableBody.addEventListener('dragend', function (e) {
        e.target.style.opacity = '';
    });

    tableBody.addEventListener('dragover', function (e) {
        e.preventDefault();
        const afterElement = getDragAfterElement(tableBody, e.clientY);
        if (afterElement == null) {
            tableBody.appendChild(draggedRow);
        } else {
            tableBody.insertBefore(draggedRow, afterElement);
        }
    });

    tableBody.addEventListener('drop', function () {
        const newOrder = [];
        const rows = document.querySelectorAll('tr[data-id]');

        rows.forEach((row, index) => {
            const rowId = row.getAttribute('data-id');
            newOrder.push({
                id: rowId,
                order: index + 1
            });
        });

        updateOrderInDatabase(newOrder); // Call AJAX to update order in DB
    });

    function getDragAfterElement(container, y) {
        const rows = [...container.querySelectorAll('tr:not(.dragging)')];

        return rows.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child };
            } else {
                return closest;
            }
        }, { offset: Number.NEGATIVE_INFINITY }).element;
    }

    // AJAX function to send new order to the server
    function updateOrderInDatabase(orderData) {
        fetch("{{ route('admin.tourPackageSortable') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            body: JSON.stringify({ order: orderData })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Order updated successfully');
            } else {
                console.error('Error updating order');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endpush
