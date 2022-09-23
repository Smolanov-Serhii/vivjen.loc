{{-- @include('client.block_templates.default.form',['key'=> $keyForm]) --}}

{!! \App\Models\Form::where('key', $key)->first()->getForm(); !!}