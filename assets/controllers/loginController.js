/**
 * Created by venkat on 01/04/2019.
 */
app.controller('loginCtrl',['$scope', '$state', '$timeout', '$http', '$rootScope','$log','$window','baseFactory','$cookies','$filter', function ($scope, $state, $timeout, $http, $rootScope, $log,$window,baseFactory,$cookies,$filter)
{
    $rootScope.successdata = "success";
    $rootScope.emptydata   = "empty";
    $rootScope.faileddata  = "failed";
    $scope.submit_label    = "Login";

    $log.log("i'm in login Controller : "+$scope.submit_label);


   if ($cookies.get('twt_eid') == undefined || $cookies.get('twt_eid') == "" || $cookies.get('twt_eid') == null)
    {
        if (!$state.is("login"))
        {
            $state.go('login');
        }
    }
    else {
        var send = {action: "check_session_exists"};
        baseFactory.UserCtrl(send)
            .then(function (payload) {
                    $log.log(payload);
                    if (payload.response == $rootScope.faileddata) {
                        baseFactory.toastCtrl('error','Session Expired, Logging Out!...')
                        $timeout(function () {
                            $scope.logout();
                        }, 3000);
                    }
                    else {
                        if ($state.is("login"))
                            $state.go('home');
                    }
                },
                function (errorPayload) {
                    $log.error('failure loading', errorPayload);
                });
    }

    $scope.logout = function () {
        var cookies = $cookies.getAll();
        angular.forEach(cookies, function (v, k) {
            $cookies.remove(k);
        });
        window.location.href = "auth/logout";
        baseFactory.toastCtrl('success','Logout Success, Login Again!');
    };


    $scope.auth = {user_id:'',pswd:''};


    $scope.logincheck = function()
    {
        baseFactory.toastCtrl('success',"login Submitted");
        $scope.submit_label = "Loading...";

        var send={user_id:$scope.auth.user_id,pswd:$scope.auth.pswd,action:"login_user_check"};
        //$log.log(JSON.stringify(send));
        baseFactory.UserCtrl(send)
            .then(function(payload)
                {
                    $log.log(payload);
                    if(payload.response == $rootScope.successdata)
                    {		
                        $log.log("Afer login "+JSON.stringify(payload.list));
                        baseFactory.toastCtrl('success',"login Success");
                        $scope.login_app(payload.list);
                    }
                    else if(payload.response==$rootScope.emptydata)
                    {
                        baseFactory.toastCtrl('success',payload.status);
                    }
                    else if(payload.response==$rootScope.faileddata)
                    {
                        baseFactory.toastCtrl('error',payload.status);
                    }
                    $scope.submit_label = "Login";
                },
                function(errorPayload)
                {
                    $log.error('failure loading', errorPayload);
                });
    }

    $scope.login_app = function(keys)
    {
            $cookies.put('twt_ename', keys.usrdtls.EMP_NAME);
            $cookies.put('twt_eid', keys.usrdtls.EMP_ID);

            $state.go('home');
    }




}]);

