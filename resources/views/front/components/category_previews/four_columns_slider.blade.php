<div class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-32 lg:max-w-none">
            <h2 class="text-2xl font-extrabold text-gray-900">
                {{$data->title->default}}
            </h2>
            <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-x-6">
                @foreach($data->articles->default as $article)
                    <div class="group relative">

                        <h3 class="mt-6 text-sm text-gray-500">
                            @if(!empty($article->start_date))
                                <span class="absolute inset-0"></span>
                                {{\Carbon\Carbon::createFromFormat('Y-m-d',$article->start_date)->format('d.m.Y')}}
                            @endif
                        </h3>
                        <p class="text-base font-semibold text-gray-900">{{$article->title}}</p>
                        <p class="text-base font-semibold text-gray-900">{{$article->subtitle}}</p>

                    </div>
                @endforeach
            </div>
            <div>
                <a href="{{$data->link->default}}">{{$data->link_text->default}}</a>
            </div>
        </div>
    </div>
</div>
