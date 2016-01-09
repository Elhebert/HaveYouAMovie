(function(){

    'use strict';

    angular
        .module('hyam.serie')
        .directive('serieDirective', serieDirective);

    function serieDirective() {
        var directive = {
            restrict: 'E',
            templateUrl: './serie.html',
            scope: {
                serie: '='
            },
            controller: SerieController,
            controllerAs: SerieCtrl,
            bindToController: true,
        };

        return directive;
    }


})();
