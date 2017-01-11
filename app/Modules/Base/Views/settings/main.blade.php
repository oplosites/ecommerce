@extends('Base::main')

@section('content')

    @include('Base::commons.panel-12-open', [
        'title' => 'Front Slider'
    ])

        @include('Front::components.slider', [
            'data' => $data
        ])

        <div class="row">
            <div class="col-md-12">
                <form class="form"
                    method="POST"
                    enctype="multipart/form-data"
                    action="settings/slider">
                    <div class="form-group">
                        <label>Upload an image</label>
                        <input type="file"
                            name="new-slider"
                            class="form-control"/>
                    </div>

                    <div class="form-group">
                        <input type="submit"
                            class="btn btn-primary"
                            value="Submit"/>
                    </div>
                </form>
            </div>
        </div>

    @include('Base::commons.panel-12-close')

@endsection
