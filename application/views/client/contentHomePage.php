<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

	<!--Indicators-->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-1z" data-slide-to="1"></li>
		<li data-target="#carousel-example-1z" data-slide-to="2"></li>
	</ol>
	<!--/.Indicators-->

	<!--Slides-->
	<div class="carousel-inner" role="listbox">

		<!--First slide-->
		<div class="carousel-item active">
			<div class="view" style="background-image: url('assets/img/imgEzmartBuy/NavidadPepe.gif'); background-repeat: no-repeat; background-size: cover; background-position: center center;">

				<!-- Mask & flexbox options-->
				<div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

					<!-- Content -->
					<div class="text-center white-text mx-5 wow fadeIn">
						<h1 class="mb-4">
							<strong>Aprovecha las ofertas Pre-Navideñas</strong>
						</h1>
						<p class="mb-4 d-none d-md-block">
							<strong>No te quedes sin tu regalo para tu ser querido.</strong>
						</p>

						<a href="#" class="btn btn-outline-white btn-lg">Ver Ofertas
							<i class="fas fa-piggy-bank ml-2"></i>
						</a>
					</div>
					<!-- Content -->

				</div>
				<!-- Mask & flexbox options-->

			</div>
		</div>
		<!--/First slide-->

		<!--Second slide-->
		<div class="carousel-item">
			<div class="view" style="background-image: url('assets/img/imgEzmartBuy/FondoCarrusel2.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">

				<!-- Mask & flexbox options-->
				<div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

					<!-- Content -->
					<div class="text-center white-text mx-5 wow fadeIn">
						<h1 class="mb-4">
							<strong>Quieres ser parte de Ezmart Buy?</strong>
						</h1>

						<p>
							<strong>En Ezmart Buy te ayudamos con tus ventas brindando herramientas para una mejor gestión</strong>
						</p>

						<a href="<?php base_url();?>register/registerTienda" class="btn btn-outline-white btn-lg">Haz click aquí para unirte
							<i class="fas fa-store ml-2"></i>
						</a>
					</div>
					<!-- Content -->

				</div>
				<!-- Mask & flexbox options-->

			</div>
		</div>
		<!--/Second slide-->

		<!--Third slide-->
		<div class="carousel-item">
			<div class="view" style="background-image: url('assets/img/imgEzmartBuy/FondoCarrusel3.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">

				<!-- Mask & flexbox options-->
				<div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

					<!-- Content -->
					<div class="text-center white-text mx-5 wow fadeIn">
						<h1 class="mb-4">
							<strong>Diversas tiendas con productos únicos</strong>
						</h1>

						<p>
							<strong>Encuentra productos nunca antes vistos</strong>
						</p>

						<a href="#" class="btn btn-outline-white btn-lg">Ver tiendas
							<i class="fas fa-store ml-2"></i>
						</a>
					</div>
					<!-- Content -->

				</div>
				<!-- Mask & flexbox options-->

			</div>
		</div>
		<!--/Third slide-->

	</div>
	<!--/.Slides-->

	<!--Controls-->
	<a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
	<!--/.Controls-->

</div>
<!--/.Carousel Wrapper-->

<!--Main layout-->
<main>
	<div class="container">

		<!--Navbar-->
		<nav class="navbar navbar-expand-lg navbar-dark mdb-color green lighten-1 mt-3 mb-5">

			<!-- Navbar brand -->
			<span class="navbar-brand">Categorías:</span>

			<!-- Collapse button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
				aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Collapsible content -->
			<div class="collapse navbar-collapse" id="basicExampleNav">

				<!-- Links -->
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Todas
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Peluches</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Poleras Unisex</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Tazones</a>
					</li>

				</ul>
				<!-- Links -->
				<form class="form-inline">
					<div class="md-form my-0">
						<input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Buscar">
					</div>
				</form>
				<img src="assets/img/imgEzmartBuy/peepoDetective.png" width="40" height="40">
			</div>
			<!-- Collapsible content -->

		</nav>
		<!--/.Navbar-->

		<!--Section: Products v.3-->
		<section class="text-center mb-4">
			<!--Grid row-->
			
			<div class="row wow fadeIn">
				<?php if(!empty($productos)){ foreach($productos as $row){ ?>
					<div class="col-lg-4 col-md-6 mb-4">
						<div class="card h-100">
							<div class="view overlay">
								<img src="<?php echo base_url()."assets/img/imgTiendas".$row["arch_multi"] ?>" class="card-img-top"
									alt="">
								<a href="<?php echo site_url('producto/'.$row['id_prod']); ?>">
									<div class="mask rgba-white-slight"></div>
								</a>
							</div>
							<!-- Card content -->
							<div class="card-body text-center pb-0">

								<!-- Title -->
								<p class="card-title"><strong><?php echo $row["nombre_categ"]; ?></strong></p>
								<!-- Subtitle -->
								<h5 class="text pb-2"><strong><?php echo $row["nombre_prod"]; ?></strong></h5>
								<!-- Text -->
								<h5 class="font-weight-bold green-text">
									<strong><?php echo '$ '.$row["precio_prod_act"]; ?></strong>
									<?php if($row["oferta"] == 1){ ?>
										<span class="badge red mr-1">Oferta</span>
										<img src="<?php echo base_url()."assets/img/imgEzmartBuy/pepeMoney.gif" ?>" width="50" height="50">
									<?php } ?>
								</h5>

							</div>

							<!-- Card footer -->
							<div class="card-footer text-muted text-center mt-4">
								<?php echo 'Stock: '.$row["stock_prod"]; ?>
							</div>

						</div>
					</div>
				<?php } }else{ ?>
					<p>Producto(s) no encontrados...</p>
				<?php } ?>
			</div>
		</section>
		<!--Section: Products v.3-->

		<!--Pagination-->
		<nav class="d-flex justify-content-center wow fadeIn">
			<ul class="pagination pg-green">

				<!--Arrow left-->
				<li class="page-item disabled">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>

				<li class="page-item active">
					<a class="page-link" href="#">1
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">2</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">3</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">4</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">5</a>
				</li>

				<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
		</nav>
		<!--Pagination-->

	</div>
</main>
<!--Main layout-->
