<?php

namespace App\Http\Controllers\Website;

use App\Model\Product;
use App\Model\Blog;
use App\Model\Team;
use Illuminate\Http\Request;
use App\Model\BlogCategory;
use App\Http\Controllers\Controller;
class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        $blogs=Blog::where('blog_status','=','Publish')->paginate(3);
        $teams=Team::where('status','=','Y')->orderBy('name','ASC')->paginate(4);
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

    // return view('Website.home',['blogArray'=>$blogArray,'blogs'=>$blogs,'blog_categories' => $blog_categories, 'blogsLatest' => $blogsLatest , 'teams'=>$teams]);
    return view('Website.homerang',['blogArray'=>$blogArray,'blogs'=>$blogs,'blog_categories' => $blog_categories, 'blogsLatest' => $blogsLatest , 'teams'=>$teams]);

        // return view('Website.home')->with(['products'=> $products,'blogs'=>$blogs]);
    }


     
    // $blogs=Blog::where('blog_status','=','Publish')->get();


    // $blogsLatest = Blog::where('blog_status','=','Publish')->orderBy('updated_at','DESC')->limit(5)->get()->toArray();

    // $blog_categories = BlogCategory::where('category_status', 'Y')->get();
    // foreach ($blogs as $val) {
    //     if(isset($val->blog_thumbnail) && (!empty($val->blog_thumbnail))){
    //         $thumbnail=temp_url($val->blog_thumbnail);
    //     }else{
    //         $thumbnail='';  
    //     }
    //     if(isset($val->blog_banner) && (!empty($val->blog_banner))){
    //         $banner=temp_url($val->blog_banner);
    //     }else{
    //         $banner='';  
    //     }
    //     if(isset($val->og_image) && (!empty($val->og_image))){
    //         $og_image=temp_url($val->og_image);
    //     }else{
    //         $og_image='';
    //     }
    //     $blogArray[$val->id]=array(
    //     'blog_thumbnail'=>$thumbnail,
    //     'blog_banner'=>$banner,
    //     'og_image'=>$og_image
    // );
    // }
    // return view('Website.blogs',['blogArray'=>$blogArray,'blogs'=>$blogs,'blog_categories' => $blog_categories, 'blogsLatest' => $blogsLatest]);
}