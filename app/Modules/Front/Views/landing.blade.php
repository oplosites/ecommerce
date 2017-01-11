@extends('Front::index')

@section('content')

@include('Front::components.slider')

<br/>

<div class="row">
    <div class="col-md-5">
        <div id="front-appointment">
            <div class="img-responsive img-circle">
                <div class="front-calendar-image">
                    <img src="{{ asset ('Themes/reine/images/calendar.png') }}" />
                </div>
                <div class="front-calendar-text-wrapper">
                    <h5 class="front-calendar-text">Contact us to make an appointment and get your dream wedding ring design</h5>
                </div>
                <div class="appointment-btn">
                    <a href="#"
                        class="btn btn-default">
                        Make An Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <img src="{{ asset ('Themes/reine/images/front-gift.jpg') }}"
            class="img-responsive"
            alt="gift"/>
    </div>
</div>
@endsection
