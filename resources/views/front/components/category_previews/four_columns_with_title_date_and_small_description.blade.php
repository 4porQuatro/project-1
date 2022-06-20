<!-- <div class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-32 lg:max-w-none">
        </div>
    </div>
</div> -->

<div class="row mx-0 px-app py-16">
    @foreach($data->articles->default as $article)
    <div class="col-lg-3">
        <div class="card shadow-md border-0 bg-gray-100">
            <div class="card-body py-4">
                <h2 class="text-2xl font-extrabold  yellow-text">
                    {{$data->title->default}}
                </h2>
                <h3 class="mt-6 text-sm text-gray-900">
                    @if(!empty($article->start_date))
                    <span class="absolute inset-0"></span>
                    {{\Carbon\Carbon::createFromFormat('Y-m-d',$article->start_date)->format('d.m.Y')}}
                    @endif
                </h3>
                <p class="text-base font-semibold text-gray-900">{{$article->title}}</p>
                <p class="text-base font-semibold text-gray-900">{{$article->subtitle}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>