@extends('layout.navbar')

@section('title', 'Home')

@section('active-home', 'active')

@section(section: 'content')

    <style>
        .card:hover {
            transform: scale(1.0125);
            transition: transform 0.2s ease-in-out;
        }
        .popup {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #4caf50; /* Green */
            color: white;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s, visibility 0.5s;
        }
    </style>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        {{-- <div id="popup" class="popup">This is a popup message!</div> --}}
    @endif

    <div class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1>Discover CuantiN</h1>
            <p class="lead">The modern, authentic Chinese restaurant, CuantiN started their culinary story back in 1975.</p>
            <a href="/menu" class="btn btn-danger">Explore Our Menu</a>
        </div>
    </div>

    <!-- About Us -->
    <div class="container text-center my-5">
        <h2>About Us</h2>
        <p>Our restaurant offers the finest dining experience with a variety of delicious dishes crafted by our expert chefs.
        Come and enjoy a meal in our cozy and welcoming atmosphere.</p>
    </div>

    <!-- Menu Highlights -->
    <div class="container mb-5">
        <h2 class="text-center mb-4">Menu Highlights</h2>
        <div class="row">
            @foreach ($menu_highlights as $menu)
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                        <a href="/menu?search={{$menu->name}}">
                            <img src="{{ $menu->image }}" class="card-img-top" alt="{{ $menu->name }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->name }}</h5>
                            <p class="card-text">{{ Str::before($menu->description, '.') . '.' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Contact -->
    <div class="container text-center mb-5">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Phone: (62) 852-18291928</p>
            <p>Email: cuantin@restaurant.com</p>
            @if (!Auth::check())
            <a href="/login" class="btn btn-danger">Make a Reservation</a>
            @else
            <a href="/booking" class="btn btn-danger">Make a Reservation</a>
            @endif
        </div>
    </div>

@endsection
