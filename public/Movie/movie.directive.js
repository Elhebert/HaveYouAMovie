(function(){

    'use strict';

    angular
        .module('hyam.movie', [])
        .directive('movieDirective', movieDirective);

    function movieDirective() {
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