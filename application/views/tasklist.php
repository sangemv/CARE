<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div layout='row' layout-padding layout-align='center center'>
  <div flex>
	<div class="wizard-header">
		<h3 class="wizard-title" style="font-weight:300 !important;color:#19a6c0;text-align: center;margin: 0px;">Task List
		
		 <a hide-lg hide-gt-sm><button data-parent="#accordion" class="btn btn-info collapsed1 btn-round btn-fab-mini" style="float:right;"
			type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
			   Search
		  </button>
		  </a>	
		</h3>			
	</div>
    <div class="clearfix"></div>

   <div id="collapse1" class="div-collapse1 collapse" aria-expanded="false" style="height: 1px;">
	<div class="card col s12 m12 l12" layout-gt-xs="row">		
		<div class="card-header card-header-icon" data-background-color="rose" style="padding: 10px 16px;margin-bottom: 0px;">
			Search
		</div><div class="clearfix"></div>

		<div class="card-content">            
		   <div class="col s6 m3 l3">
				
				<md-input-container>
					<label>From Date</label>
					<md-datepicker ng-model="ctrl.myDate"></md-datepicker>
				</md-input-container>
			 </div> 
			 
			 <div class="col s6 m3 l3">
				<md-input-container>
					<label>To Date</label>
					<md-datepicker ng-model="ctrl.myDate"></md-datepicker>
				</md-input-container>
			 </div> 
			
			<div class="col s12 m3 l3">
			 <md-input-container class="md-block" flex-gt-xs>
				<label>Search by Location here ....</label>
				<input ng-model="user.location">
			 </md-input-container>
			 </div> 
			 
			 <div class="col s10 m2 l2">
			 <md-input-container class="md-block" flex-gt-xs>
				<label>Search by Token here ....</label>
				<input ng-model="user.token">
			 </md-input-container>
			 </div>   

			<div class="col s2 m1 l1">
				<button class="btn btn-primary btn-round waves-effect"><span class="mat-button-wrapper"><i class="material-icons">search</i></span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
			</div>				 
		</div>
	</div>
	</div>
	
  <div class="col s12 m12 l12">
	<ul class="timeline timeline-simple">          
		<li class="timeline-inverted">
			<div class="timeline-badge danger">
				<img src="<?php echo base_url();?>assets/images/header_img/user_icon_1.png" style="margin: 6px 0px 6px 0px">
			</div>
			<div class="timeline-panel text-center">			
			<div class="timeline-body">
				<p class="padding5 left-align" style="font-size: 13px;font-weight: 400;color: #9C27B0;"><span>LOCATION :</span> 202</p>	
				
				<p class="padding5 left-align" style="font-size: 13px;font-weight: 400;color: #9C27B0;"><span>ISSUE :</span> 6b required DIETICIAN /NUTRITION since sister are trying to reach but no one respoding please visit someone</p>
				
				<p class="padding5 left-align"><button class="btn btn-link btn-twitter mat-raised-button waves-effect" style="  padding: 5px 3px;"><span class="mat-button-wrapper">Update</span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				
				<button class="btn btn-link btn-reddit mat-raised-button waves-effect" style="  padding: 5px 3px"><span class="mat-button-wrapper">Reassign</span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				
				<button class="btn btn-link btn-behance mat-raised-button waves-effect" style="  padding: 5px 3px;"><span class="mat-button-wrapper">Change Deadline</span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				
				<button class="btn btn-link btn-redbtn btn-link btn-dribbble mat-raised-button waves-effect" style="padding: 5px 3px;"><span class="mat-button-wrapper">Mark fixed</span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				
				<button class="btn btn-link btn-facebook mat-raised-button waves-effect" style="  padding: 5px 3px;"><span class="mat-button-wrapper">Mark as complaint</span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button> </p>
				
				<ol class="track-progress">
				  <li class="done">
					<em>1hr</em>
					
				  </li>
				  <li class="done">
					<em>2hrs</em>
					
				  </li>
				  <li class="todo">
					<em>3hrs</em>
					
				  </li>
				  <li class="todo">
					<em>4hrs</em>					
				  </li>
				  <li class="todo">
					<em>5hrs</em>					
				  </li>
				</ol>
			</div>					
			</div>
		</li>	
		<li class="timeline-inverted">
			<div class="timeline-badge danger">
				<img src="<?php echo base_url();?>assets/images/header_img/user_icon_1.png" style="margin: 6px 0px 6px 0px">
			</div>
			<div class="timeline-panel text-center">			
			<div class="timeline-body">
				<p class="padding5 left-align" style="font-size: 13px;font-weight: 400;color: #9C27B0;"><span>LOCATION :</span> 202</p>	
				
				<p class="padding5 left-align" style="font-size: 13px;font-weight: 400;color: #9C27B0;"><span>ISSUE :</span> 6b required DIETICIAN /NUTRITION since sister are trying to reach but no one respoding please visit someone</p>
				
				<p class="padding5 left-align"><button class="btn btn-link btn-twitter mat-raised-button waves-effect" style="  padding: 5px 3px;"><span class="mat-button-wrapper">Update</span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				
				<button class="btn btn-link btn-reddit mat-raised-button waves-effect" style="  padding: 5px 3px"><span class="mat-button-wrapper">Reassign</span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				
				<button class="btn btn-link btn-behance mat-raised-button waves-effect" style="  padding: 5px 3px;"><span class="mat-button-wrapper">Change Deadline</span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				
				<button class="btn btn-link btn-redbtn btn-link btn-dribbble mat-raised-button waves-effect" style="padding: 5px 3px;"><span class="mat-button-wrapper">Mark fixed</span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				
				<button class="btn btn-link btn-facebook mat-raised-button waves-effect" style="  padding: 5px 3px;"><span class="mat-button-wrapper">Mark as complaint</span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button> </p>					
			</div>					
			</div>
		</li>	   
	  </ul>
  </div>	
  </div>
  </div>
