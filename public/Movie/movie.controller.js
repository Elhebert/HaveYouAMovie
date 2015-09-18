(function(){

    'use strict';

    angular
        .module('hyam.movie')
        .controller('MovieController', MovieController);

    MovieController.$inject = ['MovieService']

    function MovieController(MovieService) {
        var vm = this;
        vm.movies = [];
        vm.movie = {};

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

        function getMovie(title) {
            return MovieService.getMovie(title)
                .then(function(data) {
                    vm.movie = data;
                    return vm.movie;
                });
        }

        function setMovie(title) {
            return MovieService.setMovie(title);
        }

        function searchMovie(title) {
            return MovieService.searchMovie(title)
                .then(function(data) {
                    vm.movies = data;
                    return vm.movies;
                });
        }
    }


})();