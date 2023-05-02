<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Config;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Model\NewsCategory;
use App\Http\Controllers\Controller;
use App\MOdel\News;

class NewsArticalController extends Controller {
    
    private function storeFile($file) {
        
        $name = $file->getClientOriginalName();
    
        $name= pathinfo($name, PATHINFO_FILENAME);
        
        $name = str_replace(' ', '_', $name);
        //unique name to image
        $newImageName = time().'-'.$name.'.'.$file->extension();
        
        
        
        $filePath = 'rswT20/' . $newImageName;
        
        # store image
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        // dd('helo');
    
        // $bucket_name = env('AWS_BUCKET');
        // $region = env('AWS_DEFAULT_REGION');

        $bucket_name = config("filestorage.AWS_BUCKET");
        $region = config("filestorage.AWS_DEFAULT_REGION");
        
       
        $url = 'https://'.$bucket_name.'.s3.'.$region.'.amazonaws.com/'.$filePath;
       
        return $url;
    }

    public function index(){
      $news=News::get();
      return view('main.pages.newsArtical.index',['news'=>$news]);
    }

    public function show(){
      $news_categories=NewsCategory::where('category_status','Y')->get();
      return view('main.pages.newsArtical.create',['news_categories'=>$news_categories]);
    }

    public function store(Request $request){
     // dd($request);
         $allFiles = $request->allFiles();
         $thumbnail=null;
         $news_banner=null;
         $og_image=null;
      
         if (isset($allFiles['news_thumbnail'])) {
 
             $thumbnail = $this->storeFile($allFiles['news_thumbnail']);
          }
          if (isset($allFiles['news_banner'])) {
 
             $news_banner = $this->storeFile($allFiles['news_banner']);
          }

          if (isset($allFiles['og_image'])) {
 
            $og_image = $this->storeFile($allFiles['og_image']);
         }
        
         if(isset($request->news_id) && $request->news_id!=null){
           $news=News::find($request->news_id);

           $news->news_title=$request->news_title;
           $news->news_url=$request->news_url;
           $news->news_category_id=$request->news_category_id;
           $news->news_description=$request->news_description;
           $news->news_keyword=$request->news_keyword;
           $news->news_tag=$request->news_tag;
     
           $news->news_body=$request->news_body;
           if($thumbnail!=null){
           $news->news_thumbnail=$thumbnail;
           }
           $news->news_banner_type=$request->news_banner_type;
           if($news_banner!=null){
           $news->news_banner=$news_banner;
           }

          if($og_image!=null){
            $news->og_image=$og_image;
          }
           $news->news_status=$request->news_status;
     
           if($request->news_status=="Publish"){
             $news->published_date=Carbon::now('Asia/Kolkata')->toDateString();
           }
           
          $news->meta_title=$request->meta_title;
          $news->meta_desc=$request->meta_desc;
          $news->meta_keywords=$request->meta_keywords;
          $news->og_title=$request->og_title;
          $news->og_desc=$request->og_desc;
          // $news->og_image=$og_image;
          $news->save();
          return redirect()->route('admin-news.index');
         

         }else{
        // $this->validate($request, [
        //     'case_url'=>['required', 'unique:case_studies'],
        // ]);

      $new_news=new News();
      //dd($request);
      $new_news->news_title=$request->news_title;
      $new_news->news_url=$request->news_url;
      $new_news->news_category_id=$request->news_category_id;
      $new_news->news_description=$request->news_description;
      $new_news->news_keyword=$request->news_keyword;
      $new_news->news_tag=$request->news_tag;

      $new_news->news_body=$request->editor;
      $new_news->news_thumbnail=$thumbnail;
      $new_news->news_banner_type=$request->news_banner_type;
      $new_news->news_banner=$news_banner;
      $new_news->news_status=$request->news_status;

      if($request->news_status=="Publish"){
        $new_news->published_date=Carbon::now('Asia/Kolkata')->toDateString();
      }

      $new_news->meta_title=$request->meta_title;
      $new_news->meta_desc=$request->meta_desc;
      $new_news->meta_keywords=$request->meta_keywords;
      $new_news->og_title=$request->og_title;
      $new_news->og_desc=$request->og_desc;
      $new_news->og_image=$og_image;

      $new_news->save();
    }
      return redirect()->route('admin-news.index');

    }

