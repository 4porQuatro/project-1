<!-- SLIDER IMAGES -->
@if(!empty($data->images->default))
<div class="container-fluid mt-10">
    <div class="row">
        <div class="col-lg">
            <div class="owl-carousel x-images list_images_with_title">
                @foreach($data->images->default as $image)
                <img class="object-cover mr-2" src="{{$image['path']}}" alt="{{$image['alt_text']}}">
                @endforeach
            </div>
        </div>
    </div>
</div>
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
@endif