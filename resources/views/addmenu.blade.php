@extends('layout.navbar')

@section('title', 'Add Outlet')

@section('active-addmenu', 'active')

@section('content')

    <div class="container my-5">
        <div class="row">
            <!-- Menu -->
            <div class="col-md-8">
                <h2>Menus</h2>
                <br>
                @foreach ($menus as $menu)
                <p>
                    {{$menu->name}}
                    <span class="float-end">
                        <a href="/edit-menu/{{$menu->id}}" class="btn btn-danger">Edit</a>
                        Created at: {{$menu->created_at}}
                    </span>
                </p>
                <br>
                @endforeach
            </div>

            <div class="col-md-4">
                <h2>Add Menu</h2>
                <br>
                <div class="card p-4 bg-dark text-light">
                    <form action="/add-menu" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="type" class="form-label">Item Type</label>
                            <select name="type" class="form-control">
                                @foreach ($types as $type)
                                    <option value="{{ $type->type }}">{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <input type="text-area" name="description" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="Image">Image</label>
                            <input type="file" name="image" class="form-control">
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
                            <button type="submit" class="btn btn-danger">Add Menu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
