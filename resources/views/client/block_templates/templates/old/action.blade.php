<?php
/**
 * @var $block \App\Models\Block
 */
$contents = $block->mappedByKey();
?>
<section class="action" id="action">
    <div class="action__container main-container">
        <div class="action__wrapper main-container">
            <div class="action__text">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M39.6693 20.0027C28.885 20.1775 20.1757 28.8879 20.0026 39.6726L20 40L19.9973 39.6693C19.8225 28.885 11.1121 20.1757 0.327436 20.0026L0 20L0.330737 19.9973C11.2239 19.8207 20 10.9352 20 0C20 10.9352 28.7761 19.8207 39.6693 19.9973L40 20L39.6693 20.0027Z" fill="#ED6A32"/>
                </svg>
                <h2 class="action__title" data-aos="fade-right" data-aos-delay="100">
                    {{ $contents['title']['value'] }}
                </h2>
                @if($contents['button-lnk']['value'])
                    <a href="{{ $contents['button-lnk']['value'] }}" class="action__lnk pink-button" data-aos="fade-right" data-aos-delay="400">
                        {{ $contents['button-text']['value'] }}
                    </a>
                @endif
            </div>
            <div class="action__image" data-aos="fade-up" data-aos-delay="800">
                <picture>
                    <source srcset="{{  url('/') . '/uploads/contents/' . $contents['image-desktop']['value'] }}" media="(min-width: 500px)">
                    <img src="{{  url('/') . '/uploads/contents/' . $contents['image-mobile']['value'] }}" alt="{{ $contents['title']['value'] }}">
                </picture>
            </div>
        </div>
    </div>
</section>