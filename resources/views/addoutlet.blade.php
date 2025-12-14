@extends('layout.navbar')

@section('title', 'Add Outlet')

@section('active-addoutlet', 'active')

@section('content')

    <div class="container my-5">
        <div class="row">
            <!-- Outlets -->
            <div class="col-md-8">
                <h2>Outlets</h2>
                <br>
                @foreach ($outlets as $outlet)
                <p>
                    {{$outlet->address}}
                    <span class="float-end">
                        <a href="/edit-outlet/{{$outlet->id}}" class="btn btn-danger">Edit</a>
                        {{$outlet->open_time}}
                        {{$outlet->close_time}}
                    </span>
                </p>
                <br>
                @endforeach
            </div>

            <!-- Add Outlet -->
            <div class="col-md-4">
                <h2>Add Outlet</h2>
                <br>
                <div class="card p-4 bg-dark text-light">
                    <form action="/add-outlet" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="open">Opening Time</label>
                            <input type="time" name="open" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="close">Closing Time</label>
                            <input type="time" name="close" class="form-control">
                        </div>
                        <div class="mb-3">
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
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger">Add Outlet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
