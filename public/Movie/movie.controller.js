(function(){

    'use strict';

    angular
        .module('hyam.movie')
        .controller('MovieController', MovieController);

    MovieController.$inject = ['MovieService'];

    function MovieController(MovieService) {
        var vm = this;
        vm.movies = [];
        vm.movie = {};

        activate();

        function activate() {
            return getMovies();
        }

        function getMovies() {
            return MovieService.getMovies()
                .then(function(data) {
                    //vm.movies = data;

                    vm.movies = [
                        {
                            'title': 'Iron Man',
                            'genre': 'Action, adventure, sci-fi',
                            'synopsis': 'Tony Stark. Genius, billionaire,' +
                                'playboy, philanthropist. Son of legendary inventor' +
                                'and weapons contractor Howard Stark. When Tony Stark ' +
                                'is assigned to give a weapons presentation to an Iraqi ' +
                                'unit led by Lt. Col. James Rhodes, he\'s given a ride ' +
                                'on enemy lines. That ride ends badly when Stark\'s Humvee ' +
                                'that he\'s riding in is attacked by enemy combatants. ' +
                                'He survives - barely - with a chest full of shrapnel ' +
                                'and a car battery attached to his heart. In order ' +
                                'to survive he comes up with a way to miniaturize the ' +
                                'battery and figures out that the battery can power ' +
                                'something else. Thus Iron Man is born. He uses the primitive' +
                                ' device to escape from the cave in Iraq. Once back home,' +
                                ' he then begins work on perfecting the Iron Man suit. But' +
                                ' the man who was put in charge of Stark Industries ' +
                                'has plans of his own to take over Tony\'s technology for other matters.',
                            'thumbnail': 'http://ia.media-imdb.com/images/M/MV5BMTczNTI2ODUwO' +
                                'F5BMl5BanBnXkFtZTcwMTU0NTIzMw@@._V1_SX214_AL_.jpg',
                            'year': 2008
                        }
                    ];

                    return vm.movies;
                });
        }

        function getMovie(title) {
            return MovieService.getMovie(title)
                .then(function(data) {
                    vm.movie = data;
                    return vm.movie;
                });
        }

        function setMovie(title) {
            return MovieService.setMovie(title);
        }

        function searchMovie(title) {
            return MovieService.searchMovie(title)
                .then(function(data) {
                    vm.movies = data;
                    return vm.movies;
                });
        }
    }


})();
