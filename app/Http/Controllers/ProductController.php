<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(4);
        return view('index', compact('products'));
    }

    public function show()
    {
        $title = 'products';
        $products = Product::all();
        return view('products', compact('products' , 'title'));
    }

    public function single($id)
    {
        $title = 'single';
        $products = Product::find($id);
        return view('single', compact('products','title'));
    }


    
    public function all_products()
    {
        $products = Product::all();
        return view('backend.products.all_products', compact('products'));
    }


    public function create()
    {
        return view('backend.products.add_product');
    }


    public function store(Request $request)
    {

        // upload image

        $product_image = $request->file('image'); 
 
        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($product_image->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'frontend/img/'; 
        $image = $img_name; 
        $product_image->move($upload_location,$img_name); 



        // add new product

        $product = new Product();

        $product->name         = $request->name; 
        $product->image        = $image; 
        $product->price        = $request->price; 
        $product->sale_price   = $request->sale_price; 
        $product->category     = $request->category; 
        $product->type         = $request->type; 
        $product->description  = $request->description; 
        $product->quantity     = $request->quantity; 

        $product->save();

        // redirect

        return redirect()->route('all_products')->with('message' , 'the product is added succefully');
    }


    public function edit(Product $product , $id)
    {
        $products = Product::find($id);
        return view('backend.products.edit_product' , compact('products'));
    }

    public function update(Request $request, $id)
    {

        //upload image

        $product_image = $request->file('image'); 
 
        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($product_image->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'frontend/img/'; 
        $image = $img_name; 
        $product_image->move($upload_location,$img_name); 
        // update

        $products = Product::find($id);
        $products->update([
            
            'name'          => $request->name,
            'image'         => $image,
            'description'   => $request->description,
            'quantity'      => $request->quantity,
            'price'         => $request->price,
            'sale_price'    => $request->sale_price,
            'category'      => $request->category,
            'type'          => $request->type,
        ]);

        $products ->save();

        // redirect

        return redirect()->route('all_products')->with('message' , 'the products is updated succefully');
    }


    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect()->route('all_products')->with('message' , 'the products is deleted succefully');

    }
}
