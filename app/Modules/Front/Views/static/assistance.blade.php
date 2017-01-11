@extends('Front::index')

@section('content')

    <link rel="stylesheet"
        href="/Themes/reine/style/about.css"/>

    <link rel="stylesheet"
        href="/Themes/reine/style/jquery.datetimepicker.css"/>

    <script src="/Themes/reine/script/jquery.datetimepicker.full.min.js"></script>

    <div class="row">
        <div class="col-md-12">
            <h1 class="about-header">Request an Assistance</h1>
        </div>
    </div>

    <form class="form"
        method="POST"
        action="/assistance">
        <div class="row">
            @if (!empty($data))

            <div class="col-md-6">
                <img src="{{ $data->productImages[0]->url }}"
                    class="img-responsive"/>

                <p>{{ $data->description }}</p>
            </div>
            <div class="col-md-6">

            @else

            <div class="col-md-12">

            @endif
                <form class="form">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text"
                                    class="form-control contact-input"
                                    name="name"
                                    placeholder="Full Name"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control contact-input"
                                    name="email"
                                    placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number"
                                    class="form-control contact-input"
                                    name="phone"
                                    placeholder="Phone Number"/>
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text"
                                    class="form-control contact-input"
                                    name="subject"
                                    placeholder="Subject"/>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control contact-input"
                                    placeholder="Message"
                                    name="message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit"
                                class="btn btn-warning contact-input"
                                value="Submit"/>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </form>

    <script>
        $('#schedule').datetimepicker();
    </script>
@endsection
