(function(){

    'use strict';

    angular
        .module('hyam.movie')
        .factory('MovieService', MovieService);

    MovieService.$inject = ['$http'];

    function MovieService($http) {

        var service = {
            getMovies: getMovies,
            getMovie: getMovie,
            setMovie: setMovie,
            searchMovie: searchMovie
        };

        return service;

        function getMovies() {
            return $http.get('/api/movies')
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

        function setMovie(movie) {
            return $http.put('/api/movie', movie)
                .then(setMovieComplete)
                .catch(setMovieFailed);

            function setMovieComplete(response) {
                return response.data.results;
            }

            function setMovieFailed(error) { }
        }

        function searchMovie(title) {
            return $http.get('/api/movie/' + title)
                .then(searchMovieComplete)
                .catch(searchMovieFailed);

            function searchMovieComplete(response) {
                return response.data.results;
            }

            function searchMovieFailed(error) { }
        }
    }


})();
