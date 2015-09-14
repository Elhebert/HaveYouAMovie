(function(){

    'use strict';

    angular
        .module('hyam.serie')
        .factory('SerieService', SerieService);

    SerieService.$inject = ['$http', 'logger'];

    function SerieService($http) {
        return {
          getSeries: getSeries,
          getSerie: getSerie,
          setSerie: setSerie,
          searchSerie: searchSerie
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
                return response.data.results;
            }

            function getSerieFailed(error) { }
        }

        function setSerie(serie) {
            return $http.put('/api/movie', serie)
                .then(setSerieComplete)
                .catch(setSerieFailed);

            function setSerieComplete(response) {
                return response.data.results;
            }

            function setSerieFailed(error) { }
        }

        function searchSerie(title) {
            return $http.get('/api/serie/' + title)
                .then(searchSerieComplete)
                .catch(searchSerieFailed);

            function searchSerieComplete(response) {
                return response.data.results;
            }

            function searchSerieFailed(error) { }
        }
    }


})();