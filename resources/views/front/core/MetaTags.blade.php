<!-- Standard SEO -->
@isset($title)
<title>{{ $title }}</title>
@endisset
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@if(!empty($referrer))
<meta name="referrer" content="{{ $referrer }}">
@endif
<meta name="robots" content="{{ !empty($robots)? $robots : config('meta.robots') }}">
<meta name="description" content="{{ !empty($description)? $description : config('meta.description') }}">
<meta name="keywords" content="{{ !empty($keywords)? $keywords : config('meta.keywords') }}">
@if(!empty($geo_region) || config('meta.geo_region') !=='')
<meta name="geo.region" content="{{ $geo_region ?? config('meta.geo_region') }}">
@endif
@if(!empty($geo_region) || config('meta.geo_position') !=='')
<meta name="geo.position" content="{{ $geo_position ?? config('meta.geo_position') }}">
<meta name="ICBM" content="{{ $geo_position ?? config('meta.geo_position') }}">
@endif
@if(!empty($geo_placename))
<meta name="geo.placename" content="{{  $geo_placename }}">
@endif

{!! $micro_data !!}

<!-- Dublin Core basic info -->
<meta name="dcterms.Format" content="text/html">
<meta name="dcterms.Language" content="{{ config('app.locale') }}">
<meta name="dcterms.Identifier" content="{{ url()->current() }}">
<meta name="dcterms.Relation" content="{{  config('app.name') }}">
<meta name="dcterms.Publisher" content="{{  config('app.name') }}">
<meta name="dcterms.Type" content="text/html">
<meta name="dcterms.Coverage" content="{{ url()->current() }}">
<meta name="dcterms.Title" content="{{ !empty($title)? $title : config('meta.title') }}">
<meta name="dcterms.Subject" content="{{ !empty($keywords)? $keywords : config('meta.keywords') }}">
<meta name="dcterms.Contributor" content="{{ !empty($author)? $author : config('meta.author') }}">
<meta name="dcterms.Description" content="{{ !empty($description)? $description : config('meta.description') }}">


<!-- Facebook OpenGraph -->
<meta property="og:locale" content="{{  config('app.locale') }}">
<meta property="og:type" content="{{ !empty($type)? $type : config('meta.type') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ !empty($title)? $title : config('meta.title') }}">
<meta property="og:description" content="{{ !empty($description)? $description : config('meta.description') }}">
<meta property="og:image" content="{{ !empty($image)? $image : config('meta.image') }}">
<meta property="og:site_name" content="{{  config('app.name') }}">

@if(config('meta.fb_app_id') !=='')
<meta property="fb:app_id" content="{{ config('meta.fb_app_id') }}" />
@endif

<!-- Twitter Card -->
@if(!empty($twitter_card) || config('meta.twitter_card') !=='')
<meta name="twitter:card" content="{{ !empty($twitter_card)? $twitter_card : config('meta.twitter_card') }}">
@endif
@if(config('meta.twitter_site') !=='' || !empty($twitter_site))
<meta name="twitter:site" content="{{ !empty($twitter_site)? $twitter_site : config('meta.twitter_site') }}">
@endif
<meta name="twitter:title" content="{{ !empty($title)? $title : config('meta.title') }}">
<meta name="twitter:description" content="{{ !empty($description)? $description : config('meta.description') }}">
<meta name="twitter:image" content="{{ !empty($image)? $image : config('meta.image') }}">

<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if($script_cookies_concepted)

@if(!empty($global_scripts))
{!! $global_scripts->data !!}
@endif

@if(!empty($seo_scripts))
{!! $seo_scripts !!}
@endif

@endif