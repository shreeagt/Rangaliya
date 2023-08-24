@include('layouts.headerrang')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css" integrity="sha512-HsTt69nTtZcFtB8QnTtwlC0CB+klLbyNlV7QaA1zuSl/W1dxZzeb65/jrgPw00wzLjS7fUgR5U/G1Hx5F3q4FA==" crossorigin="anonymous" />
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/post-15.css') }}" type='text/css' media='all' />
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/style2.css') }}" type='text/css' media='all' />
<style>
   body{
   background-color: #ffffff!important;
   }
   .products .product:hover .product-quick-view-btn span, .products .product:hover .product-action-wishlist a, .products .product:hover .product-action-compare a {
   color: #000;
   }

   form.product_type_externals {
    background: #2d3448;
}

button.product_type_external {
    border: 0;
}
button.product_type_external:hover {
   background: #2d3448;
}

button.product_type_external:hover {
    background-color: #2d3448!important;
}

 .mintie-style-style3 {
    text-align: center;
}
 .mintie-style-style3:hover {
    transition: all 0.3s;
    transform: translateY(-10px);
    box-shadow: 0 22px 43px rgba(0, 0, 0, 0.15);
}

.category-card:hover {
   box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
}
.category-img:hover {
   outline: none;
   -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

.category-card h3 {
  font-size: 24px;
  margin: 0;
}
</style>



<main id="main" class="page-content">
   <div id="page-15" class="post-15 page type-page status-publish hentry">
      <header class="entry-header">
      </header>
      <div data-elementor-type="wp-page" data-elementor-id="15" class="elementor elementor-15" data-elementor-settings="[]">
         <div class="elementor-section-wrap">
            <section>
               <div class="category-header">
                  <div class="category-header-wrapper">
                     <div class="category-title">
                        <div class="title-wrapper">
                           <h3 class="title text-center">Category Name</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
    
            <section class="elementor-section elementor-top-section elementor-element elementor-element-1cccd51 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1cccd51" data-element_type="section">
               <div class="elementor-container elementor-column-gap-default">
                  <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-bad5e7c" data-id="bad5e7c" data-element_type="column">
                     <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-8225fc1 elementor-widget elementor-widget-products" data-id="8225fc1" data-element_type="widget" data-widget_type="products.default">
                           <div class="elementor-widget-container">
                              <div class="mintie-widget-products gap-default no-rate">
                              <ul class="products columns-4">
                              @forelse ($categoryProduct as $cproduct)
                                    <li class="product type-product post-9669 status-publish first instock product_cat-organization product_tag-accessories product_tag-decor has-post-thumbnail shipping-taxable product-type-external">
                                       <div class="mintie-style-style3">
                                          <div class="product-image-wrapper">
                                             <a href="{{ route('product-view', $cproduct->product_title)}}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
												<img decoding="async" width="300" height="300" src="{{ $cproduct->images }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail product-loop-image" alt="image" loading="lazy" data-src="{{ $cproduct->images }}" />	
												<img decoding="async" class="hover-product-image" src="{{ $cproduct->images }}" alt="image-product-hover">
                                             </a>
                                             <div class="mintie-add-btn mintie-add-btn-replace">
												@auth
													@if ($cproduct->quantity > 0)
														<form action="{{ route('cart.store', $cproduct) }}" class="product_type_externals" method="POST">
														{{ csrf_field() }}
														{{-- <a href="?add-to-cart=9849" data-quantity="1" class="product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="9849" data-product_sku="" title="Add &ldquo;Curly Willow Orb&rdquo; to your cart" rel="nofollow">Add to cart</a>	 --}}
                                          <button type="submit" data-quantity="1" class="product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="9849" data-product_sku="" title="Add &ldquo;Curly Willow Orb&rdquo; to your cart" rel="nofollow">Add to cart</button>	
                                          <!-- <button type="submit" class="button button-plain">Add to Cart</button> -->

														</form>
													@endif
                                       @else
                                       <a href="{{ route('login') }}">Add To Cart</a>
                                    @endauth	

                                             </div>

					

                                          </div>
                                          <div class="content-info-product">
                                             <a href="<?php
                                             echo url('/product-view/'. $cproduct->product_title); ?> ">
                                                <h2 class="woocommerce-loop-product__title">
												{{ $cproduct->product_title }}		
                                                </h2>
                                             </a>
                                             <div class="mintie-transform-loop-price">
                                                <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₹</span>{{ $cproduct->price }}</bdi></span></span>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
									@empty
                                    <li class="product type-product post-9669 status-publish first instock product_cat-organization product_tag-accessories product_tag-decor has-post-thumbnail shipping-taxable product-type-external">
                                       <div class="mintie-style-style3">
									   No items found
									   </div>
									</li>
									@endforelse
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

            <section>
               <div class="category-other">
                  <div class="category-other-wrapper">
                     <div class="category-title">
                        <div class="title-wrapper">
                           <h3 class="title text-center">Other Category</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </section>

            <section class="product-category">
               <div class="container">
                  <div class="category-section">
                     <div class="category-section-wrapper">
                        <div class="row">
                           <div class="mb-4">
                              <div class="col-lg-4 col-md-6 col-sm-12">
                                 <div class="category">
                                    <div class="category-card">
                                    <div class="category-card-wrapper">
                                       <div class="category-img text-center hover-effect_2">
                                          <a href="#" class="mintie-category-box-link"></a>
                                          <img decoding="async" src="/img/new1/IMG_7125.jpg" alt="image">
                                       </div>
                                       <div class="category-name">
                                          <h3 class="mintie-category-box-title text-center">
                                          <a href="#">Example
                                          </a>
                                          </h3>
                                          <p class="mintie-category-description effect-ef_none  text-center"></p>
                                       </div>
                                    </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12">
                                 <div class="category">
                                    <div class="category-card">
                                    <div class="category-card-wrapper">
                                       <div class="category-img text-center hover-effect_2">
                                          <a href="#" class="mintie-category-box-link"></a>
                                          <img decoding="async" src="/img/new1/IMG_7125.jpg" alt="image">
                                       </div>
                                       <div class="category-name">
                                          <h3 class="mintie-category-box-title text-center">
                                          <a href="#">Example
                                          </a>
                                          </h3>
                                          <p class="mintie-category-description effect-ef_none  text-center"></p>
                                       </div>
                                    </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12">
                                 <div class="category">
                                    <div class="category-card">
                                    <div class="category-card-wrapper">
                                       <div class="category-img text-center hover-effect_2">
                                          <a href="#" class="mintie-category-box-link"></a>
                                          <img decoding="async" src="/img/new1/IMG_7210.jpg" alt="image">
                                       </div>
                                       <div class="category-name">
                                          <h3 class="mintie-category-box-title text-center">
                                          <a href="#">Example
                                          </a>
                                          </h3>
                                          <p class="mintie-category-description effect-ef_none  text-center"></p>
                                       </div>
                                    </div>
                                    </div>
                                 </div>
                              </div>
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






    {{--

    <section class="blog-index">


        <div class="container clearfix">
  
            <div class="row">
      
                <div class="col-md-8 m-bottom-40">
          
                    <div class="row multi-columns-row">
                         @forelse ($categoryProduct as $cproduct)
               
                    <!-- === Blog item 1 === -->
                        <div class="col-sm-6 m-bottom-40">
                            <div class="blog wow zoomIn" data-wow-duration="1s" data-wow-delay="0.7s">
                                <div class="blog-media">
                                <a href="{{ route('product-view', $cproduct->product_title)}}"><img src="{{ $cproduct->images }}" alt="product" class="img-responsive wow fadeInLeft animated"  style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInLeft;"></a>

                                </div><!--post media-->
                                
                                
                                <div class="blog-post-body">
                                    <h4> <a href="{{ route('product-view', $cproduct->product_title)}}"><div class="product-name">{{ $cproduct->product_title }}</div></a></h4>
                                    <p class="p-bottom-20">{{ $cproduct->uasage }}</p>
                                    <a href="blog_single_post.html" class="read-more">Read More >></a>
                                </div>                 
                            </div>
                        </div>
                         @empty
                    <div style="text-align: left">No items found</div>
                    @endforelse

                   

                    <div class="blog-pagination">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="disabled">
                                <span>
                                    <span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
                                </span>
                                </li>
                                <li class="active">
                                <span>1 <span class="sr-only">(current)</span></span>
                                </li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> 
                </div>
            </div>            
                
                
                <div class="col-md-4 sidebar">
            
                <!-- Widget 1 -->
                <div class="widget widget-search">
                        <form action="#" class="search-form">
                            <input type="text" onfocus="if(this.value == 'Search') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search'; }"  value="Search">
                            <input type="submit" class="submit-search" value="Ok">
                        </form>
                </div> 
                
                
                <!-- Widget 2 -->
                <div class="widget">
                    <h4>Categories</h4>
                    <ul class="cat-list">
                    @foreach ($categories as $category)
                        <li class="{{$category->slug }}"><a href="">{{ $category->category_name }}</a></li>
                        @endforeach
                    </ul> 
                </div> <!--End widget-->
                    
                <!-- Widget 3 -->
                <div class="widget">
                    <h4>Popular tags</h4>
                    <ul class="tag-list">
                     @foreach ($products as $product)
                        <li><a href=""><div class="product-keywords">{{ $product->seo_keywords }}</div></a></li>
                        @endforeach
                    </ul>
                </div> 
            
            </div> 
    
        </div>
      

    </section>

    --}}

    @include('layouts.footerrang')