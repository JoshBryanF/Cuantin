@extends('layout.navbar')

@section('title', 'Edit Menu')

@section('active-addmenu', 'active')

@section('content')
    <div class="container my-5">
        <h2>Edit Menu</h2>
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

        <form action="/edit-menu/{{$menu->id}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
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
                <label for="Name" class="form-label">Name</label>
                <input type="text" name="name" placeholder="Name" value="{{$menu->name}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description">Descrition</label>
                <textarea type="text-area" name="description" value="{{$menu->description}}" class="form-control">{{$menu->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="imageInput" class="form-control">
            </div>
            <div class="mb-3">
                <img id="imagePreview" src="{{ $menu->image ?? asset($menu->image) }}" alt="Image Preview" class="img-fluid" style="max-width: 25%; height: auto; display: block;">
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');
        
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        });
    </script>
@endsection
