@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">phone_number</th>
                    <th scope="col">num_of_geusts</th>
                    <th scope="col">checkin_date</th>
                    <th scope="col">destination</th>
                    <th scope="col">status</th>
                    <th scope="col">payment</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach ($reserve as $reservation)
                    <th scope="row">{{$reservation->id}}</th>
                    <td>{{$reservation->name}}</td>
                    <td>{{$reservation->phone_number}}</td>
                    <td>{{$reservation->num_of_guest}}</td>
                    <td>{{$reservation->check_in_date}}</td>
                    <td>{{$reservation->destination}}</td>
                    <td>{{$reservation->status}}</td>
                    <td>{{$reservation->price}}</td>
                     <td><a href="delete-posts.html" class="btn btn-danger  text-center ">delete</a></td>
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
