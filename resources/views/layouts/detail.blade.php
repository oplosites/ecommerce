@extends('layouts.main')

@section('content')

    @include('commons.panel-12-open', [
        'title' => 'Detail of ' . $data->title
    ])

            @yield('detail')

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

        {!! Form::close() !!}

    @include('commons.panel-close')

@endsection
