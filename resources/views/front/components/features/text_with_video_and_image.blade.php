<div class="py-16 bg-gray-50 overflow-hidden lg:py-24">
    <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">


        <div class="relative lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
            <div class="relative">


                <dl class="mt-10 space-y-10">
                    @if(!empty($data->body->default))
                        <div class="editable">
                            {!! $data->body->default !!}
                        </div>
                    @endif
                </dl>
            </div>
            <div class="mt-10 -mx-4 relative lg:mt-0" aria-hidden="true">
                @if(!empty($data->image->default) && isset($data->image->default[0]))
                    <img class="relative mx-auto w-100 h-100" width="100%"
                         src="{{$data->image->default[0]['path']}}"
                         alt="{{$data->image->default[0]['alt_text']}}"
                    >
                @endif
                    <iframe class="w-100 mt-1" src="{{$data->vimeo->default}}" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>
        </div>

    </div>
</div>
