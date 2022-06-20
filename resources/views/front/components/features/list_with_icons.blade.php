<div class="main home-page">
  <section id="scroll_2" class="count-box">
    <div class="row mx-0 background-box">
      <div class="col secondary-bg py-16"></div>
      <div class="col-lg-2 col-1"></div>
    </div>
    <div class="wrap py-5">
      <div class="container-fluid">
        <div class="row my-0">
          <div class="col-lg"></div>
          <div class="col-lg-5">
            <div class="row">
              @foreach($data->articles->default as $article)
              <div class="mycard col-lg-6 pe-1 @if($loop->index % 2 == 0) mb-5 pb-2 @else mt-5 pt-2 @endif ">
                <div class="card mx-auto rounded-0" outlined>
                  <div class="d-flex flex-row-reverse">
                    <div class="card-img-right w-25 d-inline-flex justify-content-end" color="transparent">
                      <img src="/storage/{{$article->images[0]['path']}}" style='width: 60px; height: 60px'>
                      <!--                            <span class="yellow-text mdi mdi-account-multiple-outline" x-large></span>-->
                    </div>
                    <div class="card-body">
                      <div class="card-content">
                        <div class="card-title yellow-text">
                          {{$article->subtitle}}
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="card-body">
                      <div class="card-content">
                        <div class="h5 card-subtitle">
                          {{$article->title}}
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="col-lg"></div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- 
@foreach($data->articles->default as $article)
<div class="rounded-lg bg-gray-200 overflow-hidden shadow divide-y divide-gray-200 sm:divide-y-0 sm:grid sm:grid-cols-2 sm:gap-px">
  <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
    <div>
      <span class="rounded-lg inline-flex p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
        @if(!empty($article->images))
        <img src="{{$article->images[0]['path']}}">
        @endif
      </span>
    </div>
    <div class="mt-8">
      <h3 class="text-lg font-medium">
        <a href="#" class="focus:outline-none">
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
@endforeach -->