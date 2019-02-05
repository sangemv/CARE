/**
 * Created by venkat on 01/04/2019.
 */
app.controller('mainCtrl',['$scope', '$state', '$timeout', '$http', '$rootScope','$log','$window','baseFactory','$cookies','$filter','$location','$q', function ($scope, $state, $timeout, $http, $rootScope, $log,$window,baseFactory,$cookies,$filter,$location,$q)
{
    $rootScope.activepath = $state.current.name;
    $scope.pageClass = 'page-contact';
    //$rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;

    $rootScope.successdata = "success";
    $rootScope.emptydata   = "empty";
    $rootScope.faileddata  = "failed";
    $scope.submit_label    = "Login";

    $log.log("I'm in main Controller");
    $log.log("user id "+$cookies.get('twt_eid'));

        $scope.check_sessions = function()
        {
            $log.log("checking session ");
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
                            //$log.log(payload);
                            if (payload.response == $rootScope.faileddata) {
                                baseFactory.toastCtrl('error','Session Expired, Logging Out!...')
                                $timeout(function () {
                                    $scope.logout();
                                }, 3000);
                            }
                            else {
                                //$log.info("Session exists");
                                if ($state.is("login"))
                                    $state.go('home');
                            }
                        },
                        function (errorPayload) {
                            $log.error('failure loading', errorPayload);
                        });
            }
        }

        $scope.check_sessions();
        $scope.logout = function () {

            $log.log("logout stated");
            var cookies = $cookies.getAll();
            angular.forEach(cookies, function (v, k) {
                $cookies.remove(k);
            });
            window.location.href = "auth/logout";
            baseFactory.toastCtrl('success','Logout Success, Login Again!');
        };

    $scope.twt_usr_id = $cookies.get('twt_eid');
    $scope.twt_user_name = $cookies.get('twt_ename');
	
	$scope.isActive = function(route) {
        //console.log("active path" +$location.path());
        return route === $location.path();
    }




    $scope.tasks =[];
    $scope.manage_task = function(data)
    {
        var send={data:data,action:"get_tasks_data"};
        baseFactory.setupsCtrl(send)
            .then(function(payload)
                {
                    //$log.log("locations "+JSON.stringify(payload));
                    if(payload.response == $rootScope.successdata)
                    {
                        $scope.tasks = angular.fromJson(payload.list);
                        $log.log("tasks "+JSON.stringify($scope.tasks));
                    }
                    else if(payload.response == $rootScope.emptydata)
                    {
                        $scope.depertments = [];
                    }
                },
                function(errorPayload)
                {
                    $log.error('failure loading', errorPayload);
                });
    }

    $scope.depertments =[];
    $scope.manage_depertment = function()
    {
        var send={action:"get_depertments_data"};
        baseFactory.setupsCtrl(send)
            .then(function(payload)
                {
                    //$log.log("locations "+JSON.stringify(payload));
                    if(payload.response == $rootScope.successdata)
                    {
                        $scope.depertments = angular.fromJson(payload.list);
                       // $log.log("depertments "+JSON.stringify($scope.depertments));
                    }
                    else if(payload.response == $rootScope.emptydata)
                    {
                        $scope.depertments = [];
                    }
                },
                function(errorPayload)
                {
                    $log.error('failure loading', errorPayload);
                });
    }
    $scope.manage_depertment();







    $scope.locations =[];
    $scope.manage_location =  function  ()
    {   //$log.log("alllocations "+JSON.stringify(a));
        var send={action:"getlocation_data"};
        //$log.log("alllocations "+JSON.stringify(send));
        baseFactory.setupsCtrl(send)
            .then(function(payload)
                {
                    //$log.log("locations "+JSON.stringify(payload));
                    if(payload.response == $rootScope.successdata)
                    {
                        //$log.log("locationsma "+JSON.stringify(payload.list));
                        $scope.locations = angular.fromJson(payload.list);
                        //$log.log("locationsop "+JSON.stringify($scope.locations));
                    }
                    else if(payload.response == $rootScope.emptydata)
                    {
                        $scope.locations = [];
                    }
                },
                function(errorPayload)
                {
                    $log.error('failure loading', errorPayload);
                });
    }
    $scope.manage_location();




    $scope.simulateQuery = false;
    $scope.isDisabled    = false;

    // list of `state` value/display objects
    $scope.states           = $scope.locations;
    $scope.querySearch      = $scope.querySearch;
    $scope.selectedItemChange = $scope.selectedItemChange;
    $scope.searchTextChange   = $scope.searchTextChange;

    $scope.newState = $scope.newState;

    $scope.newState= function(state) {
        alert("Sorry! You'll need to create a Constitution for " + state + " first!");
    }

    $scope.querySearch = function(query) {
        var results = query ? $scope.states.filter( $scope.createFilterFor(query) ) : $scope.locations,
            deferred;
        $log.log("results "+JSON.stringify(results));
        if ($scope.simulateQuery) {
            deferred = $q.defer();
            $timeout(function () { deferred.resolve( results ); }, Math.random() * 1000, false);
            return deferred.promise;
        } else {
            return results;
        }
    }

    $scope.searchTextChange = function (text) {
        $log.info('Text changed to ' + text);
    }

    $scope.selectedItemChange = function(item) {
        $log.info('Item changed to ' + JSON.stringify(item));
    }


    $scope.createFilterFor = function(query) {
        var lowercaseQuery = angular.lowercase(query);
        $log.log("query "+JSON.stringify(lowercaseQuery));

        var data = function filterFn(state) {
            console.log("state "+JSON.stringify(state.value));
            return (state.value.indexOf(lowercaseQuery) === 0);
        };

    }












}]);



