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
        $scope.cotizacion = {
            numero: ''
        };
        $scope.clientes = [];
        $scope.cliente = {
            rut: '',
            nombre: '',
            direccion: '',
            comuna: '',
            ciudad: ''
        };
        $scope.servicio = {
            Nro_Linea: $scope.countServ,
            Id_Servicio: '',
            Id_TipoServicio: '',
            Nombre_TipoServicio: '',
            nombreTipoServicio: '',
            servicio: '',
            Precio: 0,
            Cantidad: '',
            UnidadMedida: '',
            Total: 0,
            Observaciones: '',
            Descripcion_Servicio: ''
        };
        $scope.servicios = [];
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
                rut: '',
                nombre: '',
                direccion: '',
                comuna: '',
                ciudad: ''
            }
        };

        // CLEAN BUTTONS
        // // SERVICES
        $scope.clean = function (option) {
            switch (angular.lowercase(option)) {
                case 'all':
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
                    break;
                case 'client':
                    $scope.cliente = {
                        rut: '',
                        nombre: '',
                        direccion: '',
                        comuna: '',
                        ciudad: ''
                    };
                    break;
                case 'cotization':
                    $scope.cotizacion = {};
                    break;
                case 'proyect':
                    $scope.proyecto = {
                        nombre: '',
                        vigencia: 0,
                        fechaVencimiento: anio + "-" + mes + "-" + dia
                    };
                    break;
                case 'service':
                    $scope.servicio = {
                        Nro_Linea: $scope.countServ,
                        Id_Servicio: '',
                        Id_TipoServicio: '',
                        Nombre_TipoServicio: '',
                        nombreTipoServicio: '',
                        servicio: '',
                        Precio: 0,
                        Cantidad: '',
                        UnidadMedida: '',
                        Total: 0,
                        Observaciones: '',
                        Descripcion_Servicio: ''
                    };
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
        }

        $scope.cleanServicio = function () {
            $scope.servicio = {
                Nro_Linea: $scope.countServ,
                Id_Servicio: '',
                Id_TipoServicio: '',
                Nombre_TipoServicio: '',
                nombreTipoServicio: '',
                servicio: '',
                Precio: 0,
                Cantidad: '',
                UnidadMedida: '',
                Total: 0,
                Observaciones: '',
                Descripcion_Servicio: ''
            };
        };

        // // ALL
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

        // PROYECT
        $scope.$watch('proyecto.vigencia', function () {
            var date = $('#formVencimiento').attr('now');
            date = apiFactory.sumaFecha($scope.proyecto.vigencia, date);
            $scope.proyecto.fechaVencimiento = date;
        });

        // CLIENT
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

        $scope.searchCliente = function () {
            if ($scope.cliente.rut != '' && !$scope.cliente.rut.length > 0 && $scope.cliente.rut != undefined) {
                $http.post('/returnClient', {rut: $scope.cliente.rut})
                    .then(function (response) {
                        //console.log(response)
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
                                        $timeout(function () {
                                            $scope.cliente.comuna = '';
                                            $scope.comunas = response;
                                            $scope.cliente = {
                                                Id_Cliente: c.Id_Cliente,
                                                rut: c.Rut_Cliente + '-' + c.Dv_Cliente,
                                                nombre: c.Nombres + ' ' + c.ApellidoPat,
                                                direccion: d.Direcion,
                                                comuna: d.Id_Comuna,
                                                ciudad: d.Id_Ciudad
                                            };
                                        }, 1000);


                                        swalService.success('Correcto', 'Cliente Cargado con Exito!');

                                        $scope.errors = {
                                            cliente: {
                                                rut: '',
                                                nombre: '',
                                                direccion: '',
                                                comuna: '',
                                                ciudad: ''
                                            }
                                        };
                                    }
                                })
                                .catch(function (response) {
                                    console.error('Gists error', response.status, response.data);
                                });
                        }
                        if (response.length == 1) {
                            if (rut != null && rut != undefined) {
                                $scope.errors.cliente.nombre = '';
                                $scope.errors.cliente.rut = response[0].Mensaje;
                            } else {
                                $scope.errors.cliente.nombre = response[0].Mensaje;
                                $scope.errors.cliente.rut = '';
                            }
                        }
                    }
                })
                .catch(function (response) {
                    console.error('Gists error', response.status, response.data);
                })
                .finally(function () {
                    console.log("finally finished gists");
                });

        };

        $scope.returnClientNombre = function (nombre) {
            return $http.post('/returnClient', {rut: null, nombre: nombre})
                .then(function (response) {
                    if (response.status == 200) {
                        response = response.data;

                        if (response.length >= 2) {
                            angular.forEach(response, function (val, key) {
                                if (key != parseInt(response.length - 1)) {
                                    console.info(val)
                                    $scope.clientes.push(val);
                                }
                            });
                        }
                        if (response.length == 1) {
                        }
                    }
                })
                .catch(function (response) {
                    console.error('Gists error', response.status, response.data);
                })
                .finally(function () {
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
                    console.error('Gists error', response.status, response.data);
                })
                .finally(function () {
                    $scope.loads.cliente.nombre = false;
                    $('#modalCliente').modal('hide');
                });
        };

        $scope.searchClienteRut = function () {
            //console.log($scope.cliente.rut)
            var rut = $scope.cliente.rut;
            if (!rut.$error) {
                //console.log(rut != "" || rut.length > 0 && rut != undefined)
                if ($scope.cliente.rut != "" || $scope.cliente.rut.length > 0 && $scope.cliente.rut != undefined
                ) {
                    $scope.loads.cliente.rut = true;
                    $scope.returnClient($scope.cliente.rut, null)
                        .then(function () {
                            $scope.loads.cliente.rut = false;
                        })
                        .catch(function (response) {
                            console.error('Gists error', response.status, response.data);
                        });
                }
            }
        };

        $scope.modalClienteRut = function () {
            swalService.custom({
                title: "Buscar Cliente",
                text: "Ingrese el RUT del Cliente a buscar...",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "RUT"
            }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("Debes ingresar algún valor!");
                    return false
                }
                if (inputValue != "" || inputValue > 0 && inputValue != undefined) {
                    $scope.loads.cliente.rut = true;
                    $scope.returnClient(inputValue, null)
                        .then(function () {
                            $scope.loads.cliente.rut = false;
                        })
                        .catch(function (response) {
                            console.error('Gists error', response.status, response.data);
                        });


                }
            });
        };

        $scope.searchClienteNombre = function () {
            //console.log($scope.cliente.rut)
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
                            console.error('Gists error', response.status, response.data);
                        });
                }
            }
        };

        // SERVICES
        $scope.changeServicio = function () {
            $scope.servicios = [];

            if ($scope.servicio.Id_TipoServicio != '') {
                $scope.servicio.Descripcion_Servicio = '';
                $scope.servicio.Precio = 0;
                $scope.servicio.UnidadMedida = '';
                $scope.servicio.Cantidad = '';
                $scope.servicio.Total = 0;
                $scope.servicio.Observaciones = '';
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
                    console.error('Gists error', response.status, response.data);
                });
        };

        $scope.changeCantidad = function () {
            $scope.servicio.Total = parseInt($scope.servicio.Precio * $scope.servicio.Cantidad);
        };

        $scope.selectServicio = function () {
            var select = $scope.servicioSelect;
            //console.log(select, $scope.servicios);
            if (select != undefined) {
                $scope.servicio.Id_TipoServicio = $scope.servicios[select].Id_TipoServicio;
                $scope.servicio.Id_Servicio = $scope.servicios[select].Id_Servicio;
                $scope.servicio.Nombre_TipoServicio = $scope.servicios[select].Nombre_TipoServicio;
                $scope.servicio.UnidadMedida = $scope.servicios[select].UnidadMedida;
                $scope.servicio.Precio = parseInt($scope.servicios[select].Precio);
                $scope.servicio.Descripcion_Servicio = $scope.servicios[select].Descripcion_Servicio;
            }
            else {
                $scope.servicio.Descripcion_Servicio = '';
            }
            $scope.servicioSelect = undefined;
            $('#modalServicio').modal('hide');

        };

        // DETAIL
        $scope.addService = function () {
            if ($scope.servicio.Total != '') {
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
        };

        $scope.removeItem = function (index) {
            $scope.detalle.splice(index, 1);
            var total = 0;
            angular.forEach($scope.detalle, function (value, key) {
                total = parseInt(total + value.Total);
            });
            $scope.detalleTotal = apiFactory.caculateTotal(total);
        };

        // TOTAL
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
                //console.log(key + ': ' + value);
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
                        console.log(response);


                        var length = response.length;
                        if (length >= 2) {
                            $scope.toggle = !$scope.toggle;
                            // Proyect
                            var data1 = response[0];
                            // Client
                            var data2 = response[1];
                            // Detail
                            var data3 = response[2];
                            var data4 = response[3];
                            // Message
                            var max = parseInt(length - 1);
                            var data5 = response[max];

                            //$timeout(function () {
                            $scope.cleanVars();

                            $scope.cotizacion = {
                                numero: data1.Nro_Cot
                            };

                            $scope.proyecto = {
                                nombre: data1.Nombre_Proyecto,
                                vigencia: parseInt(data1.Validez)
                            };

                            $http.post('/returnComunas', {Id_Ciudad: data2.Id_Ciudad})
                                .then(function (response) {
                                    if (response.status == 200) {
                                        response = response.data;
                                        $timeout(function () {
                                            $scope.cliente.comuna = '';
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
                                    console.error('Gists error', response.status, response.data);
                                });

                            try {
                                try {
                                    $scope.servicio = {
                                        Id_TipoServicio: data4.Id_TipoServicio
                                    };

                                } catch (e) {
                                    console.log("Got an error!", e);
                                    throw e; // rethrow to not marked as handled
                                }
                                // do more stuff with res
                            } catch (e) {
                                // handle errors in processing or in error.
                                console.log("Error!", e);
                                throw e;
                            } finally {
                                $scope.searchServicio();

                            }

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
                                    console.log("Got an error!", e);
                                    throw e; // rethrow to not marked as handled
                                }
                                // do more stuff with res
                            } catch (e) {
                                // handle errors in processing or in error.
                                console.log("Error!", e);
                                throw e;
                            } finally {
                                $scope.addService();
                            }

                            //}, 1250);
                            swalService.success(data5.Mensaje, 'Cotización Cargada');
                            $scope.toggle = !$scope.toggle;

                        } else {
                            swalService.error('Error', response[0].Mensaje);
                            $scope.cleanVars();
                        }
                    }
                })
                .catch(function (response) {
                    console.error('Gists error', response.status, response.data);
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
                    //console.log($xml)
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
                                        swalService.success("Guardado!", "Cotización generada correctamente.");
                                    }
                                }
                            }
                        })
                        .catch(function (response) {
                            console.error('Gists error', response.status, response.data);
                        });
                });
            }
        };

        // TOOLS
        $scope.toggle = true;
        $scope.$watch('toggle', function () {
            var a = ['fa-check', 'Guardar', 'btn-danger'];
            var b = ['fa-pencil-square-o', 'Modificar', 'btn-info'];
            $scope.btnSave = $scope.toggle ? a : b;
        });
    }]);