'use strict';

/* homeControlleruserFactory */
ameis
    .controller('LoginController', ['$scope', '$http', '$window', 'rootFactory', 'apiFactory', 'storageService', function ($scope, $http, $window, rootFactory, apiFactory, storageService) {

    }])

    /* consolidadoController */
    .controller('CotizacionesController', ['$scope', '$http', '$q', 'storageService', 'rootFactory', 'apiFactory', '$timeout', 'swalService', function ($scope, $http, $q, storageService, rootFactory, apiFactory, $timeout, swalService) {
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

        $scope.countServ = 1;
        $scope.proyecto = {
            nombre: '',
            vigencia: 0,
            fechaVencimiento: anio + "-" + mes + "-" + dia
        };
        $scope.cotizacion = {};
        $scope.cliente = {
            rut: '',
            nombre: '',
            direccion: '',
            comuna: '',
            ciudad: ''
        };
        $scope.servicio = {
            Nro_Linea: $scope.countServ,
            idServicio: '',
            idTipoServicio: '',
            tipoServicio: '',
            nombreTipoServicio: '',
            servicio: '',
            precio: 0,
            cantidad: '',
            unidad: '',
            total: 0,
            descripcion: ''
        };
        $scope.servicios = [];
        $scope.detalle = []
        $scope.detalleTotal = {
            subtotal: 0,
            iva: 0,
            total: 0
        };

        $scope.cleanServicio = function () {
            $scope.servicio = {
                Nro_Linea: $scope.countServ,
                idServicio: '',
                idTipoServicio: '',
                tipoServicio: '',
                nombreTipoServicio: '',
                servicio: '',
                precio: 0,
                cantidad: '',
                unidad: '',
                total: 0,
                descripcion: ''
            };
        };

        $scope.cleanVars = function () {
            $scope.countServ = 0;
            $scope.proyecto = {
                nombre: '',
                vigencia: 0,
                fechaVencimiento: anio + "-" + mes + "-" + dia
            };
            $scope.cotizacion = {};
            $scope.cliente = {
                rut: '',
                nombre: '',
                direccion: '',
                comuna: '',
                ciudad: ''
            };
            $scope.servicios = [];
            $scope.detalle = [];
            $scope.detalleTotal = {
                subtotal: 0,
                iva: 0,
                total: 0
            };
            $scope.cleanServicio();
        };

        $scope.changeVigencia = function () {
            var date = $('#formVencimiento').attr('now');
            date = apiFactory.sumaFecha($scope.proyecto.vigencia, date);
            $scope.proyecto.fechaVencimiento = date;
        };

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

        //$scope.$watch('cliente.ciudad', function (newVal, oldVal) {
        //    console.log(newVal, oldVal)
        //    //if (oldVal == newVal) return;
        //    //alert('here');
        //}, true);

        $scope.changeCiudades = function () {
            $http.post('/returnComunas', {Id_Ciudad: $scope.cliente.ciudad})
                .then(function (response) {
                    //console.log(response)
                    if (response.status == 200) {
                        response = response.data;
                        //$timeout(function() {
                        $scope.cliente.comuna = '';
                        $scope.comunas = response;
                        //}, 1000);
                    }
                });
        };

        $scope.selectServicio = function () {
            var select = $scope.servicioSelect;

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

        };

        $scope.changeCantidad = function () {
            $scope.servicio.total = parseInt($scope.servicio.precio * $scope.servicio.cantidad);
        };

        $scope.searchCliente = function () {
            if ($scope.cliente.rut != '' || !$scope.cliente.rut.empty() || $scope.cliente.rut != undefined) {
                $http.post('/returnClient', {rut: $scope.cliente.rut})
                    .then(function (response) {
                        console.log(response)
                        if (response.status == 200) {
                            response = response.data;
                            var c = response[0];
                            var d = response[1];
                            $scope.cliente = {
                                Id_Cliente: c.Id_Cliente,
                                rut: c.Rut_Cliente + '-' + c.Dv_Cliente,
                                nombre: c.Nombres + ' ' + c.ApellidoPat,
                                direccion: d.Direcion,
                                comuna: d.Id_Comuna,
                                ciudad: d.Id_Ciudad
                            };
                        }
                    });
            }
        };

        $scope.addService = function () {
            if ($scope.servicio.total != '') {
                $scope.countServ = $scope.countServ++;
                $scope.detalle.push($scope.servicio)
                var total = 0;
                angular.forEach($scope.detalle, function (value, key) {
                    total = total + value.total;
                });
                $scope.detalleTotal = apiFactory.caculateTotal(total);
                $scope.cleanServicio();
                $scope.servicios = [];
            }
        };

        $scope.generateXML = function () {
            var $cabecera = {}, $detalle = [];
            var $total = 0, $iva = 0, $subtotal = 0, $descuento = 0;

            angular.forEach($scope.detalle, function (value, key) {
                console.log(key + ': ' + value);

                $detalle.push({
                    Nro_Linea: value.Nro_Linea,
                    Cod_Producto: value.idServicio,
                    Cantidad: parseInt(value.cantidad),
                    Precio: parseInt(value.precio),
                    SubTotal: parseInt(value.total - $descuento),
                    Descuento: parseInt($descuento),
                    Total: parseInt(value.total),
                    EstadoLinea: 'V',
                    Observaciones: value.descripcion,
                    Fecha_Vencimiento: apiFactory.formatDates($scope.proyecto.fechaVencimiento) + ' ' + apiFactory.formatTimes(),
                    Id_User: rootFactory.auth.Id_Usuario
                });
                $total = parseInt($total + value.total);
            });

            var totals = apiFactory.caculateTotal($total);

            $cabecera = {
                Descripcion: $scope.proyecto.nombre,
                Estado: 'V',
                Fecha_Vencimiento: apiFactory.formatDates($scope.proyecto.fechaVencimiento) + ' ' + apiFactory.formatTimes(),
                Id_User: rootFactory.auth.Id_Usuario,
                Id_Cliente: $scope.cliente.Id_Cliente,
                Observaciones: 'ALEXIS',
                Validez: $scope.proyecto.vigencia,
                Subtotal: parseInt(totals.subtotal),
                Iva: parseInt(totals.iva),
                Total: parseInt(totals.total),
                Descuento: parseInt($descuento)
            };

            return {
                cabecera: $cabecera,
                detalle: $detalle
            };
        };

        $scope.saveCotizacion = function () {
            if ($scope.detalle.length > 0) {

                swalService.custom({
                    title: "Estas seguro?",
                    text: "Deseas generar esta cotización.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sí!",
                    closeOnConfirm: false
                }, function () {
                    var $xml = $scope.generateXML();
                    console.log($xml)
                    $http.post('/saveCotizacion', {xml: $xml})
                        .then(function (response) {
                            //$scope.cleanVars();
                            swalService.success("Guardado!", "Cotización generada correctamente.");
                        });
                });
            }
        };
    }])
;