@extends('backend.admin_master')
@section('content')

<h1 class="text-center mb-2">all orders items</h1>
<h1 class="text-center mb-2">welcome : {{Auth::User()->name}}</h1>
<h1 class="text-center mb-5">count of orders items is  : {{count($orders_items)}}</h1>

<div>
    @if (Session('message'))
      <h2 class="text-center text-success my-3">{{ session('message') }}</h2>
    @endif
</div>
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">order id</th>
                        <th scope="col">product id</th>
                        <th scope="col">product name</th>
                        <th scope="col">product image</th>
                        <th scope="col">product quantity</th>
                        <th scope="col">price </th>
                        <th scope="col">order date</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($orders_items as $order)
                        
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->product_id}}</td>
                        <td>{{$order->product_name}}</td>
                        <td><img src="{{ asset('frontend/img/' . $order->product_image) }}" width="50" height="50" alt="" srcset=""></td>
                        <td>{{$order->product_quantity}}</td>
                        <td>{{$order->product_price}}</td>
                        <td>{{$order->order_date}}</td>
                        <td><a href="{{ route('all_orders_items.destroy', ['id'=>$order->id]) }}" class="btn btn-danger ">delete</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
    
@endsection