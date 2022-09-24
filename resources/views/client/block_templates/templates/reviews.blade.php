<?php
$contents = $block->mappedByKey();
$module = \App\Models\Module::where('name', 'reviews')->first();
$items = $module->items;
?>
<section class="reviews">
    <div class="reviews__container middle-container">
        <div class="reviews__slider swiper-container">
            <div class="reviews__wrapper swiper-wrapper">
                @foreach($items as $item)
                    @php
                        $properties = $item->props->mapWithKeys(function ($prop) {
                                        return [$prop->type->key => $prop->value];
                                        });
                    @endphp
                    <div class="reviews__item swiper-slide">
                        <div class="reviews__item-photo">
                            <img src="{{  url('/') . '/uploads/module_items/' . $properties['photo'] ?? ''  }}"
                                 alt="{{ $properties['fio'] ?? '' }}">
                        </div>
                        <div class="reviews__item-desc">
                            <svg width="53" height="42" viewBox="0 0 53 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.632 0L14.514 29.52L11.808 18.45C15.334 18.45 18.204 19.475 20.418 21.525C22.632 23.575 23.739 26.404 23.739 30.012C23.739 33.538 22.591 36.408 20.295 38.622C18.081 40.754 15.293 41.82 11.931 41.82C8.487 41.82 5.617 40.754 3.321 38.622C1.107 36.408 0 33.538 0 30.012C0 28.946 0.0820003 27.921 0.246 26.937C0.41 25.871 0.738 24.641 1.23 23.247C1.722 21.853 2.419 20.008 3.321 17.712L10.455 0H22.632ZM51.66 0L43.542 29.52L40.836 18.45C44.362 18.45 47.232 19.475 49.446 21.525C51.66 23.575 52.767 26.404 52.767 30.012C52.767 33.538 51.619 36.408 49.323 38.622C47.109 40.754 44.321 41.82 40.959 41.82C37.515 41.82 34.645 40.754 32.349 38.622C30.135 36.408 29.028 33.538 29.028 30.012C29.028 28.946 29.11 27.921 29.274 26.937C29.438 25.871 29.766 24.641 30.258 23.247C30.75 21.853 31.447 20.008 32.349 17.712L39.483 0H51.66Z" fill="#F2F2F2"/>
                            </svg>
                            <div class="reviews__item-content">
                                {!! $properties['rev'] ?? '' !!}
                            </div>
                            <div class="reviews__item-fio">
                                {{ $properties['fio'] ?? ''}}
                            </div>
                            <div class="reviews__item-work">
                                {{ $properties['work'] ?? ''}}
                                <span>{{ $properties['company'] ?? ''}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>