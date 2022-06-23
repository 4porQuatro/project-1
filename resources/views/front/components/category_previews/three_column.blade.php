<div class="main home-page" id='colomn-component'>

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
            <a href="{{$article->path()}}">
              <div class="card h-100">
                @if(!empty($article->images) && isset($article->images[0]))
                <img src="/storage/{{$article->images[0]['path']}}" alt="{{$article->images[0]['alt_text']}}" style="width: 100%;height: 60vh" />
                @endif
                <div class="card-body">
                  @if(!empty($article->published_date))
                  <p class="mb-2 yellow-text">
                    {{\Carbon\Carbon::createFromFormat('Y-m-d',$article->published_date)->format('d.m.Y')}}
                  </p>
                  @endif
                  <p class="mb-2 h5">{{$article->title}}</p>
                  <p class="card-text">{{$article->subtitle}}
                  </p>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center py-5">

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