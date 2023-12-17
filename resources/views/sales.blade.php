@extends('layout.app')

@section('content')
    <section class="container">
        <h1 class="text-center mt-5">Sales History</h1>
        <table class="table table-bordered table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Date of Sale</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($sales as $index => $sale)
                    <tr>
                        <th scope="row">{{ ++$index }}</th>
                        <td>{{ $sale->sale_date }}</td>
                        <td>{{ $sale->product_name }}</td>
                        <td>{{ $sale->total_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
