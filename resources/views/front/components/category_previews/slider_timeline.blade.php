<div class="bg-gray-100">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-32 lg:max-w-none">
      <!-- <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
        @foreach($data->articles->default as $article)
        <div class="group relative">
          <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
            @if(!empty($article->images) && isset($article->images[0]))
            <img class="w-full h-full object-center object-cover" src="/storage/{{$article->images[0]['path']}}" alt="{{$article->images[0]['alt_text']}}">
            @endif
          </div>
          <h3 class="mt-6 text-sm text-gray-500">
            <a href="{{$article->path()}}">
              @if(!empty($article->published_date))
              <span class="absolute inset-0"></span>
              {{\Carbon\Carbon::createFromFormat('Y-m-d',$article->published_date)->format('d.m.Y')}}
              @endif
            </a>
          </h3>
          <p class="text-base font-semibold text-gray-900">{{$article->title}}</p>
        </div>
        @endforeach

      </div> -->

      <div class="time-line timeline">
        @foreach($data->articles->default as $article)
        <div class="timeline-container @if(($loop->index+1)%2 == 1) left @else right @endif">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                @if(!empty($article->images) && isset($article->images[0]))
                <img class="img-fluid rounded-start" src="/storage/{{$article->images[0]['path']}}" alt="{{$article->images[0]['alt_text']}}">
                @else
                <img src="/storage/files/3.jpg" alt="">
                @endif
              </div>
              <div class="col-md-8">
                <div class="card-body d-lg-flex justify-content-center flex-col">
                  <a href="{{$article->path()}}">
                    @if(!empty($article->published_date))
                    <h5 class="card-title">{{\Carbon\Carbon::createFromFormat('Y-m-d',$article->published_date)->format('d.m.Y')}}</h5>
                    @endif
                  </a>
                  <p class="card-text text-left">{{$article->title}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>