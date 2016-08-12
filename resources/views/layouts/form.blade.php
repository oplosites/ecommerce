@extends('layouts.main')

@section('content')

    @include('commons.panel-12-open', [
        'title' => isset($panelTitle) ? $panelTitle : 'New Data'
    ])

        {!!
            Form::model($data, [
                'action' => "$mainController@store",
                'method' => 'post',
                'class' => 'form form-horizontal',
                'files' => true,
            ])
        !!}

            @yield('form')

            <div class="form-group">
                {!!
                    Form::submit('Submit', [
                        'class' => 'btn btn-sm btn-primary'
                    ])
                !!}

                <a class="btn btn-sm btn-default" href="{{ URL::previous() }}">Back</a>
            </div>
            
        {!! Form::close() !!}

    @include('commons.panel-close')

@endsection
