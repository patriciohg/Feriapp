<!--Main layout-->
<main class="mt-5 pt-4">
	<div class="container dark-grey-text mt-5">

	<div class="row wow fadeIn">
			<!--Grid column-->
			<div class="col-md-6 mb-4">

				<img src="<?php echo base_url()."assets/img/logosTiendas/".$tienda->logo_tienda ?>" class="card-img-top" alt="">

			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-md-6 mb-4">

				<!--Content-->
				<div class="p-4">

					<div class="mb-3">

						<h4 class="my-4 h4">Bienvenidos a <?php echo $tienda->nombre_tienda?></h4>
						<p><?php echo $tienda->desc_tienda?></p>
						<br>

					</div>

				</div>

			</div>
		</div>

		<!--Grid row-->
		<div class="row d-flex justify-content-center wow fadeIn">
			<!--Grid column-->
			<div class="col-md-6 text-center">
				<?php if(!empty($productosTienda)){  ?>

				<h4 class="my-4 h4">Revisa nuestros productos</h4>

			</div>

		</div>
		
		<!--Section: Products v.3-->
		<section class="text-center mb-4">
			<!--Grid row-->
			
			<div class="row wow fadeIn">
				<?php foreach($productosTienda as $row){ ?>
					<div class="col-lg-3 col-md-6 mb-4">
						<div class="card h-100">
							<div class="view overlay">
								<img src="<?php echo base_url()."assets/img/imgTiendas/".$row->arch_multi ?>" class="card-img-top"
									alt="">
								<a href="<?php echo site_url('producto/'.$row->id_prod); ?>">
									<div class="mask rgba-white-slight"></div>
								</a>
							</div>
							<!-- Card content -->
							<div class="card-body text-center pb-0">

								<!-- Title -->
								<p class="card-title"><strong><?php echo $row->nombre_categ; ?></strong></p>
								<!-- Subtitle -->
								<h5 class="text pb-2"><strong><?php echo $row->nombre_prod; ?></strong></h5>
								<!-- Text -->
								<h5 class="font-weight-bold blue-text">
									<strong><?php echo '$ '.$row->precio_prod_act; ?></strong>
									<?php if($row->oferta == 1){ ?>
										<span class="badge green mr-1">Oferta</span>
									<?php } ?>
								</h5>

							</div>

							<!-- Card footer -->
							<div class="card-footer text-muted text-center mt-4">
								<?php echo 'Stock: '.$row->stock_prod; ?>
							</div>

						</div>
					</div>
				<?php } }else{ ?>
					<p>Tienda sin productos en stock...</p>
				<?php } ?>
			</div>
		</section>
		<!--Section: Products v.3-->
	</div>
</main>
<!--Main layout-->
