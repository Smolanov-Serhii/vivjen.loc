<div class="header__locale">
    @foreach($links as $iso => $locale)
        @if(!$locale['link'])
            <div class="header__language-current">
{{--                <img src='{{ url("/img/header/{$iso}.svg") }}' alt="{{ $locale['text'] }}">--}}
                {{--                <span class="active">{{ $locale['text'] }}</span>--}}
                <span class="current">{{ $iso }}</span>
            </div>
        @endif
    @endforeach
    @php
        $langs = Cache::get('languages')->count();
    @endphp
    @if($langs)
        <div class="header__language-else" style="display: none">
            <div class="header__language-else-wrapper">
                @foreach($links as $iso => $locale)
                    @if($locale['link'])
                        <a href="{{ url($locale['link']) }}"><img src='{{ url("/img/header/{$iso}.svg") }}' alt="{{ $iso }}">{{ $locale['text'] }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>