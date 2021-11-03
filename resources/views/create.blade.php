@extends('layouts.app')

@section('content')
    <h2>Create</h2>
    <div class="row">
        <div class="col-1"></div>
        <div class="col"><h3>Order Pizza</h3></div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col" >
            <form method="post" action="{{ route('user.orders.store') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <div><b>Type</b></div>
                        <div><label> <input type="radio" checked="" @change="onChange($event)" value="MacDac Pizza" id="macdac" name="type"> MacDac Pizza </label></div>
                        <div><label> <input type="radio" @change="onChange($event)" value="Lovely Mushroom Pizza" id="mushroom" name="type"> Lovely Mushroom Pizza </label></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div><b>Toppings</b></div>
                        <!-- TODO: add dictionary -->
                        <div><label>
                                <input type="checkbox" name="toppings[]" value="tomato" id="tomato" checked> tomato  0.5 eur
                            </label></div>
                        <div><label>
                                <input type="checkbox" name="toppings[]" value="mushrooms" id="mushrooms"  checked> sliced mushrooms  0.5 eur
                            </label></div>
                        <div><label>
                                <input type="checkbox" name="toppings[]" value="cheese" id="cheese" checked> feta cheese  1.0 eur
                            </label></div>
                        <div><label>
                                <input type="checkbox" name="toppings[]" value="sausages" id="sausages" checked> sausages  1.0 eur
                            </label></div>
                        <div><label>
                                <input type="checkbox" name="toppings[]" value="onion" id="oion" checked> sliced onion  0.5 eur
                            </label></div>
                        <div><label>
                                <input type="checkbox" name="toppings[]" value="mozzarella" id="mozzarella" checked> mozzarella cheese  0.3 eur
                            </label></div>
                        <div><label>
                                <input type="checkbox" name="toppings[]" value="oregano" id="oregano" checked> oregano 2 eur
                            </label></div>
                        <div><label>
                                <input type="checkbox" name="toppings[]" value="bacon" id="bacon">  bacon  1.0 eur
                            </label></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col"> <b>Price:</b>  <span id="price">8.7</span> <b>eur</b> </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success" type="submit">Order Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
