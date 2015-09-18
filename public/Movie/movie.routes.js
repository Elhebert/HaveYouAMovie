(function() {

    'use strict';

    angular
        .module('hyam.movie')
        .config(movieRoute);

    movieRoute.$inject = ['$stateProvider','$urlRouterProvider'];

    function movieRoute($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('movie', {
                url: '/movie',
                templateUrl: 'movie.html',
                controller: 'MovieController as vm'
            })
            .state('get',{
                parent:'movie',
                url:'/:title',
                templateUrl: 'movie.html'
            });
    }
})();