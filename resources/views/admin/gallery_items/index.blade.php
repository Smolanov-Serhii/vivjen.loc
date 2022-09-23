@extends('adminlte::page')
@section('title', __('module_items.list'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
        ],
        [
            'label' => 'Галереи',
            'url' => route('admin.galleries.list')
        ],
        [
            'label' => __('module_items.list'),
        ]
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title"> @lang('module_items.list') </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="form_item">
            @include('admin.gallery_items.includes.form')
        </div>

        <br>

        <!-- /.card-header -->
        <div class="card-body p-0 table-custom-admin">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                        <th>Фото</th>
                        <th>Название</th>
                        <th>Alt</th>
                        <th>Описание</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="list-items" id="sortable">
                    @foreach($gallery->items as $item)
                        @include('admin.gallery_items.item')
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('adminlte_js')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $('#image').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'))
            $.ajax({
                url: '{{route('admin.galleries.items.store', ['gallery'=>$gallery])}}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: data => {
                    $('#image').trigger("reset");
                    $('.list-items').append(data)
                }
            });
        });

        $(document).ready(function () {
            $("#sortable").sortable({
                update: function update(event, ui) {
                    var array_order = [];
                    for (var i = 0; i < event.target.children.length; i++) {
                        array_order.push($(event.target.children[i]).find('input[name="id"]').val())
                    }

                    $.ajax({
                        url: '{{route('admin.galleries.items.sort')}}',
                        method: 'POST',
                        data: {
                            'order': array_order,
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: data => {
                            console.log(data)
                        }
                    });
                }
            });

            $('body').on('click', '.edit', function () {
                var url = $(this).data('url');
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: data => {
                        $('.form_item').empty().append(data);
                    }
                });
            })
        })
    </script>
@endsection

