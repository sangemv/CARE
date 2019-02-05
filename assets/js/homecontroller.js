app.controller('mainController', function($scope, $mdDialog,$log,$state,$rootScope){
  $scope.pageClass = 'page-contact';
  
  $scope.myDate = new Date();
  $scope.isOpen = false;
  
  //$log.log("mydata state");
  //$log.log($state.current.name);
  $rootScope.activepath = $state.current.name;  
  
  $log.log($rootScope.activepath);  

    $scope.showVisits = function(ev) {
       $mdDialog.show({
         controller: DialogController,
         templateUrl: 'models/modelbox/visits.html',
         parent: angular.element(document.body),
         targetEvent: ev,
         clickOutsideToClose:true,
         fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
       })
       .then(function(answer) {
         $scope.status = 'You said the information was "' + answer + '".';
       }, function() {
         $scope.status = 'You cancelled the dialog.';
       });
     };

   function DialogController($scope, $mdDialog) {
      $scope.hide = function() {
        $mdDialog.hide();
      };

      $scope.cancel = function() {
        $mdDialog.cancel();
      };

      $scope.answer = function(answer) {
        $mdDialog.hide(answer);
      };
    }				  
  
  $scope.ShowEdit = function() {
	  swal({
		  title: "Good!",
		  text: "Updated Succssfully !",
		  icon: "success",
		  button: "Ok",
		});
  };
  
});

app.controller('addsrcController', function($scope,$state,$rootScope) {

  $rootScope.activepath = $state.current.name;  
  $scope.pageClass = 'page-contact';
  $scope.Src_submit = function() {
	  swal({
		  title: "Good!",
		  text: "Submited Succssfully !",
		  icon: "success",
		  button: "Ok",
		});
  };
  
});

app.controller('prespController', function($scope, $mdDialog, $state,$rootScope) {
	
	$rootScope.activepath = $state.current.name;  
  $scope.pageClass = 'page-contact';
  
   $scope.Src_submit = function() {
	  swal({
		  title: "Good!",
		  text: "Submited Succssfully !",
		  icon: "success",
		  button: "Ok",
		});
  };

    $scope.showAdvanced = function(ev) {
       $mdDialog.show({
         controller: DialogController,
         templateUrl: 'models/modelbox/add_medication.html',
         parent: angular.element(document.body),
         targetEvent: ev,
         clickOutsideToClose:true,
         fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
       })
       .then(function(answer) {
         $scope.status = 'You said the information was "' + answer + '".';
        }, function() {
         $scope.status = 'You cancelled the dialog.';
       });
     };

     function DialogController($scope, $mdDialog) {
        $scope.hide = function() {
          $mdDialog.hide();
        };

        $scope.cancel = function() {
          $mdDialog.cancel();
        };

        $scope.answer = function(answer) {
          $mdDialog.hide(answer);
        };
      }

});

app.controller('screeningCtrl', function($scope,$mdDialog, $state,$rootScope) {
	
	$rootScope.activepath = $state.current.name;  
  $scope.pageClass = 'page-contact';
  $scope.showDitescore = function(ev) {
     $mdDialog.show({
       controller: DialogController,
       templateUrl: 'models/modelbox/ditescore.html',
       parent: angular.element(document.body),
       targetEvent: ev,
       clickOutsideToClose:true,
       fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
     })
     .then(function(answer) {
       $scope.status = 'You said the information was "' + answer + '".';
      }, function() {
       $scope.status = 'You cancelled the dialog.';
     });
   };

   $scope.showPhysicalact = function(ev) {
      $mdDialog.show({
        controller: DialogController,
        templateUrl: 'models/modelbox/phyact.html',
        parent: angular.element(document.body),
        targetEvent: ev,
        clickOutsideToClose:true,
        fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
      })
      .then(function(answer) {
        $scope.status = 'You said the information was "' + answer + '".';
       }, function() {
        $scope.status = 'You cancelled the dialog.';
      });
    };

   function DialogController($scope, $mdDialog) {
      $scope.hide = function() {
        $mdDialog.hide();
      };

      $scope.cancel = function() {
        $mdDialog.cancel();
      };

      $scope.answer = function(answer) {
        $mdDialog.hide(answer);
      };
    }
	
	$scope.Src_submit = function() {
	  swal({
		  title: "Good!",
		  text: "Submited Succssfully !",
		  icon: "success",
		  button: "Ok",
		});
	};
});

