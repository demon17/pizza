<?php

namespace App\Http\Controllers;

use App\Models\Topping;
use Illuminate\Http\Request;

class ToppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Topping::latest()->paginate(10);

        return view('topping.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topping.create');
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
            'title' => 'required',
            'price' => 'required',
        ]);

        Topping::create($request->all());

        return redirect()->route('topping.index')
            ->with('success','Topping created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function show(Topping $topping)
    {
        return view('topping.show',compact('topping'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function edit(Topping $topping)
    {
        return view('topping.edit',compact('topping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topping $topping)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);

        $topping->update($request->all());

        return redirect()->route('topping.index')
            ->with('success','Topping updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topping  $topping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topping $topping)
    {
        $topping->delete();

        return redirect()->route('topping.index')
            ->with('success','Topping deleted successfully');
    }
}
