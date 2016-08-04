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

<div class="form-group">
    <label>Purchase Price</label>
    {!!
        Form::number('purchase-price',
            $data->title, [
                'class' => 'form-control',
                'placeholder' => 'Purchase Price',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Selling Price</label>
    {!!
        Form::number('selling-price',
            $data->title, [
                'class' => 'form-control',
                'placeholder' => 'Selling Price',
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Available Stock</label>
    {!!
        Form::number('stock',
            $data->title, [
                'class' => 'form-control',
                'placeholder' => 'Stock',
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
    @foreach ($productCategories as $key => $category)

    <label>
        {!!
            Form::checkbox('category[' . $category . ']',
                $key,
                false,
                [
                    'class' => 'form-control'
                ]
            )
        !!}
        {!! $category !!}
    </label>

    @endforeach
</div>

<div class="form-group">
    <label>Gambar</label>
    {!!
        Form::file('image1',
            $data->image,
            [
                'class' => 'form-control',
            ]
        )
    !!}

    {!!
        Form::file('image2',
            $data->image,
            [
                'class' => 'form-control',
            ]
        )
    !!}

    {!!
        Form::file('image2',
            $data->image,
            [
                'class' => 'form-control',
            ]
        )
    !!}
</div>

<div class="form-group">
    {!! Form::submit('Submit', [
        'class' => 'btn btn-sm btn-primary'
    ]) !!}
</div>

{!! Form::close() !!}

@include('commons.panel-close')

@endsection
