<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<app-login-cmp>
<div class="page-header login-page" style="height:auto !important">
<div class="container">
<div class="row" style="display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px">
	<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">		
		<div class="card card-profile" style="box-shadow: 0 16px 24px 2px rgba(0,0,0,.14), 0 6px 30px 5px rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);">
		<div class="card-avatar" style="background: #fff;max-width: 100px;max-height: 100px;">
			<a href=""><img class="img" src="<?php echo base_url();?>assets/images/person-flat.png"></a>
		</div>
		
		<div class="card-body">
			<h5 class="card-category text-gray" style="margin: 0px 0px 30px 0px;color:#00bcd4">Please Change your password</h5>
				<span class="bmd-form-group">
					<div class="input-group" style="margin-bottom: 20px;">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">lock_open</i></span>
						</div>
						<input class="form-control" placeholder="Enter Old Password" type="text" ng-model="auth.oldpswd" required>
					</div>
				</span>
								
				<span class="bmd-form-group">
					<div class="input-group" style="margin-bottom: 20px;">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">lock_open</i></span>
						</div>
						<input class="form-control" placeholder="Enter New Password" type="text" ng-model="auth.newpswd" required>
					</div>
				</span>
				 					
				<span class="bmd-form-group">
					<div class="input-group" style="margin-bottom: 20px;">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">lock_open</i></span>
						</div>
						<input class="form-control" placeholder="Confirm Password" type="text" ng-model="auth.cfrmpswd" required>
					</div>
				</span>				
									 
			 <div class="footer text-center">
				 <button type="submit" class="btn btn-primary btn-round" style="padding:13px 25px;margin:10px" ng-click="logincheck()">Login</button>
			 </div>
		</div>
		</div>
		
	</div>
</div>
</div>
</div>
</app-login-cmp>