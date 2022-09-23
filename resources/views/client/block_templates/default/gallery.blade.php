{{-- include @include('client.block_templates.default.gallery', ['key' => $keyGallery]) --}}

@php
    $gallery = \App\Models\Gallery::where('key', $key)->first();
@endphp

<div>
    <img width="100" src="/uploads/galleries/{{$gallery->image}}" alt="">
    <span>Name: {{$gallery->translate->name}}</span>
    <span>Description: {{$gallery->translate->description}}</span>
</div>
<br>
@foreach($gallery->items as $item)
    <div>
        <img width="100" src="/uploads/galleries/{{$item->image}}" alt="{{$item->translate->alt}}">
        <span>Name: {{$item->translate->name}}</span>
        <span>Description: {{$item->translate->description}}</span>
    </div>
@endforeach