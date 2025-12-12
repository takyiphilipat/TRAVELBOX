@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    {{-- ✅ Success Message --}}
                    @if (session('delete'))
                        <div class="alert alert-success">
                            {{ session('delete') }}
                        </div>
                    @endif

                    <h5 class="card-title mb-4 d-inline">Countries</h5>

                    <a href="{{ route('create.country') }}"
                       class="btn btn-primary mb-4 float-right">
                        Create Country
                    </a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Continent</th>
                                <th>Population</th>
                                <th>Territory</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($allcountry as $country)
                                <tr>
                                    <td>{{ $country->id }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->continent }}</td>
                                    <td>{{ $country->population }}</td>
                                    <td>{{ $country->territory }}</td>

                                    <td>
                                        <img src="{{ asset('assets/images/' . $country->image) }}"
                                             alt="{{ $country->name }}"
                                             width="80">
                                    </td>

                                    <td>
                                        {{-- ✅ DELETE FORM (THIS FIXES ALL YOUR ERRORS) --}}
                                        <form action="{{ route('delete.country', $country->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this country?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
