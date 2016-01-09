(function(){

    'use strict';

    angular
        .module('hyam.layout')
        .directive('sidebar', sidebar);

    function sidebar() {
        var directive = {
            restrict: 'E',
            templateUrl: 'Layout/sidebar.html',
        };

        return directive;
    }


})();
