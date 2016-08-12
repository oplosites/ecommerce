@extends('layouts.form')

@section('form')

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
            $data->purchase_price, [
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
            $data->selling_price, [
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
            $data->stock, [
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
            isset($data->productType) ? $data->productType->id : null,
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
            <?php $ischecked = StringUtil::contains($currentCategories, "$key"); ?>
            <div class="icheckbox_flat-green" style="position: relative;">
                {!!
                    Form::checkbox('categories[' . $key . ']',
                        $key,
                        $ischecked,
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
    @foreach ($data->productImages as $image)
        <br/>
        <img src="{{ asset($image->url) }}"/>
    @endforeach

    {!!
        Form::file('image[]',
            [
                'class' => 'form-control',
                'multiple' => true
            ]
        )
    !!}
</div>

@endsection
