(function(){

    'use strict';

    angular
        .module('hyam.movie')
        .controller('movieController', movieController);

    movieController.$inject = ['movieService', 'logger']

    function movieController(movieService, logger) {
        var vm = this;
        vm.movies = [];

        activate();

        function activate() {
            return getMovies().then(function() {
                logger.info('Activate Movies View');
            });
        }

        function getMovies() {
            return movieService.getMovies()
                .then(function(data) {
                    vm.movies = data;
                    return vm.movies;
                });
        }
    }


})();