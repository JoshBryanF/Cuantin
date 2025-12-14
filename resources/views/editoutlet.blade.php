@extends('layout.navbar')

@section('title', 'Edit Outlet')

@section('active-addoutlet', 'active')

@section('content')

    <div class="container my-5">
        <h2>Edit Outlet</h2>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="/edit-outlet/{{$outlet->id}}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea type="text" placeholder="address" name="address" value="{{$outlet->address}}" class="form-control" rows="2">{{$outlet->address}}</textarea>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">City</label>
                <input type="text" name="city" placeholder="city" value="{{$outlet->city}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="open">Opening Time</label>
                <input type="time" name="open" value="{{$outlet->open_time}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="close">Closing Time</label>
                <input type="time" name="close" value="{{$outlet->close_time}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>


@endsection
