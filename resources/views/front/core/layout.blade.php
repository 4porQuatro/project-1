<!doctype html>
<html lang="pt">
<head>
    {!! $seo->toHtml() !!}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="{{ mix('/front/css/app.css') }}" rel="stylesheet">
</head>
<body class="">

<div id="app">
    @if(!empty($layout) && !empty($layout->header))
        @include($layout->header->component->path, ['data'=>$layout->header->getFrontData(), 'terms'=>$layout->header->getFrontTerms()])

        @if(request()->segment(1) == 'with-component-path')
            {{$layout->header->component->path}}
        @endif

    @endif

    @foreach($sections as $section)
        @if(!empty($section->component->componentable_type) && !empty($result))
            @include($section->component->path, ['data'=>$section->getFrontData(), 'terms'=>$section->getFrontTerms(), 'model'=>$result])
        @else
            @include($section->component->path, ['data'=>$section->getFrontData(), 'terms'=>$section->getFrontTerms()])
        @endif

            @if(request()->segment(1) == 'with-component-path')
                {{$section->component->path}}
            @endif
    @endforeach

    @if(!empty($layout))
        @foreach($layout->sections as $section)
            @include($section->component->path, ['data'=>$section->getFrontData(), 'terms'=>$section->getFrontTerms()])

                @if(request()->segment(1) == 'with-component-path')
                    {{$section->component->path}}
                @endif
        @endforeach
    @endif

    @if(!empty($layout) && !empty($layout->footer))
        @include($layout->footer->component->path, ['data'=>$layout->footer->getFrontData(), 'terms'=>$layout->footer->getFrontTerms()])

            @if(request()->segment(1) == 'with-component-path')
                {{$layout->footer->component->path}}
            @endif
    @endif
</div>
</body>
<script src="{{ asset('/front/js/app.js') }}"></script>
@stack('scripts')
<!-- Scripts -->

</html>
