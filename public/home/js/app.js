var app = angular.module('productos', []);
app.controller('controlproductos', function ($scope, $http) {

    $scope.ofertas = [{
        id: 1,
        nombre: "HUT PACK FAMILIAR",
        precio: 49.90,
        descripcion: "PROMOCION 1",
        foto: "./img/1.jpg",
        estado: "activo"
    }, {
        id: 2,
        nombre: "HUT COMPLETO MEDIADO",
        precio: 38.90,
        descripcion: "PROMOCION 2",
        foto: "./img/2.png",
        estado: "activo"
    },
    {
        id: 3,
        nombre: "COMBO HUT CHEESE",
        precio: 45.90,
        descripcion: "PROMOCION 3",
        foto: "./img/6.png",
        estado: "activo"
    },

    ]

    $http.get("/admin/productos").then(response => {
        response.data.forEach(element => {
            element.unidades = 1;
        });
        $scope.productos2 = response.data
        let evento = new CustomEvent("pructoscargados", { detail: "xcvemmllahshsjdnohdstensdjakmga" });
        document.dispatchEvent(evento);
        $scope.buscar();
    });
    $scope.buscando = '';
    $scope.productos = [];
    $scope.buscar = function () {
        $scope.productos = $scope.productos2.filter((e) => e.nombre.startsWith($scope.buscando));
        let evento = new CustomEvent("pructoscargados", { detail: "xcvemmllahshsjdnohdstensdjakmga" });
        document.dispatchEvent(evento);
    }





    $scope.cantidadproductocarrito = 0;

    $scope.carrito = [];
    if (localStorage.getItem("productos_grupo4")) {
        $scope.carrito = JSON.parse(localStorage.getItem("productos_grupo4"));
    }
    $scope.cantidadproductocarrito = $scope.carrito.length;

    $scope.agregar_carrito = function (item) {

        let existe = false;
        $scope.carrito.forEach(data => {
            if (item.id == data.id) {
                data.unidades += 1;
                existe = true;
            }
        })
        if (!existe) $scope.carrito.push(item);
        localStorage.setItem("productos_grupo4", JSON.stringify($scope.carrito));
        console.log($scope.carrito);
        $scope.cantidadproductocarrito = $scope.carrito.length;
    }
    $scope.total = 0;
    $scope.calculartotal = function () {
        $scope.total = 0;
        $scope.carrito.forEach(element => {
            $scope.total += parseFloat(element.precio) * element.unidades;
        });
    }
    $scope.calculartotal();
    $scope.eliminar = function (eliminar) {
        var indice = 0;
        $scope.carrito.forEach((val, index) => {
            if (val.id == eliminar.id) {
                indice = index;
                return 0;
            }
        })
        $scope.carrito.splice(indice, 1);

        localStorage.setItem("productos_grupo4", JSON.stringify($scope.carrito));
        alert("Eliminado del carrito");
        $scope.cantidadproductocarrito = $scope.carrito.length;

        $scope.calculartotal();
    }
})
app.controller("controlcarrito", function ($scope, $http) {
    $scope.cliente = {
        nombres: "",
        apellidos: "",
        direccion: "",
        dni: "",
        correo: "",
        telefono: "",
        hora: ""
    }
    $scope.registrando = false;
    $scope.carrito = [];
    if (localStorage.getItem("productos_grupo4")) {
        $scope.carrito = JSON.parse(localStorage.getItem("productos_grupo4"));
    }
    $scope.cantidadproductocarrito = $scope.carrito.length;
    $scope.total = 0;
    $scope.calculartotal = function () {
        $scope.total = 0;
        $scope.carrito.forEach(element => {
            $scope.total += parseFloat(element.precio) * element.unidades;
        });
    }
    $scope.calculartotal();
    console.log($scope.carrito)
    $scope.CrearPedido = function () {

        $scope.registrando = true;
        let horaf = new Date($scope.cliente.hora);
        let hora = horaf.getHours();
        let min = horaf.getMinutes();
        let hf = hora + ":" + min + ":00";
        $scope.cliente.hora = hf;

        data = {
            detalles: $scope.carrito,
            cliente: $scope.cliente
        }

        $http({
            url: "/admin/pedido",
            method: "post",
            data: data
        }).then(response => {
            console.log(response.data);
            if (response.data.save) {
                $scope.cliente = {
                    nombres: "",
                    apellidos: "",
                    direccion: "",
                    dni: "",
                    correo: "",
                    telefono: "",
                    hora: ""
                }
                $scope.carrito = [];
                localStorage.setItem("productos_grupo4", JSON.stringify($scope.carrito));
            }
            $scope.registrando = false;

            console.log(response);
        }).catch(error => {
            console.log(error);
            $scope.registrando = false;
        });
    }
    $scope.eliminar = function (eliminar) {
        var indice = 0;
        $scope.carrito.forEach((val, index) => {
            if (val.id == eliminar.id) {
                indice = index;
                return 0;
            }
        })
        $scope.carrito.splice(indice, 1);

        localStorage.setItem("productos_grupo4", JSON.stringify($scope.carrito));

        $scope.cantidadproductocarrito = $scope.carrito.length;

        $scope.calculartotal();
    }


    $('.products-slick').each(function () {
        var $this = $(this),
            $nav = $this.attr('data-nav');

        $this.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            infinite: true,
            speed: 300,
            dots: false,
            arrows: true,
            appendArrows: $nav ? $nav : false,
            responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            ]
        });
    });
})