<?php
/**
 * @var $page \App\Models\Pages;
 */
?>
{{--    <div class="table-responsive">--}}
{{--        <table class="table m-0">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>ID</th>--}}
{{--                <th>template</th>--}}
{{--                <th>переменные</th>--}}
{{--                <th>order</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}

<div id="blockList" class="row">
    @foreach($page->blocks as $block)
        <div class="col-md-12" id="{{ $block->id }}">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title m-0 p-0">
                        {{ __('block.block') }}
                        <small>[{{ $block->template->name }}]</small>
                    </h3>
                    <p class="text-info m-0 p-0">[{{ $block->template->path }}]</p>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body row">
                    <div class="col-md-3">
                        <button
                            type="button"
                            class="btn btn-primary content-form"
                            data-toggle="modal"
                            data-target="#contentForm"
                            data-block_id="{{ $block->id }}"
                        >
                            +
                        </button>
                    </div>
                </div>
                <div class="card-body row">
                    @foreach($block->contents as $content)
                        <div class="col-md-4">
                            @include('admin.block.includes.content_list')
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endforeach
</div>
