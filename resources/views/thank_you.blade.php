@extends('layouts.main')
@section('content')
    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="container">



            <section class="cart container mt-2 my-3 py-5 mb-5">
                <div class="container mt-2 mb-5 text-center">
                    @if (Session::has('order_id') && Session::get('order_id') != null)
                      <h2>thank you</h2> 
                         <h3 style="color: blue">order is :{{Session::get('order_id')}}</h3>
                      <h2>keep going</h2> 
                      <h2>** we will deliver your watches in 2 days **</h2> 
                    @endif
                </div>

            </section>



        </div>
    </div>

 @endsection   