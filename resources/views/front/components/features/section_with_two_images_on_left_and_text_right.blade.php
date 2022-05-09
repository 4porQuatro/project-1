<div class="py-16 bg-gray-50 overflow-hidden lg:py-24">
    <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">


        <div class="relative lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
            <div class="relative">

                <dl class="mt-10 space-y-10">
                    @if(!empty($data->image->default) && isset($data->image->default[0]))
                        <img class="relative mx-auto" width="490"
                             src="{{$data->image->default[0]['path']}}"
                             alt="{{$data->image->default[0]['alt_text']}}"
                        >
                    @endif
                    @if(!empty($data->image_2->default) && isset($data->image_2->default[0]))
                        <img class="relative mx-auto" width="490"
                             src="{{$data->image_2->default[0]['path']}}"
                             alt="{{$data->image_2->default[0]['alt_text']}}"
                        >
                    @endif
                </dl>

            </div>
            <div class="mt-10 -mx-4 relative lg:mt-0" aria-hidden="true">

                @if(!empty($data->body->default))
                    <div class="editable">
                        {!! $data->body->default !!}
                    </div>
                @endif
            </div>

        </div>

    </div>
</div>

