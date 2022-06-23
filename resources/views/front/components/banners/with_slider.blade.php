<div class='main'>
  <div id="carouselExampleCaptions" class="carousel carousel-fade slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @foreach($data->articles->default as $article)
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$loop->index}}" class="@if($loop->index == 0) active @endif" aria-current="@if($loop->index == 0) true @endif" aria-label="Slide {{$loop->index}}"></button>
      @endforeach
    </div>
    <div class="carousel-inner">
      @foreach($data->articles->default as $article)
      <section class="carousel-item @if($loop->index == 0) active @endif slider secondary-bg">
        <div class="container-fluid">
          <div class="row flex-lg-row flex-column-reverse">
            <div class="col-lg py-0 text-box">
              <a class="scrollDown-btn z-50" href="#colomn-component"> <span> {{$data->scroll_down->default}} </span></a>
              <div class="wrap z-10">
                <div>
                  <div>
                    <div>
                      <div class="label">
                        {{$article->subtitle}}
                      </div>
                      <h2 class="h4 text-bold">{{$article->title}}</h2>
                      <p>{!! $article->small_body !!}
                      </p>
                      <!--                  <span class="saber-btn">-->
                      <!--                    Saber mais-->
                      <!--                  </span>-->
                      <!-- <btn-circle
                            text="Saber mais"
                            :light="true"
                          ></btn-circle> -->
                      <a class='text-decoration-none' href="">
                        <span class="saber-btn" style="color: #fff">
                          {{$article->link_text}}
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-9 px-0 py-0 overflow-hidden image-box">
              <div class="ps-0 ps-lg-5">
                <img class="home-page-img" src="/storage/{{$article->images[0]['path']}}" width="100%" alt="" style='width: 100%;' />
              </div>
            </div>
          </div>
        </div>
      </section>
      @endforeach
    </div>
    <button class="p-lg-5 mx-5 position-absolute top-50 left-0 z-40 translate-middle-y" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="p-lg-5 mx-5 position-absolute top-50 right-0 z-40 translate-middle-y" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- @foreach($data->articles->default as $article)
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
    @endforeach -->
</div>