<?php
/**
 * @var $pages \Illuminate\Database\Eloquent\Collection;
 */
?>
@extends('adminlte::page')
@section('title', __('pages.add'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.galleries.list')
        ],
        [
            'label' => __('galleries.add'),
        ]
    ])
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form
            role="form"
            action="{{ route('admin.galleries.store') }}"
            method="post"
            enctype="multipart/form-data"
    >
        @include('admin.galleries.includes.create_form')
    </form>
@endsection
@section('adminlte_css')
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
@endsection
