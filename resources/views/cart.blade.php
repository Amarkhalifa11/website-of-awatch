@extends('layouts.main')
@section('title')
    cart
@endsection
@section('content')
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="container">



            <section class="cart container mt-2 my-3 py-5 mb-5">
                <div class="container mt-2 mb-5">
                    <h4>Your Cart</h4>
                </div>

                <table class="pt-5 mb-5">
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>


                    @if (Session::has('cart'))
                        @foreach (Session::get('cart') as $product)
                            <tr>
                                <td>
                                    <div class="product-info mb-5">
                                        <img src="{{ asset('frontend/img/' . $product['image']) }}">
                                        <div>
                                            <p>{{ $product['name'] }}</p>
                                            <p>{{ $product['category'] }} - {{ $product['type'] }}</p>
                                            <small><span>$</span>{{ $product['price'] }}</small>
                                            <br>
                                            <form method="POST" action="{{ route('remove_from_cart') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$product['id']}}">
                                                <input type="submit" name="remove_btn" class="remove-btn" value="remove">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('edit_quantity') }}">
                                        @csrf
                                        <input type="submit" value="-" class="edit-btn"
                                        name="decrese_product_quantity_btn">
                                        <input type="hidden" name="id" value="{{$product['id']}}">
                                        <input type="text" name="quantity" value="{{ $product['quantity'] }}" readonly>
                                        <input type="submit" value="+" class="edit-btn"
                                        name="increas_product_quantity_btn">
                                    </form>
                                </td>
                                <td>
                                    <hr>
                                    <span class="product-price">${{ $product['price'] * $product['quantity'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    @endif



                </table>


                <div class="cart-total">
                    <table>
                        <td>Total</td>
                        @if (Session::has('cart'))
                        <tr>
                            @if (Session::has('total_price'))
                            <td>${{Session::get('total_price')}}</td>
                            @endif
                        </tr>
                        @endif

                    </table>
                </div>


                <div class="checkout-container">

                    @if (Session::has('total_price'))
                      @if (Session::get('total_price') != null)
                    <form method="GET" action="{{ route('checkout') }}">
                        @csrf
                        <input type="submit" class="btn checkout-btn" value="Checkout" name="">
                    </form>
                      @endif
                    @endif

                </div>





            </section>



        </div>
    </div>
    <!-- Cart End -->
@endsection
