<form method="POST" name="image" id="image" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Image</label>
        <br>
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
                            <div class="form-group">
                                <label for="alt"> Alt </label>
                                <input
                                        name="alt[{{ $language->iso }}]"
                                        type="text"
                                        class="form-control"
                                        id="alt"
                                        value=""
                                >
                            </div>
                            <div class="form-group">
                                <label for="name"> @lang('galleries.name') </label>
                                <input
                                        name="name[{{ $language->iso }}]"
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        value=""
                                >
                            </div>
                            <div class="form-group">
                                <label for="name"> @lang('galleries.description') </label>
                                <textarea
                                        name="description[{{ $language->iso }}]"
                                        class="form-control input"
                                        rows="2"
                                        id=""
                                ></textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <button type="submit" class="save_form btn btn-primary"> @lang('system.submit') </button>
</form>