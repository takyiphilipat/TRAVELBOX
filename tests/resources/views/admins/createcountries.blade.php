@extends('layouts.admin')
@section('content')
 <form method="POST" action="{{ route('country.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-outline mb-4">
        <input type="text" name="name" class="form-control"
               placeholder="name" value="{{ old('name') }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-outline mb-4">
        <input type="file" name="image" class="form-control">
        @error('image')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-outline mb-4">
        <input type="text" name="continent" class="form-control"
               placeholder="continent" value="{{ old('continent') }}">
        @error('continent')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-outline mb-4">
        <input type="text" name="population" class="form-control"
               placeholder="population" value="{{ old('population') }}">
        @error('population')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-outline mb-4">
        <input type="text" name="territory" class="form-control"
               placeholder="territory" value="{{ old('territory') }}">
        @error('territory')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-outline mb-4">
        <input type="text" name="avg_price" class="form-control"
               placeholder="avg_price" value="{{ old('avg_price') }}">
        @error('avg_price')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-floating mb-4">
        <textarea name="description" class="form-control"
                  style="height:100px">{{ old('description') }}</textarea>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>


@endsection
