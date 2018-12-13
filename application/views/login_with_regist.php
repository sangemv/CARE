<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 06/12/2018
 * Time: 14:23
 */
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login_style.css">

<div layout = 'row' layout-align='center center' class="content">
    <div flex-xs = "90" flex-sm = '40' flex-md='35' flex-lg='60' flex-xl='40' hide-xs hide-sm hide-md>
        <img src="<?php echo base_url(); ?>assets/images/nurse_bg.jpg" class="img-responsive" style="height:570px">
    </div>

    <div flex-xs = "90" flex-sm = '60' flex-gt-sm = '30' flex-md='30' flex-xl='20' flex-lg='25' layout-align='center center' class="card card-bg content1">
        <div flex='90' flex-offset='5' layout-padding>
            <img src='<?php echo base_url(); ?>assets/images/da_care_logo.png' class="text-center center-block"  hide-xs hide-md hide-sm style="margin-bottom: 25px;">
            <div  class="md-whiteframe-24dp" style="background:#fff;border-radius: 15px;">
                <div class="card-header text-center"  data-background-color="blue" style="padding:18px;margin:-30px 25px 5px" hide-xs hide-md hide-sm>
                    <h4 style="text-transform: uppercase">{{submit_label}}</h4>
                </div>

                <div class="card-header text-center"  data-background-color="blue" hide-lg hide-xl style="margin-top: -50px;">
                    <img src='<?php echo base_url(); ?>assets/images/da_care_logo.png' class="text-center center-block">
                </div>
                <p hide-lg class="category text-center" style="padding:20px 0px 0px;font-size: 16px;color: #795548;">{{submit_label}}</p>
                <form method="POST" name="loginForm" class="mylayout-padding" autocomplete="off" ng-show="submit_label == 'Signup'" >

                    <div class="card-content" style="padding: 5px 20px;">

                        <md-input-container md-no-float class="input-group">
                            <span class="input-group-addon"><i class="material-icons">face</i></span>
                            <input placeholder = "Name"  required name="uname" ng-model="auth.uname" style="height:30px" >
                            <div ng-messages="loginForm.uname.$error">
                                <div ng-message="required">Required.</div>
                            </div>
                        </md-input-container>

                        <md-input-container md-no-float class="input-group">
                            <span class="input-group-addon"><i class="material-icons">group</i></span>
                            <label></label>
                            <md-select ng-model="auth.gender" name="gender" required placeholder="-- Select Gender --" style="height:30px">
                                <md-option value="M" >Male</md-option>
                                <md-option value="F" >Female</md-option>
                            </md-select>
                            <div ng-messages="loginForm.gender.$error">
                                <div ng-message="required">Required.</div>
                            </div>
                        </md-input-container>

                        <md-input-container md-no-float class="input-group">
                            <span class="input-group-addon"><i class="material-icons">high_quality</i></span>
                            <input placeholder = "Qualification"  required name="qualify" ng-model="auth.qualify" style="height:30px" >
                            <div ng-messages="loginForm.qualify.$error">
                                <div ng-message="required">Required.</div>
                            </div>
                        </md-input-container>

                        <md-input-container md-no-float class="input-group">
                            <span class="input-group-addon"><i class="material-icons">equalizer</i></span>
                            <input placeholder = "Experience"  required name="exp" ng-model="auth.exp" style="height:30px" >
                            <div ng-messages="loginForm.exp.$error">
                                <div ng-message="required">Required.</div>
                            </div>
                        </md-input-container>

                        <md-input-container md-no-float class="input-group">
                            <span class="input-group-addon"><i class="material-icons">email</i></span>
                            <input type="email" placeholder = "Email Id"  required name="email" ng-model="auth.email"
                                   ng-blur="loginForm.email.$valid == true ? loginForm.email.$valid = validate_user() : true"  style="height:30px" >
                            <div ng-messages="loginForm.email.$error">
                                <div ng-message="required" ng-if="auth.email == ''">Required.</div>
                                <div ng-message="required" ng-if="auth.email != ''" >Invalid EmailId.</div>
                            </div>
                        </md-input-container>

                        <p style="font-size:12px;text-align:center;line-height: 20px;margin:5px 0px -5px" ng-if="submit_label== 'Signup'">Registered <span style="color:#009688;margin:0px"><b> EMAIL ID</b></span> will be your <span style="color:#009688;margin:0px"><b>USER ID</b></span> </p>

                    </div>

                    <div class="footer text-center">
                        <button type="submit" data-background-color="blue" class="btn btn-round" style="padding:13px 25px;margin:10px" ng-click="logincheck()" ng-disabled="loginForm.$invalid"  >{{submit_label}}</button>

                       <!-- <span style="color:blue;" ng-click="changeaction()"><u>{{newaction}}</u></span>-->
                    </div>

                </form>

                <form method="POST" name="loginForm" class="mylayout-padding" autocomplete="off" ng-if="submit_label== 'Login'">

                    <div class="card-content" style="padding: 5px 20px;">
                        <md-input-container md-no-float class="input-group">
                            <span class="input-group-addon"><i class="material-icons">face</i></span>
                            <input placeholder = "USER ID"  required name="user_id" ng-model="auth.user_id" style="height:30px" >
                            <div ng-messages="loginForm.user_id.$error">
                                <div ng-message="required">Required.</div>
                            </div>
                        </md-input-container>

                        <!--
                    <md-input-container md-no-float class="input-group" >
                        <span class="input-group-addon"> <i class="material-icons">lock_outline</i></span>
                        <input type="password"  placeholder="Password" name="pswd" ng-model="auth.pswd" required style="height:30px">
                        <div ng-messages="loginForm.pswd.$error">
                            <div ng-message="required">Required.</div>
                        </div>
                    </md-input-container>
                        -->

                        <md-input-container md-no-float class="input-group">
                            <span class="input-group-addon"><i class="material-icons">location_on</i></span>
                            <label></label>
                            <md-select ng-model="auth.qgroup" name="qgroup" required placeholder="-- Select Department --" style="height:30px">
                                <md-option ng-repeat="gp in qgroup_list" value="{{gp.GROUP_ID}}" >{{gp.GROUP_NAME}}</md-option>
                            </md-select>
                            <div ng-messages="loginForm.qgroup.$error">
                                <div ng-message="required">Required.</div>
                            </div>
                        </md-input-container>

                        <p style="font-size:12px;text-align:center;line-height: 20px;margin:5px 0px -5px" >Please <span style="color:#009688;margin:0px"><b>LOGIN</b></span> with your registered <span style="color:#009688;margin:0px"><b> EMAIL ID</b></span> </p>

                    </div>
                    <div class="footer text-center">
                        <button type="submit" data-background-color="blue" class="btn btn-round" style="padding:13px 25px;margin:10px" ng-click="logincheck()" ng-disabled="loginForm.$invalid"  >{{submit_label}}</button>

                        <span style="color:blue;" ng-click="changeaction()"><u>{{newaction}}</u></span>
                    </div>

                </form>

            </div>
        </div>
        <p class="text-center" style="color:white;margin-top:20px"> © Powered by CARE IT </p>
    </div>
</div>

