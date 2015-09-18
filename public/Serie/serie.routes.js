(function() {

    'use strict';

    angular
        .module('hyam.serie')
        .config(serieRoute);

    serieRoute.$inject = ['$stateProvider','$urlRouterProvider'];

    function serieRoute($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('serie', {
                url: '/serie',
                templateUrl: 'serie.html',
                controller: 'SerieController as vm'
            })
            .state('get',{
                parent:'serie',
                url:'/:title',
                templateUrl: 'serie.html'
            });
    }
})();