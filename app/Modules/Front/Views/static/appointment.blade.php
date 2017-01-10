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

    <div class="row">
        <div class="col-md-12">
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

                <div class="form-group">
                    <label>First Name</label>
                    <input type="text"
                        class="form-control"
                        name="first-name"
                        placeholder="First Name"/>
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text"
                        class="form-control"
                        name="last-name"
                        placeholder="Last Name"/>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email"/>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="number"
                        class="form-control"
                        name="phone"
                        placeholder="Phone Number"/>
                </div>

                <div class="form-group">
                    <label>Your Interest</label>
                    <select class="form-control"
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
                        class="form-control"
                        id="schedule"/>
                </div>

                <h4>How would you like us to contact you?</h4>
            </form>
        </div>
    </div>

    <script>
        $('#schedule').datetimepicker();
    </script>
@endsection
