@extends('client.layouts.main')
@section('content')

            <div class="breadcrumbs main-container">
                <div class="breadcrumbs__list">
                    <ul class="breadcrumb">
                    @if($model->alias == 'main')
                        <!-- <li>
                                <span>{{ $model->title }}</span>
                            </li> -->
                        @else
                            <a href="{{ url('/') }}">
                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.6649 9.29429C20.3145 9.29429 20.9015 9.31172 21.4864 9.28313C21.6659 9.27476 21.9277 9.17505 21.9873 9.04954C22.0469 8.92403 21.9138 8.67301 21.7821 8.56633C18.404 5.78791 15.0201 3.01693 11.6303 0.253392C11.2139 -0.0868794 10.8895 -0.0854842 10.4533 0.263852C8.89469 1.51895 7.33783 2.77777 5.78269 4.0403C5.70177 4.10585 5.6157 4.16651 5.45827 4.28505V1.64307C4.72263 1.64307 4.05394 1.64307 3.38157 1.64307C3.09982 1.64307 3.16088 1.83551 3.16088 1.98752C3.16088 3.24262 3.15058 4.49772 3.16529 5.75282C3.17261 5.87188 3.14893 5.99081 3.09634 6.09916C3.04374 6.2075 2.96384 6.30191 2.86368 6.37409C1.98091 7.0895 1.09815 7.81467 0.238186 8.55517C0.105771 8.66883 -0.0420928 8.94495 0.0174939 9.0342C0.104299 9.17366 0.35736 9.27476 0.546419 9.28452C1.12978 9.3159 1.71608 9.29568 2.34505 9.29568V9.73776C2.34505 13.0254 2.3502 16.3131 2.33696 19.6007C2.33696 19.9299 2.44142 20.0045 2.77025 20.0024C4.69468 19.9884 6.61838 19.9954 8.54281 19.9954H8.9452V11.5305H13.0648V19.9717H19.6649V9.29429Z" fill="black"/>
                                </svg>
                                {{ $var['to-main'] }}
                            </a>
                            <span class="devider"> | </span>
                            <span class="current-page">Результат поиска по запросу “{{ $query }}”</span>
                    @endif
                </div>
            </div>

            <section class="search-page">
                <div class="search-page__design">

                </div>
                <div class="search-page__content main-container">
                    <h1 class="search-page__title section-title">
                        Результат поиска по запросу “{{ $query }}”
                    </h1>
                    <div class="search-page__counter">
                        Найдено <span>{{ $module_item_props->count() }}</span> результатов
                    </div>
                </div>
                <div class="search-page__results main-container">
                    @foreach($module_item_props as $prop)
                        <div class="search-page__result">
                            <a href="#" class="search-page__result-permalink">
                                <h2 class="search-page__result-title">
                                    {!! $prop->value !!}
                                </h2>
                            </a>
                            <div class="search-page__result-excerpt">
                                <img src="{{ '/uploads/additions/thumbs/' . $prop->thumbnail }}" alt="">
                                {{ $prop->title }}
                                {!! $prop->content !!}
                                {{ $prop->excerpt }}
                                {{ $prop->alias }}

{{--                                @foreach($prop->item->props as $item_property)--}}
{{--                                    @if($item_property->id == $prop->id)--}}
{{--                                        <strong>{!! $item_property->value  !!}</strong>--}}
{{--                                    @else--}}
{{--                                        {!! $item_property->value  !!}--}}
{{--                                    @endif--}}
{{--                                    <br>--}}
{{--                                @endforeach--}}
{{--                                @foreach($prop ->item->props as )--}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

@endsection
