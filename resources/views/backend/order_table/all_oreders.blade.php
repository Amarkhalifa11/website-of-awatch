@extends('backend.admin_master')
@section('content')

<h1 class="text-center mb-2">all orders</h1>
<h1 class="text-center mb-2">welcome : {{Auth::User()->name}}</h1>
<h1 class="text-center mb-5">count of orders is  : {{count($orders)}}</h1>

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
                        <th scope="col">name</th>
                        <th scope="col">cost</th>
                        <th scope="col">email</th>
                        <th scope="col">status</th>
                        <th scope="col">phone </th>
                        <th scope="col">city</th>
                        <th scope="col">adress</th>
                        <th scope="col">date</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($orders as $order)
                        
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td>{{$order->id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->cost}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->city}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->adress}}</td>
                        <td><a href="{{ route('all_orders.destroy', ['id'=>$order->id]) }}" class="btn btn-danger ">delete</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
    
@endsection