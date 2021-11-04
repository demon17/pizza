@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-1"></div>
        <div class="col"><h3>Order Pizza</h3></div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col" >
            <form method="post" action="{{ route('user.orders.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Type</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="type">
                        <option value="MacDac Pizza"  id="macdac" selected>MacDac Pizza</option>
                        <option value="Lovely Mushroom Pizza" id="mushroom">Lovely Mushroom Pizza</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Toppings</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2" name="toppings[]">
                        @foreach ($toppings as $topping)
                            <option value="{{ $topping->title }}" id="{{ $topping->title }}" selected>{{ $topping->title }}  {{ $topping->price }} eur</option>
                        @endforeach
<!--                        <option value="tomato" id="tomato" selected>tomato  0.5 eur</option>
                        <option value="mushrooms" id="mushrooms" selected>sliced mushrooms  0.5 eur</option>
                        <option value="cheese" id="cheese" selected>feta cheese  1.0 eur</option>
                        <option value="sausages" id="sausages"  selected>sausages  1.0 eur</option>
                        <option value="onion" id="onion" selected>sliced onion  0.5 eur</option>
                        <option value="mozzarella" id="mozzarella" selected>mozzarella cheese  0.3 eur</option>
                        <option value="oregano" id="oregano" selected>oregano 2 eur</option>
                        <option value="bacon" id="bacon">bacon  1.0 eur</option>-->
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Order Now</button>
            </form>
        </div>
        <div class="col-1"></div>
    </div>

@endsection
