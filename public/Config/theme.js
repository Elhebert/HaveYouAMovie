(function() {

    'use strict';

    angular
        .module('hyam.config')
        .config('hyamTheme', hyamTheme);

    hyamTheme.$inject = ['$mdThemingProvider'];

    function hyamTheme($mdThemingProvider) {
            $mdThemingProvider.theme('default')
                .primaryPalette('pink')
                .accentPalette('orange');
    }
})();