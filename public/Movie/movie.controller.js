(function(){

    'use strict';

    angular
        .module('hyam.movie')
        .controller('movieController', movieController);

    movieController.$inject = ['MovieService']

    function movieController(MovieService) {
        var vm = this;
        vm.movies = [];

        activate();

        function activate() {
            return getMovies();
        }

        function getMovies() {
            return MovieService.getMovies()
                .then(function(data) {
                    vm.movies = data;
                    return vm.movies;
                });
        }
    }


})();