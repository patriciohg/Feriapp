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
			<div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%282%29.jpg'); background-repeat: no-repeat; background-size: cover;">

				<!-- Mask & flexbox options-->
				<div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

					<!-- Content -->
					<div class="text-center white-text mx-5 wow fadeIn">
						<h1 class="mb-4">
							<strong>Nuevas tiendas se han unido a Feriapp</strong>
						</h1>

						<p>
							<strong>Pequeñas tiendas con diversos productos requieren de tu atención</strong>
						</p>

						<p class="mb-4 d-none d-md-block">
							<strong>Para conocer más de estas revisalas aquí.</strong>
						</p>

						<a href="#" class="btn btn-outline-white btn-lg">Revisar Tiendas
							<i class="fas fa-store ml-2"></i>
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
			<div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%283%29.jpg'); background-repeat: no-repeat; background-size: cover;">

				<!-- Mask & flexbox options-->
				<div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

					<!-- Content -->
					<div class="text-center white-text mx-5 wow fadeIn">
						<h1 class="mb-4">
							<strong>Quieres ser parte de Feriapp?</strong>
						</h1>

						<p>
							<strong>Feriapp te ayuda a vender de una manera sencilla y a ver estadísticas de estas</strong>
						</p>

						<p class="mb-4 d-none d-md-block">
							<strong>Para unirte haz click aquí.</strong>
						</p>

						<a href="<?php base_url();?>register/registerTienda" class="btn btn-outline-white btn-lg">Como Abrir Tienda
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
			<div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%285%29.jpg'); background-repeat: no-repeat; background-size: cover;">

				<!-- Mask & flexbox options-->
				<div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

					<!-- Content -->
					<div class="text-center white-text mx-5 wow fadeIn">
						<h1 class="mb-4">
							<strong>Aprovecha las ofertas de navidad</strong>
						</h1>
						<p class="mb-4 d-none d-md-block">
							<strong>Revísa las ofertas destacadas.</strong>
						</p>

						<a href="#" class="btn btn-outline-white btn-lg">Ofertas
							<i class="fas fa-piggy-bank ml-2"></i>
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
		<nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

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
						<a class="nav-link" href="#">Vestimenta Custom</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Peluches</a>
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
			</div>
			<!-- Collapsible content -->

		</nav>
		<!--/.Navbar-->

		<!--Section: Products v.3-->
		<section class="text-center mb-4">
			<!--Grid row-->
			
			<div class="row wow fadeIn">
				<?php if(!empty($productos)){ foreach($productos as $row){ ?>
					<div class="col-lg-3 col-md-6 mb-4">
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
								<h5 class="font-weight-bold blue-text">
									<strong><?php echo '$ '.$row["precio_prod_act"]; ?></strong>
									<?php if($row["oferta"] == 1){ ?>
										<span class="badge green mr-1">Oferta</span>
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
			<ul class="pagination pg-blue">

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
