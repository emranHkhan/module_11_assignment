@extends('layout.app')

@section('content')
    <section class="d-flex justify-content-center">
        <form class="card p-3 w-25 mt-5" method="post" action="{{ route('update') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $productArr['id'] }}">
            <div class="mb-3">
                <h2 class="text-center">Update Product Price</h2>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <span class="form-control bg-danger text-white">{{ $productArr['name'] }}</span>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ $productArr['price'] }}">
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <span class="form-control bg-danger text-white">{{ $productArr['quantity'] }}</span>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </section>

    <script>
        window.onload = function() {
            document.getElementById('price').focus();
        };
    </script>
@endsection
