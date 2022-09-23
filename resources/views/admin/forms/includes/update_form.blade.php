@csrf

<div class="card-body">
    <div class="form-group">
        <label for="key"> @lang('forms.key') </label>
        <input
                name="key"
                type="text"
                class="form-control"
                id="key"
                placeholder="Key"
                value="{{$form->key}}"
        >
    </div>
    <div class="form-group">
        <label for="email"> Email </label>
        <input
                name="email"
                type="email"
                class="form-control"
                id="email"
                placeholder="email"
                value="{{$form->email}}"
        >
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
                                $values = $form->translations()->where('lang_id', $language->id)->first();
                            @endphp

                            <div class="form-group">
                                <label for="name"> @lang('galleries.name') </label>
                                <input
                                        name="name[{{ $language->iso }}]"
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        value="{{ $values->name }}"
                                >
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.card -->
        </div>

    </div>

    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active"
                       id="addition_tab_link"
                       data-toggle="pill"
                       href="#content_tab_form"
                       role="tab"
                       aria-controls="custom-tabs-two-home"
                       aria-selected="false"
                    >
                        Form
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       id="addition_tab_link"
                       data-toggle="pill"
                       href="#content_tab_main"
                       role="tab"
                       aria-controls="custom-tabs-two-home"
                       aria-selected="false"
                    >
                        Mail
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active"
                     id="content_tab_form"
                     role="tabpanel"
                     aria-labelledby="content_tab_form">
                    <button type="button" class="btn add-type" data-toggle="modal" data-target="#exampleModal" data-type="text">
                        text
                    </button>
                    <button type="button" class="btn add-type" data-toggle="modal" data-target="#exampleModal" data-type="email">
                        email
                    </button>
                    <button type="button" class="btn add-type" data-toggle="modal" data-target="#exampleModal" data-type="tel">
                        tel
                    </button>
                    <button type="button" class="btn add-type" data-toggle="modal" data-target="#exampleModal" data-type="number">
                        number
                    </button>
                    <button type="button" class="btn add-type" data-toggle="modal" data-target="#exampleModal" data-type="date">
                        date
                    </button>
                    <button type="button" class="btn add-type" data-toggle="modal" data-target="#exampleModal" data-type="textarea">
                        textarea
                    </button>
                    <button type="button" class="btn add-type" data-toggle="modal" data-target="#exampleModal" data-type="checkbox">
                        checkbox
                    </button>
                    <button type="button" class="btn add-type" data-toggle="modal" data-target="#exampleModal" data-type="radio">
                        radio
                    </button>
                    <button type="button" class="btn add-type" data-toggle="modal" data-target="#exampleModal" data-type="file">
                        file
                    </button>
                    <button type="button" class="btn add-type" data-toggle="modal" data-target="#exampleModal" data-type="submit">
                        submit
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Type: <span class="name"></span></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row required">
                                        <label for="required" class="col-sm-4 col-form-label">Field type</label>
                                        <div class="col-sm-8">
                                            <input type="checkbox" value="1" id="required">
                                            <label for="required" class="col-form-label">Required field</label>
                                        </div>
                                    </div>
                                    <div class="form-group row name">
                                        <label for="Name" class="col-sm-4 col-form-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                    </div>
                                    <div class="form-group row default">
                                        <label for="default" class="col-sm-4 col-form-label">Default value</label>
                                        <div class="col-sm-8">
                                            @foreach(\App\Models\Language::enabled()->get() as $language)
                                                <div style="display: flex">
                                                    <span>{{$language->iso}}</span><input
                                                            name="default[{{ $language->iso }}]"
                                                            type="text"
                                                            class="form-control"
                                                            id="default"
                                                    >
                                                </div>
                                            @endforeach
                                            <input value="1" type="checkbox" id="placeholder">
                                            <label for="placeholder" class="col-form-label">Use this text as the placeholder of the field</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="default" class="col-sm-4 col-form-label">Label</label>
                                        <div class="col-sm-8">
                                            @foreach(\App\Models\Language::enabled()->get() as $language)
                                                <div style="display: flex">
                                                    <span>{{$language->iso}}</span><input
                                                            name="label[{{ $language->iso }}]"
                                                            type="text"
                                                            class="form-control"
                                                            id="label"
                                                    >
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="id" class="col-sm-4 col-form-label">Id attribute</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="id">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="class" class="col-sm-4 col-form-label">Class attribute</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="class">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary save-form-item" data-dismiss="modal">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <textarea name="form" id="form-dom" rows="20" style="width: 100%">{{$form->form}}</textarea>
                </div>
                <div class="tab-pane fade"
                     id="content_tab_main"
                     role="tabpanel"
                     aria-labelledby="content_tab_form">
                    {{implode('    ', $form->getFields())}}
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        @foreach(\App\Models\Language::where('enabled', true)->get() as $language)
                            <li class="nav-item">
                                <a class="nav-link @if($loop->first) active @endif"
                                   id="addition_tab_mail"
                                   data-toggle="pill"
                                   href="#content_tab_mail_{{ $language->iso }}"
                                   role="tab"
                                   aria-controls="custom-tabs-two-home"
                                   aria-selected="false"
                                >
                                    {{ $language->iso }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                        @foreach(\App\Models\Language::enabled()->get() as $language)
                            <div class="tab-pane fade show @if($loop->first) active @endif"
                                 id="content_tab_mail_{{ $language->iso }}"
                                 role="tabpanel"
                                 aria-labelledby="content_tab_mail_{{ $language->iso }}">
                                <div class="variable-value" data-iso="{{ $language->iso }}">
                                    @php
                                        $values = $form->translations()->where('lang_id', $language->id)->first();
                                    @endphp
                                    <br>
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="subject[{{ $language->iso }}]" id="subject" value="{{$values->subject}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="body" class="col-sm-2 col-form-label">Message body</label>
                                            <div class="col-sm-10">
                                                <textarea name="body[{{ $language->iso }}]" rows="20" style="width: 100%">{{$values->body}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="attach" class="col-sm-2 col-form-label">Attach</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="attach[{{ $language->iso }}]" id="attach" value="{{$values->attach}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary"> @lang('system.submit') </button>
    </div>
</div>

@section('adminlte_js')
    <script src="{{ asset('/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('/js/summernote.js') }}"></script>

    <script>
        $('.add-type').click(function () {
            var type = $(this).data('type');
            $('.modal-dialog').find('span.name').html(type);

            if (type == 'checkbox' || type == 'radio') {
                $('input#placeholder').hide();
                $('label[for="placeholder"]').hide();
            }

            if (type == 'file') {
                $('.default').hide();
            }

            if (type == 'submit') {
                $('.default').hide();
                $('.required').hide();
                $('.name').hide();
            }
        });

        $('body').on('click', '.save-form-item', function() {
            var _required = $('.modal-dialog').find('#required');
            var _name = $('.modal-dialog').find('#name').val();
            var _label = $('.modal-dialog').find('#label').val();
            var _default = $('.modal-dialog').find('#default').val();
            var _placeholder = $('.modal-dialog').find('#placeholder');
            var _id = $('.modal-dialog').find('#id').val();
            var _class = $('.modal-dialog').find('#class').val();
            var type = $('.modal-dialog').find('span.name').html();

            var value = '\n['+type;

            if (_required.is(":checked")) {
                value+='*';
            }

            if (_name != '') {
                value+=' '+_name;
            }

            if (_placeholder.is(":checked") && _default != '') {
                value+=' placeholder' + '="'+_default+'"';
            } else if (_default != '') {
                value+=' default' + '="'+_default+'"';
            }

            if (_id != '') {
                value+=' id="'+_id+'"';
            }

            if (_class != '') {
                value+=' class="'+_class+'"';
            }

            if (_label != '') {
                value+=' label="'+_label+'"';
            }

            value+=' ]';

            $('.modal-dialog').find('#required').prop('checked', false);
            $('.modal-dialog').find('#name').val('');
            $('.modal-dialog').find('#label').val('');
            $('.modal-dialog').find('#default').val('');
            $('.modal-dialog').find('#placeholder').prop('checked', false);
            $('.modal-dialog').find('#id').val('');
            $('.modal-dialog').find('#class').val('');
            $('#form-dom').val($('#form-dom').val()+value)
            $('input#placeholder').show();
            $('label[for="placeholder"]').show();
            $('.default').show();
            $('.required').show();
            $('.name').show();
        })
    </script>
@endsection