@extends('layouts.admin')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>
@endif
  <form method="POST" action="{{ route('createadmins.store') }}">
    @csrf

    <div class="form-outline mb-4 mt-4">
        <input type="email" name="email" class="form-control"
               placeholder="email" value="{{ old('email') }}">
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-outline mb-4">
        <input type="text" name="name" class="form-control"
               placeholder="username" value="{{ old('name') }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-outline mb-4">
        <input type="password" name="password" class="form-control"
               placeholder="password">
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mb-4">Create</button>
</form>





@endsection
