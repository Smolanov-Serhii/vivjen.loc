<?php
$contents = $block->mappedByKey();
?>
<section class="follow main-container" id="follow">
    <div class="follow__container main-container">
        <h2 class="follow__title section-title" data-aos="fade-right" data-aos-delay="100">
            {{ $contents['title']['value'] }}
        </h2>
        <div class="follow__socials" data-aos="fade-up" data-aos-delay="500">
            @if($contents['facebook']['value'])
                <a class="follow__lnk" href="{{ $contents['facebook']['value'] }}">
                    <img src="{{ url('/') }}/img/templates/follow/fb.svg">
                </a>
            @endif
            @if($contents['twitter']['value'])
                <a class="follow__lnk" href="{{ $contents['twitter']['value'] }}">
                    <img src="{{ url('/') }}/img/templates/follow/tweet.svg">
                </a>
            @endif
            @if($contents['instagram']['value'])
                <a class="follow__lnk" href="{{ $contents['instagram']['value'] }}">
                    <img src="{{ url('/') }}/img/templates/follow/insta.svg">
                </a>
            @endif
            @if($contents['linkedin']['value'])
                <a class="follow__lnk" href="{{ $contents['linkedin']['value'] }}">
                    <img src="{{ url('/') }}/img/templates/follow/in.svg">
                </a>
            @endif
            @if($contents['youtube']['value'])
                <a class="follow__lnk" href="{{ $contents['youtube']['value'] }}">
                    <img src="{{ url('/') }}/img/templates/follow/youtube.svg">
                </a>
            @endif
        </div>
        <div class="follow__elem" data-aos="fade-up" data-aos-delay="500">
            <div class="follow__elem-icon">
                <img src="{{ url('/') }}/img/templates/follow/emblema.svg">
            </div>
            <div class="follow__elem-cont">
                <h3 class="follow__elem-title section-title">
                    {{ $contents['item-title']['value'] }}
                </h3>
                <div class="follow__elem-decoration">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M39.6693 20.0027C28.885 20.1775 20.1757 28.8879 20.0026 39.6726L20 40L19.9973 39.6693C19.8225 28.885 11.1121 20.1757 0.327436 20.0026L0 20L0.330737 19.9973C11.2239 19.8207 20 10.9352 20 0C20 10.9352 28.7761 19.8207 39.6693 19.9973L40 20L39.6693 20.0027Z"
                              fill="#24C4D5"/>
                    </svg>
                </div>
                <div class="follow__elem-desc section-subtitle">
                    {{ $contents['item-content']['value'] }}
                </div>
            </div>
        </div>
    </div>
</section>