@extends('layout.app')

@section('content')
    <section class="container">
        <table class="table table-bordered table-striped mt-5">
            <h2 class="text-center mt-5">All Products</h2>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">In Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $index => $product)
                    <tr>
                        <th scope="row">{{ ++$index }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td class="d-flex gap-2">
                            <div>
                                <form action="{{ route('sell') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <button class="btn btn-primary"
                                        @if (!$product->quantity) @disabled(true) @endif>Sell</button>
                                </form>
                            </div>
                            <div>
                                <a class="btn btn-success" href="{{ route('edit', ['id' => $product->id]) }}">Update
                                    Price</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
