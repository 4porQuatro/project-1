<div class="main home-page">
    <section class="agenda py-5">
        <div>
            <div class="pe-lg-5 me-lg-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="auto" height="268" viewBox="0 0 660 268">
                    <text id="Sobre_nós" data-name="Sobre nós" transform="translate(1 1)" fill="none" stroke="#ffb100" stroke-width="1" font-size="200" font-family="SegoeUIBlack, Segoe UI">
                        <tspan class="text-uppercase" x="0" y="216">{{$data->title->default}}</tspan>
                    </text>
                    <text id="Sobre_nós-2" data-name="Sobre nós" transform="translate(229 146)" fill="#000a33" font-size="80" font-family="SegoeUIBlack, Segoe UI">
                        <tspan class="text-uppercase" x="0" y="86">{{$data->title->default}}</tspan>
                    </text>
                </svg>
            </div>
            <div class="px-app mt-10">
                <div class="container-fluid">

                    <div id="carouselhome2" class="owl-carousel agenda" data-bs-ride="carousel">
                        @foreach($data->articles->default as $article)
                        <div class="card h-100 m-3 border-0 shadow-md" data-index='{{$loop->index+1}}' data-total='{{count($data->articles->default)}}'>
                            <div class="card-body px-10 py-12" three-line>
                                <div class="card-content">
                                    @if(!empty($article->start_date))
                                    <div class="card-title h1 mb-2 yellow-text pe-10">
                                        {{\Carbon\Carbon::createFromFormat('Y-m-d',$article->start_date)->format('d.m.Y')}}
                                    </div>
                                    @endif
                                    <div class="card-subtitle h3 mb-2 pe-4">
                                        {{$article->title}}
                                    </div>
                                    <div>
                                        {{$article->subtitle}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex mt-5 align-items-center">
                    <div class="mt-1">
                        <button class="owl-carousel-prev" type="button">
                            <span class="material-icons-outlined">
                                chevron_left
                            </span>
                        </button>
                    </div>
                    <div class="mx-5 position-relative" style="flex: 1">
                        <div class="progress m-0" style="height: 5px">
                            <div type="button" class="border-0 mx-0 progress-bar active"></div>
                        </div>
                    </div>
                    <div class="mt-1">
                        <button type="button" class="owl-carousel-next">
                            <span class="material-icons-outlined">
                                chevron_right
                            </span>
                        </button>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="d-flex justify-content-center py-4">
                        <!-- <btn-circle text="Ver" margin="px-5"></btn-circle> -->

                        <a href="{{$data->link->default}}">
                            <span class="saber-btn" style="color: black">
                                {{$data->link_text->default}}</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- <div class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-32 lg:max-w-none">
            <h2 class="text-2xl font-extrabold text-gray-900">
                {{$data->title->default}}
            </h2>
            <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-x-6">
                @foreach($data->articles->default as $article)
                <div class="group relative">

                    <h3 class="mt-6 text-sm text-gray-500">
                        @if(!empty($article->start_date))
                        <span class="absolute inset-0"></span>
                        {{\Carbon\Carbon::createFromFormat('Y-m-d',$article->start_date)->format('d.m.Y')}}
                        @endif
                    </h3>
                    <p class="text-base font-semibold text-gray-900">{{$article->title}}</p>
                    <p class="text-base font-semibold text-gray-900">{{$article->subtitle}}</p>

                </div>
                @endforeach
            </div>
            <div>
                <a href="{{$data->link->default}}">{{$data->link_text->default}}</a>
            </div>
        </div>
    </div>
</div> -->

<script>
    $(document).ready(function() {
        $(".owl-carousel.agenda").owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: true
                },
                1000: {
                    items: 4,
                    nav: true
                }
            }
        });

        $('.owl-carousel-next').click(function() {
            $(".owl-carousel.agenda").trigger('next.owl.carousel');
            checkindex()
        })
        // Go to the previous item
        $('.owl-carousel-prev').click(function() {
            $(".owl-carousel.agenda").trigger('prev.owl.carousel');
            checkindex()
        })
        // $('.owl-carousel-prev').on('changed.owl.carousel', function(event) {
        // })
        function checkindex(){
            let indexNum = $('.owl-item.active .card').attr('data-index')
            let total = $('.owl-item.active .card').attr('data-total')
            let percentage = (indexNum/total)*100
            $('.agenda .progress .progress-bar').width(percentage+'%')
        }
        checkindex()
    });
</script>