@extends('admin-app')

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
</table>

{!!
    link_to_action('CategoriesController@index',
        'Back to List',
        [],
        [
            'class' => 'btn btn-primary btn-sm'
        ]
    )
!!}


{!!
    link_to_action('CategoriesController@create',
        'Create Another',
        [],
        [
            'class' => 'btn btn-default btn-sm'
        ]
    )
!!}

@include('commons.panel-close')

@endsection
