<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){

        return view('cart');
    }

    public function add_to_cart(Request $request){

        // في حاله لو عندنا كات
        if($request->session()->has('cart')){

            $cart = $request->session()->get('cart');
            $products_array_ids = array_column($cart ,'id');
            $id =  $request->input('id');

            if(!in_array($id , $products_array_ids )){

                $name          = $request->input('name');
                $image         = $request->input('image');
                $price         = $request->input('price');
                $sale_price    = $request->input('sale_price');
                $category      = $request->input('category');
                $type          = $request->input('type');
                $quantity      = $request->input('quantity');

                if($sale_price != null){
                    $officaly_price = $sale_price;
                }else{
                    $officaly_price = $price;
                }

                $product_array = array(
                    'id'          =>$id,
                    'name'        =>$name,
                    'image'       =>$image,
                    'price'       =>$officaly_price,
                    'category'    =>$category,
                    'type'        =>$type,
                    'quantity'    =>$quantity,
                );

                $cart[$id] = $product_array;

                $request->session()->put('cart' ,$cart);


            }else{
                echo "<script>alert('the product is in array');</script>";
            }

            $this->calc($request);

            return view('cart');


        // في حاله لو معندناش كارت
        }else{

            $cart = array();

            $id            = $request->input('id');
            $name          = $request->input('name');
            $image         = $request->input('image');
            $price         = $request->input('price');
            $sale_price    = $request->input('sale_price');
            $category      = $request->input('category');
            $type          = $request->input('type');
            $quantity      = $request->input('quantity');

            if($sale_price != null){
                $officaly_price = $sale_price;
            }else{
                $officaly_price = $price;
            }

            $product_array = array(
                'id'          =>$id,
                'name'        =>$name,
                'image'       =>$image,
                'price'       =>$officaly_price,
                'category'    =>$category,
                'type'        =>$type,
                'quantity'    =>$quantity,
            );

            $cart[$id] = $product_array;

            $request->session()->put('cart' ,$cart);

            $this->calc($request);

            return view('cart');

        }


    }



   public function calc(Request $request){

    if($request->session()->has('cart')){
        $cart = $request->session()->get('cart');
        $total_price = 0;
        $total_quantity = 0;


        foreach ($cart as $id => $product) {

            $product  = $cart[$id];
            $price    = $product['price'];
            $quantity = $product['quantity'];

            $total_price = $total_price + ($price * $quantity);
            $total_quantity = $total_quantity + $quantity;
        }

        $request->session()->put('total_price' ,$total_price);
        $request->session()->put('total_quantity' ,$total_quantity);
    }

   }



    public function remove_from_cart(Request $request){

        if($request->session()->has('cart')){

            $cart = $request->session()->get('cart');
            $id = $request->input('id');
         
            unset($cart[$id]);
            $request->session()->put('cart' , $cart);

            $this->calc($request);
        }

        return view('cart');

    }



    public function edit_quantity(Request $request){

        if($request->session()->has('cart')){

            $id = $request->input('id');
            $quantity = $request->input('quantity');

            if($request->has('decrese_product_quantity_btn')){
                $quantity = $quantity -1;
            }elseif($request->has('increas_product_quantity_btn')){
                $quantity = $quantity +1;
            }else{

            }

            if($quantity <=0){

                $this->remove_from_cart($request);

            }

            $cart = $request->session()->get('cart');

            if(array_key_exists($id ,$cart)){

                $cart[$id]['quantity'] = $quantity;

                $request->session()->put('cart' ,$cart);
                
                $this->calc($request);

            }
            
        }

        return view('cart');

    }



    public function checkout(){
        return view('checkout');
    }



    public function place_order(Request $request){


        if($request->session()->has('cart')){

            $name     = $request->input('name');
            $email    = $request->input('email');
            $phone    = $request->input('phone');
            $city     = $request->input('city');
            $address  = $request->input('address');

            $cost     = $request->session()->get('total_price');
            $status   = "not paid";
            $date     = date('Y-m-d h:i:s');

            $cart = $request->session()->get('cart');

            $order_id = DB::table('order_tables')->InsertGetId([

                        'cost'    => $cost,
                        'name'    => $name,
                        'email'   => $email,
                        'status'  => $status,
                        'phone'   => $phone,
                        'city'    => $city,
                        'adress'  => $address,
                        'date'    => $date,
            ],'id');

            foreach ($cart as $id => $product) {
                # code...
                $product          = $cart[$id];
                $product_id       = $product['id'];
                $product_name     = $product['name'];
                $product_image    = $product['image'];
                $product_quantity = $product['quantity'];
                $product_price    = $product['price'];
                $date             = date('Y-m-d h:i:s');
                
                DB::table('order_items')->insert([
 
                    'order_id'         => $order_id, 
                    'product_id'       => $product_id, 
                    'product_name'     => $product_name, 
                    'product_image'    => $product_image, 
                    'product_quantity' => $product_quantity, 
                    'product_price'    => $product_price, 
                    'order_date'       => $date, 
                ]);

            }

               $request->session()->put('order_id' , $order_id);
               return view('payment');
                
                
                
                
            }else{
            return redirect()->route('home');
        }

    }



}
