<?php
$contents = $block->mappedByKey();
?>
<header id="header" class="header">
    <div class="header__container main-container">
        <div class="header__logo">
            <div href="{{ url('/') }}">
                <img src="{{ url('/') }}/img/header/logo-desktop.svg" alt="Logo">
            </div>
        </div>
        <nav class="header__nav">
            <ul class="header__nav-list">
                <li class="header__nav-item">
                    <a href="{{ $contents['yolllo-products-lnk']['value'] }}" class="header__nav-lnk">{{ $var['yolllo-products'] }}</a>
                </li>
                    <li class="header__nav-item has-child">
                        <div class="header__nav-lnk">{{ $var['premium-name'] }}</div>
                        <ul class="child-menu-list-child">

                        </ul>
                    </li>

                @if($contents['why-yolllo-lnk']['value'])
                    <li class="header__nav-item">
                        <a href="{{ $contents['why-yolllo-lnk']['value'] }}"
                           class="header__nav-lnk">{{ $var['whu-yollio'] }}</a>
                    </li>
                @endif

            </ul>
        </nav>
        @if($contents['lang-visible']['value'] == 1)
            @widget('localeLinks', ['page' => $page])
        @endif

        <div class="header__login">
            <a class="orange-button"
               href="{{ $contents['button-lnk']['value'] }}">{{ $contents['button-title']['value'] }}</a>
        </div>
        <div class="header__burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="header__mobile">
            <nav class="header__mobile-nav">
                <ul class="header__nav-list">
                    <li class="header__nav-item">
                        <a href="{{ $contents['yolllo-products-lnk']['value'] }}" class="header__nav-lnk">{{ $var['yolllo-products'] }}</a>
                    </li>
                    <li class="header__nav-item has-child">
                        <div class="header__nav-lnk">{{ $var['premium-name'] }}</div>
                        <ul class="child-menu-list-child">

                        </ul>
                    </li>

                    @if($contents['why-yolllo-lnk']['value'])
                        <li class="header__nav-item">
                            <a href="{{ $contents['why-yolllo-lnk']['value'] }}"
                               class="header__nav-lnk">{{ $var['whu-yollio'] }}</a>
                        </li>
                    @endif

                </ul>
            </nav>
            @if($contents['lang-visible']['value'] == 1)
                @widget('localeLinks', ['page' => $page])
            @endif
            <div class="header__login">
                <a class="orange-button"
                   href="{{ $contents['button-lnk']['value'] }}">{{ $contents['button-title']['value'] }}</a>
            </div>
        </div>
    </div>
</header>
{{-- TODO relocate--}}
<main class="main" id="main" role="main">
    <article>