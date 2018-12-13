<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 08/12/2018
 * Time: 10:21
 */
?>

<md-dialog aria-label="Upload Questions">

        <md-toolbar>
            <div class="md-toolbar-tools">
                <h2>Upload Questions</h2>
                <span flex></span>
                <div class="card-header card-header-icon" style="float: right">
                    <input type="file" placeholder="Uplaod Excel File" id="fileUpload" ng-model="questionpaper">Uplaod Excel File
                    <md-button class="btn btn-danger" ng-click="Upload_exl_quests(questionpaper)">
                        Upload
                    </md-button>
                </div>
                <md-button class="md-icon-button" ng-click="cancel()">
                    <i class="material-icons">cancel</i>
                </md-button>
            </div>
        </md-toolbar>

    <div class="col x12 s12 m12 l8 style-3" style="height:350px;overflow:auto;margin-top:10px">
        <ul class="timeline timeline-simple" style="">
            <li class="timeline-inverted" ng-repeat="qst in uplexcelQuse" ng-show="uplexcelQuse.length > 0">
                <div class="timeline-badge {{((($index + 1) % 2 == 0)?'success':'info')}}">
                    <i class="material-icons">account_circle</i>
                </div>
                <div class="timeline-panel">
                    <span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{qst.Q_DESC}}</span>
                    <span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{qst.ANS}}</span><br/>
                    <span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{qst.OPT1}}</span>
                    <span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{qst.OPT2}}</span>
                    <span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{qst.OPT3}}</span>
                    <span class="label label-{{((($index + 1) % 2 == 0)?'success':'info')}}">{{qst.OPT4}}</span>
                </div>
            </li>
        </ul>
    </div>




        <md-dialog-actions layout="row">
            <md-button class="btn btn-danger" >
                Not Useful
            </md-button>
            <md-button class="btn btn-success" ng-click="save_exl_quest()" class="md-primary"  >
                Useful
            </md-button>

        </md-dialog-actions>

</md-dialog>

