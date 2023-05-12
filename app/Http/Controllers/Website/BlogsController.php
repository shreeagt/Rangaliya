<?php

namespace App\Http\Controllers\Website;
use App\Model\Blog;
use App\Model\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $blogs=Blog::where('blog_status','=','Publish')->orderBy('blog_title','ASC')->limit(2)->paginate(6);

        $blogsLatest = Blog::where('blog_status','=','Publish')->orderBy('updated_at','DESC')->limit(5)->get()->toArray();

        $blog_categories = BlogCategory::where('category_status', 'Y')->get();
        foreach ($blogs as $val) {
            if(isset($val->blog_thumbnail) && (!empty($val->blog_thumbnail))){
                $thumbnail=temp_url($val->blog_thumbnail);
            }else{
                $thumbnail='';  
            }
            if(isset($val->blog_banner) && (!empty($val->blog_banner))){
                $banner=temp_url($val->blog_banner);
            }else{
                $banner='';  
            }
            if(isset($val->og_image) && (!empty($val->og_image))){
                $og_image=temp_url($val->og_image);
            }else{
                $og_image='';
            }
            $blogArray[$val->id]=array(
            'blog_thumbnail'=>$thumbnail,
            'blog_banner'=>$banner,
            'og_image'=>$og_image
        );
        }
        // return view('Website.blogs',['blogArray'=>$blogArray,'blogs'=>$blogs,'blog_categories' => $blog_categories, 'blogsLatest' => $blogsLatest]);
        return view('Website.blogsrang',['blogArray'=>$blogArray,'blogs'=>$blogs,'blog_categories' => $blog_categories, 'blogsLatest' => $blogsLatest]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewBlogs(){
    
        $products=Product::all();
      
        return view('main.pages.products.browse',['products'=>$products]);
    }


    public function blogDetails($blogUrl){

       

        $blogsLatest = Blog::where('blog_status','=','Publish')->orderBy('updated_at','DESC')->limit(5)->get()->toArray();

       
        $blog_details=Blog::where('blog_url','=',$blogUrl)->first();
        
        $blogs=Blog::where('blog_status','=','Publish')->get();
        $blog_categories = BlogCategory::where('category_status', 'Y')->get();
        $blog_cat = DB::table('blog_category')
        ->Join('blogs', 'blog_category.id', '=', 'blogs.blog_category_id')
        ->select('*')
        ->where('blogs.blog_url','=',$blogUrl)
       ->first();
       
        // return view('Website.blog_view',['blog_details'=>$blog_details,'blogs'=>$blogs,'blog_categories' => $blog_categories,'blog_cat'=>$blog_cat,'blogsLatest' => $blogsLatest]);
         return view('Website.blog_viewrang',['blog_details'=>$blog_details,'blogs'=>$blogs,'blog_categories' => $blog_categories,'blog_cat'=>$blog_cat,'blogsLatest' => $blogsLatest]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::where('id', $id)->firstOrFail();
       

        //$stockLevel = getStockLevel($product->quantity);

        return view('website.blogs-list')->with([
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
   
}
