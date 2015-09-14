(function(){

    'use strict';

    angular
        .module('hyam.movie')
        .directive('MovieDirective', MovieDirective);

    function MovieDirective() {
        var directive = {
            restrict: 'E',
            templateUrl: './movie.html',
            scope: {
                movie: '='
            },
            controller: MovieController,
            controllerAs: MovieCtrl,
            bindToController: true,
        }

        return directive;
    }


})();