    public function edit($id){
      $news_details = News::find($id);
      $news_categories = NewsCategory::where('category_status', 'Y')->get();

      return view('main.pages.newsArtical.create', ['news_details' => $news_details, 'news_categories' => $news_categories]);
    }
    public function delete($id){
      News::find($id)->delete();
        return redirect()->back();

    }

    public function createCategory(){
      return view('main.pages.newsArtical.create-category');
    }

    public function showCategory(){
      $news_categories=NewsCategory::get();
      return view('main.pages.newsArtical.category-index',['news_categories'=>$news_categories]);
    }

    public function storeCategory(Request $request){
      $allFiles = $request->allFiles();
      $category_thumbnail=null;
      $category_banner=null;
      $og_image=null;

        if (isset($allFiles['category_thumbnail'])) {
            $category_thumbnail = $this->storeFile($allFiles['category_thumbnail']);
        }

        if (isset($allFiles['category_banner'])) {
            $category_banner = $this->storeFile($allFiles['category_banner']);
        }

        if (isset($allFiles['og_image'])) {
            $og_image = $this->storeFile($allFiles['og_image']);
        }

        if (isset($request->news_categories_id) && $request->news_categories_id != null) {
           
            $casesw_category = NewsCategory::find($request->news_categories_id);
            $casesw_category->category_title=$request->category_title;
            $casesw_category->category_description=$request->category_description;
            $casesw_category->category_body=$request->editor;

            if ($category_thumbnail != null) {
                $casesw_category->category_thumbnail = $category_thumbnail;
            }
          
            if ($category_banner != null) {
                $casesw_category->category_banner = $category_banner;
            }

            if ($og_image != null) {
                $casesw_category->og_image = $og_image;
            }
            
            $casesw_category->category_status = $request->category_status;

            if ($casesw_category->category_status == "Y" && $request->category_status == "N") {
                $casesw_category->category_status = $request->category_status;
            }
            $casesw_category->save();
            return redirect()->route('admin-news-category.index');

        } else {
       
          if (isset($allFiles['category_thumbnail'])) {

            $category_thumbnail = $this->storeFile($allFiles['category_thumbnail']);
         }
         if (isset($allFiles['category_banner'])) {
  
            $category_banner = $this->storeFile($allFiles['category_banner']);
         }
  
        if (isset($allFiles['og_image'])) {
  
          $og_image = $this->storeFile($allFiles['og_image']);
        }
        $case_blog_category=new NewsCategory();
        $case_blog_category->category_title=$request->category_title;
        $case_blog_category->category_description=$request->category_description;
        $case_blog_category->category_body=$request->editor;
        $case_blog_category->category_thumbnail=$category_thumbnail;
        $case_blog_category->category_banner=$category_banner;
        $case_blog_category->category_status=$request->category_status;
        $case_blog_category->meta_title=$request->meta_title;
        $case_blog_category->meta_desc=$request->meta_desc;
        $case_blog_category->meta_keywords=$request->meta_keywords;
        $case_blog_category->og_title=$request->og_title;
        $case_blog_category->og_desc=$request->og_desc;
        $case_blog_category->og_image=$og_image;
        $case_blog_category->created_at=Carbon::now('Asia/Kolkata')->toDateTimeString();
        $case_blog_category->updated_at=Carbon::now('Asia/Kolkata')->toDateTimeString();
        $case_blog_category->save();
        return redirect()->route('admin-news-category.index');
        }

    }


    public function categoryEdit($id)
    {
        $news_categories=NewsCategory::find($id);
        return view('main.pages.newsArtical.create-category',['news_categories'=>$news_categories]);
    }

    public function deleteCategory($id)
    {
      NewsCategory::find($id)->delete();
        return redirect()->back();
    }

}