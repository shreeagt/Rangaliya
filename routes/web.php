<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Website\LandingPageController@index')->name('landing-page');
Route::get('/about', function () {
    return view('Website.about');
});

// Route::get('/product', function () {
//     return view('website.product');
// });

Route::get('/product', function() {
    return view('product');
});


Route::get('/our-product', 'Website\ShopController@index')->name('shop.index');
Route::get('/product-view/{name}', 'Website\ShopController@serviceDetails')->name('product-view');
Route::get('/categoryview/{category_name}', 'Website\ShopController@productListByCategory')->name('category-view');
// Route::get('/product-view', 'Website\ShopController@serviceDetails');

Route::get('/blogs','Website\BlogsController@index')->name('blog.index');
Route::get('/blogs/{id}', 'Website\BlogsController@show')->name('blog.show');
Route::get('/blog/{blogUrl}', 'Website\BlogsController@blogDetails');


Route::get('/teams','Website\TeamController@index')->name('team');
Route::get('/teams/{teamUrl}', 'Website\TeamController@teamDetails');

Route::get('/contact', 'Website\ContactController@index')->name('contact');
Route::post('/contactstore', 'Admin\ContactController@storecontact')->name('storecontact');
Route::post('/contact/store','Website\ContactController@sendMail')->name('contactme');

Route::get('/news/{newsUrl}', 'Website\NewsController@newsDetails');
Route::get('/news', 'Website\NewsController@index')->name('news');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/login', function () {
//     return view('login'); 
// })->name('login');

