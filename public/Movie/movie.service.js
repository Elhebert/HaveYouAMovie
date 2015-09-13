(function(){

    'use strict';

    angular
        .module('hyam.movie')
        .factory('MovieService', MovieService);

    MovieService.$inject = ['$http'];

    function MovieService($http) {

        var service = {
            getMovies: getMovies,
            getMovie: getMovie
        };

        return service;

        function getMovies() {
            return $http.get('/api/movie')
                .then(getMoviesComplete)
                .catch(getMoviesFailed);

            function getMoviesComplete(response) {
                return response.data.results;
            }

            function getMoviesFailed(error) { }
        }

        function getMovie(title) {
            return $http.get('/api/movie/' + title)
                .then(getMovieComplete)
                .catch(getMovieFailed);

            function getMovieComplete(response) {
                return response.data.results;
            }

            function getMovieFailed(error) { }
        }
    }


})();