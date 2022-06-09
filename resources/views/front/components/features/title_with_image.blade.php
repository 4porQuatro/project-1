<div class="bg-white">
    <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
        <div class="space-y-12">
            <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                <div>
                    <p class="page-heading">
                        {{$data->title->default}}
                    </p>
                    <!-- <img class="mx-auto" src="/storage/files/headings/{{$data->title->default}}.svg" alt="/storage/files/headings/{{$data->title->default}}.svg" style='height:12vh;'> -->
                </div>
            </div>
            <div class="d-flex">
                @if(!empty($data->image->default))
                <img class="mx-auto w-75" src="{{$data->image->default[0]['path']}}">
                @endif
            </div>
        </div>
    </div>
</div>