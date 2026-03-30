@extends('admin::layouts.adminMaster')
@section('title')
    | Contacts All
@endsection

@push('css')
@endpush

@section('content')


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contacts All</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Contacts All</li>
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
          <h3 class="card-title">Contacts All</h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-sm table-bordered table-striped">
                <thead>
                <tr>
                    <th width="50">SL</th>
                    <th width="60">Action</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Message</th>
                    <th>Package</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i = (($allContacts->currentPage() - 1) * $allContacts->perPage() + 1); ?>
                    @foreach($allContacts as $contact)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>
                            <form action="{{ route('admin.contactDelete',$contact->id) }}" method="post" onclick="return confirm('Are you sure to delete?')">
                                @csrf
                                <button type="submit" class="btn btn-xs btn-outline-danger mr-1 float-left"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                        <td>{{$contact->full_name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->number}}</td>
                        <td>{{$contact->message}}</td>
                        <td>
                            @if ($contact->package_id)
                            <a href="{{ route('tourPackageDetails', $contact->package->id) }}" title="Click and visit package details">{{$contact->package->title ?? ''}}</a>
                            @endif
                        </td>
                    </tr>
                   @endforeach
                </tbody>
        </table>
        {{ $allContacts->render() }}
        </div>
      </div>
    </section>
@endsection



