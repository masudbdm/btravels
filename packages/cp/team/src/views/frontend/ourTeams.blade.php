


   	<div class="container">

        <div class="row">
            <div class="col text-center">
                <h2 class="text-9 text-lg-5 text-xl-9 line-height-3 text-transform-none font-weight-semibold mb-4 mb-lg-3 mb-xl-4 ">Our Team Members</h2>
                <p class="text-3-5 mb-5 text-justify">Located in the Capital City of Bangladesh, Multisoft is a team innovators, opportunists, and qualified IT & Business professionals esteemed community business incubator. Working alongside development organizations, Multisoft is modernizing the more traditional systems that are currently in place at different institutes of higher education.  We offer these organizations the benefit of enhancing their technology and resources to entice the tech-savvy generation of modern world whom are to benefit from using them today.</p>
            </div>
		</div>

        <div class="row">
            @foreach ($teams as $team)
            <div class="col-md-3 col-6 mb-5" >
                <div class="card border-radius-0">
                    <a href="{{ route('teamDetails', ['id' => $team->id])}}" style="text-decoration: none;">
                        <img class="card-img-top border-radius-0" src="{{ route('imagecache', ['template' => 'pfimd', 'filename' => $team->profile_pic]) }}" alt="Tanvir" />
                        <div class="card-body text-center p-0 mt-3">
                            <h4 class="card-title font-weight-bold text-color-dark text-5 mb-1">{{$team->name}}</h4>
                            <p class="text-color-default text-3-5 ls-0 font-weight-normal mb-2 pb-1">{{$team->designation}}</p>
                            <p class="text-color-default text-3-5 ls-0 font-weight-normal mb-2 pb-1" style="font-size: 20px!important">{{Str::limit($team->short_bio, 40, $end='..')}}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>








