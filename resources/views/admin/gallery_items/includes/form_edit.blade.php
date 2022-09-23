<form method="POST" name="image_update" id="image_update" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Image</label>
        <br>
        <img src="/uploads/galleries/{{ $galleryItem->image }}" style="width:100px">
        <input type="file" name="image" accept="image/png, image/jpeg, image/jpg, image/gif"
               class="form-control" multiple/>
    </div>
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active @endif"
                           id="addition_tab_link"
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
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
                @foreach(\App\Models\Language::enabled()->get() as $language)
                    <div class="tab-pane fade show @if($loop->first) active @endif"
                         id="content_tab_{{ $language->iso }}"
                         role="tabpanel"
                         aria-labelledby="content_tab_{{ $language->iso }}">
                        <div class="variable-value" data-iso="{{ $language->iso }}">
                            @php
                                $values = $galleryItem->translations()->where('lang_id', $language->id)->first();
                            @endphp
                            <div class="form-group">
                                <label for="alt"> Alt </label>
                                <input
                                        name="alt[{{ $language->iso }}]"
                                        type="text"
                                        class="form-control"
                                        id="alt"
                                        value="{{$values->alt}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="name"> @lang('galleries.name') </label>
                                <input
                                        name="name[{{ $language->iso }}]"
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        value="{{$values->name}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="name"> @lang('galleries.description') </label>
                                <textarea
                                        name="description[{{ $language->iso }}]"
                                        class="form-control input"
                                        rows="2"
                                        id=""
                                >{{$values->description}}</textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <button type="submit" class="save_form btn btn-primary"> @lang('system.submit') </button>
</form>

<script>
    $('#image_update').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'))
        var id = "{{$galleryItem->id}}";
        $.ajax({
            url: '{{route('admin.galleries.items.update', ['gallery_item'=>$galleryItem])}}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: data => {
                $('.form_item').empty().append(data.form);
                $('.list-items').find('input[name="id"][value="'+id+'"]').parent().replaceWith(data.item)
            }
        });
    });
</script>