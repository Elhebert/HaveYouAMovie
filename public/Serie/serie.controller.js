(function(){

    'use strict';

    angular
        .module('hyam.serie')
        .controller('SerieController', SerieController);

    SerieController.$inject = ['SerieService'];

    function SerieController(SerieService) {
        var vm = this;
        vm.series = [];
        vm.serie = {};

        activate();

        function activate() {
            return getSeries();
        }

        function getSeries() {
            return SerieService.getSeries()
                .then(function(data) {
                    vm.series = data;
                    return vm.series;
                });
        }

        function getSerie(title) {
            return SerieService.getSerie(title)
                .then(function(data) {
                    vm.serie = data;
                    return vm.serie;
                });
        }

        function setSerie(title) {
            return SerieService.setSerie(title);
        }

        function searchSerie(title) {
            return SerieService.searchSerie(title)
                .then(function(data) {
                    vm.series = data;
                    return vm.series;
                });
        }
    }


})();