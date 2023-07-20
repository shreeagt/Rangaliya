@include('layouts.headerrang')
<style>
    .u-column1,.u-column2{
    width: 48%;
    padding: 20px;
    vertical-align: top;
    display: inline-block;
}

@media only screen and (max-width:768px){
   .u-column1,.u-column2{
    width: 100%;
}

div#customer_login {
   display: flex;
    flex-direction: column-reverse;
}

}
</style>
<link rel='stylesheet' id='wc-blocks-vendors-style-css' href="{{asset('css/rangrilya/cart.css') }}" type='text/css' media='all' />
<div id="theme-page-header">
   <div class="page-header on-background">
      <div class="container">
         <div id="theme-bread">
            <h1 class="page-title entry-title">
               Login	
            </h1>
            <nav class="woocommerce-breadcrumb"><a href="/">Home</a> <span>·</span> Login</nav>
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
                  <h2>Login</h2>
                  <form class="woocommerce-form woocommerce-form-login login" action="{{ route('login') }}"  method="post">
                  {{ csrf_field() }}
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="username">Username or email address<span class="required">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Email" required autofocus>
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Password&nbsp;<span class="required">*</span></label>
                        <input type="password" id="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" value="{{ old('password') }}" placeholder="Password" required>
                     </p>
                     <p class="form-row">
                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                        <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Remember me</span>
                        </label>
                        <button type="submit" class="auth-button woocommerce-button button woocommerce-form-login__submit">Login</button>
                     </p>
                     <p class="woocommerce-LostPassword lost_password">
                        <a href="{{ route('password.request') }}">
                           Forgot Your Password?
                        </a>
                        <a href="/register" style="float:right">
                          Create Account
                        </a>
                     </p>
                  </form>
               </div>
               <div class="u-column2 col-2">
               <img decoding="async" width="530" height="502" src="{{asset('img/rangrilya/loginart.png') }}" sizes="(max-width: 530px) 100vw, 530px" />	                 
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
@include('layouts.footerrang')