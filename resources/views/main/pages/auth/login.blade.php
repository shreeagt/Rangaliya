<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en"><!--<![endif]-->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Ecommerce : Admin</title>

	<link href="/favicon.ico" type="image/x-icon" rel="icon"/>
	<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin/bootstrap-datepicker.css') }}" rel="stylesheet">

<style>
body { background-image:url(/img/intro.png); background-size:cover; background-repeat:no-repeat; background-attachment:fixed; min-height:100%; width:100%; }
body.lockscreen { background-color:#eeeeee; background-image:none; }
#login { padding-top:160px; }
.login-header {}
.login-header h2 { color:#fff; margin:0px; }
.login-header h4 { color:#fff; }
.login_box { margin-top:10px; padding:30px 30px; }
.submit .btn { padding:8px 15px; }
</style>
</head>
<body> 
 
	<div class="container-fluid">
        <div class="row justify-content-md-center">
            <div id="login" class="col-xs-12 col-sm-6 col-lg-4"> 
				<div class="login-form-header">
					<div class="row">
						<div class="col-sm-2 col-xs-2">
							<img src="{{asset('img/padlock.png')}}" alt="login-icon" class="img-fluid" />
						</div>
						<div class="col-sm-10 col-xs-10">							
							<div class="login-header">
								<h2 class="bold color-white">Login Now!</h2>
								<h4><small>Please enter your credentials to login.</small></h4>
							</div>
						</div>
					</div>
				</div>   				   
				<div class="login_box card">
					<div class="content-body">
						@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<form id="msg_validate"  class="no-mb no-mt" method="post" action="{{ route('admin.signup') }}">
							{{ csrf_field() }}
							<div class="form-group">
								<input type="hidden" name="Platform_id" value="2">
								<label class="form-label">Email</label>
								<input id="email" type="text" class="form-control " name="email" placeholder="Email..." value="" required>
							</div>
							<div class="form-group">
								<label class="form-label">Password</label>
								<input id="password" type="password" class="form-control " name="password" placeholder="******" required >
							</div>
							<div class="submit">
								<input class="btn btn-primary w-100 d-block" title="Click here to Login!" id="login_submit" type="submit" value="Login"/>
							</div>
						</form>
					</div>
				</div>
            </div>
        </div>
    </div>
</body> 
</html> 
