@extends('layout.app')

@section('content')
    <section class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body bg-primary text-center text-white">
                        <h5 class="card-title">This month</h5>
                        <p class="card-text">Total sale: {{ $data['currentMonth'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-body bg-primary text-center text-white">
                        <h5 class="card-title">Previous month</h5>
                        <p class="card-text">Total sale: {{ $data['previousMonth'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body bg-primary text-center text-white">
                        <h5 class="card-title">Today</h5>
                        <p class="card-text">Total sale: {{ $data['today'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body bg-primary text-center text-white">
                        <h5 class="card-title">Yesterday</h5>
                        <p class="card-text">Total sale: {{ $data['yesterday'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
