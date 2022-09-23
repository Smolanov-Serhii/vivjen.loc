<header id="header" class="header header-cabinet">
    <div class="header__container main-container">
        <a class="custom-logo-link" rel="home" aria-current="page" href="{{ url('/') }}">
            <img class="custom-logo lazyloaded" src="{{ url('/img/header/logo-desktop.svg') }}" alt="">
        </a>
        <div class="header__personal">
            <div class="header__search js-search">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.61719 0C11.8173 0 15.2344 3.41707 15.2344 7.61719C15.2344 9.29531 14.6885 10.8481 13.7655 12.1082L20 18.3427L18.3427 20L12.1082 13.7655C10.8481 14.6885 9.29531 15.2344 7.61719 15.2344C3.41707 15.2344 0 11.8173 0 7.61719C0 3.41707 3.41707 0 7.61719 0ZM7.61719 14.0625C11.1711 14.0625 14.0625 11.1711 14.0625 7.61719C14.0625 4.06324 11.1711 1.17188 7.61719 1.17188C4.06324 1.17188 1.17188 4.06324 1.17188 7.61719C1.17188 11.1711 4.06324 14.0625 7.61719 14.0625Z"
                          fill="#181818"/>
                </svg>
            </div>
            @auth
                {{ Auth::user()->name }},
                <a href="{{ route('logout') }}" class="header__login header__buttons-item border-button">
                    Выйти
                </a>
            @endauth
        </div>
    </div>
</header>
