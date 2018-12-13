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
        padding: 5px 10px;">Click Relevant Button </div>
        </md-toolbar>


        <md-dialog-content>
            <div class="md-dialog-content row" style="padding:10px;margin-top: 60px;">
                <section layout="row" layout-sm="column" layout-align="center center" layout-wrap>
                    <a class="btn btn-primary btn-round btn-lg" ng-click="login_redir('Login');">Nurse Exam Programme<br>(Signin)</a>
                    <a class="btn btn-success btn-round btn-lg" ng-click="login_redir('Login');">Nurse Prectitioner Programme<br>(Signin)</a>
                   <a class="btn btn-info btn-round btn-lg" ng-click="login_redir('Signup');" style="margin-top:10px;">Nurse Recruiuitment Programme<br>(Signup)</a>
                </section>
            </div>
        </md-dialog-content>
    </form>
</md-dialog>

