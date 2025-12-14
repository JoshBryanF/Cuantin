@extends('layout.navbar')

@section('title', 'Profile')

@section('active-profile', 'active')

@section('content')
    <div class="container my-5">
        <h2>User Profile</h2>
        <div class="card">
            <div class="card-header">
                Profile Details
            </div>
            <div class="card" style="width: 100%;">
                <div>
                </div>
                <div class="row g-0">
                    <div class="col-md-3 text-center">
                        <img src="{{$user->image}}" class="img-fluid rounded-start" alt="{{$user->image}}">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <p class="card-text"><strong>Name: </strong>{{$user->name}}</p>
                            <p class="card-text"><strong>Email: </strong>{{ $user->email }}</p>
                            <p class="card-text"><strong>Phone Number: </strong>{{ $user->phone }}</p>
                            <p class="card-text"><strong>Joined At: </strong>{{ $user->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
