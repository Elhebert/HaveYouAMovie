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
                templateUrl: 'Movie/movie.html',
                controller: 'MovieController as vm'
            })
            .state('getMovie',{
                parent:'movie',
                url:'/:title',
                templateUrl: 'Movie/movie.html'
            });
    }
})();
