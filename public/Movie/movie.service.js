(function(){

    'use strict';

    angular
        .module('hyam.movie')
        .factory('movieService', movieService);

    movieService.$inject = ['$http', 'logger'];

    function movieService($http, $logger) {
        return {
          getMovies: getMovies,
          getMovie: getMovie
        };

        function getMovies() {
            return $http.get('/api/movie')
                .then(getMoviesComplete)
                .catch(getMoviesFailed);

            function getMoviesComplete(response) {
                return response.data.restults;
            }

            function getMoviesFailed(error) {
                logger.error('XHR Failed for getMovies. ' + error);
            }
        }

        function getMovie(title) {
            return $http.get('/api/movie/' + title)
                .then(getMovieComplete)
                .catch(getMovieFailed);

            function getMovieComplete(response) {
                return response.data.restults;
            }

            function getMovieFailed(error) {
                logger.error('XHR Failed for getMovie. ' + error);
            }
        }
    }


})();