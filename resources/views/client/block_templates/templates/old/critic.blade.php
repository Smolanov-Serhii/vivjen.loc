<?php
$contents = $block->mappedByKey();
?>
<section class="critic" id="critic">
    <div class="critic__container main-container">
        <div class="critic__image" data-aos="fade-right" data-aos-delay="200">
            <img src="{{  url('/') . '/uploads/contents/' . $contents['image']['value'] }}" alt="{{ $contents['third']['value'] }}">
        </div>
        <div class="critic__about">
            <h2 class="critic__title section-title" data-aos="fade-left" data-aos-delay="100">
                {!!   $contents['title']['value'] !!}
            </h2>
            <div class="critic__desc" data-aos="fade-left" data-aos-delay="300">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M39.6693 20.0027C28.885 20.1775 20.1757 28.8879 20.0026 39.6726L20 40L19.9973 39.6693C19.8225 28.885 11.1121 20.1757 0.327436 20.0026L0 20L0.330737 19.9973C11.2239 19.8207 20 10.9352 20 0C20 10.9352 28.7761 19.8207 39.6693 19.9973L40 20L39.6693 20.0027Z" fill="#ED6A32"/>
                </svg>
                <h3 class="critic__unsubtitle section-unsubtitle">
                    {{ $contents['title-small']['value'] }}
                </h3>
                <p class="section-subtitle">
                    {{ $contents['subtitle-small']['value'] }}
                </p>
                <div class="critic__excerpt">
                    {{ $contents['excerpt']['value'] }}
                </div>
            </div>
        </div>
        <div class="critic__list">
            <div class="critic__item" data-aos="fade-up" data-aos-delay="100">
                <div class="critic__icon">
                    <img src="{{url('/'). '/img/templates/critic/icon1.svg'}}" alt="{{ $contents['first']['value'] }}">
                </div>
                <h3 class="critic__description">
                    {{ $contents['first']['value'] }}
                </h3>
            </div>
            <div class="critic__item" data-aos="fade-up" data-aos-delay="300">
                <div class="critic__icon">
                    <img src="{{url('/'). '/img/templates/critic/icon2.svg'}}" alt="{{ $contents['second']['value'] }}">
                </div>
                <h3 class="critic__description">
                    {{ $contents['second']['value'] }}
                </h3>
            </div>
            <div class="critic__item" data-aos="fade-up" data-aos-delay="500">
                <div class="critic__icon">
                    <img src="{{url('/'). '/img/templates/critic/icon3.svg'}}" alt="{{ $contents['third']['value'] }}">
                </div>
                <h3 class="critic__description">
                    {{ $contents['third']['value'] }}
                </h3>
            </div>
        </div>
    </div>
</section>