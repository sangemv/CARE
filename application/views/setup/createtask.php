<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div layout='row' layout-padding layout-align='center center'>
  <div flex>
    <md-content>
        <div class="wizard-header">
		<h5 class="wizard-title" style="color:#19a6c0;padding:5px;line-height:0.1em">
		  <i class="material-icons" style="transform: rotate(90deg);font-size: 16px;">navigation</i>Setup / Manage Task 
		  
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
			<h5 style="color: #4bb04f;">{{add_edit}} Task</h5>
				  <span class="bmd-form-group">
					<div class="input-group" style="margin-bottom: 20px;">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">assignment_ind</i></span>
						</div>
						<input class="form-control" placeholder="Task ID" type="text" ng-model="tasks.task_id" required readonly>
					</div>
				</span>

                <span class="bmd-form-group">
					<div class="input-group" style="margin-bottom: 20px;">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">assignment_turned_in</i></span>
						</div>
						<input class="form-control" placeholder="Task Name" type="text" ng-model="tasks.task_name" required>
					</div>
				</span>

                <span class="bmd-form-group">
					<div class="input-group" style="margin-bottom: 20px;">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">assignment_turned_in</i></span>
						</div>
						<input class="form-control" placeholder="Location Name" type="text" ng-model="tasks.taskloc_id" required>
					</div>
				</span>
				
                <md-switch ng-model="tasks.sts" ng-change="onChange(tasks.sts)" class="col s12 m12 l12" ng-true-value="'A'" ng-false-value="'I'">
                    Status : {{((tasks.sts=='A')?'Active':'InActive')}}
                </md-switch>

				<a class="btn btn-success btn-round" ng-Click="add_tasks(tasks)">Submit</a>
				<a class="btn btn-danger btn-round" ng-Click="reset()">Cancel</a>
			</div>		
			</div>
		</div>	
		</div>
	  

      <div class="col s12 m12 l8">
        <ul class="timeline timeline-simple">
			<li class="timeline-inverted" ng-repeat="tasks in tasks_list" ng-if="tasks_list.length > 0">
				<div class="timeline-badge {{((($index + 1) % 2 == 0)?'success':'info')}}">
					<img src="<?php echo base_url();?>assets/images/header_img/screeing_location_white.png" style="margin: 7px 0px 4px;">
				</div>
				<div class="timeline-panel">					
					<span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{tasks.SNO}}</span>
					<span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{tasks.TASKNAME}}</span>
					<span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{((tasks.STATUS == 'A')?'Active':'InActive')}}</span>
					<a><i class="material-icons red-text" style="float: right;margin-top: 4px;">delete</i></a>
					<a><i class="material-icons" style="float: right;margin-top: 4px;" ng-Click="edit_task(tasks);">mode_edit</i></a>
				</div>
			</li>

		  </ul>
      </div>
	
  </div>
</div>

