@extends('admin-app')

@section('content')

@include('commons.panel-12-open', [
    'title' => 'New Category Entry'
])

{!!
    Form::model($data, [
        'action' => 'CategoriesController@store',
        'method' => 'post',
        'class' => 'form form-horizontal'
    ])
!!}

<div class="form-group">
    <label>Title</label>
    {!!
        Form::text('title',
            $data->title,
            [
                'class' => 'form-control',
                'placeholder' => 'Product Title',
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
                'placeholder' => 'Product Description',
                'rows' => 2,
            ]
        )
    !!}
</div>

<div class="form-group">
    {!!
        Form::submit('Submit',
            [
                'class' => 'btn btn-primary btn-sm',
                'placeholder' => 'Product Description',
                'rows' => 2,
            ]
        )
    !!}
</div>

{!! Form::close() !!}

@include('commons.panel-close')

@endsection
