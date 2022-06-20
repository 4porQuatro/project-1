@if(!empty($data->body->default))
<div class="mensagem main">
    <section class="sobre">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 left-box overflow-hidden">
                    <div class="wrap pe-5 py-5 h-100 d-flex">
                        <span>
                            @if(!empty($data->body->default))
                            <p class="h6">
                                {!! $data->body->default !!}
                            </p>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="col-lg-5 py-0 ps-lg-0 slider-with-right-img overflow-hidden">
                    @if(!empty($data->image->default) && isset($data->image->default[0]))
                    <img class="w-100" src="{{$data->image->default[0]['path']}}" alt="{{$data->image->default[0]['alt_text']}}" />
                    @endif
                </div>
                <div class="col secondary-bg"></div>
            </div>
        </div>
    </section>
</div>
@endif