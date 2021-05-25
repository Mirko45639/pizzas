<!DOCTYPE html>
<html lang="en" ng-app="productos">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>

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
</head>

<body ng-controller="controlcarrito">
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
					<div class="col-md-6">
						<div class="header-search">
							<form>
								<input class="input" placeholder="Buscar Aquí">
								<button class="search-btn">Buscar</button>
							</form>
						</div>
					</div>
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
					
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
												<h4 class="product-price"><span class="qty">@{{item.unidades}}x</span> S/ .@{{item.precio}}</h4>
											</div>
											<button ng-click="eliminar(item)" class="delete"><i class="fa fa-close"></i></button>
										</div>


									</div>
									<div class="cart-summary">

										<h5>SUBTOTAL: @{{total}}</h5>
									</div>
									<div class="cart-btns">
										<a href="/carrito">ver Carrito</a>
										<a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
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

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">Comprobación</h3>
					<ul class="breadcrumb-tree">
						<li><a href="/">Inicio</a></li>
						<li class="active">Comprobación</li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->
	<form action="{{route('pedido.store')}}" method="post">
		@csrf
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7" style="padding:1em !important">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Datos de verificación</h3>
							</div>

							<div class="form-group">
								<input type="text" ng-model="cliente.nombres" name="nombres" class="input" placeholder="Nombres">
							</div>
							<div class="form-group">
								<input type="text" ng-model="cliente.apellidos" name="apellidos" class="input" placeholder="Apellidos">
							</div>
							<div class="form-group">
								<input type="text" ng-model="cliente.dni" name="dni" class="input" placeholder="Dni">
							</div>
							<div class="form-group">
								<input type="text" ng-model="cliente.direccion" name="direccion" class="input" placeholder="direccion">
							</div>
							<div class="form-group">
								<input type="text" ng-model="cliente.telefono" name="telefono" class="input" placeholder="Celular">
							</div>
							<div class="form-group">
								<input type="text" name="correo" ng-model="cliente.correo" class="input" placeholder="Correo">
							</div>
							<div class="form-group text-center">
								<h6 class="w-100 text-center">HORA DE PEDIDO</h6>

							</div>
							<div class="form-group">
								<input type="time" name="correo" ng-model="cliente.hora" class="input" placeholder="hora de pedido">
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<div class="shiping-details">

							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">

							</div>
						</div>
						<!-- /Shiping Details -->

						<!-- Order notes -->

						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Tu Orden</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCTO</strong></div>
								<div><strong>CANTIDAD</strong></div>
								<div><strong>PRECIO</strong></div>
								<div></div>
							</div>
							<div class="order-products">
								<div class="order-col" ng-repeat="item in carrito track by $index">
									<div>@{{item.nombre}}</div>
									<div> @{{item.unidades}}</div>
									<div>S/. @{{item.precio}}</div>
									<div><i ng-click="eliminar(item)" class="fa fa-close"></i> </div>
								</div>

							</div>

							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">S/ @{{total}}</strong></div>
							</div>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="terms">
						</div>
						<button type="button" ng-disabled="!cliente.correo || !cliente.nombres || !cliente.apellidos || !cliente.direccion || !carrito.length" ng-if="!registrando" class="primary-btn order-submit" ng-click="CrearPedido()">CONFIRMAR COMPRA</button>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
	</form>
	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">

						</form>
						<ul class="newsletter-follow">

						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

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
								<li><a href="/"><i class="fa fa-map-marker"></i>A.v meiggs #1784</a></li>
								<li><a href="/"><i class="fa fa-phone"></i>947-319-759</a></li>
								<li><a href="/"><i class="fa fa-envelope-o"></i>pizzatotas@email.com</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Menú</h3>
							<ul class="footer-links">
								<li><a href="/">Combos</a></li>
								<li><a href="/">Ofertas</a></li>
								<li><a href="/">Pizzas</a></li>
								<li><a href="/">Pastas</a></li>
								<li><a href="/">Salsas</a></li>
								<li><a href="/">Entradas</a></li>

							</ul>
						</div>
					</div>

					<div class="clearfix visible-xs"></div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">ayuda y servicio</h3>
							<ul class="footer-links">
								<li><a href="/">Politica de Privacidad</a></li>
								<li><a href="/">Condiciones de uso</a></li>
								<li><a href="{{URL::to('/reclamos')}}">Libro de Reclamaciones</a></li>
								<li><a href="/">Trabaja con nosotros</a></li>
								<li><a href="/">Politicas de Delivery</a></li>
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
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="home/https://colorlib.com" target="_blank">Colorlib</a>
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