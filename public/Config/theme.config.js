(function() {

    'use strict';

    angular
        .module('hyam.config')
        .config(theme);

    theme.$inject = ['$mdThemingProvider'];

    function theme($mdThemingProvider) {
        $mdThemingProvider.theme('default')
            .primaryPalette('deep-purple')
            .accentPalette('light-blue');
    }
})();
