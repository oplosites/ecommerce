@extends('admin-app')

@section('content')

@include('commons.panel-12-open', [
    'title' => 'New Product Entry'
])

{!!
    Form::model($data, [
        'action' => 'ProductController@store',
        'method' => 'post',
        'class' => 'form form-horizontal',
        'files' => true,
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
        Form::select('type',
            $productTypes,
            $data->product_type_id,
            [
                'class' => 'form-control'
            ]
        )
    !!}
</div>

<div class="form-group">
    <label>Categories
        <p>
        @foreach ($productCategories as $key => $category)

            <div class="icheckbox_flat-green" style="position: relative;">
                {!!
                    Form::checkbox('category[' . $category . ']',
                        $key,
                        false,
                        [
                            'class' => 'flat',
                            'data-parsley-minchec' => '2',
                            'data-parsley-multiple' => 'categories',
                            'style' => 'position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);',
                        ]
                    )
                !!}
            </div> {!! $category !!}
            <br/>
            <br/>

        @endforeach
        </p>
    </label>
</div>

<div class="form-group">
    <label>Gambar</label>
    {!!
        Form::file('image[]',
            [
                'class' => 'form-control',
                'multiple' => true
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
