<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<app-login-cmp>
<div class="wrapper wrapper-full-page">
<div class="page-header login-page header-filter" filter-color="black" style="background-image: url('assets/images/treatwell_mainscreen.jpg'); background-size: cover; background-position: top center;">

<div class="container">
	<img src="<?php echo base_url();?>assets/images/ticketing_tittle.png" class="responsive-img center-block" style="margin-bottom:25px">
	<div class="clerfix"></div>
	
<div class="row" style="display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px">
	<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">		
		<div class="card card-profile" style="background:#ffffffad;box-shadow: 3px 5px 6px 4px rgba(0, 0, 0, 0.14)">
		<div class="card-avatar" style="background: #9C27B0;padding: 20px;">
			<a href=""><img class="img" src="<?php echo base_url();?>assets/images/da_care_logo.png"></a>
		</div>
		
		<div class="card-body" style="padding: 0.9375rem 30px;">
			<h6 class="card-category text-gray" style="margin: 0px 0px 30px 0px;color:#9c27b0">Please Login with Your Credentials</h6>
				<span class="bmd-form-group">
					<div class="input-group" style="margin-bottom: 20px;">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">face</i></span>
						</div>
						<input class="form-control" placeholder="User ID..." type="text" ng-model="auth.user_id" required>
					</div>
				</span>
				
				<span class="bmd-form-group">
					<div class="input-group" style="margin-bottom: 20px;">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">lock_outline</i></span>
						</div>
						<input class="form-control" placeholder="Password..." type="password" ng-model="auth.pswd" required>
					</div>
				</span>
									 
			 <div class="footer text-center">
				 <button type="submit" class="btn btn-primary btn-round" style="padding:13px 25px;margin:10px" ng-click="logincheck()">Login</button>
			 </div>
			<p class="text-center" style="color:#795548;margin-top:10px"> © Powered by CARE HID/IT</p>
		</div>
		</div>
		
	</div>
</div>
</div>

</div>
</div>
</app-login-cmp>
