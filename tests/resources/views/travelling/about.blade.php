@extends('layouts.app')
@section('content')

<!-- ***** Main Banner Area Start ***** -->
<div class="about-main-content"
     style="background-image: url('{{ asset("assets/images/" . $country->image) }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content"style="margin-top: -25px;">
                    <div class="blur-bg"></div>
                    <h4>EXPLORE OUR COUNTRY</h4>
                    <div class="line-dec"></div>

                    <h2>Welcome To {{ $country->name }}</h2>

                    <p>{{ $country->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Cities Section Start ***** -->
<div class="cities-town">
    <div class="container">
        <div class="row">
            <div class="slider-content">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{ $country->name }}’s <em>Cities &amp; Towns</em></h2>
                    </div>

                    <div class="col-lg-12">
                        <div class="owl-cites-town owl-carousel">

                            @foreach($cities as $city)
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/images/' . $city->image) }}" alt="">
                                        <h4>{{ $city->name }}</h4>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Cities Section End ***** -->


<!-- ***** Weekly Offers Section Start ***** -->
<div class="weekly-offers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading text-center">
                    <h2>Best Weekly Offers In Each City</h2>
                    <p>Choose from the best deals available in {{ $country->name }}.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-weekly-offers owl-carousel">

                    @foreach($cities as $city)
                        <div class="item">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/' . $city->image) }}" alt="">

                                <div class="text">
                                    <h4>{{ $city->name }}<br>
                                        <span><i class="fa fa-users"></i> {{ rand(150, 600) }} Check Ins</span>
                                    </h4>

                                    <h6>${{ $city->price }}<br><span>/person</span></h6>

                                    <div class="line-dec"></div>

                                    <ul>
                                        <li>Deal Includes:</li>
                                        <li><i class="fa fa-taxi"></i> {{ $city->num_days }} Days Trip & Hotel Included</li>
                                        <li><i class="fa fa-plane"></i> Airplane Included</li>
                                        <li><i class="fa fa-building"></i> Daily Places Visit</li>
                                    </ul>

                                    <div class="main-button">
                                        <a href="{{ route('reservation.go', $city->id) }}">Make a Reservation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Weekly Offers Section End ***** -->

@endsection
