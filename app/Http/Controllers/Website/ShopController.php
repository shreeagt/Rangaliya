<?php

namespace App\Http\Controllers\Website;

use App\Model\Product;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tabs;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $categories = Category::all();
        $productCount = Product::where('category', 'electronics')->get()->count(); //harry
        $categories = Category::withCount('products')->get();
        $products = Product::orderBy("product_title")->get();
        // $products = Product::orderBy("product_title")->paginate(2);
        return view('Website.our-productrang',compact('products','categories','productCount'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */

    public function serviceDetails($requestUri)

    {
        //dd($requestUri);
        $categories = Category::all();
        $tab = Tabs::where('product_title','=',$requestUri)->get();
        $product = Product::where('product_title','=',$requestUri)->firstOrFail();
        //dd($product);
        // return view('Website.product')->with([ 'product' => $product,
        return view('Website.productrang')->with([ 'product' => $product,
        'categories' => $categories,'tab'=>$tab]);

    }
    public function productListByCategory($category_name)
    {

        $productCount = Product::where('category', 'electronics')->get()->count(); //harry
        $categories = Category::withCount('products')->get();

   
        $products = Product::all();
        // $categories = Category::all();
        //$categoryProduct = Product::where('category', $request->category)->get();
        // $categoryProduct = Category::join('products', 'products.category', '=', 'category.category_name')
        //                     ->select('products.*')
        //                     ->whereRaw('products.category = category.category_name')
        //                     ->get();
        // // dd($categoryProduct);
        $categoryProduct = Product::where('category', $category_name)->get();

        return view('Website.categoryProducts')->with([
            'categoryProduct' => $categoryProduct,
            'categories' => $categories,
            'products' => $products,
            'productCount'=>$productCount
        ]);
    }

 
}