
<?php
$contents = $block->mappedByKey();
$ids = $block->repeaters->keyBy('key');

?>
</article>
</main>
<footer class="footer" id="footer">
    <div class="footer__container main-container">
        <div class="footer__brand">
            <div class="footer__logo">
                <a href="{{ url('/') }}">
                    <img src="{{ url('/') }}/img/footer/logo.svg" alt="Logo">
                </a>
            </div>
            <div class="footer__about">
                <p>Yolllo Corp is a private virtual network that has unique features and has high security.</p>
            </div>
            <div class="footer__emblema">
                <img src="{{ url('/') }}/img/footer/emblema.svg" alt="emblema">
            </div>
            <div class="footer__cards">
                <img src="{{ url('/') }}/img/footer/discover.svg" alt="discover">
                <img src="{{ url('/') }}/img/footer/mastercard.svg" alt="mstercard">
                <img src="{{ url('/') }}/img/footer/visa.svg" alt="visa">
                <img src="{{ url('/') }}/img/footer/amex.svg" alt="american express">
            </div>
            <div class="footer__date">
                @php
                    echo date('Y') . " Yolllo Corp";
                @endphp
            </div>
        </div>
        <div class="footer__navigate">
            @if($block->localeIterations()->where('block_template_repeater_id', $ids['menu-products']->id)->get()->count() > 0)
                <div class="footer__products">
                    <div class="footer__menu-name">
                        {{ $contents['products']['value'] ?? ''}}
                        <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L7 7L13 1" stroke="#0D0E17" stroke-width="2"/>
                        </svg>
                    </div>
                    <nav class="footer__navigate-nav">
                        <ul class="footer__navigate-list">
                            @foreach($block->localeIterations()->where('block_template_repeater_id', $ids['menu-products']->id)->get() as $item)
                                @php
                                    /**  @var  $item \App\Models\BlockTemplateRepeaterIteration */
                                    $properties = $item->mappedByKey();
                                @endphp
                                @if($properties['menu-products-lnk']['value'])
                                    <li class="footer__navigate-item"><a class="footer__navigate-link" href="{{ $properties['menu-products-lnk']['value'] }}">{{ $properties['menu-products-name']['value'] }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            @endif
            <div class="footer__Info">
                <div class="footer__menu-name">
                    {{ $contents['info']['value'] ?? ''}}
                    <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L13 1" stroke="#0D0E17" stroke-width="2"/>
                    </svg>

                </div>
                <nav class="footer__navigate-nav">
                    <ul class="footer__navigate-list">
                        @foreach($block->localeIterations()->where('block_template_repeater_id', $ids['menu-info']->id)->get() as $item)
                            @php
                                /**  @var  $item \App\Models\BlockTemplateRepeaterIteration */
                                $properties = $item->mappedByKey();
                            @endphp
                            @if($properties['menu-info-lnk']['value'])
                                <li class="footer__navigate-item"><a class="footer__navigate-link" href="{{ $properties['menu-info-lnk']['value'] }}">{{ $properties['menu-info-name']['value'] }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="footer__engage">
                <div class="footer__menu-name">
                    {{ $contents['engage']['value'] ?? ''}}
                    <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L13 1" stroke="#0D0E17" stroke-width="2"/>
                    </svg>

                </div>
                <nav class="footer__navigate-nav">
                    <ul class="footer__navigate-list">
                        @foreach($block->localeIterations()->where('block_template_repeater_id', $ids['menu-engage']->id)->get() as $item)
                            @php
                                /**  @var  $item \App\Models\BlockTemplateRepeaterIteration */
                                $properties = $item->mappedByKey();
                            @endphp
                            @if($properties['menu-engage-lnk']['value'])
                                <li class="footer__navigate-item"><a class="footer__navigate-link" href="{{ $properties['menu-engage-lnk']['value'] }}">{{ $properties['menu-engage-name']['value'] }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
        <div class="footer__logo-mobile">
            <a href="{{ url('/') }}">
                <img src="{{ url('/') }}/img/footer/logo.svg" alt="Logo">
            </a>
        </div>
    </div>
</footer>
