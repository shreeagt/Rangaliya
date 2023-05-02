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
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- CSRF Token -->

	<title>Ecommerce : Admin</title>

	<link href="/favicon.ico" type="image/x-icon" rel="icon"/>
	<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon"/>

	

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin/bootstrap-datepicker.css') }}" rel="stylesheet">
	<!--<script src="//code.jquery.com/jquery-1.12.3.js"></script>-->

	<!-- Scripts -->
	<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script> 
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
  
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

</head>
<body>
	<!-- Navigation -->
 <?php $url ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; $url1= explode('/', $url);  ?>
    @if($url1[3]!='login')
	@include('main.layouts.admin_navigation')
    @endif


<div id="page-wrapper" class="gray-bg">

    @if($url1[3]!='login')
	@include('main.layouts.admin_header')  @endif
	@yield('content')


</div> <!-- Wrapper -->

</body>
</html>

<script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/admin/admin.js')}}"></script>
<script type="text/javascript" src="{{asset('js/admin/treeview.js')}}"></script>
<script type="text/javascript" src="{{asset('js/admin/script.js')}}"></script>
<script type="text/javascript" src="{{asset('js/admin/bootstrap-datepicker.min.js')}}"></script>
 
<script type="text/javascript">
	$(function() {
		$("#tree").treeview({
			collapsed: true,
			animated: "medium",
			control:"#sidetreecontrol",
			persist: "location"
		});
	})
</script>
<script>
	$('#sandbox-container input').datepicker({
		autoclose: true,
		format: "dd-mm-yyyy",
		todayHighlight: true
	});
</script>
 