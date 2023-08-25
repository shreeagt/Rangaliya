<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Config;
use Illuminate\Support\Facades\Storage;
use App\Model\Tabs;
use App\Model\Product;
use App\Model\Category;
use App\Model\CategoryProduct;
use App\Model\ProductTabs;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    private function storeFile($file) {
        
        $name = $file->getClientOriginalName();
        $name = pathinfo($name, PATHINFO_FILENAME);
        $name = str_replace(' ', '_', $name);
        //unique name to image
        $newImageName = time() . '-' . $name . '.' . $file->extension();

        $filePath = 'rswT20/' . $newImageName;

        # store image
        Storage::disk('s3')->put($filePath, file_get_contents($file));

        // $bucket_name = env('AWS_BUCKET');
        // $region = env('AWS_DEFAULT_REGION');


        $bucket_name = config("filestorage.AWS_BUCKET");
        $region = config("filestorage.AWS_DEFAULT_REGION");

        $url = 'https://' . $bucket_name . '.s3.' . $region . '.amazonaws.com/' . $filePath;

        return $url;
    }
     // Products
     public function viewProducts(){
    
        $products=Product::all();
      
        return view('main.pages.products.browse',['products'=>$products]);
    }

    // Products
    public function createProduct(){
        if(Auth::check())
        {
            $allCategory = Category::all()->toArray();
            $all_tabs=Tabs::where('status','=','Y')->get();
            $products=Product::all();
          
            return view('main.pages.products.create', ['allCategory' =>$allCategory,'all_tabs'=>$all_tabs,'products'=>$products]);
        }
        return view('admin.login');
    }


        // Add More Products
        public function addProduct(){
          
      
            return view('main.pages.products.addproduct');  
                
            }
        
        

    // Store Products
    public function storeProduct(Request $request){
        if(Auth::check())
        {
            $allFiles = $request->allFiles();
            if(isset($request->table_id) && $request->table_id!=null){
                $image = null;
                if (isset($allFiles['banner_image'])) {
    
                    $image = $this->storeFile($allFiles['banner_image']);
                }

                $og_image = null;
                if (isset($allFiles['og_image'])) {
    
                    $og_image = $this->storeFile($allFiles['og_image']);
                }

                $product=Product::find($request->table_id);
                $product->product_title=$request->product_title;
                $product->description=$request->description;
                $product->product_url=$request->product_url;
                $product->category=$request->category;
                $product->price=$request->price;
                $product->quantity=$request->quantity;
                if($image!=null){
                $product->images=$image;
                }

                if(isset($request->best_seller)){
                    $bestSeller = 1;
                } else{
                    $bestSeller = 0;
                }

                if(isset($request->home)){
                    $home = 1;
                } else{
                    $home = 0;
                }
                $product->best_seller = $bestSeller;
                $product->home = $home;
                $product->sub_services=$request->sub_services;

                $product->meta_title=$request->meta_title;
                $product->meta_desc=$request->meta_desc;
                $product->meta_keywords=$request->meta_keywords;
                $product->og_title=$request->og_title;
                $product->og_desc=$request->og_desc;
                if($og_image!=null){
                    $product->og_image=$og_image;
                }
               
                $product->save();
                
                return redirect()->route('admin-products.index')->with('success_message','Product Edited Successfully!');
    
            }else{

            $image = '';
            if (isset($allFiles['banner_image'])) {

                $image = $this->storeFile($allFiles['banner_image']);
            }

            $og_image = null;
            if (isset($allFiles['og_image'])) {

                $og_image = $this->storeFile($allFiles['og_image']);
            }

            $products = new Product();
            $products->product_title=$request->product_title;
            $products->description=$request->description;
            $products->product_url=$request->product_url;
            $products->category=$request->category;
            $products->price=$request->price;
            $products->quantity=$request->quantity;
            if($image!=null){
            $products->images=$image;
            }

            if(isset($request->best_seller)){
                $bestSeller = 1;
            } else{
                $bestSeller = 0;
            }

            if(isset($request->home)){
                $home = 1;
            } else{
                $home = 0;
            }
            $products->best_seller = $bestSeller;
            $products->home = $home;

            $data = isset($request['sub_services']) && is_array($request['sub_services']) ? $request['sub_services'] : [];

            $sub_services =implode(',', $data);

            // $sub_services = implode(",", $request->get('sub_services'));

            $products->sub_services=$sub_services;
            $products->meta_title=$request->meta_title;
            $products->meta_desc=$request->meta_desc;
            $products->meta_keywords=$request->meta_keywords;
            $products->og_title=$request->og_title;
            $products->og_desc=$request->og_desc;
            if($og_image!=null){
                $products->og_image=$og_image;
            }

            $products->save();

            // For Extra Tabs
            if(isset($request->content) && $request->content!=null){
            foreach ($request->content as $key => $value){
                $new_product_tab= new ProductTabs();
                $new_product_tab->product_id=$products->id;
                $new_product_tab->tab_id=$request->tab_id[$key];
                $new_product_tab->value=$value;
                $new_product_tab->save();
             }
            }
            return redirect()->route('admin-products.index')->with('success_message','Product Added Successfully!');
        }
            
            
        }
        return view('admin.login');
    }

    public function editProduct($id){
        $products=Product::all();
        $product_details=Product::find($id);
        $category_data = Category::all();
        $all_tabs=Tabs::where('status','=','Y')->get();
        return view('main.pages.products.edit',['product_details'=>$product_details,'category_data' =>$category_data,'all_tabs'=>$all_tabs,'products'=>$products]);
    }
 
    public function deleteProduct($id){
        Product::find($id)->delete();
        return redirect()->back()->with('success_message','Product Deleted Successfully!');
    }
    public function addcategories(){
        if(Auth::check()){
            return view('admin.categories');
        }
    }

    public function storecategory(Request $request){
        if(Auth::check()){
            $category = new Category();

            $category->name=$request->category_name;
            $category->slug=$request->category_slug;

            $category->save();

            return redirect()->route('admin-products.index');
        }
    }
}