<div>
    @foreach($data->articles->default as $article)
    <main class="lg:relative">
        <div class="mx-auto max-w-7xl w-full pt-16 pb-20 text-center lg:py-48 lg:text-left">
            <div class="px-4 lg:w-1/2 sm:px-8 xl:pr-16">
                <h3 class="text-xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-xl lg:text-5xl xl:text-xl">
                    <span class="block xl:inline">{{$article->subtitle}}</span>
                </h3>
                <h2 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
                    <span class="block xl:inline">{{$article->title}}</span>
                </h2>
                <div class="mt-3 max-w-md mx-auto text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">{!! $article->small_body !!}</div>
                <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
                    <div class="rounded-md shadow">
                        <a href="{{$article->text}}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                            {{$article->link_text}} </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:h-full">
            @if(!empty($article->images))
            <img class="absolute inset-0 w-full h-full object-cover" src="/storage/{{$article->images[0]['path']}}" alt="">
            @endif
        </div>

    </main>
    @endforeach

    <button>
        {{$data->scroll_down->default}}
    </button>
</div>
