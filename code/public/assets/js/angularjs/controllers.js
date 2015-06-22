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

        $scope.modifiCoti = false;
        $scope.modifiDet = false;
        $scope.disableCoti = false;
        $scope.disableCli = false;
        $scope.countServ = 1;
        $scope.proyecto = {
            nombre: null,
            vigencia: 0,
            fechaVencimiento: anio + '-' + mes + '-' + dia
        };
        $scope.cotizacion = {
            numero: null
        };
        $scope.clientes = [];
        $scope.cliente = {
            rut: null,
            nombre: null,
            direccion: null,
            comuna: null,
            ciudad: null
        };
        $scope.servicio = {
            Nro_Linea: $scope.countServ,
            Id_Servicio: null,
            Id_TipoServicio: null,
            Nombre_TipoServicio: null,
            nombreTipoServicio: null,
            servicio: null,
            Precio: 0,
            Cantidad: null,
            UnidadMedida: null,
            Total: 0,
            Observaciones: null,
            Descripcion_Servicio: null
        };
        $scope.servicios = [];
        $scope.unidades = [];
        $scope.detalle = [];
        $scope.detalleTotal = {
            subtotal: 0,
            iva: 0,
            total: 0
        };
        $scope.loads = {
            cliente: {
                rut: false,
                nombre: false,
                direccion: false
            },
            cotizacion: {
                numero: false
            }
        };
        $scope.errors = {
            cliente: {
                rut: null,
                nombre: null,
                direccion: null,
                comuna: null,
                ciudad: null
            }
        };

        // CLEAN BUTTONS --------------------------------------------------------------------------------------
        // // SERVICES
        $scope.clean = function (option) {
            switch (angular.lowercase(option)) {
                case 'all':
                    $scope.countServ = 0;
                    $scope.proyecto = {
                        nombre: null,
                        vigencia: 0,
                        fechaVencimiento: anio + "-" + mes + "-" + dia
                    };
                    $scope.cotizacion = {};
                    $scope.cliente = {
                        rut: null,
                        nombre: null,
                        direccion: null,
                        comuna: null,
                        ciudad: null
                    };
                    $scope.servicios = [];
                    $scope.detalle = [];
                    $scope.detalleTotal = {
                        subtotal: 0,
                        iva: 0,
                        total: 0
                    };
                    $scope.clean('service');
                    $scope.modifiCoti = false;
                    $scope.modifiDet = false;
                    $scope.disableCoti = false;
                    $scope.disableCli = false;
                    break;
                case 'client':
                    $scope.cliente = {
                        rut: null,
                        nombre: null,
                        direccion: null,
                        comuna: null,
                        ciudad: null
                    };
                    $scope.disableCoti = false;
                    $scope.disableCli = false;
                    break;
                case 'cotization':
                    $scope.cotizacion = {};
                    break;
                case 'proyect':
                    $scope.proyecto = {
                        nombre: null,
                        vigencia: 0,
                        fechaVencimiento: anio + "-" + mes + "-" + dia
                    };
                    break;
                case 'service':
                    $scope.servicio = {
                        Nro_Linea: $scope.countServ,
                        Id_Servicio: null,
                        Id_TipoServicio: null,
                        Nombre_TipoServicio: null,
                        nombreTipoServicio: null,
                        servicio: null,
                        Precio: 0,
                        Cantidad: null,
                        UnidadMedida: null,
                        Total: 0,
                        Observaciones: null,
                        Descripcion_Servicio: null
                    };
                    $scope.modifiDet = false;
                    break;
                case 'detail':
                    $scope.detalle = [];
                    $scope.detalleTotal = {
                        subtotal: 0,
                        iva: 0,
                        total: 0
                    };
                    break;
            }
        };

        $scope.cleanServicio = function () {
            $scope.servicio = {
                Nro_Linea: $scope.countServ,
                Id_Servicio: null,
                Id_TipoServicio: null,
                Nombre_TipoServicio: null,
                nombreTipoServicio: null,
                servicio: null,
                Precio: 0,
                Cantidad: null,
                UnidadMedida: null,
                Total: 0,
                Observaciones: null,
                Descripcion_Servicio: null
            };
        };

        // // ALL
        $scope.cleanVars = function () {
            $scope.countServ = 0;
            $scope.proyecto = {
                nombre: null,
                vigencia: 0,
                fechaVencimiento: anio + "-" + mes + "-" + dia
            };
            $scope.cotizacion = {};
            $scope.cliente = {
                rut: null,
                nombre: null,
                direccion: null,
                comuna: null,
                ciudad: null
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

        // PROYECT --------------------------------------------------------------------------------------
        $scope.$watch('proyecto.vigencia', function () {
            var date = $('#formVencimiento').attr('now');
            var out = apiFactory.sumaFecha($scope.proyecto.vigencia, date);
            $scope.proyecto.fechaVencimiento = out;
        });

        // CLIENT --------------------------------------------------------------------------------------
        $scope.changeCiudades = function () {
            $http.post('/returnComunas', {Id_Ciudad: $scope.cliente.ciudad})
                .then(function (response) {
                    if (response.status == 200) {
                        response = response.data;
                        //$timeout(function() {
                        $scope.cliente.comuna = null;
                        $scope.comunas = response;
                        //}, 1000);
                    }
                });
        };

        $scope.returnClient = function (rut, nombre) {
            return $http.post('/returnClient', {rut: rut, nombre: nombre})
                .then(function (response) {
                    if (response.status == 200) {
                        response = response.data;
                        if (response.length >= 2) {
                            var c = response[0];
                            var d = response[1];

                            $http.post('/returnComunas', {Id_Ciudad: d.Id_Ciudad})
                                .then(function (response) {
                                    if (response.status == 200) {
                                        response = response.data;
                                        //$timeout(function () {
                                        $scope.cliente.comuna = null;
                                        $scope.comunas = response;
                                        $scope.cliente = {
                                            Id_Cliente: c.Id_Cliente,
                                            rut: c.Rut_Cliente + '-' + c.Dv_Cliente,
                                            nombre: c.Nombres + ' ' + c.ApellidoPat,
                                            direccion: d.Direcion,
                                            comuna: d.Id_Comuna,
                                            ciudad: d.Id_Ciudad
                                        };
                                        //}, 1000);

                                        swalService.success('Correcto', 'Cliente Cargado con Exito!');

                                        $scope.errors = {
                                            cliente: {
                                                rut: null,
                                                nombre: null,
                                                direccion: null,
                                                comuna: null,
                                                ciudad: null
                                            }
                                        };
                                    }
                                })
                                .catch(function (response) {
                                    console.error('ERROR: ', response.status, response.data);
                                });
                        }
                        if (response.length == 1) {
                            if (rut != null && rut != undefined) {
                                $scope.errors.cliente.nombre = null;
                                $scope.errors.cliente.rut = response[0].Mensaje;
                            } else {
                                $scope.errors.cliente.nombre = response[0].Mensaje;
                                $scope.errors.cliente.rut = null;
                            }
                        }
                    }
                })
                .catch(function (response) {
                    console.error('ERROR: ', response.status, response.data);
                })
                .finally(function () {
                    console.log("finally finished gists");
                });

        };

        $scope.selectCliente = function () {
            var select = $scope.clienteSelect;
            if (select != undefined) {
                $scope.cliente.Id_Cliente = $scope.clientes[select].Id_Cliente;
                $scope.cliente.rut = $scope.clientes[select].Rut_Cliente;
                $scope.cliente.nombre = $scope.clientes[select].Nombres + ' ' + $scope.clientes[select].ApellidoPat;
                $scope.cliente.direccion = $scope.clientes[select].direccion;
            }
            else {
                $scope.cliente = {};
            }

            $scope.returnClient($scope.cliente.rut)
                .then(function () {
                    $scope.clientes = [];
                    $scope.clienteSelect = undefined;
                })
                .catch(function (response) {
                    console.error('ERROR: ', response.status, response.data);
                })
                .finally(function () {
                    $scope.loads.cliente.rut = false;
                    $('#modalCliente').modal('hide');
                    $scope.disableCoti = true;
                    $scope.disableCli = false;
                });
        };

        $scope.searchClienteNombre = function () {
            var nombre = $scope.cliente.nombre;
            if (!nombre.$error) {
                $scope.clientes = [];
                if ($scope.cliente.nombre != "" || $scope.cliente.nombre.length > 0 && $scope.cliente.nombre != undefined
                ) {
                    $scope.loads.cliente.nombre = true;
                    $scope.returnClientNombre($scope.cliente.nombre)
                        .then(function () {
                            $('#modalCliente').modal('show');
                        })
                        .catch(function (response) {
                            console.error('ERROR: ', response.status, response.data);
                        });
                }
            }
        };

        $scope.searchClient = function () {
            $scope.clientes = [];

            if ($scope.cliente.sName != '' && $scope.cliente.sName != null && $scope.cliente.sName.length > 0) {
                $http.post('/returnClient', {rut: null, nombre: $scope.cliente.sName})
                    .then(function (response) {
                        if (response.status == 200) {
                            response = response.data;

                            if (response.length >= 2) {
                                angular.forEach(response, function (val, key) {
                                    if (key != parseInt(response.length - 1)) {
                                        $scope.clientes.push(val);
                                    }
                                });
                            }
                            if (response.length == 1) {
                            }
                        }
                    })
                    .catch(function (response) {
                        console.error('ERROR: ', response.status, response.data);
                    })
                    .finally(function () {
                    });
            }

            if ($scope.cliente.sRut != '' && $scope.cliente.sRut != null && $scope.cliente.sRut.length > 0) {
                $http.post('/returnClient', {rut: $scope.cliente.sRut, nombre: null})
                    .then(function (response) {
                        if (response.status == 200) {
                            response = response.data;

                            if (response.length == 3) {
                                $scope.clientes.push(response[0]);
                            }
                            if (response.length > 3) {
                                angular.forEach(response, function (val, key) {
                                    if (key != parseInt(response.length - 1)) {
                                        $scope.clientes.push(val);
                                    }
                                });
                            }
                            if (response.length < 3) {
                            }
                        }
                    })
                    .catch(function (response) {
                        console.error('ERROR: ', response.status, response.data);
                    })
                    .finally(function () {
                    });
            }
        };

        $scope.modalCliente = function () {
            $scope.loads.cliente.rut = true;
            $('#modalCliente').modal('show');
        };

        // SERVICES --------------------------------------------------------------------------------------
        $scope.changeServicio = function () {
            $scope.servicios = [];

            if ($scope.servicio.Id_TipoServicio != null) {
                $scope.servicio.Descripcion_Servicio = null;
                $scope.servicio.Precio = 0;
                $scope.servicio.UnidadMedida = null;
                $scope.servicio.Cantidad = null;
                $scope.servicio.Total = 0;
                $scope.servicio.Observaciones = null;
                $scope.searchServicio();
            } else {
                $scope.cleanServicio();
            }
        };

        $scope.searchServicio = function () {
            $http.post('/returnService', {tipoServicio: $scope.servicio.Id_TipoServicio})
                .then(function (response) {
                    //3(response)
                    var s = response['data'];
                    angular.forEach(s, function (value, key) {
                        if (!value.hasOwnProperty('Mensaje')) {
                            $scope.servicios.push(value);
                        }
                    })
                })
                .catch(function (response) {
                    console.error('ERROR: ', response.status, response.data);
                });
        };

        $scope.changeCantidad = function () {
            $scope.servicio.Total = parseInt($scope.servicio.Precio * $scope.servicio.Cantidad);
        };

        $scope.selectServicio = function () {
            var select = $scope.servicioSelect;
            if (select != undefined) {
                $http.post('/returnServUM', {Id_Servicio: $scope.servicios[select].Id_Servicio})
                    .then(function (response) {
                        if (response.status == 200) {
                            $scope.unidades = [];

                            response = response.data;
                            var length = response.length;

                            var max = parseInt(length - 1);

                            for (var i = 0; i < max; i++) {
                                $scope.unidades.push(response[i]);
                            }

                            $scope.servicio.Id_TipoServicio = $scope.servicios[select].Id_TipoServicio;
                            $scope.servicio.Id_Servicio = $scope.servicios[select].Id_Servicio;
                            $scope.servicio.Nombre_TipoServicio = $scope.servicios[select].Nombre_TipoServicio;
                            //$scope.servicio.UnidadMedida = $scope.servicios[select].UnidadMedida;
                            $scope.servicio.Precio = parseInt($scope.servicios[select].Precio);
                            $scope.servicio.Descripcion_Servicio = $scope.servicios[select].Descripcion_Servicio;
                        }
                    })
                    .catch(function (response) {
                        console.error('ERROR: ', response.status, response.data);
                    })
                    .finally(function () {
                    });
            }
            else {
                $scope.servicio.Descripcion_Servicio = null;
            }
            $scope.servicioSelect = undefined;
            $('#modalServicio').modal('hide');

        };

        // DETAIL --------------------------------------------------------------------------------------
        $scope.addService = function () {
            if ($scope.servicio.UnidadMedida != null && $scope.servicio.Total != null) {
                var index = null;
                index = $scope.detalle.indexOf($scope.servicio);
                if (index > -1) {
                    $scope.updateDetalleItem(index);
                } else {
                    $scope.countServ = $scope.countServ++;
                    $scope.detalle.push($scope.servicio);
                    var total = 0;
                    angular.forEach($scope.detalle, function (value, key) {
                        total = parseInt(total + value.Total);
                    });
                    $scope.detalleTotal = apiFactory.caculateTotal(total);
                    $scope.cleanServicio();
                    $scope.servicios = [];
                }
            }
        };

        $scope.editDetalleItem = function (d) {
            swalService.custom({
                    title: "Está seguro?",
                    text: "Deseas modificar este item?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sí, modificar",
                    cancelButtonText: "No, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $('html, body').animate({
                            scrollTop: $("#services-grid").offset().top - 80
                        }, 1000);
                        $timeout(function () {
                            var index = $scope.detalle.indexOf(d);
                            $scope.servicio = $scope.detalle[index];
                            $scope.modifiDet = true;
                            swalService.info("Cargado", "Item cargado para ser modificado.");
                        }, 1000);
                    } else {
                        swalService.error("Cancelado", "No se ha eliminado este item :)");
                    }
                });

        };

        $scope.updateDetalleItem = function (index) {
            $scope.detalle[index] = $scope.servicio;
            var total = 0;
            angular.forEach($scope.detalle, function (value, key) {
                total = parseInt(total + value.Total);
            });
            $scope.detalleTotal = apiFactory.caculateTotal(total);
            $scope.cleanServicio();
            $scope.servicios = [];
            $scope.modifiDet = false;
        };

        $scope.removeDetalleItem = function (d) {
            swalService.custom({
                    title: "Está seguro?",
                    text: "Deseas eliminar este item?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "No, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $timeout(function () {
                            var index = $scope.detalle.indexOf(d);
                            $scope.detalle.splice(index, 1);
                            var total = 0;
                            angular.forEach($scope.detalle, function (value, key) {
                                total = parseInt(total + value.Total);
                            });
                            $scope.detalleTotal = apiFactory.caculateTotal(total);
                            swalService.success("Eliminado!", "El registro eliminado.");
                        }, 1000);
                    } else {
                        swalService.error("Cancelado", "No se ha eliminado este item :)");
                    }
                });
        }

