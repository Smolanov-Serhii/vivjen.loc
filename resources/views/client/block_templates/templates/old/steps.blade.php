<?php
$contents = $block->mappedByKey();
$ids = $block->repeaters->keyBy('key');
$counter = 0;

?>
<section class="steps main-container" id="steps">
    <div class="steps__container padding-right padding-left">
        <div class="steps__image" data-aos="fade-right" data-aos-delay="100">
            <picture>
                <source srcset="{{  url('/') . '/uploads/contents/' . $contents['image-desktop']['value'] }}" media="(min-width: 1024px)">
                <source srcset="{{  url('/') . '/uploads/contents/' . $contents['image-tablet']['value'] }}" media="(min-width: 768px)">
                <img src="{{  url('/') . '/uploads/contents/' . $contents['image-mobile']['value'] }}" alt="">
            </picture>
        </div>
        <div class="steps__form">
            <form action="" method="post">
                <h2 class="steps__title section-title">
                    {{ $contents['title']['value'] }}
                </h2>
                <label for="" class="steps__label">
                    <p class="steps__subtitle section-subtitle">{{ $contents['first-label']['value'] }}</p>
                    <select class="steps__select elem-select">
                        @foreach($block->localeIterations()->where('block_template_repeater_id', $ids['select-item-top']->id)->get() as $item)
                            @php
                                /**  @var  $item \App\Models\BlockTemplateRepeaterIteration */
                                $properties = $item->mappedByKey();
                            @endphp
                            <option value="1000" data-lnk="{{ url('/') . '/uploads/contents/' . $properties['document']['value'] }}">{{ $properties['price']['value'] }}</option>
                        @endforeach
                    </select>
                </label>
                <label for="" class="steps__label" data-aos="fade-right" data-aos-delay="300">
                    <p class="steps__subtitle section-subtitle">{{ $contents['second-label']['value'] }}</p>
                    <select class="steps__select elem-select">
                        @foreach($block->localeIterations()->where('block_template_repeater_id', $ids['select-item-bottom']->id)->get() as $item)
                            @php
                                /**  @var  $item \App\Models\BlockTemplateRepeaterIteration */
                                $properties = $item->mappedByKey();
                            @endphp
                            <option value="1000">{{ $properties['timings']['value'] }}</option>
                        @endforeach
                    </select>
                </label>

                @foreach($block->localeIterations()->where('block_template_repeater_id', $ids['select-item-top']->id)->get() as $item)
                @php
                    /**  @var  $item \App\Models\BlockTemplateRepeaterIteration */
                    $properties = $item->mappedByKey();
                @endphp
                @if ($loop->first)
                        <a href="{{ url('/') . '/uploads/contents/' . $properties['document']['value'] }}" download class="steps__submit orange-button">{{ $contents['button-text']['value'] }}</a>
                @endif
                @endforeach
            </form>
        </div>
    </div>
</section>