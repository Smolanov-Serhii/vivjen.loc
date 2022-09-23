<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="none"/>
    <title>{{ $page->seo->title }}</title>
    <link href="{{ url('/') }}/css/fonts.css?v={{ time() }}" rel="stylesheet">
    <link href="{{ url('/') }}/css/style.css?v={{ time() }}" rel="stylesheet">
    <script src="{{ url('/') }}/js/perfect-scrollbar.common.js" defer></script>
    <link rel="icon" type="image/png" href="{{ url('/') }}/img/icons/favicon.png" sizes="32x32">
    <link rel="icon" type="image/svg" href="{{ url('/') }}/img/icons/favicon.svg" sizes="32x32">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="{{ $page->seo->meta_description }}">
    <meta name="Keywords" content="{{ $page->seo->meta_keywords }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta property="og:url"                content="{{ url('/') . "/" . $page->seo->alias }}" />
    <meta property="og:site_name"          content="{{ env('APP_NAME') }}">
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $page->seo->title }}" />
    <meta property="og:description"        content="{{ $page->seo->meta_description }}" />
    <meta property="og:image"              content="{{ url('/') . '/uploads/seo/thumbs/' . $page->seo->thumbnail }}" />
    <script src="{{ url('/') }}/js/common.min.js?v={{ time() }}" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<script>
    window.onload = function () {
        document.body.classList.add('loaded_hiding');
        window.setTimeout(function () {
            document.body.classList.add('loaded');
            document.body.classList.remove('loaded_hiding');
        }, 500);

    }
</script>