// TOTAL --------------------------------------------------------------------------------------
        $scope.closeModal = function (id) {
            switch (id) {
                case 'modalServicio':
                    $('#modalServicio').modal('hide');
                    $scope.servicios = [];
                    break;
                case 'modalCliente':
                    $('#modalCliente').modal('hide');
                    $scope.clientes = [];
                    $scope.loads.cliente.rut = false;
                    $scope.loads.cliente.nombre = false;
                    break;
            }
        };

        $scope.generateXML = function () {
            var $cabecera = {}, $detalle = [];
            var $total = 0, $iva = 0, $subtotal = 0, $descuento = 0;

            angular.forEach($scope.detalle, function (value, key) {
                $detalle.push({
                    Nro_Linea: value.Nro_Linea,
                    Cod_Producto: value.Id_Servicio,
                    Cantidad: parseInt(value.cantidad),
                    Precio: parseInt(value.Precio),
                    SubTotal: parseInt(value.Total - $descuento),
                    Descuento: parseInt($descuento),
                    Total: parseInt(value.Total),
                    EstadoLinea: 'V',
                    Observaciones: value.Descripcion_Servicio,
                    Fecha_Vencimiento: apiFactory.formatDates($scope.proyecto.fechaVencimiento) + ' ' + apiFactory.formatTimes(),
                    Id_User: rootFactory.auth.Usuario,
                    Id_Servicio: value.Id_Servicio,
                    Id_TipoServicio: value.Id_TipoServicio
                });
                $total = parseInt($total + value.Total);
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

        $scope.searchCotizacion = function () {
            var nroCotiz = $scope.cotizacion.numero;
            $scope.loads.cotizacion.numero = true;
            $http.post('/returnCotizacion', {nroCotiz: nroCotiz})
                .then(function (response) {
                    if (response.status == 200) {
                        response = response.data;

                        var length = response.length;
                        var max = parseInt(length - 1);

                        if (length >= 4) {
                            $scope.modifiCoti = true;
                            // Proyect
                            var data1 = response[0];
                            // Client
                            var data2 = response[1];
                            // Detail
                            var data3 = response[2];
                            var data4 = response[3];
                            // Message
                            var data5 = response[max];

                            $scope.clean('all');

                            try {
                                try {
                                    $scope.cotizacion = {
                                        numero: data1.Nro_Cot
                                    };
                                    $scope.proyecto = {
                                        nombre: data1.Nombre_Proyecto,
                                        vigencia: parseInt(data1.Validez)
                                    };
                                } catch (e) {
                                    console.error('ERROR: ', e);
                                    throw e;
                                }
                            } catch (e) {
                                console.error("Error!", e);
                                throw e;
                            } finally {
                            }

                            $http.post('/returnComunas', {Id_Ciudad: data2.Id_Ciudad})
                                .then(function (response) {
                                    if (response.status == 200) {
                                        response = response.data;
                                        $timeout(function () {
                                            $scope.cliente.comuna = null;
                                            $scope.comunas = response;
                                            $scope.cliente = {
                                                Id_Cliente: data2.Id_Cliente,
                                                rut: data1.Rut,
                                                nombre: data1.Nombre,
                                                direccion: data2.Direcion,
                                                ciudad: data2.Id_Ciudad,
                                                comuna: data2.Id_Comuna
                                            };
                                        }, 1000);
                                    }
                                })
                                .catch(function (response) {
                                    console.error('ERROR: ', response.status, response.data);
                                });

                            try {
                                try {
                                    $scope.servicio = {
                                        Id_TipoServicio: data4.Id_TipoServicio
                                    };
                                } catch (e) {
                                    console.error('ERROR: ', e);
                                    throw e;
                                }
                            } catch (e) {
                                console.error('ERROR: ', e);
                                throw e;
                            } finally {
                                $scope.searchServicio();
                            }

                            $http.post('/returnServUM', {Id_Servicio: data3.Id_Servicio})
                                .then(function (response) {
                                    if (response.status == 200) {
                                        response = response.data;
                                        $scope.unidades = response;
                                    }
                                })
                                .catch(function (response) {
                                    console.error('ERROR: ', response.status, response.data);
                                })
                                .finally(function () {
                                });

                            try {
                                try {
                                    $scope.servicio = {
                                        Nro_Linea: data3.Nro_Linea,
                                        Id_Servicio: data3.Id_Servicio,
                                        Id_TipoServicio: data3.Id_TipoServicio,
                                        Nombre_TipoServicio: data3.Nombre_TipoServicio,
                                        Precio: data3.Precio,
                                        Cantidad: data3.Cantidad,
                                        UnidadMedida: data3.UnidadMedida,
                                        Total: data3.Total,
                                        Descripcion_Servicio: data3.Descripcion_Servicio,
                                        Observaciones: data3.Observaciones
                                    };
                                } catch (e) {
                                    console.error('ERROR: ', e);
                                    throw e;
                                }
                            } catch (e) {
                                console.error('ERROR: ', e);
                                throw e;
                            } finally {
                                $scope.addService();
                            }

                            swalService.success(data5.Mensaje, 'Cotización Cargada');
                            $scope.disableCoti = false;
                            $scope.disableCli = true;
                        } else {
                            if (response[max].hasOwnProperty('Mensaje')) {
                                swalService.error('Error', response[max].Mensaje);
                            }
                            $scope.clean('all');
                            $scope.modifiCoti = false;
                            $scope.disableCoti = false;
                            $scope.disableCli = false;
                        }
                    }
                })
                .catch(function (response) {
                    console.error('ERROR: ', response.status, response.data);
                })
                .finally(function () {
                    $scope.loads.cotizacion.numero = false;
                });
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
                    $http.post('/saveCotizacion', {xml: $xml})
                        .then(function (response) {
                            if (response.status == 200) {
                                response = response.data.data;
                                var length = response.length;
                                if (length >= 2) {
                                    var max = parseInt(length - 1);
                                    var message = response[max];
                                    if (angular.lowercase(message.Mensaje) == 'fallo') {
                                        swalService.error("Error", "Error al guardar la cotización.");
                                    } else {
                                        $scope.cleanVars();
                                        $scope.disableCoti = false;
                                        $scope.disableCli = false;
                                        swalService.success("Guardado!", "Cotización generada correctamente.");
                                    }
                                }
                            }
                        })
                        .catch(function (response) {
                            console.error('ERROR: ', response.status, response.data);
                        });
                });
            }
        };

