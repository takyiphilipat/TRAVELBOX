@extends('layouts.app')
@section('content')

<section id="section-1">
    <div class="content-slider">

        {{-- RADIO BUTTONS FOR SLIDER --}}
        @foreach($countries as $index => $country)
            <input type="radio"
                id="banner{{ $index + 1 }}"
                class="sec-1-input"
                name="banner"
                @if($index == 0) checked @endif>
        @endforeach

        <div class="slider">

            {{-- SLIDES --}}
            @foreach($countries as $index => $country)
            <div id="top-banner-{{ $index + 1 }}"
                 class="banner"
                 style="background-image: url('{{ asset('assets/images/' . $country->image) }}');">

                <div class="banner-inner-wrapper header-text">
                    <div class="main-caption">
                        <h2>Take a Glimpse Into The Beautiful Country Of:</h2>
                        <h1>{{ $country->name }}</h1>
                        <div class="border-button">
                            <a href="{{ route('about.go', $country->id) }}">Go There</a>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="more-info">
                                    <div class="row">

                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="fa fa-user"></i>
                                            <h4><span>Population:</span><br>{{ $country->population }}</h4>
                                        </div>

                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="fa fa-globe"></i>
                                            <h4><span>Territory:</span><br>{{ $country->territory }}</h4>
                                        </div>

                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <i class="fa fa-home"></i>
                                            <h4><span>AVG Price:</span><br>${{ $country->avg_price }}</h4>
                                        </div>

                                        <div class="col-lg-3 col-sm-6 col-6">
                                            <div class="main-button">
                                                <a href="{{ route('about.go', $country->id) }}">Explore More</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach

        </div>

        {{-- SLIDER CONTROLS --}}
        <nav>
            <div class="controls">
            @foreach($countries as $index => $country)
                <label for="banner{{ $index + 1 }}">
                    <span class="progressbar">
                        <span class="progressbar-fill"></span>
                    </span>
                    <span class="text">{{ $index + 1 }}</span>
                </label>
            @endforeach
            </div>
        </nav>

    </div>
</section>

<div class="visit-country">
    <div class="container">

        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading">
                    <h2>Visit One Of Our Countries Now</h2>
                    <p>Explore the most beautiful and exciting destinations around the world.</p>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-8">
                <div class="items">
                    <div class="row">

                        @foreach($countries as $country)
                        <div class="col-lg-12 mb-4">
                            <div class="item">
                                <div class="row">

                                    <!-- Country Image -->
                                    <div class="col-lg-4 col-sm-5">
                                        <div class="image">
                                            <img src="{{ asset('assets/images/' . $country->image) }}" alt="{{ $country->name }}">
                                        </div>
                                    </div>

                                    <!-- Country Details -->
                                    <div class="col-lg-8 col-sm-7">
                                        <div class="right-content">

                                            <h4>{{ strtoupper($country->name) }}</h4>
                                            <span>{{ $country->continent }}</span>

                                            <div class="main-button">
                                                <a href="{{ route('about.go', $country->id) }}">Explore More</a>
                                            </div>

                                            <p>{{ \Illuminate\Support\Str::limit($country->description, 150) }}</p>

                                            <ul class="info">
                                                <li><i class="fa fa-user"></i> {{ $country->population }} People</li>
                                                <li><i class="fa fa-globe"></i> {{ $country->territory }} km²</li>
                                                <li><i class="fa fa-home"></i> ${{ $country->avg_price }}</li>
                                            </ul>

                                            <div class="text-button">
                                                <a href="#">
                                                    Need Directions? <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="col-lg-4">
                <div class="side-bar-map">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?..."
                                    width="100%" height="550px"
                                    frameborder="0"
                                    style="border:0; border-radius: 23px;"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


@endsection
