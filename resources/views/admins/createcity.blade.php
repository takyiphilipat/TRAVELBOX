@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title mb-5 d-inline">Create Cities</h5>

                    {{-- ✅ Global validation errors (optional but recommended) --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('storecity') }}"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- ✅ City Name --}}
                        <div class="form-outline mb-4 mt-4">
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="name"
                                   value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- ✅ Image --}}
                        <div class="form-outline mb-4 mt-4">
                            <input type="file"
                                   name="image"
                                   class="form-control">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- ✅ Number of Days --}}
                        <div class="form-outline mb-4 mt-4">
                            <input type="text"
                                   name="num_days"
                                   class="form-control"
                                   placeholder="num_days"
                                   value="{{ old('num_days') }}">
                            @error('num_days')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- ✅ Price --}}
                        <div class="form-outline mb-4 mt-4">
                            <input type="text"
                                   name="price"
                                   class="form-control"
                                   placeholder="price"
                                   value="{{ old('price') }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- ✅ Country --}}
                        <div class="form-outline mb-4 mt-4">
                            <select name="country_id"
                                    class="form-select form-control">
                                <option value="">Choose Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <br>

                        {{-- ✅ Submit --}}
                        <button type="submit"
                                class="btn btn-primary mb-4 text-center">
                            Create
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
