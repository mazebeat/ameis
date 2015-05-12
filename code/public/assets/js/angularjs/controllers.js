'use strict';

/* homeControlleruserFactory */
ameis
    .controller('LoginController', ['$scope', '$http', '$window', 'rootFactory', 'apiFactory', 'storageService', function ($scope, $http, $window, rootFactory, apiFactory, storageService) {

    }])

    /* consolidadoController */
    .controller('CotizacionesController', ['$scope', '$http', '$q', 'storageService', 'rootFactory', 'apiFactory', 'chartService', function ($scope, $http, $q, storageService, rootFactory, apiFactory, chartService) {
        var fecha = new Date();
        var anio = fecha.getFullYear();
        var mes = fecha.getMonth() + 1;
        var dia = fecha.getDate();
        if (mes.toString().length < 2) {
            mes = "0".concat(mes);
        }
        if (dia.toString().length < 2) {
            dia = "0".concat(dia);
        }

        $scope.proyecto = {
            'nombre': '',
            'vigencia': 0,
            'fechaVencimiento': anio + "-" + mes + "-" + dia
        };
        $scope.cotizacion = {};
        $scope.cliente = {};
        $scope.servicio = {
            'idServicio': '',
            'idTipoServicio': '',
            'tipoServicio': '',
            'nombreTipoServicio': '',
            'servicio': '',
            'precio': 0,
            'cantidad': '',
            'unidad': '',
            'total': 0
        };
        $scope.servicios = [];
        $scope.detalle = [];

        $scope.cleanServicio = function () {
            $scope.servicio = {
                'idServicio': '',
                'idTipoServicio': '',
                'tipoServicio': '',
                'nombreTipoServicio': '',
                'servicio': '',
                'precio': 0,
                'cantidad': '',
                'unidad': '',
                'total': 0
            };
        }


        //var vigenciaValue = $('#formVigencia2').val();
        //// Vigencia Slider
        $scope.changeVigencia = function () {
            var date = $('#formVencimiento').attr('now');
            date = apiFactory.sumaFecha($scope.proyecto.vigencia, date);
            $scope.proyecto.fechaVencimiento = date;
        }


        $scope.changeServicio = function () {
            if ($scope.servicio.tipoServicio != '') {
                $scope.servicio.idTipoServicio = $scope.servicio.tipoServicio;

                $http.post('/returnService', {tipoServicio: $scope.servicio.tipoServicio})
                    .then(function (response) {
                        var s = response['data'];
                        angular.forEach(s, function (value, key) {
                            if (!value.hasOwnProperty('Mensaje')) {
                                $scope.servicios.push(value);
                            }
                        })
                    });
            } else {
                $scope.cleanServicio();
                $scope.servicios = [];
            }

        };

        $scope.selectServicio = function () {
            var select = $scope.servicioSelect;

            console.log(select)
            if (select != undefined) {
                $scope.servicio.idServicio = $scope.servicios[select].Id_Servicio;
                $scope.servicio.nombreTipoServicio = $scope.servicios[select].Nombre_TipoServicio
                $scope.servicio.unidad = $scope.servicios[select].UnidadMedida;
                $scope.servicio.precio = $scope.servicios[select].Precio;
                $scope.servicio.servicio = $scope.servicios[select].Descripcion_Servicio;
            }
            else {
                $scope.servicio.servicio = '';
            }
            $scope.servicioSelect = undefined;
            $('#modalServicio').modal('hide');

        }

        $scope.changeCantidad = function () {
            $scope.servicio.total = ($scope.servicio.precio * $scope.servicio.cantidad);
        }

        $scope.searchCliente = function () {

        }

        $scope.addService = function () {
            console.log($scope.servicio.total);
            if ($scope.servicio.total != '') {
                $scope.detalle.push($scope.servicio);
                $scope.cleanServicio();
                $scope.servicios = [];
            }
        }
    }])