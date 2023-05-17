@include('layouts.headerrang')
<!-- @push('title')
   <title>blogs</title> 
   @endpush -->
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/post-8248.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/style2.css') }}" type='text/css' media='all' />
<!-- <link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/post-8248.css') }}" type='text/css' media='all' /> -->
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/styleblog.css') }}" type='text/css' media='all' />
<style>
   body{
   background-color: #ffffff!important;
   }
</style>
<div id="theme-page-header">
   <div class="page-header ">
      <div class="container">
         <div id="theme-bread">
            <h1 class="page-title entry-title">
               Blog	
            </h1>
            <nav class="woocommerce-breadcrumb"><a href="/">Home</a> <span>·</span> <a href="#">Trends</a> <span>·</span> {{ $blog_details->blog_title }}</nav>
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="row">
      <main id="main" class="col-md-8 col-lg-8">
         <div class="postSingle">
            <div class="postMedia">                    
               <img  src="<?php echo env('IMAGE_URL_CONSTANT').$blog_details->blog_banner ?>" class="parallax-inner back-img desktop-image w-100" alt="{{$blog_details->blog_title}}">
            </div>
            <!--Post image-->
            <div class="postMeta clearfix">
               <div class="postMeta-info">
                  <span class="metaAuthor"><i class="fa fa-user"></i> <a href="#">Admin</a></span>
                  <span class="metaCategory"><i class="fa fa-folder"></i> <a href="#">Research</a></span>
                  <!-- <span class="metaComment"><i class="fa fa-comments"></i> <a href="#">3 comments</a></span> -->
               </div>
               <div class="postMeta-date">
                  <span class="time"><i class="fa fa-calendar"></i>
                  {{Carbon\Carbon::parse($blog_details->created_at)->format('M d, Y')}}</span>
               </div>
            </div>
            <!--Post meta-->
            <div class="postTitle">
               <h1>{{ $blog_details->blog_title }}</h1>
               <div class="divider-small"></div>
            </div>
            <!--Post title-->  
            <p>{{$blog_details->blog_description}}</p>
         </div>
      </main>
      <aside class="widget-area col-md-4">
         <aside id="block-12" class="widget widget_block">
            <div class="elementor-widget-container">
               <aside id="block-14" class="widget widget_block">
                  <h5 class="wp-block-heading">Search</h5>
               </aside>
               <aside id="block-8" class="widget widget_block widget_search">
                  <form role="search" method="get" action="https://mintie.boostifythemes.com/" class="wp-block-search__button-outside wp-block-search__icon-button wp-block-search">
                     <label for="wp-block-search__input-1" class="wp-block-search__label screen-reader-text">Search</label>
                     <div class="wp-block-search__inside-wrapper " >
                        <input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s" value="" placeholder="Enter keyword..."  required />
                        <button type="submit" class="wp-block-search__button has-icon wp-element-button"  aria-label="Search">
                           <svg class="search-icon" viewBox="0 0 24 24" width="24" height="24">
                              <path d="M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path>
                           </svg>
                        </button>
                     </div>
                  </form>
               </aside>
               <aside id="block-15" class="widget widget_block">
                  <h5 class="wp-block-heading">OUR POPULOR CATEGORIES</h5>
               </aside>
               <aside id="block-10" class="widget widget_block widget_categories">
                  <ul class="wp-block-categories-list wp-block-categories">
                     <li><a href="<?= env('APP_URL').'/blog/'?>">All</a></li>
                     <?php foreach($blog_categories as $cat) { ?>
                     <li class="cat-item cat-item-31">
                        <a href="<?php echo url('/blog/category/'.$cat->category_slug); ?>"> {{ $cat->category_title}}</a>
                     </li>
                     <?php } ?>
                  </ul>
               </aside>
               <aside id="block-12" class="widget widget_block">
                  <!-- <h5 class="wp-block-heading">Tags</h5>
                     </aside><aside id="block-11" class="widget widget_block widget_tag_cloud"><p class="wp-block-tag-cloud"><a href="https://mintie.boostifythemes.com/tag/art/" class="tag-cloud-link tag-link-38 tag-link-position-1" aria-label="art (9 items)">art</a>
                     <a href="https://mintie.boostifythemes.com/tag/crafting/" class="tag-cloud-link tag-link-35 tag-link-position-2" aria-label="crafting (9 items)">crafting</a>
                     <a href="https://mintie.boostifythemes.com/tag/fabric/" class="tag-cloud-link tag-link-70 tag-link-position-3" aria-label="fabric (1 item)">fabric</a>
                     <a href="https://mintie.boostifythemes.com/tag/fragrances/" class="tag-cloud-link tag-link-69 tag-link-position-4" aria-label="fragrances (1 item)">fragrances</a>
                     <a href="https://mintie.boostifythemes.com/tag/handmade/" class="tag-cloud-link tag-link-36 tag-link-position-5" aria-label="handmade (9 items)">handmade</a>
                     <a href="https://mintie.boostifythemes.com/tag/mintie/" class="tag-cloud-link tag-link-37 tag-link-position-6" aria-label="mintie (9 items)">mintie</a></p></aside><aside id="mintie-recent-posts-7" class="widget mintie_widget_recent_entries"> -->
                  <h5 class="widget-title">Recent Posts</h5>
                  <ul class="mintie-entries">
                     <?php foreach($blogsLatest as $latest) { ?>
                     <li class="mintie-entry">
                        <div class="mintie-entry-thumbnail">
                           <a href="<?php echo url('/blog/'.$latest['blog_url']); ?>" aria-hidden="true" tabindex="-1">
                           <img width="150" height="150" src="{{ $latest['blog_thumbnail'] }}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="image" decoding="async" loading="lazy" srcset="{{ $latest['blog_thumbnail'] }}" sizes="(max-width: 150px) 100vw, 150px" />							</a>
                        </div>
                        <div class="mintie-recent-post-detail">
                           <a href="<?php echo url('/blog/'.$latest['blog_url']); ?>" class="mintie-recent-post-title"> {{ $latest['blog_title'] }}</a>
                           <!-- <span class="mintie-recent-post-on">
                              Nov 19, 2021					
                                               	</span> -->
                        </div>
                     </li>
                     <?php  } ?>
                  </ul>
               </aside>
            </div>
         </aside>
      </aside>
   </div>
</div>
@include('layouts.footerrang')