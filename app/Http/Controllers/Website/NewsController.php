<?php

namespace App\Http\Controllers\Website;

use App\Model\News;
use App\Model\NewsCategory;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\News as AppNews;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        
        //$case=News::where('news_status','=','Publish')->orderBy('news_title','ASC')->limit(2)->paginate(6);
        $news=News::get();
        //dd($case);
        $news_categories = NewsCategory::where('category_status', 'Y')->get();
        $latest_news = News::where('news_status','=','Publish')->orderBy('updated_at','DESC')->limit(5)->get()->toArray();

        return view('Website.news',['news'=>$news,'latest_news' => $latest_news,'news_categories' => $news_categories]);
    }


    public function newsDetails($newsUrl)
    {

        $latest_news = News::where('news_status','=','Publish')->orderBy('updated_at','DESC')->limit(5)->get()->toArray();

        $news_details=News::where('news_url','=',$newsUrl)->first();
        
        $news=News::where('news_status','=','Publish')->get();
        $news_categories =NewsCategory::where('category_status', 'Y')->get();

        $news_cat = DB::table('news_category')
        ->Join('news', 'news_category.id', '=', 'news.news_category_id')
        ->select('*')
        ->where('news.news_url','=',$newsUrl)
       ->first();
       
        return view('Website.news_view',['news_details'=>$news_details,'news'=>$news,'news_categories' => $news_categories,'news_cat'=>$news_cat,'latest_news' => $latest_news]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
