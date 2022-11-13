<?php

namespace App\Http\Controllers;

use App\Models\order_item;
use Illuminate\Http\Request;
use Auth;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders_items = order_item::all();
        return view('backend.order_items.all_order_items' , compact('orders_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function show(order_item $order_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function edit(order_item $order_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order_item $order_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order_item  $order_item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders_items = order_item::find($id);
        $orders_items->delete();

        return redirect()->route('all_orders_items')->with('message','the item sis deleted');
    }
}
