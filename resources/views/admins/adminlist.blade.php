@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="{{ route('createadmins.go') }}" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">admin</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $adminlist as $admin)
                    <tr>
                    <th scope="row">{{ $admin->id }}</th>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email}}</td>

                  </tr>

                    @endforeach



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    @endsection
