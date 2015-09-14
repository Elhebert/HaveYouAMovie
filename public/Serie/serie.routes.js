(function() {

    'use strict';

    angular
        .module('hyam.serie')
        .run(hyamRun);

    function hyamRun(routerHelper) {
        routerHelper.configureStates(getStates());
    }

    function getStates() {
        return [
            {
                state: 'serie.index',
                config: {
                    abstract: true,
                    template: '',
                    url: '/serie'
                }
            },
            {
                state: 'serie.show',
                config: {
                    abstract: true,
                    template: '',
                    url: '/serie/:title'
                }
            }
        ];
    }
})();