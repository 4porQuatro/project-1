<div class="px-app py-15">
  <div class="container-fluid my-5">
    @if(!empty($data->title->default))
    <div>
      <p class="page-heading">{{$data->title->default}}</p>
    </div>
    @endif
    <div class="row patrimonio">

      @foreach($data->articles->default as $article)
      <div class="col-lg-4 card-box @if(($loop->index+1)%3 == 2)  mt-lg-3 pb-lg-3 @elseif(($loop->index+1)%3 == 0) mt-lg-3 pt-lg-3 @elseif(($loop->index+1)%3 == 1) mb-lg-3 pb-lg-3 @endif"
      >
      <!-- data-bs-toggle="modal" data-bs-target="#exampleModal{{$loop->index}}" -->
        <a href="{{$article->path()}}" class="group relative">
          <div class="card h-100">

            @if(!empty($article->images) && isset($article->images[0]))
            <img src="/storage/{{$article->images[0]['path']}}" alt="{{$article->images[0]['alt_text']}}" style="width: 100%;height: 60vh" />
            @endif
            <div class="card-body">
              <div class="text-center">
                  @if(!empty($article->published_date))
                  <p class="mb-2 yellow-text">
                    {{\Carbon\Carbon::createFromFormat('Y-m-d',$article->published_date)->format('d.m.Y')}}
                  </p>
                  @endif
                <p class="mb-2 h1 text-center">{{$article->title}}</p>
                <p class="card-text text-center">{{$article->subtitle}}
                </p>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach

      <!-- @foreach($data->articles->default as $article)

      <div class="modal fade" id="exampleModal{{$loop->index}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$loop->index}}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-light btn" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach -->
    </div>
  </div>
</div>
