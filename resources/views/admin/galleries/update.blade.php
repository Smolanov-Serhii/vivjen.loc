@extends('adminlte::page')
@section('title', __('galleries.add'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.galleries.list')
        ],
        [
            'label' => __('galleries.edit'),
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
        action="{{ route('admin.galleries.update', ['gallery' => $gallery]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.galleries.includes.update_form')
    </form>
@endsection
@section('adminlte_css')
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
@endsection
