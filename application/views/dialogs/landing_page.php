<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 06/12/2018
 * Time: 11:59
 */
?>

<md-dialog style="width:50%; min-height: 200px;;">
    <form ng-cloak class="card" >
        <md-toolbar style="background:none;">
            <div class="card-header card-header-icon" data-background-color="orange" style="margin-top:0px;line-height: 32px;font-size: 16px;
        padding: 5px 10px;">Please Select Module </div>
        </md-toolbar>

        <md-dialog-content>
            <div class="md-dialog-content " >

                <div class="card col s4 m4 l4 ">
                    <div class="card-content row">
                        <label>Special Cadre Nurse</label>
                        <md-button class="btn btn-round btn-primary right" ng-click="login_redir(1,'Login');" >Click Here..</md-button>
                    </div>
                </div>

                <div class="card col s4 m4 l4 ">
                    <div class="card-content row">
                        <label>Nurse Practitioner Programme</label>
                        <md-button class="btn btn-round btn-primary right" ng-click="login_redir(2,'Login');" >Click Here..</md-button>
                    </div>
                </div>

                <div class="card col s4 m4 l4 ">
                    <div class="card-content row">
                        <label>Nurse Recruitment Programme</label>
                        <md-button class="btn btn-round btn-primary right" ng-click="login_redir(3,'Signup');" >Signup</md-button>
                        <md-button class="btn btn-round btn-primary right" ng-click="login_redir(3,'Login');" >Signin</md-button>
                    </div>
                </div>

            </div>
        </md-dialog-content>
    </form>






</md-dialog>

