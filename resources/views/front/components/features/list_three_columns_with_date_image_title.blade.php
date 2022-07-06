<div class="px-app pt-15">
  <div class="container-fluid mt-5">
    @if(!empty($data->title->default))
    <div>
      <p class="page-heading">{{$data->title->default}}</p>
    </div>
    @endif
    <div class="row patrimonio">

      @foreach($data->articles->default as $article)
      <div data-bs-toggle="modal" data-bs-target="#exampleModal{{$loop->index}}" class="col-lg-4 cursor-pointer card-box @if(($loop->index+1)%3 == 2)  mt-lg-3 pb-lg-3 @elseif(($loop->index+1)%3 == 0) mt-lg-3 pt-lg-3 @elseif(($loop->index+1)%3 == 1) mb-lg-3 pb-lg-3 @endif">
        <a class="group relative">
          <div class="card h-100">
            @if(!empty($article->images) && isset($article->images[0]))
            <img src="/storage/{{$article->images[0]['path']}}" alt="{{$article->images[0]['alt_text']}}" style="width: 100%;height: 60vh" />
            @endif
            <div class="card-body">
              <div class="text-center">
                <!-- <a href="{{$article->path()}}"> -->
                @if(!empty($article->published_date))
                <p class="mb-2 yellow-text">
                  {{\Carbon\Carbon::createFromFormat('Y-m-d',$article->published_date)->format('d.m.Y')}}
                </p>
                @endif
                <!-- </a> -->
                <p class="mb-2 h5 text-center">{{$article->title}}</p>
                <p class="card-text text-center">{{$article->subtitle}}
                </p>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach

      @foreach($data->articles->default as $article)

      <div class="modal fade" id="exampleModal{{$loop->index}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$loop->index}}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="row mx-0">
                <div class="col-lg-6 p-0">
                  @if(!empty($article->images_detail) && isset($article->images_detail[0]))
                  <div id="model-carouselControls-{{$loop->index}}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      @foreach($article->images_detail as $image)
                      <div class="carousel-item @if($loop->index == 0) active @endif">
                        <img width="100%" src="/storage/{{$image['path']}}" alt="{{$image['alt_text']}}" style="width: 100%;height:85vh" />
                      </div>
                      @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#model-carouselControls-{{$loop->index}}" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#model-carouselControls-{{$loop->index}}" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                  @endif
                </div>
                <div class="text-left col-lg-6 p-5">
                  <a class="position-absolute cursor-pointer right-0 top-0 mt-2 me-2 text-2xl" data-bs-dismiss="modal">
                    <span class="material-icons-outlined">
                      close
                    </span>
                  </a>
                  <p class="mb-2 h3 px-lg-5 pt-lg-5">{{$article->title}}</p>
                  @if(!empty($article->published_date))
                  <p class="mb-2 yellow-text px-lg-5">
                    {{\Carbon\Carbon::createFromFormat('Y-m-d',$article->published_date)->format('d.m.Y')}}
                  </p>
                  @endif
                  <p class="card-text px-lg-5 pb-lg-5">{{$article->subtitle}}
                  </p>

                    <p>{!! $article->body !!}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
