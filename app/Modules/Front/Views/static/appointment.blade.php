@extends('Front::index')

@section('content')

    <link rel="stylesheet"
        href="/Themes/reine/style/about.css"/>

    <link rel="stylesheet"
        href="/Themes/reine/style/jquery.datetimepicker.css"/>

    <script src="/Themes/reine/script/jquery.datetimepicker.full.min.js"></script>

    <div class="row">
        <div class="col-md-12">
            <h1 class="about-header">Request an Appointment</h1>
        </div>
    </div>

    <form class="form"
        method="POST"
        action="/appointment">
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
                    <div class="form-group">
                        <label>
                            <input type="radio"
                                name="title"
                                value="ms"/>
                                Ms
                        </label>
                        <label>
                            <input type="radio"
                                name="title"
                                value="mrs"/>
                                Mrs
                        </label>
                        <label>
                            <input type="radio"
                                name="title"
                                value="mr"/>
                                Mr
                        </label>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text"
                                    class="form-control contact-input"
                                    name="first-name"
                                    placeholder="First Name"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text"
                                    class="form-control contact-input"
                                    name="last-name"
                                    placeholder="Last Name"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control contact-input"
                                    name="email"
                                    placeholder="Email"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number"
                                    class="form-control contact-input"
                                    name="phone"
                                    placeholder="Phone Number"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Your Interest</label>
                        <select class="form-control contact-input"
                            name="interest">
                            <option>Bridal</option>
                            <option>Jewelry</option>
                            <option>Timepiece</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Schedule</label>
                        <input type="text"
                            name="schedule"
                            class="form-control contact-input"
                            id="schedule"/>
                    </div>

                    <h4>How would you like us to contact you?</h4>

                    <div class="form-group">
                        <label>
                            <input type="checkbox"
                                name="contact-email"/>
                            Email
                        </label>
                        <br />
                        <label>
                            <input type="checkbox"
                                name="contact-phone"/>
                            Phone
                        </label>
                    </div>

                    <div class="form-group">
                        <input type="submit"
                            class="btn btn-warning contact-input"
                            value="Submit"/>
                    </div>
                </form>
            </div>
        </div>
    </form>

    <script>
        $('#schedule').datetimepicker();
    </script>
@endsection
