@extends('main.layouts.app')
@section('content')

	<div class="wrapper wrapper-content">
		<div class="row text-center">
			<div class="col-lg-3">
				<div class="ibox ">
					<div class="ibox-title">
						<h5>Total Registrations</h5>
					</div>
					<div class="ibox-content registration-count">
						<h3 class="">
						<span>140<br /> <small>App</small></span> <span class="sum">+</span> <span>0 <br /><small> Website</small></span> 
							<span class="sum">=</span> <span>140<br /><small>Total</small></span>
						</h3>
					</div>
				</div>
            </div>
			<div class="col-lg-3">
				<div class="ibox ">
					<div class="ibox-title">
						<h5>Total Cases</h5>
					</div>
					<div class="ibox-content">
                    <h1 class="no-margins">4560 </h1>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ibox ">
					<div class="ibox-title">
						<h5>Total Doctors</h5>
					</div>
					<div class="ibox-content">
                    <h1 class="no-margins"> 13 </h1>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ibox ">
					<div class="ibox-title">
						<h5> Disease Listing </h5>
					</div>
					<div class="ibox-content">
                    <h1 class="no-margins"> 56 </h1>
					</div>
				</div>
			</div>
		</div> <!-- Row -->
		
		<div class="row">
			<div class="col-lg-4">
				<div class="ibox ">
					<div class="ibox-title">
						<h5>Messages</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>
							<a class="close-link">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="ibox-content ibox-heading">
						<h3><i class="fa fa-envelope-o"></i> New Cases</h3>
						<small><i class="fa fa-tim"></i> You have 22 new Cases.</small>
					</div>
					<div class="ibox-content">
						<div class="feed-activity-list">
							<div class="feed-element">
								<div>
									<small class="float-right text-navy">1m ago</small>
									<strong>Monica Smith</strong>
									<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</div>
									<small class="text-muted">Today 5:60 pm - 12.06.2014</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="ibox ">
					<div class="ibox-title">
						<h5> Recent Payments Queue </h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>
							<a class="close-link">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="ibox-content">
						<div class="table-responsive">
							<table class="table table-striped">
								<tr>
									<th width="70px"> SR No. </th>
									<th> Patient </th>
									<th> Purchase Type </th>
									<th> Date</th>
									<th> Status </th>
									<th> Bills </th>
								</tr>
								<tr>
									<td> 1 </td>
									<td> Nikita Pawar <br /> <small class="text-muted">,  Years </small> </td> 
									<td>Package</td>
									<td>13 Oct 21 08:29 PM</td>
									<td><span class="badge badge-danger">pending</span></td>
									<td><i class="fa fa-inr" aria-hidden="true"></i> 999.00</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('main.layouts.admin_footer')
	</div> <!-- page-wrapper -->

	
@endsection
