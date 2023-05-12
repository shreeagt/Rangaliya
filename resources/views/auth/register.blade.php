@include('layouts.headerrang')
<style>
    .u-column1,.u-column2{
    width: 48%;
    padding: 20px;
    vertical-align: top;
    display: inline-block;
}
</style>
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/cart.css') }}" type='text/css' media='all' />
<div id="theme-page-header">
   <div class="page-header on-background">
      <div class="container">
         <div id="theme-bread">
            <h1 class="page-title entry-title">
            Create Account	
            </h1>
            <nav class="woocommerce-breadcrumb"><a href="/">Home</a> <span>·</span> Create Account</nav>
         </div>
      </div>
   </div>
</div>
<main id="main" class="page-content woocommerce-cart woocommerce-page mb-10">
   <div class="container">
      <div id="page-12" class="post-12 page type-page status-publish hentry">
         <header class="entry-header">
         </header>
         <div class="woocommerce">
            <div class="woocommerce-notices-wrapper"></div>
            <div class="u-columns col2-set" id="customer_login">
               <div class="u-column1 col-1">
                        @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                        @endif @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                  <h2>Create Account</h2>
                  <form class="woocommerce-form woocommerce-form-login login" action="{{ route('register') }}"  method="post">
                  {{ csrf_field() }}
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="username">Name<span class="required">*</span></label>
                        <input id="name" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="username">Email<span class="required">*</span></label>
                        <input id="email" type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" value="{{ old('email') }}" placeholder="Email" required>
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Password<span class="required">*</span></label>
                        <input id="password" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" placeholder="Password" placeholder="Password" required>
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Confirm Password&nbsp;<span class="required">*</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </p>
                     <p class="form-row">
                        <button type="submit" class="auth-button woocommerce-button button woocommerce-form-login__submit">Create Account</button>
                     </p>
                     <p class="woocommerce-LostPassword lost_password">
                     <p><strong>Already have an account?</strong></p>
                        <a href="{{ route('login') }}">
                        Login
                        </a>
                     </p>
                  </form>
               </div>
               <div class="u-column2 col-2">
               <img decoding="async" width="530" height="502" src="{{asset('img/rangrilya/registerart.png') }}" sizes="(max-width: 530px) 100vw, 530px" />	                 
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
@include('layouts.footerrang')