// TOOLS --------------------------------------------------------------------------------------
        $scope.$watch('modifiCoti', function () {
            var a = ['fa-pencil-square-o', 'Modificar', 'btn-info'];
            var b = ['fa-check', 'Guardar', 'btn-danger'];
            $scope.btnSave = $scope.modifiCoti ? a : b;
        });

        $scope.$watch('modifiDet', function () {
            var a = ['fa-pencil', 'Modificar', 'btn-info'];
            var b = ['fa-plus', 'Agregar', 'btn-success'];
            $scope.btnAdd = $scope.modifiDet ? a : b;
        });

        $scope.isNew = function () {
            if ($scope.cotizacion.numero != null && ($scope.cliente.rut != null || $scope.cliente.nombre != null)) {
                $scope.disableCoti = false;
                $scope.disableCli = true;
            }
            else if ($scope.cotizacion.numero == null && ($scope.cliente.rut != null || $scope.cliente.nombre != null)) {
                $scope.disableCoti = true;
                $scope.disableCli = false;
            }
            else if ($scope.cotizacion.numero != null && ($scope.cliente.rut == null || $scope.cliente.nombre == null)) {
                $scope.disableCoti = false;
                $scope.disableCli = true;
            }
            else if ($scope.cotizacion.numero == null && ($scope.cliente.rut == null || $scope.cliente.nombre == null)) {
                $scope.disableCoti = false;
                $scope.disableCli = false;
            }
            else {
                $scope.disableCoti = false;
                $scope.disableCli = false;
            }
        };
    }])
;