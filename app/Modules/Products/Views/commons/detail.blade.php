@extends('app')

@section('content')

    @include('commons.panel-12-open', [
        'title' => $mainTitle
    ])

    <table class="table table-bordered table-hovered responsive-utilities jambo_table">
        <tbody>
            @foreach ($dataHeader as $key => $value)
                <tr>
                    <td style="width: 300px;">{{ $value }}</td>
                    <td>{{ $item[$key] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="btn-group">
        {!! link_to_action(
                $editMethod,
                'Edit',
                $item['id'],
                ['class' => 'btn btn-warning']
            );
        !!}

        {!! link_to_action(
                $mainController . '@index',
                'Back',
                [],
                ['class' => 'btn btn-default']
            );
        !!}
    </div>
    @include('commons.panel-close')

@endsection
