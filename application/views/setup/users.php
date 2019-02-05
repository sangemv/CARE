<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div layout='row' layout-padding layout-align='center center'>
  <div flex>
    <md-content>
        <div class="wizard-header">
		<h5 class="wizard-title" style="color:#19a6c0;padding:5px;line-height:0.1em">
		  <i class="material-icons" style="transform: rotate(90deg);font-size: 16px;">navigation</i>Setup / Manage Users 
		  
		    <a hide-lg hide-gt-sm><button data-parent="#accordion" class="btn btn-info collapsed1 btn-round btn-fab-mini" style="float:right;    margin-top: -5px;"
            type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
              ADD
          </button></a>
		  </h5>        
        </div>
    </md-content>
	
   <div id="collapse1" class="div-collapse1 collapse" aria-expanded="false" style="height: 1px;text-align:center">
	  <div class="col s12 m12 l4">           	
		<div class="col s12 m6 l12 pull-m3 push-m3 card card-pricing card-raised">
			<div class="content">
			<h5 style="color: #4bb04f;">{{add_edit}} User</h5>
				  <span class="bmd-form-group">
						<div class="input-group" style="margin-bottom: 20px;">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="material-icons">face</i></span>
							</div>
							<input class="form-control" placeholder="User ID" type="text" ng-model="adduser.userid" required>
						</div>
						<p style="text-align:center">(Give your Employee ID if available)</p>
					</span>
					
					<span class="bmd-form-group">
						<div class="input-group" style="margin-bottom: 20px;">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="material-icons">account_circle</i></span>
							</div>
							<input class="form-control" placeholder="Name" type="text" ng-model="adduser.name" required>
						</div>					
					</span>

					<span class="bmd-form-group">
						<div class="input-group" style="margin-bottom: 20px;">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="material-icons">phone</i></span>
							</div>
							<input class="form-control" placeholder="Mobile" type="text" ng-model="adduser.mob" required>
						</div>
					</span>

					<span class="bmd-form-group">
						<div class="input-group" style="margin-bottom: 20px;">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="material-icons">email</i></span>
							</div>
							<input class="form-control" placeholder="Email" type="text" ng-model="adduser.email" required>
						</div>
					</span>

					<md-switch ng-model="adduser.sts" ng-change="onChange(adduser.sts)" class="col s12 m12 l12" ng-true-value="'A'" ng-false-value="'I'">
						Status : {{((adduser.sts=='A')?'Active':'InActive')}}
					</md-switch>

					<md-switch class="col s12 m12 l12" ng-model="adduser.adm_sts" ng-true-value="'Y'" ng-false-value="'N'">
						Is Admin: {{((adduser.adm_sts=='Y')?'Yes':'No')}}
					</md-switch>

					
					<a class="btn btn-success btn-round" ng-Click="add_user(adduser)">Submit</a>
					<a class="btn btn-danger btn-round" ng-Click="reset('user')">Cancel</a>
			</div>		
			</div>
		</div>	
		</div>
	  

      <div class="col s12 m12 l8">
        <ul class="timeline timeline-simple">
            <li class="timeline-inverted" ng-repeat="users in user_list" ng-show="user_list.length > 0">
                <div class="timeline-badge {{((($index + 1) % 2 == 0)?'success':'info')}}">
                    <i class="material-icons">account_circle</i>
                </div>
                <div class="timeline-panel">
                    <span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{users.EMP_ID}}</span>
                    <span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{users.EMP_NAME}}</span>
                    <span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{(users.STATUS == 'A')?'Active':'Inactive'}}</span>
                    <span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{(users.ISADMIN == 'Y')?'Admin':'User'}}</span>
                    <a class="hide-xs hide-sm hide-md"><i class="material-icons" style="float: right;margin-top: 4px;" ng-click="edit_user(users);">mode_edit</i></a>

                    <a data-parent="#accordion" class="collapsed hide-lg"
                       data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1" ng-click="edit_user(users);"><i class="material-icons" style="float: right;margin-top: 4px;cursor: pointer;">mode_edit</i>
                    </a>
                </div>
            </li>
		  </ul>
      </div>
	
  </div>
</div>

