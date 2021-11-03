@extends('layouts.app')

@section('content')
<h2>List</h2>
<div class="row">
    <div class="col">
        <a class="btn btn-success" href="{{ route('user.orders.create') }}">Order Pizza</a>
    </div>
</div>
<div class="row">
    <div class="col-1"></div>
    <div class="col">
    @if ($orders->count() == 0)
        <p>No orders yet.</p>
    @else
        <div class="row">
            <div class="col"><b>ID</b></div>
            <div class="col"><b>Type</b></div>
            <div class="col"><b>Toppings</b></div>
            <div class="col"><b>Price</b></div>
        </div>
        @foreach ($orders as $order)
            <div class="row">
                <div class="col">{{ $order->id }}</div>
                <div class="col">{{ $order->type }}</div>
                <div class="col">{{ $order->toppings }}</div>
                <div class="col">{{ $order->price }}</div>
            </div>
        @endforeach
    @endif
    </div>
</div>
@endsection
