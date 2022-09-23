@extends('adminlte::page')
@section('title', __('forms.add'))
@section('content_header')
    @include('breadcrumbs', $breadcrumbs = [
        [
            'label' => 'Панель управления',
            'url' => route('admin.forms.list')
        ],
        [
            'label' => __('forms.edit'),
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
        action="{{ route('admin.forms.update', ['form' => $form]) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @include('admin.forms.includes.update_form')
    </form>
@endsection
