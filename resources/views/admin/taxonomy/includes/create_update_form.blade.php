<?php
$u_id = rand(2e9, 2e12);
?>
@csrf

<div class="card-body">
    <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="custom-tabs-two-profile" role="tabpanel"
             aria-labelledby="custom-tabs-two-profile-tab">
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                            <li class="nav-item">
                                <a class="nav-link @if($loop->first) active @endif"
                                   id="content_tab_link"
                                   data-toggle="pill"
                                   href="#content_tab_{{ $language->iso }}"
                                   role="tab"
                                   aria-controls="custom-tabs-two-home"
                                   aria-selected="false"
                                >
                                    {{ $language->iso }}
                                </a>
                            </li>
                        @endforeach

                        {{--                <li class="nav-item">--}}
                        {{--                    <a class="nav-link"--}}
                        {{--                       id="seo_tab_link"--}}
                        {{--                       data-toggle="pill"--}}
                        {{--                       href="#seo_tab_"--}}
                        {{--                       role="tab"--}}
                        {{--                       aria-controls="custom-tabs-two-profile"--}}
                        {{--                       aria-selected="false"--}}
                        {{--                    >--}}
                        {{--                        @lang('seo.form_tab')--}}
                        {{--                    </a>--}}
                        {{--                </li>--}}
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                        @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                            <div class="tab-pane fade show @if($loop->first) active @endif" id="content_tab_{{ $language->iso }}" role="tabpanel"
                                 aria-labelledby="content_tab_{{ $language->iso }}">
                                <div class="form-group">
                                    <label for="key"> @lang('taxonomy.key') </label>
                                    <input
                                            name="key"
                                            type="text"
                                            class="form-control"
                                            id="key"
                                            placeholder="@lang('taxonomy.key')"
                                            value="{{ $taxonomy->key ?? old('key') }}"
                                            required
                                    >
                                </div>
                                @if($language->iso == config('app.fallback_locale'))
                                <div class="form-group">
                                    <label for="key"> @lang('taxonomy.name') </label>
                                    <input
                                            name="taxonomy[{{$language->iso}}][name]"
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            placeholder="@lang('taxonomy.name')"
                                            value="{{ $taxonomy->name ?? old('name') }}"
                                            required
                                    >
                                </div>
                                @else
                                    <div class="form-group">
                                        <label for="key"> @lang('taxonomy.name') </label>
                                        <input
                                                name="taxonomy[{{$language->iso}}][name]"
                                                type="text"
                                                class="form-control"
                                                id="name"
                                                placeholder="@lang('taxonomy.name')"
                                                value="{{ $taxonomy->withLang($language->id)->name ?? old('name') }}"
                                                required
                                        >
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="selectType"> @lang('block_option_contents.add_value') </code></label>
                                    <select
                                            class="custom-select form-control-border type-selector"
                                            id="type"
                                            data-id="{{ $u_id }}"
                                    >
                                        <option value="-1" selected disabled hidden> @lang('variables.select_type') </option>
                                        @foreach(\App\Models\TaxonomyAttribute::TYPE_LIST as $id => $type)
                                            <option
                                                    value="{{ $type }}"
                                            >{{ __('system.'.$type) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="module-attributes" id="module_attributes">
                                    @foreach($taxonomy->attrs as $attribute)
                                        <div class="input-group mb-3">
                                            <label for="">{{ \App\Models\TaxonomyAttribute::TYPE_LIST[$attribute->type] }}</label>
                                            <input type="hidden" name="old_attributes[{{ $attribute->id }}][type]"
                                                   value="{{ $attribute->type }}">
                                            <input
                                                    name="old_attributes[{{ $attribute->id }}][key]"
                                                    type="text"
                                                    class="form-control input"
                                                    placeholder="Ключ аттрибута"
                                                    autoComplete="off"
                                                    value="{{ $attribute->key }}"
                                                    required
                                            >
                                            <input
                                                    name="old_attributes[{{ $attribute->id }}][name]"
                                                    type="text"
                                                    class="form-control input"
                                                    placeholder="Название аттрибута"
                                                    autoComplete="off"
                                                    value="{{ $attribute->name }}"
                                                    required
                                            >
                                            <div class="input-group-append">
                                                <a
                                                        href="#"
                                                        class="btn btn-danger remove-input"
                                                        data-id="{{ $attribute->id }}"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="input-group"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>


<div class="card-footer">
    <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
</div>

@section('adminlte_js')
    <script src="{{ asset('/js/taxonomies/add_remove_attributes.js') }}"></script>
@endsection