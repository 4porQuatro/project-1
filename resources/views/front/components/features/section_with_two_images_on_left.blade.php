<div class="main mensagem">

    <section class="message py-5 px-app">
        <div class="container-fluid">
            <div class="row flex-column-reverse @if($data->title->default == 'Missão') flex-lg-row-reverse {{$data->title->default}} @else {{$data->title->default}} flex-lg-row @endif">
                <div class="col-lg-6 images position-relative" style="padding-right: 150px;padding-bottom: 150px; @if($data->title->default == 'Missão') transform: rotateY(180deg); @endif">
                    @if(!empty($data->image->default) && isset($data->image->default[0]))
                    <img class="w-100" style="height: 75vh; min-height: 100%;" width="490" src="{{$data->image->default[0]['path']}}" alt="{{$data->image->default[0]['alt_text']}}">
                    @endif
                    @if(!empty($data->image_2->default) && isset($data->image_2->default[0]))
                    <img class="w-50" style="position: absolute;right:0; bottom:0;" width="490" src="{{$data->image_2->default[0]['path']}}" alt="{{$data->image_2->default[0]['alt_text']}}">
                    @endif
                </div>
                <div class="col-lg-6 content pb-5">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="auto" viewBox="0 0 993 268">
                            <text id="MENSAGEM" transform="translate(1 1)" fill="none" stroke="#ffb100" stroke-width="1" font-size="150" font-family="SegoeUIBlack, Segoe UI">
                                <tspan y="126" class="text-uppercase">{{$data->title->default}}</tspan>
                            </text>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="auto" height="150" viewBox="0 0 993 268">
                            <text id="MENSAGEM" transform="translate(1 1)" fill="none" stroke="#ffb100" stroke-width="1" font-size="150" font-family="SegoeUIBlack, Segoe UI">
                                <tspan x="0" y="216">{{$data->title->default}}</tspan>
                            </text>
                        </svg>
                    </div>
                    <div class="px-lg-5">
                        <p class="h5 mb-5">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                            diam nonumy eirmod tempor invidunt ut labore et dolore magna
                            aliquyam.
                        </p>
                        <p class="h6">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                            diam nonumy eirmod tempor invidunt ut labore et dolore magna
                            aliquyam erat, sed diam voluptua. At vero eos et accusam et
                            justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                            sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                            ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                            nonumy eirmod tempor invidunt ut labore et dolore magna
                            aliquyam erat, sed diam voluptua. At vero eos et accusam et
                            justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                            sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                            ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>