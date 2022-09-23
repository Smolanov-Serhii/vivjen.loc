<?php
$contents = $block->mappedByKey();
?>
<section class="education main-container" id="education">
    <div class="education__container main-container">
        <div class="education__image" data-aos="fade-up" data-aos-delay="100">
            <img src="{{  url('/') . '/uploads/contents/' . $contents['image']['value'] }}">
        </div>
        <div class="education__text">
            <h2 class="education__title" data-aos="fade-left" data-aos-delay="400">
                {{ $contents['title']['value'] }}
            </h2>
            <h3 class="education__subtitle section-subtitle" data-aos="fade-left" data-aos-delay="700">
                {{ $contents['subtitle']['value'] }}
            </h3>
            @if($contents['button-lnk']['value'])
                <a href="{{ $contents['button-lnk']['value'] }}" class="education__lnk grey-button" data-aos="fade-left" data-aos-delay="1000">
                    {{ $contents['button-text']['value'] }}
                    <svg width="33" height="17" viewBox="0 0 33 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 8.5H30" stroke="#0D0E17" stroke-width="2.5"/>
                        <path d="M24 1.5L31 8.5L24 15.5" stroke="#0D0E17" stroke-width="2.5"/>
                    </svg>
                </a>
            @endif
        </div>
    </div>
</section>