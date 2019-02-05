<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div layout="column" flex>
	<nav class="navbar navbar-transparent navbar-absolute md-whiteframe-2dp">
		<div class="container-fluid">

			<div class="navbar-header" hide-xs>
				<img src="<?php echo base_url();?>assets/images/ticketing_tittle.png" class="responsive-img center-block" style="width:250px;margin-top:-10px">
				<!--<img src="<?php echo base_url();?>assets/images/fav.png" style="padding-right:14px"><span style="font-size:1.5em;text-shadow:1px 5px 5px #060a0f;font-weight:400">Ticketing System</span>
				<div style="margin: -10px 46px;font-size: 9px;color: #cccbcb;">To provide care that people trust</div>-->
			</div>

			<div class="navbar-header" hide-lg hide-md hide-sm hide-xl>
				<img src="<?php echo base_url();?>assets/images/ticketing_tittle.png" class="responsive-img center-block" style="width:250px;margin-top:-10px">
			</div>

			<span flex></span>

			<ul class="nav navbar-nav navbar-right">
				<li hide-xs style="margin-top: 15px;">
					<span style="font-size: 13px;text-transform: uppercase;">Welcome : {{twt_user_name}}</span>
				</li>
				<li>
					<a ui-sref="home" class="dropdown-toggle" >
						<i class="material-icons">home</i>
					</a>
				</li>
				<li hide-xs>
					<a href="" class="dropdown-toggle" data-toggle="dropdown">
						<i class="material-icons">notifications</i>
						<span class="notification">0</span>
					</a>
				</li>
				<li>
					<a href="" ng-click="logout()" class="dropdown-toggle" data-toggle="dropdown">
						<i class="material-icons">exit_to_app</i>
					</a>
				</li>
				<li>
					<a style="padding: 5px 0px;">
					<button type="button" class="navbar-toggle" data-toggle="collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					</a>
				</li>
			 </ul>

		</div>
	</nav>
</div>
