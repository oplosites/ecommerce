@extends('layouts.form')

@section('form')

<div class="form-group">
    <label>User Name</label>
    {!!
        Form::text('username',
            $data->name,
            [
                'class' => 'form-control',
                'placeholder' => 'User Name',
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
                'placeholder' => 'User Email',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Password</label>
    {!!
        Form::text('password',
            null,
            [
                'class' => 'form-control',
                'placeholder' => 'Password',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Password Confirmation</label>
    {!!
        Form::text('password_confirmation',
            null,
            [
                'class' => 'form-control',
                'placeholder' => 'Password Confirmation',
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
                'placeholder' => 'User Description',
                'rows' => 2,
            ]
        )
    !!}
</div>

@endsection
