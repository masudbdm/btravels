@foreach ($ourProjects as $project)
    <div class="col-6 col-sm-4 col-lg-3">
        <a href="{{ route('projectDetails', ['id' => $project->id])}}">
            <img  class="img-fluid rounded mb-4 img-thumbnail" src="{{ route('imagecache', ['template' => 'original', 'filename' => $project->fi()]) }}" alt="Client">
        </a>
    </div>
@endforeach
