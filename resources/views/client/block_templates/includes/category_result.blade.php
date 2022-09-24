{{--@dd($items)--}}
<div class="category__result" id="category_result">
    @foreach($items as $item)
        @php
            /**
             * @var $item
             */
                $properties = $item->props->mapWithKeys(function ($prop) {
                                return [$prop->type->key => $prop->value];
                                });
        @endphp
        <div class="tarifs__item">
            <div class="tarifs__item-header">
                {{--                        <a href="{{ route('client.tariffs.item', ['alias' => $item->seo->alias]) }}">--}}
                <h2 class="tarifs__item-title">
                    {{ $properties['tariffs-name'] ?? '' }}
                </h2>
                <p class="tarifs__item-subtitle">{{ $properties['tariffs-subtitle'] ?? '' }}</p>
                {{--                        </a>--}}
                <div class="tarifs__item-price">
                    <span>$</span>
                    <div class="value">
                        {{ $properties['tariffs-price'] ?? '' }}
                    </div>
                </div>
            </div>
            <div class="tarifs__item-desc">
                {!!  $properties['tariffs-desc'] ?? '' !!}
            </div>
            <div class="tarifs__item-button">
                <div class="stroke-btn">
                    Попробовать
                </div>
            </div>
        </div>
    @endforeach
</div>