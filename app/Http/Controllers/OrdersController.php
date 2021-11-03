<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function __construct()
    {
        if(!Auth::check()){
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
        ]);

        $order = Order::create([
            'type' => $request->type,
            'toppings' => implode(', ', $request->toppings),
            'price' => $this->calculatePrice($request->toppings),
        ]);

        return redirect()->route('user.orders', $order)->with('message', 'Order received!');
    }

    /**
     * Calculate pizza price
     *
     * @param array $toppings
     * @return float
     */
    private function calculatePrice(array $toppings)
    {
        $price = 0;
        $ingredientsPrices = [
            'tomato' => 0.5,
            'mushrooms' => 0.5,
            'cheese' => 1,
            'sausages' => 1,
            'onion' => 0.5,
            'mozzarella' => 0.3,
            'oregano' => 2,
            'bacon' => 1,
        ];
        foreach ($toppings as $topping) {
            $price += $ingredientsPrices[$topping];
        }

        return (float)round($price * 1.5, 2);
    }

}
