(function() {

    'use strict';

    angular
        .module('hyam.routes')
        .config(appRoute);

    appRoute.$inject = ['$stateProvider','$urlRouterProvider'];

    function appRoute($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('home', {
                url: '/',
            });
    }
})();
