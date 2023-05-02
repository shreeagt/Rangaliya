<?php

namespace App\Http\Controllers\Api;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    private function storeFile($file) {
        
        $name = $file->getClientOriginalName();
    
        $name= pathinfo($name, PATHINFO_FILENAME);
        
        $name = str_replace(' ', '_', $name);
        //unique name to image
        $newImageName = time().'-'.$name.'.'.$file->extension();
        
        
        
        $filePath = 'inocare/' . $newImageName;
        
        # store image
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        // dd('helo');
    
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
        $categories=Category::all();
        return response()->json([
            "data"=>$categories
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
        $image='';
       
        if (isset($allFiles['banner'])) {

           $image = $this->storeFile($allFiles['banner']);
        }
     $category=new Category();
     $category->name=$request->name;
     $category->slug=$request->slug;
     $category->banner=$image;
     $category->seo_title=$request->seo_title;
     $category->seo_meta_desc=$request->seo_meta_desc;
     $category->seo_keywords=$request->seo_keywords;
     $category->save();

     return response()->json([
        'message' => "category created successfully!!",
        'status' => "success",
        'data' =>$category
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
      
        //$category = Category::where('id', $id)->get();
       $category = DB::table('products')
        ->join('category', 'products.category', '=', 'category.id')
        ->select('products.*', 'category.*')
        ->get();

        //$category = Product::with('category')->find($id);

       return response()->json(['data' =>$category]);
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
        if(isset($id) && $id!=null){
            $image=null;
       
            if (isset($allFiles['banner'])) {
    
               $image = $this->storeFile($allFiles['banner']);
            }
            $category_details=Category::find($request->id);
            $category_details->name=$request->name;
            $category_details->slug=$request->slug;
            if($image!=null){
            $category_details->banner=$image;
            }
            $category_details->seo_title=$request->seo_title;
            $category_details->seo_meta_desc=$request->seo_meta_desc;
            $category_details->seo_keywords=$request->seo_keywords;
            $category_details->save();
            
        }
        $jsonData = [
            'status' => 'SUCCESSfully updated !!',
            'product' => $category_details
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
        Category::find($id)->delete();
       return response()->json([
        "message"=>"Category deleted successfully !!",
        "status"=>"success"
    ]);
    }
}
