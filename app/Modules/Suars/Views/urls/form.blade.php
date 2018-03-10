@extends('layouts.form')

@section('form')

<div class="form-group">
    <label>URL</label>
    {!!
        Form::text('url',
            $data->url, [
                'class' => 'form-control',
                'placeholder' => 'URL',
            ]
        )
    !!}
</div>

@endsection
