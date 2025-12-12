@extends('layouts.app')

@section('content')
{{-- - <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
                <form id="reservation-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Login</h4>
                        </div>

                        <!-- Email -->
                        <div class="col-md-12">
                            <fieldset>
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email"
                                       name="email"
                                       id="email"
                                       class="Name"
                                       placeholder="email"
                                       value="{{ old('email') }}"
                                       required
                                       autofocus>
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
               class="Name"
               placeholder="password"
               required
               style="padding-right: 40px;">

        <!-- Eye Icon -->
        <span id="togglePassword"
              style="
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-5px);
                cursor: pointer;
                font-size: 18px;
              ">
            👁️
        </span>

        @error('password')
            <span style="color:red; font-size:14px;">{{ $message }}</span>
        @enderror
    </fieldset>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type =
            passwordField.getAttribute('type') === 'password'
                ? 'text'
                : 'password';
        passwordField.setAttribute('type', type);

        // Change icon
        this.textContent = type === 'password' ? '👁️' : '🙈';
    });
</script>

                        <!-- Submit Button -->
                        <div class="col-lg-12">
                            <fieldset>
                                <button class="main-button" type="submit">Login</button>
                            </fieldset>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
