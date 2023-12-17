@extends('layout.app')

@section('content')
    <section class="d-flex justify-content-center">
        <form class="card p-3 w-25 mt-5" method="post" action="{{ route('store') }}">
            @csrf
            <div class="mb-3">
                <h2 class="text-center">Add Products</h2>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" id="quantity" min="0"
                    value="{{ old('quantity') }}">
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </section>

    <script>
        window.onload = function() {
            document.getElementById('name').focus();
        };
    </script>
@endsection
