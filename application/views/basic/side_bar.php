<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?php echo base_url();?>assets/images/treatwell_sidebar.jpg">

<div class="logo">
	<a class="simple-text logo-mini"  style="font-size:15px;margin: 0px;"> WL </a>
	<a class="simple-text logo-normal"  style="font-size:13px;padding: 5px;"> Welcome to CARE TREAT WELL</a>
</div>

<div class="sidebar-wrapper">		
	<div class="user">
		<div class="photo"><img src="<?php echo base_url();?>assets/images/person-flat.png"></div>
		<div class="info">
		<a data-toggle="collapse" data-target="#collapseExample" class="collapsed">{{twt_user_name}} <b class="caret"></b>							
		</a>		
		<div class="clearfix"></div>
		<div class="collapse" id="collapseExample">
			<ul class="nav">					
				<li>
					<a ng-class="{active1:isActive('')}" href="" ui-sref="profile">
						<span class="sidebar-mini"> UN </span>
						<span class="sidebar-normal"> UNIT NAME </span>
					</a>
				</li>					
			</ul>
		</div>
		</div>
	 </div>

	 <ul class="nav nav-mobile-menu style-3" style="height:100%;overflow:auto">		
		<li>
			<a><i class="material-icons">dashboard</i><p> Dashboard </p></a>
		</li>
		<li>
			<a ng-class="{active1:isActive('/home')}" ui-sref="home" href=""><i class="material-icons">home</i><p>Home </p></a>
		</li>
		<li>
			<a ng-class="{active1:isActive('/home/tasklist')}" ui-sref="tasklist" href=""><i class="material-icons">list_alt</i><p> Task List </p></a>
		</li>
		
		<li>
			<a><i class="material-icons">error</i><p> Complaints </p></a>
		</li>
					
		<li>
		  <a data-parent="#accordion"  data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse2">
				<i class="material-icons">settings</i><p>Setup  <b class="caret"></b></p>
		  </a>
			<div class="collapse" id="collapse5" aria-expanded="false">
				<ul class="nav style-3">
					<li>
						<a ng-class="{active1:isActive('/home/location')}" ui-sref='location'href=""><i class="material-icons" style="font-size: 24px;">location_on</i> Locations</a>
					</li>
					<li>
						<a ng-class="{active1:isActive('/home/createtask')}" ui-sref='createtask'href=""><i class="material-icons" style="font-size: 24px;">assignment_turned_in</i> Create Task</a>
					</li>
					<li>
						<a ng-class="{active1:isActive('/home/users')}" ui-sref='users' href="" ><img src="<?php echo base_url();?>assets/images/header_img/user_icon_1.png"class="drop-img"> Users</a>
					</li>
					<li>
						<a ng-class="{active1:isActive('/home/changepswd')}" ui-sref='changepswd' href=""><img src="<?php echo base_url();?>assets/images/header_img/login_icon_white.png" class="drop-img"> Change Password</a>
					</li>
				</ul>
			</div>
		</li>

		<li>
			<a data-parent="#accordion"  data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse2">
			  <i class="material-icons">description</i><p>Reports  <b class="caret"></b></p>
			</a>
			<div class="collapse" id="collapse6" aria-expanded="false">
				<ul class="nav style-3">
					<li><a ui-sref='reg_report'><img src="<?php echo base_url();?>assets/images/header_img/reports_icon_white.png" class="drop-img"> Report1</a></li>
				</ul>
			</div>
		</li>

		<li>
			<a ng-class="{active1:isActive('')}" ng-click="logout()" href=""><i class="material-icons">exit_to_app</i><p>Logout</p></a>
		</li>
  	</ul>
 	</div>
  <div class="sidebar-background" style="background-image: url(<?php echo base_url();?>assets/images/treatwell_sidebar.jpg)"></div>
 </div>

<style>
.active1 {
	background:#cf37e8;
}
</style>