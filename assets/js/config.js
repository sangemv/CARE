var app = angular.module('myapp', ['ui.router','ngMaterial','ngMessages','ngCookies','ngAnimate']);

app.config(['$stateProvider','$urlRouterProvider', function($stateProvider,$urlRouterProvider){
  $urlRouterProvider.otherwise('/login');

  $stateProvider
  .state('login', {
      url: '/login',
      views: {
        '': {templateUrl: 'models/login.html'}
      }
    })
    .state('home', {
      url: '/home',
      views: {
        '': {templateUrl: 'models/home.html',controller: 'mainController'},
        'header@home': {templateUrl: 'models/header.html'},
        'sidebar@home': {templateUrl: 'models/side_bar.html'},
        'main-content@home': {templateUrl: 'models/main-content.html'},
        'footer@home': {templateUrl: 'models/footer.html'}
      }
    })
    .state('addsrc', {
      parent: 'home',
      url: '/addsrc',
      views: {
        'main-content@home': {templateUrl: 'models/addsrc.html',controller: 'addsrcController'}
      }
    })
    .state('presp', {
      parent: 'home',
      url: '/prescription',
      views: {
        'main-content@home': {templateUrl: 'models/prescription.html', controller: 'prespController'}
      }
    })
    .state('sec_screening', {
      parent: 'home',
      url: '/sec_screening',
      views: {
        'main-content@home': {templateUrl: 'models/sec_screening.html', controller: 'screeningCtrl'}
      }
    })
    .state('followup', {
      parent: 'home',
      url: '/followup',
      views: {
        'main-content@home': {templateUrl: 'models/followup.html', controller: 'followupCtrl'}
      }
    })
    .state('followupcount', {
      parent: 'home',
      url: '/followupcount',
      views: {
        'main-content@home': {templateUrl: 'models/followupcount.html', controller: 'followupcountCtrl'}
      }
    })
    .state('users', {
      parent: 'home',
      url: '/users',
      views: {
        'main-content@home': {templateUrl: 'models/setup/users.html', controller: 'usersCtrl'}
      }
    })
    .state('changepswd', {
      parent: 'home',
      url: '/changepswd',
      views: {
        'main-content@home': {templateUrl: 'models/setup/changepswd.html', controller: 'changepswdCtrl'}
      }
    })
    .state('screeninglocation', {
      parent: 'home',
      url: '/screeninglocation',
      views: {
        'main-content@home': {templateUrl: 'models/setup/screeninglocation.html', controller: 'screeninglocationCtrl'}
      }
    })
    .state('occupations', {
      parent: 'home',
      url: '/occupations',
      views: {
        'main-content@home': {templateUrl: 'models/setup/occupations.html', controller: 'occupationsCtrl'}
      }
    })
    .state('socio_economics', {
      parent: 'home',
      url: '/socio_economics',
      views: {
        'main-content@home': {templateUrl: 'models/setup/socio_economics.html', controller: 'socio_economicsCrtl'}
      }
    })
    .state('tasklist', {
      parent: 'home',
      url: '/tasklist',
      views: {
        'main-content@home': {templateUrl: 'models/tasklist.html', controller: 'casteCtrl'}
      }
    })
    .state('risk_categories', {
      parent: 'home',
      url: '/risk_categories',
      views: {
        'main-content@home': {templateUrl: 'models/setup/risk_categories.html', controller: 'risk_categoriesCtrl'}
      }
    })
    .state('dm_programs', {
      parent: 'home',
      url: '/dm_programs',
      views: {
        'main-content@home': {templateUrl: 'models/setup/dm_programs.html', controller: 'dm_programsCtrl'}
      }
    })
    .state('doctmast', {
      parent: 'home',
      url: '/doctmast',
      views: {
        'main-content@home': {templateUrl: 'models/setup/doctmast.html', controller: 'doctmastCtrl'}
      }
    })
    .state('diet_tmp_mast', {
      parent: 'home',
      url: '/diet_tmp_mast',
      views: {
        'main-content@home': {templateUrl: 'models/setup/diet_tmp_mast.html', controller: 'diet_tmp_mastCtrl'}
      }
    })
    .state('ncd_inv_mast', {
      parent: 'home',
      url: '/ncd_inv_mast',
      views: {
        'main-content@home': {templateUrl: 'models/setup/ncd_inv_mast.html', controller: 'ncd_inv_mastCtrl'}
      }
    })
    .state('phy_tmp_mast', {
      parent: 'home',
      url: '/phy_tmp_mast',
      views: {
        'main-content@home': {templateUrl: 'models/setup/phy_tmp_mast.html', controller: 'phy_tmp_mastCtrl'}
      }
    })
    .state('medication_mast', {
      parent: 'home',
      url: '/medication_mast',
      views: {
        'main-content@home': {templateUrl: 'models/setup/medication_mast.html', controller: 'medication_mastCtrl'}
      }
    })
    .state('reg_report', {
      parent: 'home',
      url: '/reg_report',
      views: {
        'main-content@home': {templateUrl: 'models/setup/reg_report.html', controller: 'reg_reportCtrl'}
      }
    })

}]);

/* app.run(['$rootScope',function($rootScope,$state){
  $rootScope.$on('$routeChangeStart', function(e, curr, prev) {
    console.log('in $routeChangeStart');
  });
  $rootScope.$on('$routeChangeSuccess', function(e, curr, prev) {
    console.log('in $routeChangeSuccess');
  });
  $rootScope.$on('$locationChangeStart', function(e, currurl, prevurl,currState,prevState) {
    console.log('in $locationChangeStart url:' +  $rootScope.activepath);
  });
  $rootScope.$on('$locationChangeSuccess', function(e, currurl, prevurl,currState,prevState) {
    console.log('in $locationChangeSuccess url:' + $rootScope.activepath);
	$rootScope.activepath = currState;  
  });
}]) */

app.run(['$rootScope', '$window', function($rootScope,$window,$state){
  
    $rootScope.$on('$routeChangeSuccess', function(e,curr,prev) {
      console.log('in $routeChangeSuccess'+JSON.stringify(curr));
    });


   /*  $rootScope.$on('$routeChangeError', function(e,curr,prev,rejection) {
      console.log('in $routeChangeError - msg' + rejection);

      if(curr.$$route.originalPath == '/cal/multiply/:a/:b/'){
        $window.history.back();
      }
    }); */

}]);
