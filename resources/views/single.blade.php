@extends('layouts.main')
@section('title')
    single
@endsection
@section('content')
    



        
        
        <!-- Products Start -->
        <div id="products">
            <div class="container-fluid">
                <div class="row align-items-center">
                    
                        
                    <div class="col-md-12">
                        <div class="product-single">
                            <div class="product-img">
                                <img src="{{ asset('frontend/img/' . $products['image']) }}" width="500" height="500" alt="Product Image">
                            </div>
                            <div class="product-content">
                                <h2>{{$products['name']}}</h2>
                                <h2>{{$products['category']}} - {{$products['type']}}</h2>
                                <h2>{{$products['description']}}</h2>

                                
                                @if ($products['sale_price'] != null)
                                    <h3>${{$products['sale_price']}}</h3>
                                    <h3 style="text-decoration:line-through;">${{$products['price']}}</h3>
                                @else
                                <h3>${{$products['price']}}</h3>
                                @endif

                                <form action="{{ route('add_to_cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id"         value="{{$products->id}}">
                                    <input type="hidden" name="name"       value="{{$products->name}}">
                                    <input type="hidden" name="image"      value="{{$products->image}}">
                                    <input type="hidden" name="price"      value="{{$products->price}}">
                                    <input type="hidden" name="sale_price" value="{{$products->sale_price}}">
                                    <input type="hidden" name="category"   value="{{$products->category}}">
                                    <input type="hidden" name="type"       value="{{$products->type}}">
                                    <input type="hidden" name="quantity"   value="1">
                                    
                                    <input type="submit" value="add to cart">
    
                                    </form>
                            </div>
                        </div>
                    </div>


                  
                </div>

            </div>
        </div>
        <!-- Products End -->
        


        


@endsection