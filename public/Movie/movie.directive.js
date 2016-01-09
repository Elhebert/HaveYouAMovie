(function(){

    'use strict';

    angular
        .module('hyam.movie')
        .directive('movie', movieDirective);

    function movieDirective() {
        var directive = {
            restrict: 'E',
            templateUrl: 'Movie/movie.html',
            scope: {
                movie: '='
            },
            controller: MovieController,
            controllerAs: MovieCtrl,
            bindToController: true,
        };

        return directive;
    }


})();
