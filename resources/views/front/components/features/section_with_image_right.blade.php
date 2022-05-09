<div class="py-16 bg-gray-50 overflow-hidden lg:py-24">
    <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
        <div class="relative lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
            <div class="relative">
                <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight sm:text-3xl">{{$data->title->default}}</h3>
                @if(!empty($data->subtitle->default))
                    <p class="mt-3 text-lg text-gray-500">{{$data->subtitle->default}}</p>
                @endif

                <dl class="mt-10 space-y-10">
                    @if(!empty($data->body->default))
                        <div class="editable">
                            {!! $data->body->default !!}
                        </div>
                    @endif
                </dl>
                @if(!empty($data->internal_link->default))
                    <a href="{{$data->internal_link->default}}">{{$data->text_link->default}}</a>
                @endif
            </div>
            <div class="mt-10 -mx-4 relative lg:mt-0" aria-hidden="true">
                @if(!empty($data->image->default) && isset($data->image->default[0]))
                    <img class="relative mx-auto" width="490"
                         src="{{$data->image->default[0]['path']}}"
                         alt="{{$data->image->default[0]['alt_text']}}"
                    >
                @endif
            </div>
        </div>

    </div>
</div>
