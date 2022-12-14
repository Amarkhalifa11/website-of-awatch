@extends('layouts.main')
@section('title')
    products
@endsection
@section('content')
    

        
        
        <!-- Products Start -->
        <div id="products">
            <div class="container">
                <div class="section-header">
                    <h2>Get Your Products</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies
                    </p>
                </div>
                <div class="row align-items-center">
                    @foreach ($products as $product)
                        
                    <div class="col-md-3">
                        <div class="product-single mb-5">
                            <div class="product-img">
                                <img src="{{ asset('frontend/img/' . $product->image) }}"  alt="Product Image">
                            </div>
                            <div class="product-content">
                                <h2>
                                    <a href="{{ route('single', ['id'=>$product->id]) }}">{{$product->name}}</a>
                                </h2>
                                @if ($product->sale_price != null)
                                    <h3>${{$product->sale_price}}</h3>
                                    <h3 style="text-decoration:line-through;">${{$product->price}}</h3>
                                @else
                                <h3>${{$product->price}}</h3>
                                @endif

                                <h3>{{$product->category}} - {{ $product->type}}</h3>

                                <form action="{{ route('add_to_cart') }}" method="post">
                                @csrf
                                <input type="hidden" name="id"         value="{{$product->id}}">
                                <input type="hidden" name="name"       value="{{$product->name}}">
                                <input type="hidden" name="image"      value="{{$product->image}}">
                                <input type="hidden" name="price"      value="{{$product->price}}">
                                <input type="hidden" name="sale_price" value="{{$product->sale_price}}">
                                <input type="hidden" name="category"   value="{{$product->category}}">
                                <input type="hidden" name="type"       value="{{$product->type}}">
                                <input type="hidden" name="quantity"   value="1">
                                
                                <input type="submit" value="add to cart">

                                </form>
                            </div>
                        </div>
                    </div>

                    @endforeach


                    
                </div>

            </div>
        </div>
        <!-- Products End -->
        


@endsection