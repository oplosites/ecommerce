@extends('layouts.main')

@section('content')

@include('commons.panel-12-open', [
    'title' => 'Detail of ' . $data->title
])

<table class="table table-hover">
    <tr>
        <td>Title</td>
        <td>{{ $data->title }}</td>
    </tr>
    <tr>
        <td>Description</td>
        <td>{{ $data->description }}</td>
    </tr>
    <tr>
        <td>Purchase Price</td>
        <td>{{ $data->purchase_price }}</td>
    </tr>
    <tr>
        <td>Selling Price</td>
        <td>{{ $data->selling_price }}</td>
    </tr>
    <tr>
        <td>Available Stock</td>
        <td>{{ $data->stock }}</td>
    </tr>
    <tr>
        <td>Product Type</td>
        <td>{{ $data->productType->title }}</td>
    </tr>
    <tr>
        <td>Product Categories</td>
        <td>
            @foreach ($data->categories as $category)
                {{ $category->title }}<br/>
            @endforeach
        </td>
    </tr>
    <tr>
        <td>Product Images</td>
        <td>
            @foreach ($data->productImages as $image)
                <img src="{{ asset($image->url) }}"/>
            @endforeach
        </td>
    </tr>
</table>

{!!
    link_to_action("$controller@index",
        'Back to List',
        [],
        [
            'class' => 'btn btn-primary btn-sm'
        ]
    )
!!}


{!!
    link_to_action("$controller@create",
        'Create Another',
        [],
        [
            'class' => 'btn btn-default btn-sm'
        ]
    )
!!}

{!!
    link_to_action("$controller@edit",
        'Edit',
        [$data->id],
        [
            'class' => 'btn btn-warning btn-sm'
        ]
    )
!!}

@include('commons.panel-close')

@endsection
