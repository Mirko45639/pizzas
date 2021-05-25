var app = angular.module("pedido", []);
app.controller("controlCrearPedido", function($scope, $http) {
    $scope.productos = [];
    $scope.cliente = {
        nombres: "",
        apellidos: "",
        direccion: "",
        dni: "",
        correo: "",
        telefono:"",
        hora: ""
    }
    $scope.vista = "parte1"
    $scope.mensaje = "hola  mundo en español";
    $http({
        url: "/admin/productos",
        method: "get"
    }).then(response => {

        response.data.forEach(element => {
            element.selected = false;
            element.unidades = 1;
        });
        $scope.productos = response.data;

    }).catch(error => console.log(error));
    $scope.selecccionados = [];
    $scope.totalpedido = 0;
    $scope.paso2 = function() {
        let seleccionados = $scope.productos.filter(p => p.selected);
        $scope.selecccionados = seleccionados;
        $scope.selecccionados.forEach(s => {
            $scope.totalpedido += parseFloat(s.precio) * s.unidades;
        })
        $scope.vista = "parte2";
    }
    $scope.CrearPedido = function() {
        let horaf = new Date($scope.cliente.hora);
        let hora = horaf.getHours();
        let min = horaf.getMinutes();
        let hf = hora + ":" + min + ":00";
        $scope.cliente.hora = hf;

        data = {
            detalles: $scope.selecccionados,
            cliente: $scope.cliente
        }
        $http({
            url: "/admin/pedido",
            method: "post",
            data: data
        }).then(response => {
            console.log(response.data);
            if (response.data.save) {
                window.location.href = "/admin/pedido";
            } else {

            }

            console.log(response);
        }).catch(error => console.log(error));
    }
})
app.controller("controlEditarPedido", function($scope, $http) {
    $scope.productos = [];
    $scope.cliente = {
        nombres: "",
        apellidos: "",
        direccion: "",
        telefono:"",
        dni: "",
        correo: "",
        hora: ""
    }
    $scope.pedido = {};
    $scope.obtenerUrl = function() {
        var ubicacion = location.href;
        var array = ubicacion.split("/");
        let url = "";
        if (array.length > 2) {
            url = array[array.length - 2];
            return url;
        }
        return "";
    }

    $scope.url = $scope.obtenerUrl();
    if ($scope.url != "") {
        $http({ url: `/admin/editar/reserva/${$scope.url}`, method: "PUT" }).then(response => {
            let datos = response.data;
            datos.productos.forEach(element => {
                element.selected = false;
                element.unidades = 1;
            });
            $scope.pedido = datos;
            $scope.productos = datos.productos;
            $scope.cliente = datos.cliente;
            let horaf = new Date();
            let af = datos.hora.split(":");
            horaf.setHours(parseInt(af[0]));
            horaf.setMinutes(parseInt(af[1]));
            horaf.setSeconds(0);
            horaf.setMilliseconds(0);
            $scope.cliente.hora = horaf;
            console.log($scope.productos);
            $scope.productos.forEach(p => {
                let detalle = datos.detalles.find(d => p.id == d.producto_id);
                if (detalle) {
                    p.selected = true;
                    p.unidades = detalle.cantidad;
                }
            })
        }).catch(error => {
            console.log(error);
        })
    }
    $scope.vista = "parte1"

    $scope.selecccionados = [];
    $scope.totalpedido = 0;
    $scope.paso2 = function() {
        let seleccionados = $scope.productos.filter(p => p.selected);
        $scope.selecccionados = seleccionados;
        $scope.selecccionados.forEach(s => {
            $scope.totalpedido += parseFloat(s.precio) * s.unidades;
        })
        $scope.vista = "parte2";
    }
    $scope.EditarPedido = function() {
        let horaf = new Date($scope.cliente.hora);
        let hora = horaf.getHours();
        let min = horaf.getMinutes();
        let hf = hora + ":" + min + ":00";
        $scope.cliente.hora = hf;
        data = {
            id: $scope.pedido.id,
            detalles: $scope.selecccionados,
            cliente: $scope.cliente
        }
        $http({
            url: `/admin/pedido/${$scope.pedido.id}`,
            method: "put",
            data: data
        }).then(response => {
            if (response.data.save) {
                window.location.href = "/admin/pedido";
            } else {}
            console.log(response);
        }).catch(error => console.log(error));
    }
})