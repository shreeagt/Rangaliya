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
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

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
      
        // $bucket_name = env('AWS_BUCKET');
        // $region = env('AWS_DEFAULT_REGION');

        $bucket_name = config("filestorage.AWS_BUCKET");
        $region = config("filestorage.AWS_DEFAULT_REGION");
        
        $url = 'https://'.$bucket_name.'.s3.'.$region.'.amazonaws.com/'.$filePath;
       
        return $url;
    }

    // Categories
    
    public function showCategories(){
        $categories=Category::all();
  
        return view('main.pages.categories.browse',['categories'=>$categories]);
      }

      public function showCategoryPage(){
        return view('main.pages.categories.create');
    }
    public function createCategory(Request $request){
        $allFiles = $request->allFiles();
        if(isset($request->table_id) && $request->table_id!=null){
            $image=null;
       
            if (isset($allFiles['banner_image'])) {
    
               $image = $this->storeFile($allFiles['banner_image']);
            }
             
            $og_image=null;
       
            if (isset($allFiles['og_image'])) {
    
               $og_image = $this->storeFile($allFiles['og_image']);
            }

            $category_details=Category::find($request->table_id);
            $category_details->category_name=$request->category_name;
            $category_details->slug_url=$request->slug_url;
            if($image!=null){
            $category_details->banner_image=$image;
            }

            $category_details->meta_title=$request->meta_title;
            $category_details->meta_desc=$request->meta_desc;
            $category_details->meta_keywords=$request->meta_keywords;
            $category_details->og_title=$request->og_title;
            $category_details->og_desc=$request->og_desc;
            if($og_image!=null){
                $category_details->og_image=$og_image;
            }

            $category_details->save();
            return redirect()->route('categories.index')->with('success_message','Category Edited!');
        }else{

        $og_image='';
       
        if (isset($allFiles['og_image'])) {

           $og_image = $this->storeFile($allFiles['og_image']);
        }

        $image='';
       
        if (isset($allFiles['banner_image'])) {

           $image = $this->storeFile($allFiles['banner_image']);
        } 
        $category=new Category();
        $category->category_name=$request->category_name;
        $category->slug_url=$request->slug_url;
        $category->banner_image=$image;
        $category->meta_title=$request->meta_title;
        $category->meta_desc=$request->meta_desc;
        $category->meta_keywords=$request->meta_keywords;
        $category->og_title=$request->og_title;
        $category->og_desc=$request->og_desc;
        $category->og_image=$og_image;
        $category->save();
        return redirect()->route('categories.index')->with('success_message','Category Added');
    }
    }

    public function editCategoryPage($id){
        $category=Category::find($id);
        return view('main.pages.categories.edit',['category'=>$category]);
    }
    public function deleteCategory($id){
       Category::find($id)->delete();
        return redirect()->back()->with('success_message','Category Deleted Successfully!');
    }


}