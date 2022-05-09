<!-- SLIDER IMAGES -->
@if(!empty($data->images->default))
<div class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-32 lg:max-w-none">
            <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
                @foreach($data->images->default as $image)
                    <div class="group relative">
                        <img class="w-full h-full object-center object-cover"
                             src="{{$image['path']}}"

                        >
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
