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