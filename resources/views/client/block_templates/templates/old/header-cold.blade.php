
<header id="header" class="header">
    <div class="header__container main-container">
        <div class="header__logo">
            <a href="{{ url('/') }}">
                <img src="{{ url('/') }}/img/header/logo-desktop.svg" alt="Logo">
            </a>
        </div>
        <nav class="header__nav">
            <ul class="header__nav-list">
                <li class="header__nav-item has-child">
                    <a href="#" class="header__nav-lnk">Yolllo Products</a>
                    <ul class="child-menu-list-child">
                        <li class="header__nav-item">
                            <a href="#" class="header__nav-lnk">Yolllo Products</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="#" class="header__nav-lnk">Yolllo Products</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="#" class="header__nav-lnk">Yolllo Products</a>
                        </li>
                    </ul>
                </li>
                <li class="header__nav-item">
                    <a href="#" class="header__nav-lnk">Premium</a>
                </li>
                <li class="header__nav-item">
                    <a href="#" class="header__nav-lnk">Why Yolllo</a>
                </li>
                <li class="header__nav-item">
                    <a href="#" class="header__nav-lnk">Subscriptions</a>
                </li>
            </ul>
        </nav>

        <div class="header__login">
            <a class="orange-button" href="{{ url('/') . '/login' }}">Sign in</a>
        </div>
    </div>
</header>
{{-- TODO relocate--}}
<main class="main" id="main">
    <article>