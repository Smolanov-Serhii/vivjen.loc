<?php
/**
 * @var $module_item \App\Models\ModuleItem;
 */

//$attributes = $program->attrs();
$properties = $module_item->props->mapWithKeys(function ($prop) {
    return [$prop->type->key => $prop->value];
});
?>


@extends('client.layouts.main', ['page' => $module_item])
@section('content')
    <!-- block-content -->
    @foreach($module_item->blocks as $block)
        @if($block->enabled)
            <?php $view = explode('.', $block->template->path)[0]; ?>
            @include('client.block_templates.templates.'.$view)
        @endif
    @endforeach
    <!-- /.block-content -->
@endsection
