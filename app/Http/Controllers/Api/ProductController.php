<?php

namespace App\Http\Controllers\Api;
use App\Model\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    private function storeFile($file) {
        
        $name = $file->getClientOriginalName();
    
        $name= pathinfo($name, PATHINFO_FILENAME);
        
        $name = str_replace(' ', '_', $name);
        //unique name to image
        $newImageName = time().'-'.$name.'.'.$file->extension();
        
        
        
        $filePath = 'webeasty-ecom/' . $newImageName;
        
        # store image
        Storage::disk('s3')->put($filePath, file_get_contents($file));
       
    
        $bucket_name = env('AWS_BUCKET');
        $region = env('AWS_DEFAULT_REGION');
      
       
        $url = 'https://'.$bucket_name.'.s3.'.$region.'.amazonaws.com/'.$filePath;
       
    
      
    
    
        return $url;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "data"=>Product::get()
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = '';
        if (isset($allFiles['product_image'])) {

            $image = $this->storeFile($allFiles['product_image']);
        }

        $products = new Product();

        $products->name=$request->name;
        $products->chemical_composition=$request->chemical_composition;
        $products->category=$request->category;
        $products->prescription=$request->prescription;
        $products->usage=$request->usage;
        $products->quantity=$request->quantity;
        $products->price=$request->price;
        $products->precautions=$request->precautions;
        $products->images=$image;
        $products->seo_title=$request->seo_title;
        $products->seo_meta_desc=$request->seo_meta_desc;
        $products->seo_keywords=$request->seo_keywords;

        if(isset($request->best_seller)){
            $bestSeller = 1;
        } else{
            $bestSeller = 0;
        }
        $products->best_seller = $bestSeller;

        $products->save();

        return response()->json([
            'message' => "product created successfully!!",
            'status' => "success",
            'data' =>$products
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
       return response()->json(['data' =>$product]);
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

      
        $data = $request->all();
        $allFiles = $request->allFiles();
        if(isset($id) && $id!=null){
            $image = null;
            if (isset($allFiles['product_image'])) {

                $image = $this->storeFile($allFiles['product_image']);
            }
       
            $product=Product::find($id);
            $product->name=$request->name;
            $product->chemical_composition=$request->chemical_composition;
            $product->category=$request->category;
            $product->prescription=$request->prescription;
            $product->usage=$request->usage;
            $product->quantity=$request->quantity;
            $product->price=$request->price;
            $product->precautions=$request->precautions;
            if($image!=null){
            $product->images=$image;
            }
            $product->seo_title=$request->seo_title;
            $product->seo_meta_desc=$request->seo_meta_desc;
            $product->seo_keywords=$request->seo_keywords;
            if(isset($request->best_seller)){
                $bestSeller = 1;
            } else{
                $bestSeller = 0;
            }
            $product->best_seller = $bestSeller;
            $product->save();
        }
    $jsonData = [
        'status' => 'SUCCESSfully updated !!',
        'product' => $product
    ];

    return response()->json($jsonData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
       return response()->json([
        "message"=>"product deleted successfully !!",
        "status"=>"success"
    ]);
    }
}
