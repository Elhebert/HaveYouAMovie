(function() {

    'use strict';

    angular
        .module('hyam.config')
        .config(icons);

    icons.$inject = ['$mdIconProvider'];

    function icons($mdIconProvider) {
        $mdIconProvider
            .icon('home',
                'bower_components/material-design-icons/action/svg/production/ic_home_48px.svg')
            .defaultIconSet('action')
            .iconSet('action',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-action.svg')
            .iconSet('maps',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-maps.svg')
            .iconSet('images',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-images.svg')
            .iconSet('alert',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-alert.svg')
            .iconSet('av',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-av.svg')
            .iconSet('communication',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-communication.svg')
            .iconSet('content',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-content.svg')
            .iconSet('device',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-device.svg')
            .iconSet('editor',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-editor.svg')
            .iconSet('file',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-file.svg')
            .iconSet('hardware',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-hardware.svg')
            .iconSet('navigation',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-navigation.svg')
            .iconSet('notification',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-notification.svg')
            .iconSet('social',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-social.svg')
            .iconSet('toggle',
                'bower_components/material-design-icons/sprites/svg-sprite/svg-sprite-toggle.svg');
    }
})();
