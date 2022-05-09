<div>
    <div>
       @foreach($result->images_detail as $img)
           <img src="/storage/{{$img['path']}}">
       @endforeach
    </div>
        @if(!empty($result->published_date))
            <span class="absolute inset-0"></span>
            {{\Carbon\Carbon::createFromFormat('Y-m-d',$result->published_date)->format('d.m.Y')}}
        @endif
    <div>
        <h1>{{$result->title}}</h1>
    </div>
    @if(!empty($result))
        <div>
            {!! $result->small_body !!}
        </div>
    @endif
    <div>
        {!! $result->body !!}
    </div>
</div>
