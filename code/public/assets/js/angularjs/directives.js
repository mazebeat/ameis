'use strict';

ameis
    .directive("select2", function ($timeout, $parse) {
        return {
            restrict: 'AC',
            require: 'ngModel',
            link: function (scope, element, attrs) {
                //console.log(attrs);
                $timeout(function () {
                    element.select2();
                    element.select2Initialized = true;
                });

                var refreshSelect = function () {
                    if (!element.select2Initialized) return;
                    $timeout(function () {
                        element.trigger('change');
                    });
                };

                var recreateSelect = function () {
                    if (!element.select2Initialized) return;
                    $timeout(function () {
                        element.select2('destroy');
                        element.select2();
                    });
                };

                scope.$watch(attrs.ngModel, refreshSelect);

                if (attrs.ngOptions) {
                    var list = attrs.ngOptions.match(/ in ([^ ]*)/)[1];
                    // watch for option list change
                    scope.$watch(list, recreateSelect);
                }

                if (attrs.ngDisabled) {
                    scope.$watch(attrs.ngDisabled, refreshSelect);
                }
            }
        };
    })
    .directive('sglclick', ['$parse', function ($parse) {
        return {
            restrict: 'A',
            link: function (scope, element, attr) {
                var fn = $parse(attr['sglclick']);
                var delay = 300, clicks = 0, timer = null;
                element.on('click', function (event) {
                    clicks++;  //count clicks
                    if (clicks === 1) {
                        timer = setTimeout(function () {
                            scope.$apply(function () {
                                fn(scope, {$event: event});
                            });
                            clicks = 0;             //after action performed, reset counter
                        }, delay);
                    } else {
                        clearTimeout(timer);    //prevent single-click action
                        clicks = 0;             //after action performed, reset counter
                    }
                });
            }
        };
    }])
    .directive('stringToNumber', function () {
        return {
            require: 'ngModel',
            link: function (scope, element, attrs, ngModel) {
                ngModel.$parsers.push(function (value) {
                    return '' + value;
                });
                ngModel.$formatters.push(function (value) {
                    return parseFloat(value, 10);
                });
            }
        };
    })
    .directive('appClick', function () {
        return {
            restrict: 'A',
            scope: true,
            template: '<button ng-click="click()">Click me</button> Clicked {{clicked}} times',
            controller: function ($scope, $element) {
                $scope.clicked = 0;
                $scope.click = function () {
                    $scope.clicked++
                }
            }
        }
    })
    .directive('clickme', function () {
        return function (scope, element, attrs) {
            var clickingCallback = function () {
                alert('clicked!')
            };
            element.bind('click', clickingCallback);
        }
    })
    .directive('photo', function () {
        //<photo photo-src="{{photo.url}}"  caption="Taken on: {{photo.date}}"/>7
        return {
            // required to make it work as an element
            restrict: 'E',

            // replace <photo> with this html
            template: '<figure><img/><figcaption/></figure>',
            replace: true,

            // observe and manipulate the DOM
            link: function ($scope, element, attrs) {
                attrs.$observe('caption', function (value) {
                    element.find('figcaption').text(value)
                })

                // attribute names change to camel case
                attrs.$observe('photoSrc', function (value) {
                    element.find('img').attr('src', value)
                })
            }
        }
    })

