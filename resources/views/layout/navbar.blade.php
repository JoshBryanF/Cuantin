<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100" style="background-color: #f3f3f3">
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #D8293A;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">CuantiN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @yield('active-home')" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('active-menu')" href="/menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('active-outlet')" href="/outlets">Outlets</a>
                    </li>
                    
                    @if (auth()->user() && auth()->user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link @yield('active-addmenu')" href="/add-menu">Add Menu</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link @yield('active-addoutlet')" href="/add-outlet">Add Outlet</a>
                    </li>
                    @endif

                    @if(auth()->user() && auth()->user()->hasRole('customer') || auth()->user() && auth()->user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link @yield('active-bookings')" href="/booking">Bookings</a>
                    </li>
                    @endif

                </ul>
                <ul class="navbar-nav ms-auto">
                    @if (!auth()->check())
                    <li class="nav-item">
                        <a class="nav-link @yield('active-login')" href="/login">Login</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link @yield('active-profile')" href="/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/log-out">Log Out</a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p>CuantiN is dedicated to providing the best dining experience with our diverse menu and welcoming outlets.</p>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <p>Email: info@cuantin.com</p>
                    <p>Phone: (123) 456-7890</p>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <a href="#" class="text-decoration-none text-white"><i class="bi bi-facebook fs-3 me-3"></i></a>
                    <a href="#" class="text-decoration-none text-white"><i class="bi bi-twitter-x fs-3 me-3"></i></a>
                    <a href="#" class="text-decoration-none text-white"><i class="bi bi-instagram fs-3 me-3"></i></a>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>&copy; 2024 CuantiN. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>