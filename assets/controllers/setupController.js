/**
 * Created by Venkat on 29/03/2018.
 */
app.controller('setupCtrl',['$scope', '$state', '$timeout', '$http', '$rootScope','$log','$window','baseFactory','$cookies','$filter', function ($scope, $state, $timeout, $http, $rootScope, $log,$window,baseFactory,$cookies,$filter)
{

    $log.log("iam in setups controller");
	$scope.check_sessions();

    $scope.add_edit = 'Add';
    $scope.manage_user = function()
    {
        var send={action:"fetch_users_data"};
       // $log.log("My function called "+JSON.stringify(send));
        baseFactory.setupsCtrl(send)
            .then(function(payload)
                {
                    //$log.log("users "+payload);
                    if(payload.response == $rootScope.successdata)
                    {
                       // console.log("users_list"+JSON.stringify(payload));
                        $scope.user_list = angular.fromJson(payload.list);
                    }
                    else if(payload.response == $rootScope.emptydata)
                    {
                        $scope.user_list = [];
                    }
                },
                function(errorPayload)
                {
                    $log.error('failure loading', errorPayload);
                });
    }
    $scope.manage_user();
    $scope.adduser = {userid:'',name:'',mob:'',email:'',sts:'A',adm_sts:'N'};
    $scope.add_user = function(adduser)
    {
        //$log.log("add function called "+JSON.stringify(adduser));
        if(adduser.userid == '' || adduser.name == ''){
            baseFactory.toastCtrl("error","Enter All Fields!");
            return false;
        }

        var send={stg:$scope.add_edit,adduser:adduser,action:"add_user_data"};
        //$log.log("My add user function called "+JSON.stringify(send));
        baseFactory.setupsCtrl(send)
            .then(function(payload)
                {
                    //$log.log("users "+JSON.stringify(payload));
                    if(payload.response == $rootScope.successdata)
                    {
                        if($scope.add_edit == "Edit")
                            baseFactory.toastCtrl('success','Updated Successfully...!');
                        else
                            baseFactory.toastCtrl('success','Added Successfully...!');
                        $scope.manage_user();
                        $scope.adduser = {userid:'',name:'',mob:'',email:'',sts:'',adm_sts:''};
                        //$("#collapse1").collapse('hide');
                    }
                    else if(payload.response == $rootScope.emptydata)
                    {
                        Materialize.toast('Something Went Wrong Here', 4000,'red');
                    }
                },
                function(errorPayload)
                {
                    $log.error('failure loading', errorPayload);
                });
    }

    $scope.edit_user = function(data)
    {
        $scope.add_edit='Edit';
        //console.log(JSON.stringify(data));
        $scope.adduser = {userid:data.EMP_ID,name:data.EMP_NAME,mob:data.MOBILE_NO,email:data.EMAIL_ID,sts:data.STATUS,adm_sts:data.ISADMIN};
    }

    $scope.manage_location = function()
    {
        var send={action:"fetch_location_data"};
        baseFactory.setupsCtrl(send)
            .then(function(payload)
                {
                    //$log.log("locations "+payload);
                    if(payload.response == $rootScope.successdata)
                    {
                        //$log.log("locations "+JSON.stringify(payload.list));
                        $scope.location_list = angular.fromJson(payload.list);
                        //$log.log("locations "+JSON.stringify($scope.location_list));
                    }
                    else if(payload.response == $rootScope.emptydata)
                    {
                        $scope.location_list = [];
                    }
                },
                function(errorPayload)
                {
                    $log.error('failure loading', errorPayload);
                });
    }

    $scope.locations={"loc_id":"","loc_name":"","sts":""};
    $scope.add_mast = function(loc)
    {
       var send = {stg:$scope.add_edit,locts:loc,action:"add_master_data"};
       //$log.log("addlocations "+JSON.stringify(send));
        baseFactory.setupsCtrl(send)
            .then(function(payload)
                {
                    //$log.log("locations "+payload);
                    if(payload.response == $rootScope.successdata)
                    {
                        if($scope.add_edit == "Edit")
                            baseFactory.toastCtrl('success','Location Updated Successfully...!');
                        else
                            baseFactory.toastCtrl('success','Location Added Successfully...!');
                        $scope.manage_location();
                        $scope.locations={"loc_id":"","loc_name":"","sts":""};
                        //$("#collapse1").collapse('hide');
                    }
                    else if(payload.response == $rootScope.emptydata)
                    {
                        Materialize.toast('Something Went Wrong Here', 4000,'red');
                    }
                },
                function(errorPayload)
                {
                    $log.error('failure loading', errorPayload);
                });
    }

    $scope.edit_mast = function(data){
        $scope.add_edit ='Edit';
        $scope.locations = {loc_id:data.LOC_ID,loc_name:data.LOC_NAME,sts:data.STATUS};
        //$log.log("locations1 "+JSON.stringify($scope.locations));
    }

    $scope.manage_location();


    $scope.manage_tasks = function()
    {
        var send={action:"fetch_tasks_data"};
        baseFactory.setupsCtrl(send)
            .then(function(payload)
                {
                    //$log.log("locations "+payload);
                    if(payload.response == $rootScope.successdata)
                    {
                       // $log.log("locations "+JSON.stringify(payload.list));
                        $scope.tasks_list = angular.fromJson(payload.list);
                        $log.log("tasks_list "+JSON.stringify($scope.tasks_list));
                    }
                    else if(payload.response == $rootScope.emptydata)
                    {
                        $scope.tasks_list = [];
                    }
                },
                function(errorPayload)
                {
                    $log.error('failure loading', errorPayload);
                });
    }
    $scope.manage_tasks();
    $scope.tasks={"task_id":"","task_name":"","taskloc_id":"","sts":""};
    $scope.add_tasks = function(task)
    {
        var send = {stg:$scope.add_edit,tasks:task,action:"add_tasks_data"};
        $log.log("addlocations "+JSON.stringify(send));
        baseFactory.setupsCtrl(send)
            .then(function(payload)
                {
                    //$log.log("locations "+payload);
                    if(payload.response == $rootScope.successdata)
                    {
                        if($scope.add_edit == "Edit")
                            baseFactory.toastCtrl('success','Task Updated Successfully...!');
                        else
                            baseFactory.toastCtrl('success','Task Added Successfully...!');
                        $scope.manage_tasks();
                        $scope.tasks={"task_id":"","task_name":"","taskloc_id":"","sts":""};
                    }
                    else if(payload.response == $rootScope.emptydata)
                    {
                        Materialize.toast('Something Went Wrong Here', 4000,'red');
                    }
                },
                function(errorPayload)
                {
                    $log.error('failure loading', errorPayload);
                });
    }

    $scope.edit_task = function(data){
        $scope.add_edit ='Edit';
        $scope.tasks = {task_id:data.SNO,task_name:data.TASKNAME,taskloc_id:data.LOC_ID,sts:data.STATUS};
        $log.log("tasks1 "+JSON.stringify($scope.tasks));
    }

    $scope.manage_location();


    $scope.reset = function(data)
    {
        if(data == "user")
            $scope.adduser = {userid:'',name:'',mob:'',email:'',sts:'A',adm_sts:'N'};
        else if(data == "scrn")
            $scope.addunit = {unitid:'',name:'',sts:'A'};
    }
    

		

}]);
		
		