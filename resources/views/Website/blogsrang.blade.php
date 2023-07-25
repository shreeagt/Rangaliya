@include('layouts.headerrang')
@push('title')
<title>blogs</title>
@foreach ($blogs as $item)
<meta property="og:title" content="{{$item->meta_title}}">
<meta property="og:site_name" content="webeasty">
<meta property="og:description" content="{{$item->og_desc}}">
<meta property="og:image" content="{{$item->og_image}}">
@endforeach
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/post-8248.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/style2.css') }}" type='text/css' media='all' />
<style>
   body{
   background-color:#ffffff!important;
   }
</style>
<main id="main" class="page-content">
   <div id="page-8248" class="post-8248 page type-page status-publish hentry">
      <header class="entry-header">
      </header>
      <div data-elementor-type="wp-page" data-elementor-id="8248" class="elementor elementor-8248" data-elementor-settings="[]">
         <div class="elementor-section-wrap">
            <section class="elementor-section elementor-top-section elementor-element elementor-element-a00d218 elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="a00d218" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
               <div class="elementor-container elementor-column-gap-default">
                  <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5bcbcc8" data-id="5bcbcc8" data-element_type="column">
                     <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-9ec7bcc elementor-widget elementor-widget-heading" data-id="9ec7bcc" data-element_type="widget" data-widget_type="heading.default">
                           <div class="elementor-widget-container">
                              <h2 class="elementor-heading-title elementor-size-default">Latest News</h2>
                           </div>
                        </div>
                        <div class="elementor-element elementor-element-9544cca elementor-widget elementor-widget-breadcrumb" data-id="9544cca" data-element_type="widget" data-widget_type="breadcrumb.default">
                           <div class="elementor-widget-container">
                              <nav class="woocommerce-breadcrumb"><a href="/">Home</a> <span>&middot;</span> Blog </nav>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <section class="elementor-section elementor-top-section elementor-element elementor-element-d4f23fe elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="d4f23fe" data-element_type="section">
               <div class="elementor-container elementor-column-gap-default">
                  <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-7075270" data-id="7075270" data-element_type="column">
                     <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-623a0f2 elementor-widget elementor-widget-mintie-blog-posts" data-id="623a0f2" data-element_type="widget" data-widget_type="mintie-blog-posts.default">
                           <div class="elementor-widget-container">
                              <div class="blog widget-blogpreset1">
                                 <?php foreach($blogs as $item) { ?>     
                                 <div class="blog-article" itemscope="itemscope" itemtype="" >
                                    <article id="post-12922" class="post-12922 post type-post status-publish format-standard has-post-thumbnail hentry category-collections tag-art tag-crafting tag-handmade tag-mintie" itemscope="itemscope" itemtype="#" >
                                       <div itemprop="mainEntityOfPage">
                                          <div class="entry-image">
                                             <a href="<?php echo url('/blog/'.$item->blog_url); ?>">
                                             <img width="770" height="666" src="{{$item->blog_thumbnail}}" class="attachment-full size-full wp-post-image" alt="image" decoding="async" loading="lazy" srcset="{{$item->blog_thumbnail}}" sizes="(max-width: 770px) 100vw, 770px" />	</a>
                                          </div>
                                          <div class="blog-article-sum">
                                             <div class="blog-article-header">
                                                <header class="entry-header">
                                                   <h3 class="entry-title blog-title"><a href="<?php echo url('/blog/'.$item->blog_url); ?>" rel="bookmark">{{ $item->blog_title }}</a></h3>
                                                </header>
                                             </div>
                                             <div class="entry-summary">
                                                <div class="screen-reader-text">
                                                   <h2 itemprop="headline" >{{ $item->blog_title }}</h2>
                                                   <span itemprop="dateModified" class="updated">
                                                   <time datetime="2021-11-19">
                                                   {{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</time>
                                                   </span>
                                                </div>
                                             </div>
                                             <div class="blog-header-info-blog">
                                                <span class="entry-meta blog-header-info">
                                                <time class="if-item if-date" datetime="2021-11-19T10:59:23+00:00">
                                                {{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}													</time>
                                                </span>
                                             </div>
                                             <div class="entry-content" itemprop="text" >
                                                {{ substr($item->blog_description, 0, 150)}}
                                             </div>
                                             <div class="button-read-more">
                                                <a href="<?php echo url('/blog/'.$item->blog_url); ?>" class="btnblog-readmore">
                                                Read More
											   </a>
                                             </div>
                                          </div>
                                       </div>
                                    </article>
                                 </div>
                                 <?php } ?>
                                 <div class="blog-pagination">
                                    <nav aria-label="Page navigation">
                                       <ul class="pagination">
                                          {{ $blogs->links() }}
                                       </ul>
                                    </nav>
                                 </div>
                                 <!-- /.blog-pagination -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-da7244f" data-id="da7244f" data-element_type="column">
                     <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-8c33e24 elementor-widget elementor-widget-sidebar" data-id="8c33e24" data-element_type="widget" data-widget_type="sidebar.default">
                           <div class="elementor-widget-container">
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
                                       </div>
                                    </li>
                                    <?php  } ?>
                                 </ul>
                              </aside>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
</main>
@include('layouts.footerrang')