<!DOCTYPE html>
<html lang="en" ng-app="productos">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Pizzeria Totas</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="home/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="home/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="home/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="home/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="home/css/font-awesome.min.css">


    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="home/css/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body ng-controller="controlproductos">
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="/"><i class="fa fa-phone"></i> 947 319 759</a></li>
                    <li><a href="/"><i class="fa fa-envelope-o"></i> pizzatotas@email.com</a></li>
                    <li><a href="/"><i class="fa fa-map-marker"></i> A.v Meiggs #1784</a></li>
                </ul>

            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="/" class="logo">
                                <h1>PIZERRIA TOTAS</h1>
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <input class="input" placeholder="Buscar aquí" ng-change="buscar()" ng-model="buscando" name="buscando">
                                <button class="search-btn"><a href="#seccionpizzas" style="color:white">Buscar</a></button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">


                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Carrito</span>
                                    <div class="qty">@{{cantidadproductocarrito}}</div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <div class="product-widget" ng-repeat="item in carrito track by $index">
                                            <div class="product-img">
                                                <img src="/storage/@{{item.foto}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="/">@{{item.nombre}}</a></h3>
                                                <h4 class="product-price"><span class="qty">@{{item.unidades}}x</span> S/ .@{{item.precio}}
                                                </h4>
                                            </div>
                                            <button ng-click="eliminar(item)" class="delete"><i
													class="fa fa-close"></i></button>
                                        </div>


                                    </div>
                                    <div class="cart-summary">
                                        <h5>SUBTOTAL: @{{total}}</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="{{URL::to('/carrito')}}">Ver carrito</a>
                                        <a href="">Pagar <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="/">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="/">Inicio</a></li>
                    <li><a href="/">Información</a></li>

                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6" ng-repeat="item in ofertas">
                    <a href="#seccionpizzas">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="home/@{{item.foto}}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>@{{item.descripcion}}</item></h3>
                            <a href="/" class="cta-btn">Comprar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    </a>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">PIZZAS</h2>
                        <div class="section-nav">

                        </div>
                    </div>
                </div>




                <div class="col-md-12" id="seccionpizzas">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2" *ngIf="productos.length">
                                    <!-- product -->
                                    <div class="product"  ng-repeat="item in productos  track by $index">
                                        <div class="product-img">
                                            <img src="storage/@{{item.foto}}" style="height:30vh; object-fit:cover" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">Nuevo</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Categorias</p>
                                            <h3 class="product-name"><a href="/">@{{item.nombre|uppercase}}</a></h3>
                                            <h4 class="product-price">S/ @{{item.precio}}</h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
														class="tooltipp">Me gusta</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span
														class="tooltipp">Comparar</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
														class="tooltipp">Vista rápida</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn" ng-click="agregar_carrito(item)"><i class="fa fa-shopping-cart"></i> Agregar a carrito </button>
                                        </div>
                                    </div>

                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->







            </div>
            <!-- /product -->

            <!-- product -->

            <!-- /product -->
        </div>
        <div id="slick-nav-2" class="products-slick-nav"></div>
    </div>
    <!-- /tab -->
    </div>
    </div>
    </div>
    <!-- /Products tab & slick -->
    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->

    <!-- product widget -->





    <!-- /container -->


    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Información</h3>
                            <p>Terminos y Condiciones Online</p>
                            <p>Comprobante Electrónico</p>
                            <p>Linea Ética</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>A.v meiggs #1784</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>947-319-759</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>pizzatotas@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Menú</h3>
                            <ul class="footer-links">
                                <li><a href="#">Combos</a></li>
                                <li><a href="#">Ofertas</a></li>
                                <li><a href="#">Pizzas</a></li>
                                <li><a href="#">Pastas</a></li>
                                <li><a href="#">Salsas</a></li>
                                <li><a href="#">Entradas</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">ayuda y servicio</h3>
                            <ul class="footer-links">
                                <li><a href="#">Politica de Privacidad</a></li>
                                <li><a href="#">Condiciones de uso</a></li>
                                <li><a href="{{URL::to('/reclamos')}}">Libro de Reclamaciones</a></li>
                                <li><a href="#">Trabaja con nosotros</a></li>
                                <li><a href="#">Politicas de Delivery</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">conectate con pizza totas</h3>
                            <ul class="footer-links">
                                <li><a href="/">Siguenos en Facebook</a></li>
                                <li><a href="/">Siguenos en Instagram</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="/"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="/"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="/"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="/"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="/"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="/"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;
							<script>document.write(new Date().getFullYear());</script> All rights reserved | This
							template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
								href="home/https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="home/js/jquery.min.js"></script>
    <script src="home/js/bootstrap.min.js"></script>
    <script src="home/js/slick.min.js"></script>
    <script src="home/js/nouislider.min.js"></script>
    <script src="home/js/jquery.zoom.min.js"></script>
    <script src="home/js/main.js"></script>
    <script src="home/js/app.js"></script>

</body>

</html>