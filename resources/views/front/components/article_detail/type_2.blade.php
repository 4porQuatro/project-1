<!-- <div class="relative bg-gray-800">
    <div class="h-56 bg-indigo-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
        @if(!empty($result->images_detail) && isset($result->images_detail[0]))
        <img class="w-full h-full object-cover" src="/storage/{{$result->images_detail[0]['path']}}" alt="{{$result->images_detail[0]['alt_text']}}">
        @endif
    </div>
    <div class="relative max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="md:ml-auto md:w-1/2 md:pl-10">
            @if(!empty($result->subtitle))
            <h2 class="text-base font-semibold uppercase tracking-wider text-gray-300">{{$result->subtitle}}</h2>
            @endif
            <p class="mt-2 text-white text-3xl font-extrabold tracking-tight sm:text-4xl">{{$result->title}}</p>
        </div>
    </div>
</div>
<div>
    {!! $result->body !!}
</div> -->

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