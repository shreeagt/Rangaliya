<?php

namespace App\Http\Controllers\Website;
use Helper\mailHelper;
use App\Model\Order;
use App\Model\Product;
use App\Model\OrderProduct;

use App\Model\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\helper;

use App\Mail\orderMail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use App\Http\Controllers\Controller;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart_products=ProductCart::where('user_id','=',auth()->user()->id)->join('products','products.id','=','products_cart.product_id')->get();
        if ($cart_products->count() == 0) {
            return redirect()->route('shop.index');
        }

        if (auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('checkout.index');
        }

        // $gateway = new \Braintree\Gateway([
        //     'environment' => config('services.braintree.environment'),
        //     'merchantId' => config('services.braintree.merchantId'),
        //     'publicKey' => config('services.braintree.publicKey'),
        //     'privateKey' => config('services.braintree.privateKey')
        // ]);

        try {
            $paypalToken = $gateway->ClientToken()->generate();
        } catch (\Exception $e) {
            $paypalToken = null;
        }

        // return view('Website.checkout')->with([
        return view('Website.checkoutrang')->with([
            'cart_products'=>$cart_products,
            'cart_subtotal'=>getNumbers()->get('cart_subtotal'),
            'paypalToken' => $paypalToken,
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         try {
  
            $order = $this->addToOrdersTables($request, null);
            
            $to_email = $order['billing_email'];
        
            $data['mail_data'] = array("toAddress" => $to_email);
            $data['template_data']['user_name'] =  $order['billing_name'];
            $data['template_data']['order_id'] =  $order['id'];
            
            $helperfunction1_res = helperfunction1($data);
           // dd($request);
            // $userName = $request->name;
            // $userEmail = $request->email;
            // $userphone = $request->phone;
            // decrease the quantities of all the products in the cart
          
        //    ProductCart::where('user_id','=',auth()->user()->id)->get()->each->delete();
            
        //$this->sendEmail($userName, $userEmail,$userphone);
       // $this->sendEmail1($admin_email, $user_name);
        return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        
    } catch (CardErrorException $e) {
            
           $this->addToOrdersTables($request, $e->getMessage());
            
          
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paypalCheckout(Request $request)
    {
        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors('Sorry! One of the items in your cart is no longer avialble.');
        }

        // $gateway = new \Braintree\Gateway([
        //     'environment' => config('services.braintree.environment'),
        //     'merchantId' => config('services.braintree.merchantId'),
        //     'publicKey' => config('services.braintree.publicKey'),
        //     'privateKey' => config('services.braintree.privateKey')
        // ]);

        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => round(getNumbers()->get('newTotal') / 100, 2),
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        $transaction = $result->transaction;

        if ($result->success) {
            $order = $this->addToOrdersTablesPaypal(
                $transaction->paypal['payerEmail'],
                $transaction->paypal['payerFirstName'].' '.$transaction->paypal['payerLastName'],
                null
            );

           

            // decrease the quantities of all the products in the cart
            // $this->decreaseQuantities();

            // Cart::instance('default')->destroy();
            session()->forget('coupon');

            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
        } else {
            $order = $this->addToOrdersTablesPaypal(
                $transaction->paypal['payerEmail'],
                $transaction->paypal['payerFirstName'].' '.$transaction->paypal['payerLastName'],
                $result->message
            );

            return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    }

    protected function addToOrdersTables($request, $error)
    {
        
        //$paymentGateway = $request->payment_gateway;
     
          // Insert into orders table
          $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            'billing_tax' => getNumbers()->get('newTax'),
            'billing_total' => getNumbers()->get('newTotal'),
            // 'payment_gateway' => $request->rzp_paymentid,
            'payment_gateway' => $request->rzp_paymentid ?? 'Razorpay', // If rzp_paymentid is null, set a default value 'Razorpay'.
            //$paymentGateway = $request->payment_gateway,
            'error' => $error,
        ]);    

     
        $cart_products=ProductCart::where('user_id','=',auth()->user()->id)->get();
        foreach ($cart_products as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->product_quantity,
            ]);
        }
        ProductCart::where('user_id','=',auth()->user()->id)->delete();
        return $order;
           
  
    }
    private function sendEmail($userName, $userEmail,$userphone)
    {
       

        $details = [
            'username' => $userName,
            'email_id' => $userEmail,
            'userphone' => $userphone,
        ];
        Mail::to($userEmail)->send(new orderMail($details));

        return "Email Sent";
    }
    protected function addToOrdersTablesPaypal($email, $name, $error)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $email,
            'billing_name' => $name,
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            'billing_tax' => getNumbers()->get('newTax'),
            'billing_total' => getNumbers()->get('newTotal'),
            'error' => $error,
            'payment_gateway' => 'paypal',
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        }

        return false;
    }
}