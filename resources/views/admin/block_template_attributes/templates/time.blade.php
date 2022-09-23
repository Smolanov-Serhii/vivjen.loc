<div class="input-group mb-3 rounded field-input" id="option_{{ $u_id }}">
    <h2>Поле времени</h2>
    <br>
    <div class="form-group" style="width:100%">
        <input type="hidden" name="attribute[{{ $u_id }}][type]" value="{{ $attribute_type_id }}">
        <input type="hidden" name="attribute[{{ $u_id }}][parent_id]" value="{{ $parent_id }}">

        <div class="input-group create_field-input">
            <input
                    name="attribute[{{ $u_id }}][key]"
                    type="text"
                    class="form-control"
                    placeholder="{{ __('block_template_attributes.key') }}"
            >
            <input
                    name="attribute[{{ $u_id }}][name]"
                    type="text"
                    class="form-control"
                    placeholder="{{ __('block_template_attributes.name') }}"
            >
            <input
                    name="attribute[{{ $u_id }}][default_value]"
                    type="time"
                    class="form-control input"
                    placeholder="{{ __('block_template_attributes.default_value') }}"
                    value=""
            >
        </div>
        <div class="input-group-append">
            <button
                    data-u_id="{{ $u_id }}"
                    class="btn btn-danger remove-input"
                    type="button"
                    style="z-index:1"
            >Удалить</button>
        </div>

    </div>
</div>
