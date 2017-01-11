@extends('Front::index')
@section('content')

    <div class="row">
        <div class="col-md-5">
            @foreach ($data->productImages as $image)
                <img src="{{ asset($image->url) }}"
                    class="img-responsive"/>
            @endforeach
        </div>
        <div class="col-md-7">
            <p>
                {!! $data->description !!}
            </p>

            <a href="/appointment?id={{ $data->id }}"
                class="btn btn-default">
                Schedule an appointment
            </a>
            <a href="/assistance?id={{ $data->id }}"
                class="btn btn-default">
                Request assistance
            </a>
        </div>
    </div>

@endsection
