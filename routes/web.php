<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\backendController;
Route::get('/logout', [backendController::class, 'logout'])->name('logout');



// _____________________________________________________________________________

use App\Http\Controllers\UserController;
Route::get('/Users', [UserController::class, 'Users'])->name('Users');



// _____________________________________________________________________________

use App\Http\Controllers\ProductController;
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'show'])->name('products');
Route::get('/single/{id}', [ProductController::class, 'single'])->name('single');


Route::get('/all_products', [ProductController::class, 'all_products'])->name('all_products');

Route::get('/all_products/create', [ProductController::class, 'create'])->name('all_products.create');
Route::post('/all_products/store', [ProductController::class, 'store'])->name('all_products.store');

Route::get('/all_products/edit/{id}', [ProductController::class, 'edit'])->name('all_products.edit');
Route::post('/all_products/update/{id}', [ProductController::class, 'update'])->name('all_products.update');

Route::get('/all_products/destroy/{id}', [ProductController::class, 'destroy'])->name('all_products.destroy');


Route::get('/single', function () {
    return redirect()->route('home');

});

Route::get('/about', function () {
    return view('about');
})->name('about');


// ____________________________________________________________________





use App\Http\Controllers\CartController;
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/add_to_cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('/calc', [CartController::class, 'calc'])->name('calc');
Route::post('/remove_from_cart', [CartController::class, 'remove_from_cart'])->name('remove_from_cart');
Route::post('/edit_quantity', [CartController::class, 'edit_quantity'])->name('edit_quantity');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/place_order', [CartController::class, 'place_order'])->name('place_order');


Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/place_order', function () {
    return redirect()->route('home');
});

Route::get('/add_to_cart', function () {
    return redirect()->route('home');
});

Route::get('/calc', function () {
    return redirect()->route('home');
});

Route::get('/remove_from_cart', function () {
    return redirect()->route('home');
});

Route::get('/edit_quantity', function () {
    return redirect()->route('home');
});



// _____________________________________________________________________

use App\Http\Controllers\PaymentController;
Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('/verify/{transaction_id}', [PaymentController::class, 'verify'])->name('verify');
Route::get('/complete', [PaymentController::class, 'complete'])->name('complete');
Route::get('/thank_you', [PaymentController::class, 'thank_you'])->name('thank_you');

//dashbord
Route::get('/all_payment', [PaymentController::class, 'all_payment'])->name('all_payment');
Route::get('/all_payment/destroy/{id}', [PaymentController::class, 'destroy'])->name('all_payment.destroy');


// _________________________________________________________________________

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('backend.admin');
    })->name('dashboard');
});


// --------------------------------------------------------------------------------

use App\Http\Controllers\OrderTableController;

Route::get('/all_orders', [OrderTableController::class, 'index'])->name('all_orders');

Route::get('/all_orders/destroy/{id}', [OrderTableController::class, 'destroy'])->name('all_orders.destroy');

// __________________________________________________________________________________


use App\Http\Controllers\OrderItemController;

Route::get('/all_orders_items', [OrderItemController::class, 'index'])->name('all_orders_items');

Route::get('/all_orders_items/destroy/{id}', [OrderItemController::class, 'destroy'])->name('all_orders_items.destroy');


// _____________________________________________________________________________________



