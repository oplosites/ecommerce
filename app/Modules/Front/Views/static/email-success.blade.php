@extends('Front::index')

@section('content')

    <link rel="stylesheet"
        href="/Themes/reine/style/about.css"/>

    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Email has been successfully sent. Thank you for contacting us. We will be in touch soon.
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1 class="about-header">Contact</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <iframe class="map"
              height="450"
              frameborder="0" style="border:0"
              src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBHN06u7PKGNKD8PS8RLyx8w6EZTREJQpM
                &q=Puri%20arsama" allowfullscreen>
            </iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4>Send us a message, and we will contact you to arrange a free consultation:</h4>
        </div>
    </div>

    <div class="row">
        <form class="form" method="POST" action="/contact">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text"
                        name="name"
                        class="form-control contact-input"
                        placeholder="Name"/>

                    <input type="email"
                        name="to"
                        class="form-control contact-input"
                        placeholder="Email"
                        required/>

                    <input type="number"
                        name="phone"
                        class="form-control contact-input"
                        placeholder="Phone"/>

                    <input type="text"
                        name="subject"
                        class="form-control contact-input"
                        placeholder="Subject"
                        required/>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <textarea class="form-control contact-input"
                        rows="7"
                        name="content"
                        placeholder="Message"></textarea>
                </div>

                <div class="form-group pull-right">
                    <input type="submit"
                        value="Send"
                        class="btn btn-warning contact-button"/>
                </div>
            </div>

            <div class="col-md-4 contact-address">
                <p>Puri Arsama Blok A6</p>
                <p>Jatimulya - Cilodong</p>
                <p>Depok 16413</p>
                <br/>
                <p>Line @sammyrodhita</p>
                <p>Whats app +62 812 22 466 497</p>
                <p>19reine@gmail.com</p>

            </div>
        </form>
    </div>

@endsection