app.controller('followupCtrl', function($scope,$mdDialog, $state,$rootScope) {
	
	$rootScope.activepath = $state.current.name;  
  $scope.pageClass = 'page-contact';
  $scope.showFollowupVisit = function(ev) {
     $mdDialog.show({
       controller: DialogController,
       templateUrl: 'models/modelbox/Followupvst.html',
       parent: angular.element(document.body),
       targetEvent: ev,
       clickOutsideToClose:true,
       fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
     })
     .then(function(answer) {
       $scope.status = 'You said the information was "' + answer + '".';
     }, function() {
       $scope.status = 'You cancelled the dialog.';
     });
   };

   function DialogController($scope, $mdDialog) {
      $scope.hide = function() {
        $mdDialog.hide();
      };
      $scope.cancel = function() {
        $mdDialog.cancel();
      };
      $scope.answer = function(answer) {
        $mdDialog.hide(answer);
      };
    }
});

app.controller('followupcountCtrl', function($scope, $state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
});

app.controller('usersCtrl', function($scope, $mdMedia, $rootScope, $state) {
	
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $scope.data = {cb1: true,cb4: true,cb5: false};
    $scope.message = 'InActive';
    $scope.onChange = function(cbState) {
      $scope.message = cbState;
    };
    $rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;
});

app.controller('changepswdCtrl', function($scope, $state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
});

app.controller('screeninglocationCtrl', function($scope,$mdMedia, $state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;
});

app.controller('occupationsCtrl', function($scope,$mdMedia, $state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;
});

app.controller('socio_economicsCrtl', function($scope,$mdMedia,$state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;
});

app.controller('casteCtrl', function($scope,$mdMedia,$state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;
});

app.controller('risk_categoriesCtrl', function($scope,$mdMedia,$state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;
});

app.controller('dm_programsCtrl', function($scope,$mdMedia,$state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;
});

app.controller('doctmastCtrl', function($scope,$mdMedia,$state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;
});

app.controller('diet_tmp_mastCtrl', function($scope,$mdMedia,$state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;
});
app.controller('ncd_inv_mastCtrl', function($scope,$mdMedia, $state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;
});

app.controller('phy_tmp_mastCtrl', function($scope,$mdMedia,$state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $rootScope.$mdMedia = $mdMedia;
    var self = this;
    self.showBoxOne = false;
    self.showBoxTwo = false;
});

app.controller('medication_mastCtrl', function($scope,$mdDialog, $state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
    $scope.showAdvanced = function(ev) {
       $mdDialog.show({
         controller: DialogController,
         templateUrl: 'models/modelbox/add_medication.html',
         parent: angular.element(document.body),
         targetEvent: ev,
         clickOutsideToClose:true,
         fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
       })
       .then(function(answer) {
         $scope.status = 'You said the information was "' + answer + '".';
        }, function() {
         $scope.status = 'You cancelled the dialog.';
       });
     };

     function DialogController($scope, $mdDialog) {
        $scope.hide = function() {
          $mdDialog.hide();
        };

        $scope.cancel = function() {
          $mdDialog.cancel();
        };

        $scope.answer = function(answer) {
          $mdDialog.hide(answer);
        };
      }
});

app.controller('reg_reportCtrl', function($scope,$state,$rootScope) {
	$rootScope.activepath = $state.current.name;  
    $scope.pageClass = 'page-contact';
});

