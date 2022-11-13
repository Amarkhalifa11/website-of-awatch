<?php

namespace App\Http\Controllers;

use App\Models\order_table;
use Illuminate\Http\Request;
use Auth;

class OrderTableController extends Controller
{

    public function index()
    {
        $orders = order_table::all();
        return view('backend.order_table.all_oreders' , compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(order_table $order_table)
    {
        //
    }

    public function edit(order_table $order_table)
    {
        //
    }

    public function update(Request $request, order_table $order_table)
    {
        //
    }



    public function destroy( $id)
    {
        $orders = order_table::find($id);
        $orders->delete();

        return redirect()->route('all_orders')->with('message' , 'the order is deleted');
    }
}
