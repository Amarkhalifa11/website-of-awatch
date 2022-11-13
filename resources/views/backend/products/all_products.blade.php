@extends('backend.admin_master')
@section('content')

<h1 class="text-center mb-2">all products</h1>
<h1 class="text-center mb-2">welcome : {{Auth::User()->name}}</h1>
<h1 class="text-center mb-5">count of products is  : {{count($products)}}</h1>

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
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">image</th>
                        <th scope="col">description</th>
                        <th scope="col">quantity</th>
                        <th scope="col">price</th>
                        <th scope="col">sale </th>
                        <th scope="col">category</th>
                        <th scope="col">type</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($products as $product)
                        
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td>{{$product->name}}</td>
                        <td><img src="{{ asset('frontend/img/' . $product->image) }}" width="50" height="50" alt="" srcset=""></td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->sale_price}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->type}}</td>
                        <td><a href="{{ route('all_products.edit', ['id'=>$product->id]) }}" class="btn btn-primary ">edit</a></td>
                        <td><a href="{{ route('all_products.destroy', ['id'=>$product->id]) }}" class="btn btn-danger ">delete</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="text-center mt-5">
                <td><a href="{{ route('all_products.create') }}" class="btn btn-success ">add product</a></td>
            </div>
        </div>
    </div>
</div>
    
@endsection