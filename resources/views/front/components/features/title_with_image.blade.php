<div class="bg-white">
    <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
        <div class="space-y-12">
            <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">{{$data->title->default}}</h2>
            </div>
            <div>
                @if(!empty($data->image->default))
                <img src="{{$data->image->default[0]['path']}}">
                @endif
            </div>
        </div>
    </div>
</div>

