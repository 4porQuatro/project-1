<div class="bg-white">
  <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
    <div class="space-y-12">
      <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
        <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">{{$data->title->default}}</h2>
        @if(!empty($data->subtitle->default))
          <p class="text-xl text-gray-500">{{$data->subtitle->default}}</p>
        @endif
      </div>
      <ul role="list" class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:gap-x-8">
        @foreach($data->articles->default as $article)
            <li>
            <div class="space-y-4">
                <div class="aspect-w-3 aspect-h-2">
                    @if(!empty($article->images) && isset($article->images[0]))
                        <img class="object-cover shadow-lg rounded-lg"
                            src="/storage/{{$article->images[0]['path']}}"
                            alt="{{$article->images[0]['alt_text']}}"
                        >
                    @endif
                </div>

                <div class="space-y-2">
                    <div class="text-lg leading-6 font-medium space-y-1">
                        <h3>{{$article->title}}</h3>
                        <p class="text-indigo-600">{{$article->subtitle}}</p>
                    </div>
                </div>
            </div>
            </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
