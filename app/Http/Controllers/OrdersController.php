<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Topping;
use Illuminate\Http\Request;

/**
 * Class OrdersController
 * @package App\Http\Controllers
 */
class OrdersController extends Controller
{
    /**
     * OrdersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $toppings = Topping::all();
        return view('create', ['toppings' => $toppings]);
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
        foreach ($toppings as $topping) {
            $price += $this->getPriceByTitle($topping);
        }

        return (float)round($price * 1.5, 2);
    }

    /**
     * Get price by title
     *
     * @param string $title
     * @return double
     */
    private function getPriceByTitle(string $title)
    {
        return (double) Topping::where('title', $title)->get('price')->first()['price'];
    }

}
