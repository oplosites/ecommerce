@extends('Front::index')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{ asset ('Themes/tenue/landing-restock.jpg') }}" alt="Chania">
                </div>

                <div class="item">
                    <img src="{{ asset ('Themes/tenue/landing-restock.jpg') }}" alt="Chania">
                </div>

                <div class="item">
                    <img src="{{ asset ('Themes/tenue/landing-restock.jpg') }}" alt="Flower">
                </div>

                <div class="item">
                    <img src="{{ asset ('Themes/tenue/landing-restock.jpg') }}" alt="Flower">
                </div>
            </div>
        </div>
    </div>
</div>

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
