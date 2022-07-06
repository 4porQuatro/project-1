<!-- SLIDER VIDEOS. MUST OPEN A POPUP WITH THE VIDEO. You can use a library as your choice. -->

<div class="my-12">
    <div class="container population">
{{--        <nav>--}}
{{--            <div class="nav nav-tabs" id="nav-tab" role="tablist">--}}
{{--                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>--}}
{{--                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>--}}
{{--                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>--}}
{{--            </div>--}}
{{--        </nav>--}}
        <div class="tab-content p-10" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
               {!! $result->body !!}
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Lorem ipsum dolor sit amet, officia excepteur ex fugiat reprehenderit enim
                labore culpa sint ad nisi Lorem pariatur mollit ex esse exercitation amet. Nisi
                animcupidatat excepteur officia. Reprehenderit nostrud nostrud ipsum Lorem est
                aliquip amet voluptate voluptate dolor minim nulla est proident. Nostrud officia
                pariatur ut officia. Sit irure elit esse ea nulla sunt ex occaecat reprehenderit
                commodo officia dolor Lorem duis laboris cupidatat officia voluptate. Culpa
                proident adipisicing id nulla nisi laboris ex in Lorem sunt duis officia
                eiusmod. Aliqua reprehenderit commodo ex non excepteur duis sunt velit enim.
                Voluptate laboris sint cupidatat ullamco ut ea consectetur et est culpa et
                culpa duis.</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.</div>
        </div>
    </div>
</div>

@if(!empty($data->videos->default))
<div class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto py-16 sm:py-24 lg:py-32 lg:max-w-none">
            <div class="mt-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-6">
                @foreach($data->videos->default as $video)
                <div class="group relative">
                    <img class="w-full h-full object-center object-cover" src="{{$video['path']}}">
                    <!-- The link for the video it's provided by $video['alt_text']
                        Link example: https://www.youtube.com/watch?v=bIywCGuN4Cg
                        The link can be a youtube video or vimeo.
                        -->
                    {{var_dump($video['alt_text'])}}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
