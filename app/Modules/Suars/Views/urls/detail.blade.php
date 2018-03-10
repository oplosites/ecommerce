@extends('layouts.main')

@section('content')

@include('commons.panel-12-open', [
    'title' => 'Detail of ' . $data->title
])

<table class="table table-hover">
    <tr>
        <td>URL</td>
        <td>{{ $data->url }}</td>
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
