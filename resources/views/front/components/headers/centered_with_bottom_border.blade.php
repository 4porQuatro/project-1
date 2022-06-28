<header_single :component_data="{{json_encode($data)}}" :locales="{{json_encode(config('translatable.front_locales'))}}"></header_single>


<script>
    function resizeWindow(){
        if (window.innerWidth >= 576 && window.innerWidth <= 1600) {
            let zoom_percent = (window.innerWidth / 1600) * 100;
            document.body.style.zoom = zoom_percent + "%";
        } else if (window.innerWidth < 576) {
            let zoom_percent = (window.innerWidth / 375) * 100;
            document.body.style.zoom = zoom_percent + "%";
        }
    }
    $(document).ready(function() {
        resizeWindow()
        window.onresize = function(event) {
            resizeWindow()
        };
    })
</script>