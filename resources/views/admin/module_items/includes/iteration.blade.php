
<div class="field-iteration {{ $module_item->module->name }}-field" id="iteration_">
@foreach($group as $key => $iteration)
    @php
        $iterator_id = $iteration->id;
        //$parent = $parent_iteration_id ?? 'Module_items';
    @endphp

        @if($key == 0)
            <h4>{{ $iteration->repeater->name }}</h4>
        @endif
        @foreach($iteration->props as $prop)
            @php
                $attribute = $prop->type;
            @endphp
            <div class="form-group {{ $module_item->module->name }}-field field-{{ \App\Models\ModuleAttribute::TYPE_LIST[$attribute->type] }}">
                @switch($attribute->type)
                    @case(0)

                    @if($key == 0)
                        <label for=""> {{ $attribute->name }} </label>
                    @endif

                    <div class="input-group mb-3" id="option_image_{{ $attribute->id }}">
                        <div class="custom-file">
                            <input
                                    id="optionFile_{{ $attribute->id }}"
                                    type="file"
                                    class="custom-file-input input"
                                    name="old_iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $prop->id }}]"
                            >
                            <label class="custom-file-label" for="optionFile_{{ $prop->id }}"></label>
                        </div>
                    </div>
                    @break

                    @case(1)
                    @if($key == 0)
                        <label for="key"> {{ $attribute->name }} </label>
                    @endif
                    <input
                            name="old_iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $prop->id }}]"
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="{{ $attribute->type }}"
                            value="{{ $prop->value }}"
                    >
                    @break

                    @case(2)
                    @if($key == 0)
                        <label for=""> {{ $attribute->name }} </label>
                    @endif
                    <textarea
                            class="form-control input textarea"
                            rows="3"
                            placeholder="{{ __('system.textarea') }}"
                            name="old_iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $prop->id }}]"
                            id="content_{{ $attribute->id }}"
                    >{{ $prop->value }}</textarea>
                    @break

                    @case(3)
                    @if($key == 0)
                        <label for=""> {{ $attribute->name }} </label>
                    @endif
                    <input
                            name="old_iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $prop->id }}]"
                            type="hidden"
                            id="hidden_attribute_{{ $attribute->id }}"
                            value="{{ $prop->value }}"
                    >
                    <textarea
                            class="form-control input editor"
                            rows="3"
                            placeholder="{{ __('system.textarea') }}"
                            name="iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $attribute->id }}]"
                            id="content_{{ $attribute->id }}"
                            required
                    >
                    {{ $prop->value }}
                </textarea>
                    @break
                    @case(5)
                    @if($key == 0)
                        <label for="key"> {{ $attribute->name }} </label>
                    @endif
                    <input
                            name="old_iterations[{{ $parent }}][{{ $iteration->repeater->id }}][{{ $iterator_id }}][{{ $prop->id }}]"
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="{{ $attribute->type }}"
                            value="{{ $prop->value }}"
                    >
                    @break
                @endswitch
            </div>
        @endforeach
        <button
                type="button"
                class="btn btn-danger btn-icon module-item remove-iteration"
                data-iteration_id="{{ $iterator_id }}"
        >
            <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
@endforeach
    @if($iteration->iterations->count())
        @include('admin.module_items.includes.iterations', [
            'iterations' => $iteration->iterations,
            $parent_iteration_id = $iterator_id,
        ])
    @endif

    <button
            type="button"
            class="btn btn-primary btn-icon add-iteration-module"
            data-template_url="{{ route('admin.module_repeaters.template', [
        'moduleRepeater' => $iteration->repeater,
        'parent_iteration_id' => $parent]) }}"
            {{--    data-iteration_id="{{ $iteration->id }}"--}}
    >
        <i class="fa fa-plus-square" aria-hidden="true"></i>
    </button>
</div>