</div>
</div>

<style>
.track-progress {
  margin: 0;
  padding: 0px 10px 0 10px;
  background: white;
  height: 80px;
  border-radius: 10px;
}
.track-progress li {
  list-style-type: none;
  display: inline-block;
  position: relative;
  font: 13px/13px Helvetica, sans-serif;
  //text-transform: uppercase;
  text-align: center;
  color: #bbb;
  border-bottom: 4px #bbb solid;
  line-height: 3em;
  width: 20%;
  float: left;
}
.track-progress li:after {
  //content: "\00a0\00a0";  
  
}
.track-progress li:before {
  position: relative;
  bottom: -2em;
  float: left;
  left: 50%;
  line-height: 1em;  
}
@media (max-width: 800px) {
  .track-progress li {
    font-size: 0.8em;
  }
}
.track-progress li span {
  padding-left: 0.75em;
}
@media (max-width: 640px) {
  .track-progress li span {
    display: none;
  }
  .track-progress li.done {
	  border-bottom:none !important;
  }
  .track-progress li{
	  border-bottom:none !important;
  }
}
.track-progress li.done {
  color: #03a5b9;
  font-weight: bold;
  border-bottom: 4px #00BCD4 solid;
  animation: changeBackground .5s linear;
  animation-fill-mode: forwards;
}

.track-progress li.done:before {
	background: #00BCD4;
	height: 2em;
	width: 2em;
	line-height: 1.8em;
	border: none;
	border-radius: 2em;
	content: '\2714';
	color: #fff;
    border: 2px solid #fff;	
}
.track-progress li.done:before {
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 188, 212, 0.59);
}
.track-progress li.todo:before {
  content: "";
  background: white;
  border: 0.25em solid #bbb;
  height: 1.2em;
  width: 1.2em;
  border-radius: 1.2em;
  bottom: -2.5em !important;
}
.track-progress em {
  //display: none;
  font-weight: 500;
  //padding-left: 0.75em;
}
@media (max-width: 640px) {
  .track-progress em {
    display: inline;
  }
}
</style>