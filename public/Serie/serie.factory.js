(function(){

    'use strict';

    angular
        .module('hyam.serie')
        .factory('serieService', serieService);

    serieService.$inject = ['$http', 'logger'];

    function serieService($http, $logger) {
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

            function getSeriesFailed(error) {
                logger.error('XHR Failed for getSeries. ' + error);
            }
        }

        function getSerie(title) {
            return $http.get('/api/serie/' + title)
                .then(getSerieComplete)
                .catch(getSerieFailed);

            function getSerieComplete(response) {
                return response.data.restults;
            }

            function getSerieFailed(error) {
                logger.error('XHR Failed for getSerie. ' + error);
            }
        }
    }


})();