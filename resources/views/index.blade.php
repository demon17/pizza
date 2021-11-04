@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-1"></div>
    <div class="col"><h3>Pizza List</h3></div>
</div>
<div class="row">
    <div class="col-1"></div>
    <div class="col">
    @if ($orders->count() == 0)
        <p>No orders yet.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Toppings</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->type }}</td>
                        <td>{{ $order->toppings }}</td>
                        <td>{{ $order->price }} euro</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>
</div>
@endsection
