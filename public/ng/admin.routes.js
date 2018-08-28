'use strict';
admin.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
    $stateProvider
        .state('page', {
            url: '/single-page',
            templateUrl: 'ng/modules/admin/single-page/view.html',
            controller: "pageController"
        });        
}]);