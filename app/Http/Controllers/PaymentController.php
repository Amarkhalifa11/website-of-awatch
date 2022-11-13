<?php

namespace App\Http\Controllers;

use App\Models\payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use Auth;

class PaymentController extends Controller
{

    public function payment()
    {
        return view('payment');
    }

    public function verify(Request $request , $transaction_id)
    {
        $request->session()->put('transaction_id' ,$transaction_id);
        return redirect()->route('complete');
    }

    public function complete(Request $request)
    {

        if($request->session()->has('order_id') && $request->session()->has('transaction_id')){
   
            $order_id         = $request->session()->get('order_id');
            $transaction_id   = $request->session()->get('transaction_id');
            $date             = date('Y-m-d h:i:s');
            $order_status     = "paid";

            $affected = DB::table('order_tables')
                      ->where('id' ,$order_id)
                      ->update([
                        'status' => $order_status
                    ]);


            DB::table('payments')->insert([

                'transaction_id' => $transaction_id,
                'order_id'       => $order_id,
                'date'           => $date,
            ]);

            $request->session()->flush();
            return redirect()->route('thank_you')->with('order_id' ,$order_id);
            
            
        }else{
            return redirect()->route('home');
        }
            

    }

    public function thank_you()
    {
        return view('thank_you');
    }


    public function all_payment()
    {
        $payments = payment::all();
        return view('backend.payments.all_payments' , compact('payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payments = payment::find($id);
        $payments->delete();

        return redirect()->route('all_payment')->with('message' , 'the payment is deleted');
    }
}
