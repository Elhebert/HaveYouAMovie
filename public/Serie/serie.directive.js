(function(){

    'use strict';

    angular
        .module('hyam.serie')
        .directive('SerieDirective', SerieDirective);

    function SerieDirective() {
        var directive = {
            restrict: 'E',
            templateUrl: './serie.html',
            scope: {
                serie: '='
            },
            controller: SerieController,
            controllerAs: SerieCtrl,
            bindToController: true,
        }

        return directive;
    }


})();