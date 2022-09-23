<?php
/**
 * @var $block \App\Models\Block
 */
$contents = $block->mappedByKey();
$counter = 100;
?>
<section class="ecosystem main-container" id="ecosystem">
    <div class="ecosystem__container main-container">
        <h2 class="ecosystem__title section-title" data-aos="fade-right" data-aos-delay="100">
            {{ $contents['title']['value'] }}
        </h2>
        <div class="ecosystem__list">
            @foreach($block->localeIterations as $item)
                @php
                    $properties = $item->mappedByKey();
                @endphp
                <div class="ecosystem__item" data-aos="fade-up" data-aos-delay="{{ $counter }}">
                    <div class="ecosystem__icon">
                        <img src="{{  url("/uploads/contents/{$properties['image']['value']}") }}" alt="{{ $properties['item-title']['value'] }}">
                    </div>
                    <h3 class="ecosystem__name">
                        {{ $properties['item-title']['value'] }}
                    </h3>
                    <p class="ecosystem__desc">
                        {{ $properties['item-content']['value'] }}
                    </p>
                </div>
                @php
                    $counter = $counter + 200;
                @endphp
            @endforeach
        </div>
    </div>
</section>