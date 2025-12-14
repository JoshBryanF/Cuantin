@extends('layout.navbar')

@section('title', 'Booking')

@section('active-bookings', 'active')

@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-7">
                <h2>Bookings</h2>
                <table class="table table-sm table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Outlet</th>
                            <th scope="col">Time</th>
                            <th scope="col">Guests</th>
                            <th scope="col">User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <th scope="row">{{$booking->id}}</th>
                            <td scope="row">{{$booking->outlet->address}}</td>
                            <td scope="row">{{$booking->date_time}}</td>
                            <td scope="row">{{$booking->guests}}</td>
                            <td scope="row">{{$booking->user->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>     
            </div>
        </div>
    </div>

    @if (auth()->user() && auth()->user()->hasRole('customer'))
    <div class="container my-5">
        <h2>Create Booking</h2>

        <div style="max-width: 400px;">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
        
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        </div>
        
        <div class="card p-4 bg-dark text-light" style="max-width: 400px;">
            <form action="/booking" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="outlet" class="form-label">Outlet Choice</label>
                    <select name="outlet_id" class="form-select">
                        @foreach ($outlets as $outlet)
                            <option value="{{ $outlet->id }}">{{ $outlet->address }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Time:</label>
                    <input type="datetime-local" name="time" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="guests" class="form-label">Number of Guests:</label>
                    <input type="number" name="guests" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @endif

@endsection
