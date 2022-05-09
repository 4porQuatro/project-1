<div class="relative bg-gray-800">
    <div class="h-56 bg-indigo-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
        @if(!empty($result->images_detail) && isset($result->images_detail[0]))
            <img class="w-full h-full object-cover"
                 src="/storage/{{$result->images_detail[0]['path']}}"
                 alt="{{$result->images_detail[0]['alt_text']}}">
        @endif
    </div>
    <div class="relative max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="md:ml-auto md:w-1/2 md:pl-10">
            @if(!empty($result->subtitle))
                <h2 class="text-base font-semibold uppercase tracking-wider text-gray-300">{{$result->subtitle}}</h2>
            @endif
            <p class="mt-2 text-white text-3xl font-extrabold tracking-tight sm:text-4xl">{{$result->title}}</p>
        </div>
    </div>
</div>
<div>
    {!! $result->body !!}
</div>
