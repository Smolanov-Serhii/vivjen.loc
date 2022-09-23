<?php
/**
 * @var $block \App\Models\Block
 */
$contents = $block->mappedByKey();
$counter = 100;
?>
<section class="familar" id="familar">
    <div class="familar__container main-container">
        <div class="familar__text">
            <h2 class="familar__title section-title" data-aos="fade-right" data-aos-delay="100">
                {{ $contents['title']['value'] }}
            </h2>
            <h3 class="familar__subtitle section-subtitle" data-aos="fade-right" data-aos-delay="300">
                {{ $contents['subtitle']['value'] }}
            </h3>
            <div class="familar__list">
                @foreach($block->localeIterations as $item)
                    @php
                        /**  @var  $item \App\Models\BlockTemplateRepeaterIteration */
                        $properties = $item->mappedByKey();
                    @endphp
                    <div class="familar__item" data-aos="fade-right" data-aos-delay="{{ $counter }}">
                        <div class="familar__icon">
                            <img src="{{  url("/uploads/contents/{$properties['icon']['value']}") }}"
                                 alt="{{ $properties['name']['value'] }}">
                        </div>
                        <div class="familar__cont">
                            <h4 class="familar__name">{!!   $properties['name']['value'] !!}</h4>
                            <p class="familar__desc">{{ $properties['desc']['value'] }}</p>
                            @if( $properties['lnk']['value'] )
                                <a href="{{ $properties['lnk']['value'] }}" class="familar__lnk">
                                    {{ $var['learn-more'] }}
                                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="11.5" cy="11.5" r="11.5" fill="#ED6A32"/>
                                        <path d="M7.57143 15.4286L15 8" stroke="white" stroke-width="2"/>
                                        <path d="M15 16V8H7" stroke="white" stroke-width="2"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                    @php
                        /** @var $counter int */
                        $counter += 100;
                    @endphp
                @endforeach
            </div>
        </div>
        <div class="familar__image padding-right" data-aos="fade-left" data-aos-delay="400">
            <picture>
                <source srcset="{{  url('/') . '/uploads/contents/' . $contents['image-desktop']['value'] }}"
                        media="(min-width: 1024px)">
                <source srcset="{{  url('/') . '/uploads/contents/' . $contents['image-tablet']['value'] }}"
                        media="(min-width: 768px)">
                <img src="{{  url('/') . '/uploads/contents/' . $contents['image-mobile']['value'] }}"
                     alt="{{ $contents['title']['value'] }}">
            </picture>
        </div>
    </div>
</section>
