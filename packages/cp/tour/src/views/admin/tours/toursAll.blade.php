@extends('admin::layouts.adminMaster')
@section('title')
    | Sliders All
@endsection

@push('css')
@endpush

@section('content')
  
 <section class="content">

    <div class="container pt-3">
        <div class="card">
        <div class="card-header">
            <div class="card-title">All Tours</div>
            <div class="card-tools">
                <a class="btn btn-primary btn-xs" href="{{ route('admin.tourCreate') }}">
                  <i class="fa fa-plus-circle"></i>  Add New Tour
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderd">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Action</th>
                            <th>Title</th>
                            <th>Excerpt</th>
                            <th>Featured Image</th>
                            <th>Location Name</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = (($tours->currentPage() - 1) * $tours->perPage() + 1); ?>
                        @forelse($tours as $tour)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td class="d-flex">
                            <a href="{{route('admin.tourEdit',$tour)}}" class="text-success mr-2"><i class="fas fa-edit"></i></a>

                            <form action="{{route('admin.tourDelete', $tour) }}" method="post">
                                @csrf
                                <button class="text-danger" onclick="return confirm('Are you sure? you want to delete this Slider Item?')" style="all:unset;" style="cursor: pointer;"><i class="fas fa-trash"></i></button>
                            </form>

                            </td>

                            <td>{{ $tour->title}}</td>
                            <td>{{ $tour->excerpt }}</td>
                            <td><img src="{{ route('imagecache', [ 'template'=>'sbixs','filename' => $tour->fi() ]) }}" alt=""></td>
                            <td>{{$tour->location_name}}</td>
                            <td>
                            @if ($tour->active)
                            <span class="badge badge-success">Actived</span>
                            @else
                            <span class="badge badge-danger">Inactived</span>
                            @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-danger h5 text-center">No Tour Found</td>
                        </tr>
                       @endforelse
                    </tbody>
                </table>
                {{ $tours->links() }}
            </div>
        </div>
    </div>
    </div>

     


</section>

@endsection



@push('js')

@endpush
