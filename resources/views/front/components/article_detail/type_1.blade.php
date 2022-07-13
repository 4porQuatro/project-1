<div>
    <div>
        <h1 class="page-heading text-uppercase mt-5">{{$result->title}}</h1>
        <div class="container">
            @if(!empty($result))
            <div class="h4">
                {!! $result->small_body !!}
            </div>
            @endif
            {!! $result->body !!}
            <p class="yellow-text mt-3">
                @if(!empty($result->published_date))
                <span class="absolute inset-0"></span>
                {{\Carbon\Carbon::createFromFormat('Y-m-d',$result->published_date)->format('d.m.Y')}}
                @endif
            </p>
        </div>
    </div>
    <!-- SLIDER IMAGES -->
    @if(!empty($result->images_detail))
    <div class="container-fluid mt-10">
        <div class="row">
            <div class="col-lg">
                <div class="owl-carousel x-images list_images_with_title">
                    @foreach($result->images_detail as $image)
                    <img class="object-cover mr-2" src="/storage/{{$image['path']}}" alt="/storage/{{$image['alt_text']}}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end px-app">
        <a class="cursor-pointer" onclick="history.back()">Go Back</a>
    </div>
        @push('scripts')
            <script>
                $(document).ready(function() {
                    $(".owl-carousel.x-images").owlCarousel({
                        stagePadding: 80,
                        loop: false,
                        margin: 10,
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 1,
                                stagePadding: 30,
                                nav: true,
                            },
                            600: {
                                items: 2,
                                nav: true
                            },
                            1000: {
                                items: 2,
                                nav: true
                            }
                        }
                    });
                });
            </script>
        @endpush
    @endif
</div>
