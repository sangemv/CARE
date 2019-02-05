<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<app-login-cmp>
<div class="page-header login-page" style="height:auto !important">
<div class="container">
<div layout='row' layout-padding layout-align='center center' class="md-inline-form">
	<div flex-lg='80' flex-xs='100' flex-sm='90' flex-md='90' layout-align='center center'>

  	<div class="card wizard-card active" data-color="orange" id="wizardProfile" style="    box-shadow: 0 16px 24px 2px rgba(0,0,0,.14), 0 6px 30px 5px rgba(0,0,0,.12), 0 8px 10px -5px rgba(0,0,0,.2);margin-bottom:50px" >
      	<div class="wizard-header">
      		<h3 class="wizard-title" style="font-weight:300 !important;color:#19a6c0">  New Task/Request</h3>
			<h5 style="font-weight:300 !important">If any New Task / Request are create here...</h5>
      	</div>
      	<div class="wizard-navigation">
      		<ul class="nav nav-pills" style="margin-top:10px">
				<li class="active" style="width: 33.3333%;">
					<a data-toggle="tab" aria-expanded="true">-</a>
				</li>
      		</ul>
      		<div class="moving-tab" style="width: 250.328px;transform: translate3d(-8px, 0px, 0px);"> New Task </div>
    	</div>

		<div class="col s12 m10 l8 pull-l2 push-l2 pull-m1 push-m1" style="margin-top:20px">
		  <div class="col s12 m12 l12">


           <!--   <span class="bmd-form-group">
				<div class="input-group" style="margin-bottom: 20px;">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="material-icons">location_on</i></span>
					</div>
					  <input type="text" ng-change="open_field();" ng-model="auth.location" list="names" class="form-control" placeholder="BED / ROOM / LOCATION" required>

					  <datalist id="names" ng-model="auth.location">
						  <option value=''></option>
						  <option  ng-repeat="option in locations | filter:search | limitTo:10" ng-value="{{option.LOC_ID}}">{{option.LOC_NAME}}</option>
					 </datalist>
                </div>
			</span>-->

       <!--    <md-autocomplete md-selected-item="selectedItem" md-search-text="searchText" md-items="item in manage_location(searchText)" md-item-text="item.locations">
                  <md-item-template>
                      <span md-highlight-text="searchText">{{item.locations}}</span>
                  </md-item-template>
                  <md-not-found>
                      No matches found.
                  </md-not-found>
              </md-autocomplete>-->

              <!--<md-autocomplete
                      required
                      md-search-text="searchTxt"
                      md-items="item in manage_location(searchTxt)"
                      md-item-text="item.LOC_ID"
                      md-min-length="0"
                      md-delay="100"
                      placeholder="Search...">
                  <md-item-template>
                      <span md-highlight-text="searchTxt" md-highlight-flags="^i">{{item.LOC_ID}}</span>
                  </md-item-template>
                  <md-not-found>
                      No results
                  </md-not-found>
              </md-autocomplete>-->


              <span class="bmd-form-group col s12 m12 l12 padding autocompletedemoBasicUsage">
				<div class="input-group" style="margin-bottom: 20px;" >
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="material-icons">location_on</i></span>
					</div>
					<md-autocomplete
                            ng-disabled="isDisabled"
                            md-no-cache="noCache"
                            md-selected-item="auth.location"
                            md-search-text-change="searchTextChange(searchText)"
                            md-search-text="searchText"
                            md-selected-item-change="selectedItemChange(item)"
                            md-items="item in querySearch(searchText)"
                            md-item-text="item.LOC_NAME"
                            md-min-length="0"
                            placeholder="What is Location?"
                           >
        <md-item-template>
          <span md-highlight-text="searchText" md-highlight-flags="^i">{{item.LOC_NAME}}</span>
        </md-item-template>
        <md-not-found>
          No states matching "{{searchText}}" were found.
          <a ng-click="newState(searchText)">Create a new one!</a>
        </md-not-found>
      </md-autocomplete>
                </div>
			</span>




        <div class="col s12 m12 l12 padding" ng-show="true">
			<span class="bmd-form-group col s12 m6 l6 padding">
				<div class="input-group" style="margin-bottom: 20px;">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="material-icons">assignment_turned_in</i></span>
					</div>
				    <input type="text" ng-change="get_task_dept();" ng-model="auth.task" list="task" class="form-control" placeholder="Enter Task here ...." required>
					  <datalist id="task" ng-model="auth.task">
						  <option value=''></option>
						  <option  ng-repeat="option in tasks | filter:search | limitTo:3" value="{{option.TASKNAME}}"></option>
					 </datalist>
                </div>
			</span>

			<span class="bmd-form-group col s12 m6 l6 padding">
				<div class="input-group" style="margin-bottom: 20px;">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="material-icons">comment</i></span>
					</div>
					<input class="form-control" placeholder="Enter Comment (Optional) here ...." type="text" ng-model="auth.comments" required>
				</div>
			</span>
			
			<span class="bmd-form-group col s12 m6 l6 padding">
				<div class="input-group" style="margin-bottom: 20px;">
					<md-input-container class="md-block" flex-gt-xs>
						<md-checkbox name="tos" ng-model="auth.assignto" required>
							Auto Assign Team
						</md-checkbox>				
					 </md-input-container>
				</div>
			</span>


            <span class="col s12 m6 l6 padding">
				<div class="input-group" style="margin-bottom: 35px;">
					<md-input-container class="col s12 m12 l12" flex-gt-xs style="padding:0px !important" md-no-float>
					  <label>--- Department ---</label>
                        <md-select ng-model="auth.assgndept" >
							<md-option ng-repeat="dept in depertments" ng-value="dept.SNO" >
                            {{dept.DEPTNAME}}
                        </md-option>
					  </md-select>
					</md-input-container>
				</div>
			</span>


        <div class="clearfix"></div>


	
			<span class="bmd-form-group">
				<div class="input-group" style="margin-bottom: 25px;">				
					<div class="input-group-prepend col s12 m3 l3 padding">
						<span class="input-group-text">Requested For :</span>
					</div>
					
				<div class="md-block col s12 m9 l9 padding">
				<md-radio-group ng-model="auth.reportby">
				
				<md-radio-button value="1" class="col s4 m4 l4 padding">
					<button class="btn btn-link btn-dribbble mat-raised-button waves-effect" style="padding: 0px;"><span class="mat-button-wrapper"><i class="material-icons">airline_seat_recline_normal</i> Patient </span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				</md-radio-button>
				
				<md-radio-button value="2" class="col s5 m5 l5 padding"> 
					<button class="btn btn-link btn-dribbble mat-raised-button waves-effect" style="padding: 0px;"><span class="mat-button-wrapper"><i class="material-icons">person</i> Attendant </span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				</md-radio-button>
				
				<md-radio-button value="3" class="col s2 m2 l2 padding"> 
					<button class="btn btn-link btn-dribbble mat-raised-button waves-effect" style="padding: 0px;"><span class="mat-button-wrapper"><i class="material-icons">supervised_user_circle</i> Staff </span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				</md-radio-button>
				</md-radio-group>
				</div>
				</div>
			</span>
			
		
			<span class="bmd-form-group">
				<div class="input-group" style="margin-bottom: 20px;">
					<div class="input-group-prepend col s12 m3 l3 padding">
						<span class="input-group-text">Reported By :</span>
					</div>
					
				<div class="md-block col s12 m9 l9 padding">
				<md-radio-group ng-model="data.group2">
				<md-radio-button value="1" class="md-primary col s9 m9 l9 padding">
					<button class="btn btn-link btn-dribbble mat-raised-button waves-effect" style="padding: 0px;"><span class="mat-button-wrapper"><i class="material-icons">person</i> Patient / Attendant </span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>	
				</md-radio-button>
				
				<md-radio-button value="2" class="md-primary col s2 m2 l2 padding">
					<button class="btn btn-link btn-dribbble mat-raised-button waves-effect" style="  padding: 0px;"><span class="mat-button-wrapper"><i class="material-icons">supervised_user_circle</i> Staff </span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
				</md-radio-button>	
				</md-radio-group>				
				</div>
				</div>
			</span>
		
		  	<span class="bmd-form-group">
				<div class="input-group" style="margin-bottom: 20px;">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="material-icons">face</i></span>
					</div>
					<input class="form-control" placeholder="Enter Name here ...." type="text" ng-model="auth.rpttime" required>
				</div>
			</span>		  		
		
		 
		  <div class="col s12 m12 l12 center-align">			  
			<button class="btn btn-link btn-twitter mat-raised-button waves-effect" mat-raised-button=""><span class="mat-button-wrapper"><i class="material-icons">done</i> NOW </span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
			
			<button class="btn btn-link btn-dribbble mat-raised-button waves-effect"><span class="mat-button-wrapper"><i class="material-icons">watch_later</i> LATER </span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>			 
		  </div>
		</div>		
 	
	   <div class="col s12 m12 l12 center-align" style="padding: 0px 0px 10px;">			 
		 <button class="btn btn-primary btn-round mat-raised-button waves-effect waves-light" style="padding:14px"><span class="mat-button-wrapper" ng-click="addnewtask(auth);">Create New Task</span><div class="mat-button-ripple mat-ripple" matripple=""></div><div class="mat-button-focus-overlay"></div></button>
	   </div>
	   </div>



</div>
</div>
</div>
</div>
</div>
</div>
</app-login-cmp>