<?php
/**
 * @var $block Block
 */

use App\Models\Block;

$contents = $block->mappedByKey();
?>
<section class="banner main-container" id="banner">
    <div class="banner__container padding-left padding-right">
        <div class="banner__left">
            <h2 class="banner__title" data-aos="fade-right" data-aos-delay="100">
                {{ $contents['title']['value'] }}
            </h2>
            <h3 class="banner__subtitle" data-aos="fade-right" data-aos-delay="300">
                {!!  $contents['subtitle']['value']  !!}
            </h3>
            @if($contents['button-lnk']['value'])
                <a href="{{ $contents['button-lnk']['value'] }}" class="pink-button" data-aos="fade-right" data-aos-delay="500">
                    {{ $contents['button-name']['value'] }}
                    <svg width="33" height="17" viewBox="0 0 33 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 8.5H30" stroke="white" stroke-width="2.5"/>
                        <path d="M24 1.5L31 8.5L24 15.5" stroke="white" stroke-width="2.5"/>
                    </svg>
                </a>
            @endif
        </div>
        <div class="banner__right" data-aos="fade-left" data-aos-delay="100">
            <img src="{{  url('/') . '/uploads/contents/' . $contents['image']['value'] }}" alt="{{ $contents['title']['value'] }}">
        </div>
    </div>
</section>