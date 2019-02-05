<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<html lang="en" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!----------------------- CSS ------------------>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert2.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/angular-material.min.css"> <!-- 1.1.0 --->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/materialize.min.css"  media="screen,projection"/>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/demo.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/material-dashboard23cd.css?v=1.2.1">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cardtable.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css">

    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/angular.min.js"></script> <!-- 1.5.5 --->
    <script src="<?php echo base_url();?>assets/js/angular-ui-router.min.js"></script> <!-- 1.0.0-rc.1 --->
    <script src="<?php echo base_url();?>assets/js/angular-animate.min.js"></script> <!-- 1.5.5 --->
    <script src="<?php echo base_url();?>assets/js/angular-aria.min.js"></script> <!-- 1.5.5 --->
    <script src="<?php echo base_url();?>assets/js/angular-messages.min.js"></script> <!--  1.5.5  -->
    <script src='<?php echo base_url();?>assets/js/angular-material.js'></script> <!--  1.5.5  -->
    <script src="<?php echo base_url();?>assets/js/angular-cookie.js"></script>
    <script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>


    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/material-dashboard23cd.js?v=1.2.1"></script>

    <script src="<?php echo base_url();?>assets/js/autocomplete.js?<?php echo time(); ?>"></script>
    <script src="<?php echo base_url();?>assets/js/autocomplete_cons.js?<?php echo time(); ?>"></script>

	<script src="<?php echo base_url(); ?>assets/controllers/app.js"></script>
	<script src="<?php echo base_url(); ?>assets/controllers/config.js"></script>
	<script src="<?php echo base_url(); ?>assets/controllers/loginController.js"></script>
	<script src="<?php echo base_url(); ?>assets/controllers/mainController.js"></script>
	<script src="<?php echo base_url(); ?>assets/controllers/regController.js"></script>
	<script src="<?php echo base_url(); ?>assets/controllers/setupController.js"></script>
	<script src="<?php echo base_url(); ?>assets/factory/base_factory.js"></script>
</head>

<body ng-app="treatwell" ng-cloak class="style-3">
	
	<div ui-view></div>
  
</body>
</html>
