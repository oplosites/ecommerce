@extends('layouts.detail')

@section('detail')

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

@endsection
