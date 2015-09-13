(function(){

    'use strict';

    angular
        .module('hyam.serie')
        .factory('SerieService', SerieService);

    SerieService.$inject = ['$http', 'logger'];

    function SerieService($http) {
        return {
          getSeries: getSeries,
          getSerie: getSerie
        };

        function getSeries() {
            return $http.get('/api/serie')
                .then(getSeriesComplete)
                .catch(getSeriesFailed);

            function getSeriesComplete(response) {
                return response.data.restults;
            }

            function getSeriesFailed(error) { }
        }

        function getSerie(title) {
            return $http.get('/api/serie/' + title)
                .then(getSerieComplete)
                .catch(getSerieFailed);

            function getSerieComplete(response) {
                return response.data.restults;
            }

            function getSerieFailed(error) { }
        }
    }


})();