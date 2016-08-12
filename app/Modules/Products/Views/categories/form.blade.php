@extends('layouts.form')

@section('form')

<div class="form-group">
    <label>Parent</label>
    {!!
        Form::select('parent',
            $productCategories,
            $data->parent_id,
            [
                'class' => 'form-control'
            ]
        )
    !!}
</div>

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

@endsection
