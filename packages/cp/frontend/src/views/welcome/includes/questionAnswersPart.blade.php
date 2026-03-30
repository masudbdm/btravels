 <div class="accordion accordion-modern-status accordion-modern-status-borders accordion-modern-status-arrow" id="accordion200">
    @php
        $i = 1;
    @endphp
    @foreach ($questionAnswers as $qa)
    <div class="card card-default">
        <div class="card-header" id="collapse200Heading{{$qa->id}}">
            <h4 class="card-title m-0">
                <a class="accordion-toggle text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse200{{$qa->id}}" aria-expanded="false" aria-controls="collapse200O{{$qa->id}}">
                    {{$i}} - {{$qa->localeQuestionShow()}}
                </a>
            </h4>
        </div>
        <div id="collapse200{{$qa->id}}" class="collapse" aria-labelledby="collapse200Heading{{$qa->id}}" data-bs-parent="#accordion200">
            <div class="card-body pt-0">
                <p class="mb-0">{{$qa->localeAnswerShow()}}</p>
            </div>
        </div>
    </div>
    @php
        $i++;
    @endphp
    @endforeach
</div>