@extends('layout.navbar')

@section('title', 'Outlets')

@section('active-outlet', 'active')

@section('content')

    <div class="container my-5">
        <h2>Our Outlets</h2>
        <div class="d-flex justify-content-center mt-4 mb-3">
            <form action="{{ route('outlet.search')}}" method="get" class="w-50">
                <div class="input-group">
                    {{-- @csrf --}}
                    <input type="text" placeholder="Search" name="search" class="form-control">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div>
            @foreach ($outlets as $outlet)
            <div class="card mb-3" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">{{$outlet->address}}</h5>
                    <h6 class="card-text mb-2 text-body-secondary">{{$outlet->city}}</h6>
                    <p class="card-text mb-2">Open Time: {{$outlet->open_time}}</p>
                    <p class="card-text">Close Time: {{$outlet->close_time}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
