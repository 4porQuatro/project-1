<div class="bg-white">
  <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
    <div class="space-y-12">
      <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
        <!-- <page_heading :src="/storage/files/headings/{{$data->title->default}}.svg"></page_heading> -->
        <div>
          <p class="page-heading">
            {{$data->title->default}}
          </p>
          <!-- <img class="mx-auto" src="/storage/files/headings/{{$data->title->default}}.svg" alt="/storage/files/headings/{{$data->title->default}}.svg" style='height:16vh;max-width: 100%;object-fit: contain;'> -->
        </div>
        <!-- <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">{{$data->title->default}}</h2>
        <p class="text-xl text-gray-500">{{$data->subtitle->default}}</p> -->
      </div>

      <div class="container-fluid mt-5">
        <div class="row">
          @foreach($data->articles->default as $article)
          <div class="col-lg-4 @if(($loop->index+1)%3 == 2)  mt-3 pb-3 @elseif(($loop->index+1)%3 == 0) mt-3 pt-3 @elseif(($loop->index+1)%3 == 1) mb-3 pb-3 @endif">
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
  </div>
</div>