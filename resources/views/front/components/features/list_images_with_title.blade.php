<p class="page-heading text-uppercase py-5">
    {{$data->title->default}}
</p>
<div class="container-fluid my-5">
    <div class="row">



        <!-- <div class="col-lg">
            <div class="owl-carousel x-images list_images_with_title">
                @foreach($data->images->default as $image)
                <img class="object-cover mr-2" src="{{$image['path']}}" alt="{{$image['alt_text']}}">
                @endforeach
            </div>
        </div> -->
        @if($data->title->default == 'Parceiros')
        <div class="px-app">
            <div class="row">
                @foreach($data->images->default as $image)
                <div class="col-lg-2">
                    <img class="object-cover mr-2 w-100 h-100" src="{{$image['path']}}" alt="{{$image['alt_text']}}">
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".owl-carousel.x-images").owlCarousel({
                // center: true,
                loop: false,
                stagePadding: 80,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 30,
                        nav: true
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
