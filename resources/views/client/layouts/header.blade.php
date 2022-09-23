 <header id="header" class="header">
        <div class="header__container main-container">
            <div class="header__logo">
                <a href="{{ url('/') }}" target="_self">
                    <img class="logo-desktop-left" src="{{ url('/') }}/img/header/logo-desktop-left.svg" alt="Educado logotype">
                    <img src="{{ url('/') }}/img/header/logo-desktop.svg" alt="Educado logotype">
                    <img class="logo-desktop-right" src="{{ url('/') }}/img/header/logo-desktop-right.svg" alt="Educado logotype">
                </a>
            </div>
            <div class="header__content">
                <div class="header__top">
                    <div class="header__contacts">
                        <div class="header__contacts-phones">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.3904 13.8568C17.3503 13.6091 17.195 13.3974 16.9625 13.2717L13.5221 11.2446L13.4937 11.2288C13.3495 11.1566 13.1902 11.1196 13.0289 11.1208C12.7406 11.1208 12.4653 11.23 12.2743 11.4215L11.2589 12.4374C11.2154 12.4787 11.0738 12.5385 11.0309 12.5406C11.0191 12.5397 9.84934 12.4554 7.69582 10.3017C5.54614 8.15246 5.45495 6.9791 5.45423 6.9791C5.45542 6.9191 5.51446 6.77798 5.55646 6.7343L6.42238 5.86861C6.72742 5.56285 6.81886 5.05597 6.6379 4.66333L4.72558 1.06501C4.58662 0.778935 4.31663 0.602295 4.01711 0.602295C3.80519 0.602295 3.6007 0.690135 3.44086 0.849735L1.08047 3.20485C0.854145 3.42998 0.659265 3.82358 0.616785 4.14038C0.596145 4.29182 0.177345 7.90669 5.13334 12.8634C9.34078 17.0704 12.6216 17.3973 13.5276 17.3973C13.6379 17.3987 13.7482 17.393 13.8578 17.3802C14.1737 17.338 14.5668 17.1436 14.7917 16.9182L17.1501 14.56C17.3426 14.3665 17.4305 14.1109 17.3904 13.8568Z" fill="#D3D360"/>
                            </svg>
                            <a href="tel:+38 (068) 145 0883">+38 (068) 145 0883</a>
                            <span>|</span>
                            <a href="tel:+38(068)1450883">+38 (068) 145 0883</a>
                        </div>
                        <div class="header__contacts-mail">
                            <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 4.608V12.75C20.0001 13.5801 19.6824 14.3788 19.1123 14.9822C18.5422 15.5856 17.7628 15.948 16.934 15.995L16.75 16H3.25C2.41986 16.0001 1.62117 15.6824 1.01777 15.1123C0.414367 14.5422 0.0519987 13.7628 0.00500011 12.934L0 12.75V4.608L9.652 9.664C9.75938 9.72024 9.87879 9.74962 10 9.74962C10.1212 9.74962 10.2406 9.72024 10.348 9.664L20 4.608ZM3.25 2.36051e-08H16.75C17.5556 -9.70147e-05 18.3325 0.298996 18.93 0.839267C19.5276 1.37954 19.9032 2.12248 19.984 2.924L10 8.154L0.016 2.924C0.0935234 2.15431 0.44305 1.43752 1.00175 0.902463C1.56045 0.367409 2.29168 0.049187 3.064 0.00500014L3.25 2.36051e-08H16.75H3.25Z" fill="#D3D360"/>
                            </svg>
                            <a href="mailto:educado.school@gmail.com">educado.school@gmail.com</a>
                        </div>
                    </div>
                    <div class="header__socials">
                        <a href="#"><img src="{{ url('/') }}/img/header/facebook.svg" alt="Facebook"></a>
                        <a href="#"><img src="{{ url('/') }}/img/header/instagram.svg" alt="Instagram"></a>
                        <a href="#"><img src="{{ url('/') }}/img/header/linkedin.svg" alt="Linkedin"></a>
                        <a href="#"><img src="{{ url('/') }}/img/header/whatsapp.svg" alt="Whatsapp"></a>
                        <a href="#"><img src="{{ url('/') }}/img/header/telegram.svg" alt="Telegram"></a>
                        <a href="#"><img src="{{ url('/') }}/img/header/viber.svg" alt="Viber"></a>
                    </div>
                    <div class="header__locale">
                        EN
                    </div>
                    <a href="{{ url('/') . "/login"}}" class="header__login">
                        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 5.6C11.8635 5.6 11.253 5.85286 10.8029 6.30294C10.3529 6.75303 10.1 7.36348 10.1 8C10.1 8.63652 10.3529 9.24697 10.8029 9.69706C11.253 10.1471 11.8635 10.4 12.5 10.4C13.1365 10.4 13.747 10.1471 14.1971 9.69706C14.6471 9.24697 14.9 8.63652 14.9 8C14.9 7.36348 14.6471 6.75303 14.1971 6.30294C13.747 5.85286 13.1365 5.6 12.5 5.6ZM9.67157 5.17157C10.4217 4.42143 11.4391 4 12.5 4C13.5609 4 14.5783 4.42143 15.3284 5.17157C16.0786 5.92172 16.5 6.93913 16.5 8C16.5 9.06087 16.0786 10.0783 15.3284 10.8284C14.5783 11.5786 13.5609 12 12.5 12C11.4391 12 10.4217 11.5786 9.67157 10.8284C8.92143 10.0783 8.5 9.06087 8.5 8C8.5 6.93913 8.92143 5.92172 9.67157 5.17157Z" fill="#D3D360"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9444 14.5556C9.91305 14.5556 8.92389 14.9653 8.19459 15.6946C7.46528 16.4239 7.05556 17.413 7.05556 18.4444V19.2222C7.05556 19.6518 6.70733 20 6.27778 20C5.84822 20 5.5 19.6518 5.5 19.2222V18.4444C5.5 17.0005 6.07361 15.6157 7.09464 14.5946C8.11567 13.5736 9.50049 13 10.9444 13H14.0556C15.4995 13 16.8843 13.5736 17.9054 14.5946C18.9264 15.6157 19.5 17.0005 19.5 18.4444V19.2222C19.5 19.6518 19.1518 20 18.7222 20C18.2927 20 17.9444 19.6518 17.9444 19.2222V18.4444C17.9444 17.413 17.5347 16.4239 16.8054 15.6946C16.0761 14.9653 15.087 14.5556 14.0556 14.5556H10.9444Z" fill="#D3D360"/>
                        </svg>
                        LogIn
                    </a>
                </div>
                <nav class="header__nav">
                    <ul class="header__nav-list">
                        <li class="header__nav-item current-page"><a href="#" class="header__nav-lnk">О школе</a></li>
                        <li class="header__nav-item"><a href="#" class="header__nav-lnk">Курсы</a></li>
                        <li class="header__nav-item"><a href="#" class="header__nav-lnk">Для компаний</a></li>
                        <li class="header__nav-item"><a href="#" class="header__nav-lnk">Цены</a></li>
                        <li class="header__nav-item"><a href="#" class="header__nav-lnk">Оплата</a></li>
                        <li class="header__nav-item"><a href="#" class="header__nav-lnk">Chat Online</a></li>
                        <li class="header__nav-item"><a href="#" class="header__nav-lnk">Вакансии</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
 <main class="main">