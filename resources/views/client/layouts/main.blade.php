<!DOCTYPE html>
<html lang="en">
@include('client.layouts.head')
<body class="page-{{ $page->seo->alias }}">
<div class="main">
<div class="preloader">
    <div class="preloader__row">
        <div class="preloader__item"></div>
        <div class="preloader__item"></div>
    </div>
</div>

{{--header section--}}
{{--@if($page->seo->alias == "user-login" || $page->seo->alias == "user-register")--}}

{{--@else--}}
{{--    @include('client.layouts.header')--}}
{{--@endif--}}
{{--end header section--}}

{{--<main class="main" id="main">--}}
{{--    <article>--}}
    {{--content section--}}
{{--        @if($page->seo->alias == "user-login" || $page->seo->alias == "user-register" || $page->seo->alias == "courses" || $page->seo->alias == "blog" || $page->seo->alias == "knowledge"  || $page->seo->alias == "career")--}}

{{--        @else--}}
{{--            @yield('breadcrumbs')--}}
{{--        @endif--}}
    @yield('content')
    {{--end content section--}}
{{--    </article>--}}
{{--</main>--}}

{{--modal section--}}
{{--@include('client.block_templates.templates.modal')--}}
{{--end modal section--}}

{{--footer section--}}
{{--@if($page->seo->alias == "user-login" || $page->seo->alias == "user-register")--}}

{{--@else--}}
{{--    @include('client.layouts.footer')--}}
{{--@endif--}}

@yield('client_scripts')

{{--end footer section--}}
</div>
</body>
</html>
