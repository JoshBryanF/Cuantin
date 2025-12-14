@extends('layout.navbar')

@section('title', 'Menu')

@section('active-menu', 'active')

@section('content')

    <div class="container my-5">

        <h2>Menu Items</h2>

        <div class="d-flex justify-content-center mt-4 mb-3">
            <form action="{{ route('menu.search') }}" method="GET" class="w-50">
                <div class="input-group">
                    {{-- @csrf --}}
                    <input type="text" placeholder="Search" name="search" class="form-control">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
        @if ($menus->isNotEmpty())
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
            @foreach ($menus as $menu)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $menu->image }}" class="card-img-top" alt="{{ $menu->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->name }}</h5>
                            <p class="card-text"><strong>{{ $menu->type }}</strong></p>
                            <p class="card-text">{{ $menu->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $menus->appends(['search' => request('search')])->links() }}
            </div>
        @else
            <p>No menu found for "{{request('search')}}"</p>
        @endif
    </div>
@endsection
