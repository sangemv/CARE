/**
 * Created by Venkat on 04/02/2019.
 */
app.controller('regCtrl',['$scope', '$state', '$timeout', '$http', '$rootScope','$log','$window','baseFactory','$cookies','$filter', function ($scope, $state, $timeout, $http, $rootScope, $log,$window,baseFactory,$cookies,$filter)
{

    $log.log("iam in home controller");
    $scope.check_sessions();

    $scope.add_edit = 'Add';

    $scope.auth = {location:'',task:'',comments:'',assignto:'',assgndept:'',reportby:''};
    $scope.addnewtask = function(data)
    {
        //$log.log("add function called "+JSON.stringify(adduser));
     /*   if(data.userid == '' || data.name == ''){
            baseFactory.toastCtrl("error","Enter All Fields!");
            return false;
        }*/

        //var send={auth:$scope.auth,action:"add_newtask_data"};



        var send=$scope.auth;
        send.action = "add_newtask_data";
        $log.log("My add task function called "+JSON.stringify(send));
        baseFactory.regCtrl(send)
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


    $scope.tickets =[];
    $scope.get_tickets = function(data)
    {
        var send={data:data,action:"get_tickets_data"};
        //$log.log("alllocations "+JSON.stringify(send));
        baseFactory.setupsCtrl(send)
            .then(function(payload)
                {
                    //$log.log("locations "+JSON.stringify(payload));
                    if(payload.response == $rootScope.successdata)
                    {
                        //$log.log("tickets "+JSON.stringify(payload.list));
                        $scope.tickets = angular.fromJson(payload.list);
                        //$log.log("tickets "+JSON.stringify($scope.tickets));
                    }
                    else if(payload.response == $rootScope.emptydata)
                    {
                        $scope.tickets = [];
                    }
                },
                function(errorPayload)
                {
                    $log.error('failure loading', errorPayload);
                });
    }



  /*  $scope.tasks = false;
    $scope.open_field = function(){
        $scope.tasks = true;
    }*/




}]);

