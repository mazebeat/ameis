'use strict';

/* Init app */
var ameis = angular.module('ameis', [
        'ngMessages',
        'LocalStorageModule',
        'ui.bootstrap-slider',
        'smoothScroll'
    ],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });

/* Config app */
ameis.config([
    '$httpProvider',
    'localStorageServiceProvider',
    function ($httpProvider, localStorageServiceProvider) {
        $httpProvider.defaults.useXDomain = true;
        $httpProvider.defaults.withCredentials = false;
        delete $httpProvider.defaults.headers.common['X-Requested-With'];
        $httpProvider.defaults.headers.common.Accept = "*/*";
        localStorageServiceProvider
            .setPrefix('__trkC')
            .setStorageType('sessionStorage')
            .setNotify(true, true);
    }
]);

ameis.filter('mayorCero', function () {
    return function (item) {
        if (item <= 0) {
            return 'NO';
        }
        if (item > 0) {
            return 'SI';
        } else {
            return 'NO';
        }
    };
});

