<!-- <div class="bg-gray-100">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-32 lg:max-w-none">

      <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
        @foreach($data->images->default as $img)
            <div class="group relative">
                <div class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                        <img class="w-full h-full object-center object-cover"
                            src="{{$img['path']}}"
                            alt="{{$img['alt_text']}}"
                        >
                </div>
            </div>
        @endforeach
      </div>

    </div>
  </div>
</div> -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg">

            <div class="owl-carousel auditorio x-images list_images_with_title">
                @foreach($data->images->default as $image)
                <img class="object-cover mr-2" src="{{$image['path']}}" alt="{{$image['alt_text']}}">
                @endforeach
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(".owl-carousel.auditorio").owlCarousel({
            // center: true,
            loop: false,stagePadding: 80,
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
                1000:{
                    items: 2,
                    nav: true
                }
            }
        });
    });
</script>