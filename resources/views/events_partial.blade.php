<div class="pre-accordion">
    <div class="accordion">

    @foreach($events as $i=>$event)
    <div class="pre box" style="background-image: url('{{url('admin/get-event-image/'.$event->image)}}');">
        <div>
            <div class="text">
                @if(\Cookie::get('idioma') && \Cookie::get('idioma') == "eus")
                <p class="accordion-title">{{$event->name_eus}}</p>
                <p class="accordion-sub-title">{{\Carbon\Carbon::parse($event->date)->format('d/m/Y')}}</p>
                <p class="accordion-sub-title">{{$event->desc_eus}}</p>
                @else
                <p class="accordion-title">{{$event->name_es}}</p>
                <p class="accordion-sub-title">{{\Carbon\Carbon::parse($event->date)->format('d/m/Y')}}</p>
                <p class="accordion-sub-title">{{$event->desc_es}}</p>
                @endif
            </div>
        </div>
    </div>
    @endforeach

    </div>
</div>