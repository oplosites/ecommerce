@extends('layouts.form')

@section('form')

<div class="form-group">
    <label>Title</label>
    {!!
        Form::text('title',
            $data->title,
            [
                'class' => 'form-control',
                'placeholder' => 'Product Type',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Description</label>
    {!!
        Form::textarea('description',
            $data->description,
            [
                'class' => 'form-control',
                'placeholder' => 'Product Type Description',
                'rows' => 2,
            ]
        )
    !!}
</div>

@endsection
