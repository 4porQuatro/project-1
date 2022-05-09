@foreach($data->articles->default as $article)
<div class="rounded-lg bg-gray-200 overflow-hidden shadow divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-2 sm:gap-px">
    <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
        <div>
      <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
        <!-- Heroicon name: outline/clock -->
          @if(!empty($article->images))
        <img src="{{$article->images[0]['path']}}">
              @endif
      </span>
        </div>
        <div class="mt-8">
            <h3 class="text-lg font-medium">
                <a href="#" class="focus:outline-none">
                    <!-- Extend touch target to entire panel -->
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    {{$article->subtitle}}
                </a>
            </h3>
            <p class="mt-2 text-sm text-gray-500">
                    {{$article->title}}
            </p>
        </div>

    </div>

</div>
@endforeach
