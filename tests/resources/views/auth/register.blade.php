@extends('layouts.app')

@section('content')
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
<div class="reservation-form">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <form id="reservation-form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Register</h4>
                        </div>

                        <!-- Username -->
                        <div class="col-md-12">
                            <fieldset>
                                <label for="name" class="form-label">Username</label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       class="username"
                                       placeholder="username"
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                    <span style="color:red; font-size:14px;">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>

                        <!-- Email -->
                        <div class="col-md-12">
                            <fieldset>
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email"
                                       name="email"
                                       id="email"
                                       class="email"
                                       placeholder="email"
                                       value="{{ old('email') }}"
                                       required>
                                @error('email')
                                    <span style="color:red; font-size:14px;">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>

                       <!-- Password -->
<div class="col-md-12">
    <fieldset style="position: relative;">
        <label for="password" class="form-label">Your Password</label>

        <input type="password"
               name="password"
               id="password"
               class="password"
               placeholder="password"
               required
               style="padding-right: 40px;">

        <!-- Eye Icon -->
        <span class="toggle-eye"
              data-target="password"
              style="
                position: absolute;
                right: 10px;
                top: 60%;
                transform: translateY(-50%);
                cursor: pointer;
                font-size: 18px;">
            👁️
        </span>

        @error('password')
            <span style="color:red; font-size:14px;">{{ $message }}</span>
        @enderror
    </fieldset>
</div>

<!-- Confirm Password -->
<div class="col-md-12">
    <fieldset style="position: relative;">
        <label for="password_confirmation" class="form-label">Confirm Password</label>

        <input type="password"
               name="password_confirmation"
               id="password_confirmation"
               class="password"
               placeholder="confirm password"
               required
               style="padding-right: 40px;">

        <!-- Eye Icon -->
        <span class="toggle-eye"
              data-target="password_confirmation"
              style="
                position: absolute;
                right: 10px;
                top: 60%;
                transform: translateY(-50%);
                cursor: pointer;
                font-size: 18px;">
            👁️
        </span>
    </fieldset>
</div>

<!-- JavaScript -->
<script>
    document.querySelectorAll('.toggle-eye').forEach(function(eye) {
        eye.addEventListener('click', function () {
            const id = this.getAttribute('data-target');
            const input = document.getElementById(id);

            const type = input.type === 'password' ? 'text' : 'password';
            input.type = type;

            this.textContent = type === 'password' ? '👁️' : '🙈';
        });
    });
</script>


                        <!-- Submit -->
                        <div class="col-lg-12">
                            <fieldset>
                                <button class="main-button" type="submit">Register</button>
                            </fieldset>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


@endsection
