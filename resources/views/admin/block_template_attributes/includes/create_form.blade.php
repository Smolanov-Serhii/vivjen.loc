
<form id="blockCreateForm"
{{--      action="{{ route('admin.blocks.create', ['page' => $page]) }}"--}}
>
    <div class="alert alert-danger" style="display: none;">
    </div>
{{--    <div class="form-check">--}}
{{--        <input--}}
{{--            id="enabled"--}}
{{--            name="enabled"--}}
{{--            type="checkbox"--}}
{{--            class="form-check-input"--}}
{{--        >--}}
{{--        <label class="form-check-label" for="enabled"> @lang('system.disable') </label>--}}
{{--    </div>--}}
    <div class="form-group">
        <label for="name"> @lang('block_template_attributes.name') </label>
        <input
            id="name"
            name="name"
            type="text"
            class="form-control"
            placeholder="{{ __('block_template_attributes.name_placeholder') }}"
        >
    </div>
    <div class="form-group">
        <label for="default_value"> @lang('block_template_attributes.default_value') </label>
        <input
            id="default_value"
            name="default_value"
            type="text"
            class="form-control"
            placeholder="{{ __('block_template_attributes.default_value_placeholder') }}"
            disabled
        >
    </div>
    <div class="form-group">
        <label> @lang('block_template_attributes.type') </label>
        <select
            id="type"
            class="form-control select2bs4 select2-hidden-accessible"
            name="type"
            style="width: 100%;"
{{--            data-select2-id="17"--}}
{{--            tabindex="-1"--}}
            aria-hidden="true"
        >
            <option value="-1" selected disabled hidden> @lang('block_template_attributes.select_type') </option>
            @foreach($input_types as $id => $type)
                <option
                    value="option_{{ $type }}"
                >{{ __('system.'.$type) }}</option>
            @endforeach
        </select>
    </div>
</form>

{{--*********--}}
{{--*********--}}
{{--Templates--}}
{{--*********--}}
{{--*********--}}



<div class="input-group mb-3" id="option_image" style="display: none">
    <div class="custom-file">
        <input type="file" id="optionFile" class="custom-file-input input"  name="option[image][]">
        <label class="custom-file-label" for="optionFile"> @lang('system.select image') </label>
    </div>
    <div class="input-group-append">
        <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>
    </div>
</div>
{{--                   OPTION INPUT TEMPLATE--}}
{{--                    <div class="input-group mb-3">--}}
{{--                        <input type="text" class="form-control" placeholder="Something clever.." style="z-index:0">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <button class="btn btn-danger" type="button" style="z-index:1">Удалить</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
<div class="input-group mb-3" id="option_input" style="display: none">
    <input

        name="option[input][]"
        type="text"
        class="form-control input"
        placeholder="{{ __('system.input') }}"
        autocomplete="off"
    >
    <div class="input-group-append">
        <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>
    </div>
</div>
{{--                   OPTION INPUT TEMPLATE--}}
<div class="input-group mb-3" id="option_textarea" style="display: none">
    <textarea
        class="form-control input"
        rows="3"
        placeholder="{{ __('block_contents.content') }}"
        name="option[textarea][]"
    ></textarea>
    <div class="input-group-append">
        <a href="#" class="btn btn-danger remove-input"><i class="fas fa-trash"></i></a>
    </div>
</div>
