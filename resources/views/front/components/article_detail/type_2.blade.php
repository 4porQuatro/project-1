<div class="main">
    <section class="slider">
        <div class="container-fluid position-relative">
            <div class="row mx-0 background-box">
                <div class="col secondary-bg py-5"></div>
                <div class="col-lg-2 col-1 bg-white py-5"></div>
            </div>
            <div class="row flex-lg-row flex-column-reverse">
                <div class="col-lg py-0 text-box">
                    <div class="wrap">
                        <div>
                            <div>
                                <div>
                                    @if(!empty($result->subtitle))
                                    <div class="label">
                                        {{$result->subtitle}}
                                    </div>
                                    @endif
                                    <h2 class="h2">{{$result->title}}</h2>
                                    @if(!empty($result->body))
                                    <p>
                                        {!! $result->body !!}
                                    </p>
                                    @endif

                                    @if(!empty($data->button_link->default))
                                    <a href="{{$data->button_link->default}}">
                                        <span class="saber-btn" style="color: #fff">
                                            {{$data->button_title->default}}
                                        </span>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 pe-0 py-0 overflow-hidden image-box">
                    <div>
                        <div class="ps-5">
                            @if(!empty($result->images_detail) && isset($result->images_detail[0]))
                            <img src="/storage/{{$result->images_detail[0]['path']}}" alt="{{$result->images_detail[0]['alt_text']}}" class="w-100" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-0 d-none d-lg-flex">
            <div class="col secondary-bg py-5"></div>
            <div class="col-lg-2 col-1 bg-white py-5"></div>
        </div>
    </section>
</div>