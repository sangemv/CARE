'use strict';

app.config(function($stateProvider,$urlRouterProvider){
    $urlRouterProvider.otherwise('/login');

    $stateProvider
        .state('login', {
            url: '/login',
            views: {
                '': {templateUrl: 'welcome/index',controller: 'loginCtrl'}
            }
        })
		.state('home', {
			url: '/home',
			views: {
				'' : {templateUrl: 'welcome/home',controller: 'mainCtrl'},
				'header@home': {templateUrl: 'welcome/header'},
                'sidebar@home': {templateUrl: 'welcome/side_bar'},
				'main_content@home': {templateUrl: 'welcome/main_content',controller: 'regCtrl'},
				'footer@home': {templateUrl: 'welcome/footer'}
			}
		})		
		.state('tasklist', {
			parent: 'home',
			url: '/tasklist',
			views: {			
				'main_content@home': {templateUrl: 'welcome/tasklist'}
			}
		})		
		.state('users', {
			parent: 'home',
			url: '/users',
			views: {			
				'main_content@home': {templateUrl: 'welcome/users',controller: 'setupCtrl'}
			}
		})				
		.state('changepswd', {
			parent: 'home',
			url: '/changepswd',
			views: {			
				'main_content@home': {templateUrl: 'welcome/changepswd'}
			}
		})

		.state('location', {
			parent: 'home',
			url: '/location',
			views: {
				'main_content@home': {templateUrl: 'welcome/location',controller: 'setupCtrl'}
			}
		})
		.state('createtask', {
			parent: 'home',
			url: '/createtask',
			views: {
				'main_content@home': {templateUrl: 'welcome/createtask', controller: 'setupCtrl'}
			}
		})

});

