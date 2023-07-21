<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use App\Model\Product;
use App\helpers;
use App\Model\ProductCart;
use App\Http\Controllers\Controller;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        $products = Product::where('images', '!=', '')->get();
       // $mightAlsoLike = Product::mightAlsoLike()->get();
        $cart_products = ProductCart::where('user_id', '=', auth()->user()->id)->join('products', 'products.id', '=', 'products_cart.product_id')->select('*', 'products_cart.id AS product_cart_id')->get();
        // dd($cart_products);
        
        // return view('Website.cart')->with([
        return view('Website.cartrang')->with([
            'cart_products' => $cart_products,
            'products' => $products,
            'cart_subtotal' => getNumbers()->get('cart_subtotal'),
            // 'mightAlsoLike' => $mightAlsoLike,
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, Request $request)
    {


        $duplicates = ProductCart::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $product->id)->get();


        if ($duplicates->isNotEmpty()) {

            return redirect()->back()->with('success_message', 'Item is already in your Cart!');
        }
      
        $new_cart_item = new ProductCart();
        $new_cart_item->user_id = auth()->user()->id;
        $new_cart_item->product_id = $product->id;
        $new_cart_item->product_title = $product->product_title;
        $new_cart_item->product_quantity = $request->product_qty || 1;
        $new_cart_item->save();

        if (isset($request->wishlist)) {
            return redirect()->back()->with('success_message', 'Item was added to your cart!');
        } else {
            return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');
        }
    }

    public function updateProductQty(Request $request, $id, $cartId)
    {

        $update_product_qty = ProductCart::find($cartId);

        $update_product_qty->product_quantity = $request->quantity;
        $update_product_qty->save();

        return response()->json(['success' => true]);
    }

    public function storeWishlist(Product $product, Request $request)
    {
        // dd(auth()->user());

        $duplicates = Wishlist::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $product->id)->get();


        if ($duplicates->isNotEmpty()) {

            return redirect()->back()->with('success_message', 'Item is already in your Wishlist!');
        }
        // dd($product);
        $new_wishlist = new Wishlist();
        $new_wishlist->user_id = auth()->user()->id;
        $new_wishlist->product_id = $product->id;
        $new_wishlist->product_title = $product->product_title;
        $new_wishlist->images = $product->images;
        $new_wishlist->price = $product->price;
        $new_wishlist->save();


        return redirect()->back()->with('success_message', 'Item was added to your wishlist!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        if ($request->quantity > $request->productQuantity) {
            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

        $update_cart = ProductCart::find($id);

        $update_cart->product_quantity = $request->quantity;
        $update_cart->save();
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        ProductCart::find($id)->delete();

        if (ProductCart::where('user_id', '=', auth()->user()->id)->count() == 0) {
            session()->forget('coupon');
        }
        return back()->with('success_message', 'Item has been removed!');
    }

    public function destroyWishlist($id)
    {
        Wishlist::find($id)->delete();

        return back()->with('success_message', 'Item has been removed From Wishlist!');
    }

    /**
     * Switch item for shopping cart to Save for Later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already Saved For Later!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'Item has been Saved For Later!');
    }

    public function updateQuantity(Request $request, $id)
    {

        $cart_prod = PackageCart::where('product_id', '=', $id)->join('products', 'products.id', '=', 'product_id')->first();
        // dd($request);
        if ($cart_prod != null) {

            if ($cart_prod->quantity < $request->selected_quantity) {
                return redirect()->back()->with('errors', collect(['We currently do not have enough items in stock.']));
            }
            $update_cart = PackageCart::where('product_id', '=', $id)->first();
            // if($request->variant_img!=null){
            //     $update_cart->variant_img=$request->variant_img;
            //  }
            //  if($request->variant_color!=null){
            //     $update_cart->variant_color=$request->variant_color;
            //  }
            $update_cart->product_quantity = $request->selected_quantity;
            $update_cart->save();
            return redirect()->back()->with('success_message', 'Quantity Selected');
        }
        // else{

        //     // dd($id);
        //     $prod_details=Product::find($id);
        //     $new_cart_prod=new ProductCart();
        //     $new_cart_prod->user_id=auth()->user()->id;
        //     $new_cart_prod->product_id=$id;
        //     $new_cart_prod->product_name=$prod_details->name;
        //     $new_cart_prod->product_quantity=$request->selected_quantity;
        //     // if($request->variant_img!=null){
        //     //     $new_cart_prod->variant_img=$request->variant_img;
        //     //  }
        //     //  if($request->variant_color!=null){
        //     //     $new_cart_prod->variant_color=$request->variant_color;
        //     //  }
        //     $new_cart_prod->save();
        //     return redirect()->back()->with('success_message', 'Item Added');
        // }
        // $prod_details=Product::find($id);
        // $new_cart_prod=new ProductCart();
        // $new_cart_prod->user_id=auth()->user()->id;
        // $new_cart_prod->product_id=$id;
        // $new_cart_prod->product_name=$prod_details->name;
        // $new_cart_prod->product_quantity=$request->selected_quantity;
        // // if($request->variant_img!=null){
        // //     $new_cart_prod->variant_img=$request->variant_img;
        // //  }
        // //  if($request->variant_color!=null){
        // //     $new_cart_prod->variant_color=$request->variant_color;
        // //  }
        // $new_cart_prod->save();
        // return redirect()->back()->with('success_message', 'Item Added');

    }

    public function showWishlist()
    {

        if (isset(auth()->user()->id)) {
            $wishlist = Wishlist::where('user_id', '=', auth()->user()->id)->select('*','wishlist.id AS wishlist_id')->get();
            

            return view('wishlist', ['wishlist' => $wishlist]);
        }
    }
}
