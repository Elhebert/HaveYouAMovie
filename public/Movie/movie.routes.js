(function() {

    'use strict';

    angular
        .module('hyam.movie')
        .run(hyamRun);

    function hyamRun(routerHelper) {
        routerHelper.configureStates(getStates());
    }

    function getStates() {
        return [
            {
                state: 'movie.index',
                config: {
                    abstract: true,
                    template: '',
                    url: '/movie'
                }
            },
            {
                state: 'movie.show',
                config: {
                    abstract: true,
                    template: '',
                    url: '/movie/:title'
                }
            }
        ];
    }
})();