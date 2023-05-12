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
			<h2 class="elementor-heading-title elementor-size-default">Latest News</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-9544cca elementor-widget elementor-widget-breadcrumb" data-id="9544cca" data-element_type="widget" data-widget_type="breadcrumb.default">
				<div class="elementor-widget-container">
			<nav class="woocommerce-breadcrumb"><a href="https://mintie.boostifythemes.com">Home</a> <span>&middot;</span> Blog Layout v1</nav>		</div>
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
									<div class="blog-category">
										<span class="if-item if-cat">
											<a href="#" rel="tag">Collections</a>										</span>
									</div>
								
								<div class="blog-article-sum">
									<div class="blog-article-header">
										<header class="entry-header">
											<h3 class="entry-title blog-title"><a href="<?php echo url('/blog/'.$item->blog_url); ?>" rel="bookmark">{{ $item->blog_title }}</a></h3>										</header>
									</div>

									<div class="entry-summary">		
                                        <div class="screen-reader-text">
			        <h2 itemprop="headline" >{{ $item->blog_title }}</h2>

					<!-- <span itemscope="itemscope" itemprop="image" itemtype="#" >
						<img decoding="async" src="https://mintie.boostifythemes.com/wp-content/uploads/2021/11/blog-2-150x150.jpg" alt="image">
						<meta itemprop="url" content="https://mintie.boostifythemes.com/wp-content/uploads/2021/11/blog-2-150x150.jpg"/>
						<meta itemprop="width" content="770"/>
						<meta itemprop="height" content="450"/>
					</span> -->
			
						<!-- <span class="author" itemprop="publisher" itemscope="itemscope" itemtype="http://schema.org/Organization" >
				<span itemprop="logo" itemscope="itemscope" itemtype="https://schema.org/ImageObject">
					<meta itemprop="url" content="https://mintie.boostifythemes.com/"/>
					<meta itemprop="width" content="100"/>
					<meta itemprop="height" content="100"/>
				</span>
				<meta itemprop="name" content="mintie"/>
			</span> -->

						<span itemprop="dateModified" class="updated">
				<time datetime="2021-11-19">
                {{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</time>
			</span>

						<!-- <span itemprop="datePublished" content="2021-11-19T10:59:23+00:00">
				2021-11-19T10:59:23+00:00			</span> -->

						<span itemprop="articleSection">
				<a href="https://mintie.boostifythemes.com/category/collections/" rel="tag">Collections</a>			</span>
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
												Read More											</a>
										</div>
																	</div>
							</div>
						</article>
					</div>
                    <?php } ?>


			
					<!-- <nav class="mintie-pagination blog-pagination pagination"><span aria-current="page" class="page-numbers current">1</span>
<a class="page-numbers" href="https://mintie.boostifythemes.com/blog-layout-v1//page/2">2</a>
<a class="page-numbers" href="https://mintie.boostifythemes.com/blog-layout-v1//page/3">3</a>
<a class="next page-numbers" href="https://mintie.boostifythemes.com/blog-layout-v1//page/2"></a></nav>		 -->


<div class="blog-pagination">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        {{ $blogs->links() }}
                    </ul>
                </nav>
            </div> <!-- /.blog-pagination -->

</div>
					</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-da7244f" data-id="da7244f" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-8c33e24 elementor-widget elementor-widget-sidebar" data-id="8c33e24" data-element_type="widget" data-widget_type="sidebar.default">
<div class="elementor-widget-container">
	<aside id="block-14" class="widget widget_block">
<h5 class="wp-block-heading">Search</h5>
</aside>
<aside id="block-8" class="widget widget_block widget_search"><form role="search" method="get" action="https://mintie.boostifythemes.com/" class="wp-block-search__button-outside wp-block-search__icon-button wp-block-search"><label for="wp-block-search__input-1" class="wp-block-search__label screen-reader-text">Search</label><div class="wp-block-search__inside-wrapper " ><input type="search" id="wp-block-search__input-1" class="wp-block-search__input" name="s" value="" placeholder="Enter keyword..."  required /><button type="submit" class="wp-block-search__button has-icon wp-element-button"  aria-label="Search"><svg class="search-icon" viewBox="0 0 24 24" width="24" height="24">
					<path d="M13.5 6C10.5 6 8 8.5 8 11.5c0 1.1.3 2.1.9 3l-3.4 3 1 1.1 3.4-2.9c1 .9 2.2 1.4 3.6 1.4 3 0 5.5-2.5 5.5-5.5C19 8.5 16.5 6 13.5 6zm0 9.5c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path>
				</svg></button></div></form></aside><aside id="block-15" class="widget widget_block">
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
								<img width="150" height="150" src="https://mintie.boostifythemes.com/wp-content/uploads/2021/11/blog-1-150x150.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="image" decoding="async" loading="lazy" srcset="https://mintie.boostifythemes.com/wp-content/uploads/2021/11/blog-1-150x150.jpg 150w, https://mintie.boostifythemes.com/wp-content/uploads/2021/11/blog-1-300x300.jpg 300w, https://mintie.boostifythemes.com/wp-content/uploads/2021/11/blog-1-100x100.jpg 100w, https://mintie.boostifythemes.com/wp-content/uploads/2021/11/blog-1-96x96.jpg 96w" sizes="(max-width: 150px) 100vw, 150px" />							</a>
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

		</aside>		</div>
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