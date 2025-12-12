@extends('layouts.app')

@section('content')

{{-- ✅ Success Message --}}
@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

<div class="second-page-heading">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4>Book Preferred Deal Here</h4>
                <h2>Make Your Reservation</h2>
                <p>Fill the form below to reserve your trip to {{ $city->name }}.</p>
            </div>
        </div>
    </div>
</div>
<div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Make a Phone Call</h4>
            <a href="#">+123 456 789 (0)</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contact Us via Email</h4>
            <a href="#">company@email.com</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <h4>Visit Our Offices</h4>
            <a href="#">24th Street North Avenue London, UK</a>
          </div>
        </div>
      </div>
    </div>
</div>



<div class="reservation-form">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <form id="reservation-form"
                      method="POST"
                      action="{{ route('reservation.store') }}">
                    @csrf

                    {{-- ✅ Hidden City ID --}}
                    <input type="hidden" name="city_id" value="{{ $city->id }}">

                    <div class="row">
                        <div class="col-lg-12">
                            <h4>
                                Make Your <em>Reservation</em> for
                                <em>{{ $city->name }}</em>
                            </h4>
                        </div>

                        {{-- Name --}}
                        <div class="col-lg-6">
                            <fieldset>
                                <label>Your Name</label>
                                <input type="text"
                                       name="name"
                                       value="{{ old('name') }}"
                                       placeholder="Ex. John Smithee">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>

                        {{-- Phone --}}
                        <div class="col-lg-6">
                            <fieldset>
                                <label>Your Phone Number</label>
                                <input type="text"
                                       name="phone_number"
                                       value="{{ old('phone_number') }}"
                                       placeholder="Ex. +xxx xxx xxx">
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>

                        {{-- Guests --}}
                        <div class="col-lg-6">
                            <fieldset>
                                <label>Number Of Guests</label>
                                <select name="num_of_guest" class="form-select">
                                    <option value="">Select...</option>
                                    @for($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}"
                                            {{ old('num_of_guest') == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                @error('num_of_guest')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>

                        {{-- Date --}}
                        <div class="col-lg-6">
                            <fieldset>
                                <label>Check In Date</label>
                                <input type="date"
                                       name="check_in_date"
                                       value="{{ old('check_in_date') }}">
                                @error('check_in_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>

                        {{-- Destination --}}
                        <div class="col-lg-12">
                            <fieldset>
                                <label>Destination</label>
                                <input type="text"
                                       value="{{ $city->name }}"
                                       readonly>
                            </fieldset>
                        </div>

                        {{-- Submit --}}
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" class="main-button">
                                    Confirm Reservation
                                </button>
                            </fieldset>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection





{{--@extends('layouts.app')
@section('content')

<div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Book Prefered Deal Here</h4>
          <h2>Make Your Reservation</h2>
          <p>Lorem ipsum dolor sit amet...</p>
          <div class="main-button"><a href="about.html">Discover More</a></div>
        </div>
      </div>
    </div>
</div>

<div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Make a Phone Call</h4>
            <a href="#">+123 456 789 (0)</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contact Us via Email</h4>
            <a href="#">company@email.com</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <h4>Visit Our Offices</h4>
            <a href="#">24th Street North Avenue London, UK</a>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="reservation-form">
    <div class="container">
      <div class="row">

<div class="col-lg-12">
  <form id="reservation-form" method="POST" action="#">
    @csrf

    <div class="row">
      <div class="col-lg-12">
        <h4>Make Your <em>Reservation</em> Through This <em>Form</em></h4>
      </div>

      <div class="col-lg-6">
        <fieldset>
          <label for="Name">Your Name</label>
          <input type="text" name="name" placeholder="Ex. John Smithee" required>
          @error('name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </fieldset>
      </div>

      <div class="col-lg-6">
        <fieldset>
            <label>Your Phone Number</label>
            <input type="text" name="phone_number" placeholder="Ex. +xxx xxx xxx" required>
            @error('phone_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </fieldset>
      </div>

      <div class="col-lg-6">
        <fieldset>
            <label>Number Of Guests</label>
            <select name="num_of_guest" class="form-select" required>
                <option value="" disabled selected>Select...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4+</option>
            </select>
        </fieldset>
      </div>

      <div class="col-lg-6">
        <fieldset>
            <label>Check In Date</label>
            <input type="date" name="check_in_date" required>
            @error('check_in_date')
              <div class="text-danger">{{ $message }}</div>
            @enderror
        </fieldset>
      </div>

      <div class="col-lg-12">
        <fieldset>
          <label>Choose Your Destination</label>
         <input type="text" name="destination" value="{{ $city->name }}" readonly>

        </fieldset>
      </div>

      <div class="col-lg-12">
        <fieldset>
          <button type="submit" class="main-button">Make Your Reservation Now</button>
        </fieldset>
      </div>

    </div>
  </form>
</div>

      </div>
    </div>
</div>
@endsection--}}
