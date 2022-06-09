<div class="mensagem main">
    <section class="sobre">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 left-box overflow-hidden">
                    <!--          <svg xmlns="http://www.w3.org/2000/svg" width="1120" height="268" viewBox="0 0 1120 268">-->
                    <!--            <text id="Sobre_nós" data-name="Sobre nós" transform="translate(1 1)" fill="none" stroke="#ffb100" stroke-width="1" font-size="200" font-family="SegoeUIBlack, Segoe UI"><tspan x="0" y="216">SOBRE </tspan></text>-->
                    <!--            <text id="Sobre_nós-2" data-name="Sobre nós" transform="translate(229 146)" fill="#000a33" font-size="80" font-family="SegoeUIBlack, Segoe UI"><tspan x="0" y="86">SOBRE </tspan></text>-->
                    <!--          </svg>-->
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