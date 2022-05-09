<!-- SLIDER VIDEOS. MUST OPEN A POPUP WITH THE VIDEO. You can use a library as your choice. -->
@if(!empty($data->videos->default))
<div class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-32 lg:max-w-none">
            <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
                @foreach($data->videos->default as $video)
                    <div class="group relative">
                        <img class="w-full h-full object-center object-cover"
                             src="{{$video['path']}}"
                        >
                        <!-- The link for the video it's provided by $video['alt_text']
                        Link example: https://www.youtube.com/watch?v=bIywCGuN4Cg
                        The link can be a youtube video or vimeo.
                        -->
                        {{var_dump($video['alt_text'])}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
