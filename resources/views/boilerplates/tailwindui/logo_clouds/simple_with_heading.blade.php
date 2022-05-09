<div class="bg-indigo-200 bg-opacity-25">
  <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
    <div class="lg:grid lg:grid-cols-2 lg:gap-8">
      @if(!empty({{$data->title->default}}))
        <h2 class="max-w-md mx-auto text-3xl font-extrabold text-indigo-900 text-center lg:max-w-xl lg:text-left">{{$data->title->default}}</h2>
      @endif
      <div class="flow-root self-center mt-8 lg:mt-0">
        <div class="-mt-4 -ml-8 flex flex-wrap justify-between lg:-ml-4">
            @foreach($data->articles->default as $article)
                <div class="mt-4 ml-8 flex flex-grow flex-shrink-0 justify-center lg:flex-grow-0 lg:ml-4">
                    @if(!empty($article->images) && isset($article->images[0]))
                    <img class="h-12" 
                        src="/storage/{{$article->images[0]['path']}}"
                        alt="{{$article->images[0]['alt_text']}}"
                    >
                    @endif
                </div>  
            @endforeach 
        </div>
      </div>
    </div>
  </div>
</div>
