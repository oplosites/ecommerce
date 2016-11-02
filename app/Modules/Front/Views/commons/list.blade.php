@extends('layouts.main')

@section('content')

    @include('commons.panel-12-open', [
        'title' => (isset($title) ? $title . ' ' : '') . 'List'
    ])

        @if ($isCreateButtonEnable)

            <?php
                // Determining which create method that is used.
                // The default is the create method
                $createTarget = $mainController . '@' . (
                    isset($createMethod) ? $createMethod : 'create'
                );
            ?>

            {!!
                link_to_action(
                    $createTarget,
                    'Create New',
                    [],
                    [
                        'class' => 'btn btn-primary btn-sm'
                    ]
                )
            !!}
        @endif

        @include('Products::commons.table', [
            'heads' => $dataHeader,
            'rows' => $data,
        ])

    @include('commons.panel-close')

@endsection
