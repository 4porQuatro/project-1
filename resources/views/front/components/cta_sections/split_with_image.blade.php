<div class="relative bg-gray-800">
  <div class="h-56 bg-indigo-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
        @if(!empty($data->image->default) && isset($data->image->default[0]))
            <img class="w-full h-full object-cover"
                src="{{$data->image->default[0]['path']}}"
                alt="{{$data->image->default[0]['alt_text']}}">
        @endif
  </div>
  <div class="relative max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
    <div class="md:ml-auto md:w-1/2 md:pl-10">
      @if(!empty($data->subtitle->default))
        <h2 class="text-base font-semibold uppercase tracking-wider text-gray-300">{{$data->subtitle->default}}</h2>
      @endif
      <p class="mt-2 text-white text-3xl font-extrabold tracking-tight sm:text-4xl">{{$data->title->default}}</p>
      @if(!empty($data->subtitle->default))
        <p class="mt-3 text-lg text-gray-300">{{$data->text->default}}</p>
      @endif
      <div class="mt-8">
        <div class="inline-flex rounded-md shadow">
            @if(!empty($data->button_link->default))
                <a href="{{$data->button_link->default}}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50">
                {{$data->button_title->default}}
                    <!-- Icon -->
                    <svg class="-mr-1 ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                      <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                    </svg>
                </a>
            @endif
        </div>
      </div>
    </div>
  </div>
</div>
