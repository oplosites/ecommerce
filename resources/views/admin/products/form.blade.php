@extends('admin-app')

@section('content')

@include('commons.panel-12-open', [
    'title' => 'New Product Entry'
])

{!!
    Form::model($data, [
        'action' => 'ProductController@store',
        'method' => 'post',
        'class' => 'form form-horizontal'
    ])
!!}

<div class="form-group">
    <label>Title</label>
    {!!
        Form::text('title',
            $data->title, [
                'class' => 'form-control',
                'placeholder' => 'Product Title',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Type</label>
    {!!
        Form::select('description',
            $productTypes,
            $data->product_type_id,
            [
                'class' => 'form-control'
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Categories</label>
    @foreach ($productCategories as $category)

    {!!
        Form::checkbox('category[' . $category . ']',
            $category->id,
            false
        )
    !!}

    @endforeach
</div>

<div class="form-group">
    <label>Description</label>
    {!!
        Form::textarea('description',
            $data->description, [
                'class' => 'form-control',
                'placeholder' => 'Product Description',
                'rows' => 2,
            ]
        )
    !!}
</div>

{!! Form::close() !!}

@include('commons.panel-close')

@endsection