Route::middleware('auth')->group(function () {
        Route::get('/cart', 'Website\CartController@index')->name('cart.index');
        Route::post('/cart/{product}', 'Website\CartController@store')->name('cart.store');
        Route::patch('/cart/{id}', 'Website\CartController@update')->name('cart.update');
        Route::delete('/cart/{id}', 'Website\CartController@destroy')->name('cart.destroy');
        Route::post('/cart/switchToSaveForLater/{product}', 'Website\CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

        Route::delete('/saveForLater/{product}', 'Website\SaveForLaterController@destroy')->name('saveForLater.destroy');
        Route::post('/saveForLater/switchToCart/{product}', 'Website\SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

        Route::post('/coupon', 'Website\CouponsController@store')->name('coupon.store');
        Route::delete('/coupon', 'Website\CouponsController@destroy')->name('coupon.destroy');

        Route::get('/checkout', 'Website\CheckoutController@index')->name('checkout.index')->middleware('auth');
        Route::post('/checkout', 'Website\CheckoutController@store')->name('checkout.store');
        Route::post('/paypal-checkout', 'Website\CheckoutController@paypalCheckout')->name('checkout.paypal');

        Route::get('/guestCheckout', 'Website\CheckoutController@index')->name('guestCheckout.index');
        Route::get('/thankyou', 'Website\ConfirmationController@index')->name('confirmation.index');

        Route::get('/my-profile', 'Website\UsersController@edit')->name('users.edit');
        Route::patch('/my-profile', 'Website\UsersController@update')->name('users.update');

        Route::get('/my-orders', 'Website\OrdersController@index')->name('order.index');
        Route::get('/my-orders/view/{order}', 'Website\OrdersController@show')->name('orders.show');

   
});

Route::get('/admin/login','Admin\AdminController@login')->name('admin.login');
Route::post('/admin/signup','Admin\AdminController@signUp')->name('admin.signup');

Route::group(['prefix' => '/admin','middleware'=>'admin-auth'], function () {

    Route::get('/logout','Admin\AdminController@logout')->name('admin.logout');
    Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');

    Route::get('/blogs','Admin\BlogController@index')->name('admin-blogs.index');
    Route::get('/blogs/create','Admin\BlogController@show')->name('admin-blogs.create');
    Route::post('/blogs/store','Admin\BlogController@store')->name('blog.store');
    Route::get('/blogs/delete/{id}','Admin\BlogController@delete')->name('admin-blogs.delete');
    Route::get('/blogs/edit/{id}','Admin\BlogController@edit')->name('admin-blogs.edit');

    Route::get('/blogs/category/edit/{id}','Admin\BlogController@categoryEdit')->name('admin-blog-categories.edit');
    Route::get('/blogs/category','Admin\BlogController@showCategory')->name('admin-blog-categories.index');
    Route::get('/blogs/category/create','Admin\BlogController@createCategory')->name('admin-blog-categories.create');
    Route::post('/blogs/category/create','Admin\BlogController@storeCategory')->name('admin-blog-categories.store');
    Route::get('/blogs/category/delete/{id}','Admin\BlogController@deleteCategory')->name('admin-blogs-category.delete');


    //NewsArtical section 
    Route::get('/news', 'Admin\NewsArticalController@index')->name('admin-news.index');
    Route::get('/news/create','Admin\NewsArticalController@show')->name('admin-news.create');
    Route::post('/news/store','Admin\NewsArticalController@store')->name('news.store');
    Route::get('/news/delete/{id}','Admin\NewsArticalController@delete')->name('admin-news.delete');
    Route::get('/news/edit/{id}','Admin\NewsArticalController@edit')->name('admin-news.edit');
    Route::get('/news/category','Admin\NewsArticalController@showCategory')->name('admin-news-category.index');
    Route::get('/news/category/create','Admin\NewsArticalController@createCategory')->name('admin-news-category.create');
    Route::post('/news/category/create','Admin\NewsArticalController@storeCategory')->name('admin-news-category.store');

    Route::get('/news/category/delete/{id}','Admin\NewsArticalController@deleteCategory')->name('news-category.delete');
    Route::get('/news/category/edit/{id}','Admin\NewsArticalController@categoryEdit')->name('news-category.edit');
    
    // Products Route Admin
    Route::get('/products','Admin\ProductController@viewProducts')->name('admin-products.index');
    Route::get('/create-product','Admin\ProductController@createProduct')->name('admin.create-product');
    Route::post('/store-product','Admin\ProductController@storeProduct')->name('admin.store-product');
    Route::get('/product/edit/{id}','Admin\ProductController@editProduct')->name('admin.edit-product');
    Route::get('/product/delete/{id}','Admin\ProductController@deleteProduct')->name('admin.destroy-product');

    //Add More Product
    Route::get('/add-more-product','Admin\ProductController@addProduct')->name('admin.add-product');
    Route::post('/store-more-image','Admin\ProductController@storeImage')->name('admin.storemoreimage');
    // Category
    Route::get('/category','Admin\CategoryController@showCategories')->name('categories.index');
    Route::get('/category/create','Admin\CategoryController@showCategoryPage')->name('category.show');
    Route::post('/category/create','Admin\CategoryController@createCategory')->name('categories.store');
 
    Route::get('/category/edit/{id}','Admin\CategoryController@editCategoryPage')->name('categories.edit');
    Route::get('/category/delete/{id}','Admin\CategoryController@deleteCategory')->name('categories.delete');

     // Team  
     Route::get('/team', 'Admin\TeamController@index')->name('admin-team.index');
     Route::get('/team/create', 'Admin\TeamController@show')->name('admin-team.create');
     Route::post('/team/store', 'Admin\TeamController@store')->name('team.store');
     Route::get('/team/delete/{id}', 'Admin\TeamController@delete')->name('admin-team.delete');
     Route::get('/team/edit/{id}', 'Admin\TeamController@edit')->name('admin-team.edit');
     Route::post('/team/update', 'Admin\TeamController@update')->name('admin-team.update');

//images
    Route::get('/Imagetabs','Admin\ImagesController@Imagetabs')->name('admin-image.index');;
    Route::get('/Imagestabs/create','Admin\ImagesController@addNewImagesTab')->name('Imagestabs.create');
    Route::post('/Imagestabs/create','Admin\ImagesController@storeImage')->name('image.store');
    Route::post('/Imagestabs/edit/{id}','Admin\ImagesController@editstoreImage')->name('image.edit');
    Route::get('/Imagestabs/edit/{id}','Admin\ImagesController@editImage')->name('image.edit');
    Route::get('/Imagestabs/delete/{id}','Admin\ImagesController@deleteImage')->name('image.delete');

     // Tabs
    Route::get('/tabs','Admin\TabsController@viewTabs')->name('tabs.index');
    Route::get('/tabs/create','Admin\TabsController@addNewTab')->name('tabs.create');
    Route::post('/tabs/create','Admin\TabsController@storeTab')->name('tabs.store');

    Route::get('/tabs/edit/{id}','Admin\TabsController@editTab')->name('tabs.edit');
    Route::post('/tabs/edit/{id}','Admin\TabsController@editStoreTab')->name('tabs.edit-store');
    Route::get('/tabs/delete/{id}','Admin\TabsController@deleteTab')->name('tabs.delete');

    Route::get('/coupons','Admin\CouponsController@showCoupons')->name('coupons.show');
    Route::get('/coupons/edit/{id}','Admin\CouponsController@editCouponPage')->name('coupons.edit');
    Route::get('/coupons/create','Admin\CouponsController@createCouponPage')->name('coupons.create');
    Route::post('/coupons/create','Admin\CouponsController@storeCoupon')->name('coupons.store');
    Route::get('/coupons/delete/{id}','Admin\CouponsController@deleteCoupon')->name('coupons.delete');

    // Orders
    Route::get('/orders','Admin\OrdersController@showOrders')->name('orders.index');
    Route::get('/orders/{id}','Admin\OrdersController@showOrderDetails')->name('orders.read');


    Route::get('/change-status','Admin\OrdersController@updateStatus')->name('changeStatus');
     // purches
     Route::get('/purches','Admin\PurchesController@showPurches')->name('purches.index');
     Route::get('/purchesEntry','Admin\PurchesController@purchesEntry')->name('purches.entry');
     Route::post('/store-purchase','Admin\PurchesController@storePurchase')->name('admin.store-purchase');

     Route::get('/contact','Admin\ContactController@index')->name('contact-index');
});

Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');


