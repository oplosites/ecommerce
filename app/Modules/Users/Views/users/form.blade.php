@extends('layouts.form')

@section('form')

<div class="form-group">
    <label>User Name</label>
    {!!
        Form::text('username',
            $data->name,
            [
                'class' => 'form-control',
                'placeholder' => 'Product Type',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Email</label>
    {!!
        Form::text('username',
            $data->name,
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
