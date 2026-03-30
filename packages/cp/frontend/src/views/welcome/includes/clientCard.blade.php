@foreach ($clients as $client)
    {{-- <div class="card col-6 col-sm-4 col-lg-3">
        <div class="card-body">
            <a href="{{ route('clientDetails', ['id' => $client->id])}}">
                <img  class="img-fluid rounded mb-4 img-thumbnail" src="{{ route('imagecache', ['template' => 'original', 'filename' => $client->fi()]) }}" alt="Client">
            </a>
        </div>
    </div> --}}
    <div class="col-6 col-sm-4 col-lg-3">
        <a href="{{ route('clientDetails', ['id' => $client->id])}}">
            <img  class="img-fluid rounded mb-4 img-thumbnail" src="{{ route('imagecache', ['template' => 'original', 'filename' => $client->fi()]) }}" alt="Client">
        </a>
    </div>
@endforeach
