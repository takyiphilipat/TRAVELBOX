@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    {{-- ✅ Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h5 class="card-title mb-4 d-inline">City</h5>

                    <a href="{{ route('admincity') }}"
                       class="btn btn-primary mb-4 float-right">
                        Create City
                    </a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>

                                <th>Num_days</th>
                                <th>Price</th>
                                <th>Image</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($allcity as $city)
                                <tr>
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->num_days }}</td>
                                    <td>{{ $city->price }}</td>


                                    <td>
                                        <img src="{{ asset('assets/images/' . $city->image) }}"
                                             alt="{{ $city->name }}"
                                             width="80">
                                    </td>

                                    <td>
    <form action="{{ route('city.delete', $city->id) }}"
          method="POST"
          onsubmit="return confirm('Are you sure you want to delete this city?')">

        @csrf
        @method('DELETE')

        <button class="btn btn-danger btn-sm">
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
