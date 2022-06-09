<!-- <div class="bg-gray-100">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-32 lg:max-w-none">
      <h2 class="text-2xl font-extrabold text-gray-900">
        {{$data->title->default}}
      </h2>

      <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
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
          <p class="text-base font-semibold text-gray-900">{{$article->subtitle}}</p>

        </div>
        @endforeach
      </div>
      <div>
        <a href="{{$data->link->default}}">{{$data->link_text->default}}</a>
      </div>
    </div>
  </div>
</div> -->

<div class="main home-page">

  <section class="cards-slider">
    <div class="me-lg-5 pe-lg-5 d-flex justify-content-center">
      <svg xmlns="http://www.w3.org/2000/svg" height="268" width="800px" viewBox="0 0 660 268">
        <text id="Sobre_nós" data-name="Sobre nós" transform="translate(1 1)" fill="none" stroke="#ffb100" stroke-width="1" font-size="200" font-family="SegoeUIBlack, Segoe UI">
          <tspan x="0" y="216">{{$data->title->default}}</tspan>
        </text>
        <text id="Sobre_nós-2" data-name="Sobre nós" transform="translate(229 146)" fill="#000a33" font-size="80" font-family="SegoeUIBlack, Segoe UI">
          <tspan x="0" y="86">{{$data->title->default}}</tspan>
        </text>
      </svg>
    </div>
    <div class="px-app pt-15">
      <div class="container-fluid mt-5">
        <div class="row">

          @foreach($data->articles->default as $article)
          <div class="col-lg-4 card-box @if(($loop->index+1)%3 == 2)  mt-lg-3 pb-lg-3 @elseif(($loop->index+1)%3 == 0) mt-lg-3 pt-lg-3 @elseif(($loop->index+1)%3 == 1) mb-lg-3 pb-lg-3 @endif">
            <div class="card h-100">

              @if(!empty($article->images) && isset($article->images[0]))
              <img src="/storage/{{$article->images[0]['path']}}" alt="{{$article->images[0]['alt_text']}}" style="width: 100%;height: 60vh" />
              @endif
              <div class="card-body">
                <a href="{{$article->path()}}">
                  @if(!empty($article->published_date))
                  <p class="mb-2 yellow-text">
                    {{\Carbon\Carbon::createFromFormat('Y-m-d',$article->published_date)->format('d.m.Y')}}
                  </p>
                  @endif
                </a>
                <p class="mb-2 h5">{{$article->title}}</p>
                <p class="card-text">{{$article->subtitle}}
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center py-5">
      <!-- <btn-circle text="Ver" margin="px-5"></btn-circle> -->

      <a href="{{$data->link->default}}">
        @if(!empty($data->link_text->default))
        <span class="saber-btn" style="color: black">
          {{$data->link_text->default}}</span>
        </span>
        @endif
      </a>
    </div>
  </section>
</div>