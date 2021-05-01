<!--Main layout-->
<main class="mt-5 pt-4">
	<div class="container dark-grey-text mt-5">

		<!--Grid row-->
		<div class="row wow fadeIn">
			<?php if(!empty($producto)){ ?>

			<!--Grid column-->
			<div class="col-md-6 mb-4">

				<img src="<?php echo base_url()."assets/img/imgTiendas".$producto["arch_multi"] ?>" class="img-fluid" alt="">

			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-md-6 mb-4">

				<!--Content-->
				<div class="p-4">

					<div class="mb-3">
						<span class="badge purple mr-1"><?php echo $producto["nombre_categ"]; ?></span>
						<span class="badge blue mr-1">Nuevo</span>
						<?php if($producto["oferta"] == 1){ ?>
							<span class="badge green mr-1">Oferta</span>
						<?php } ?>
					</div>
					<div class="mb-3">
						<p class="lead font-weight-bold"><?php echo $producto["nombre_prod"]; ?></p>
					</div>
					<?php if($producto["oferta"] == 1){ ?>
						<h5>
							<span><?php echo '$ '.$producto["precio_prod_act"]; ?></span>
						</h5>
						<h5>
							<span class="mr-1">
								<del><?php echo '$ '.$producto["precio_prod_ant"]; ?></del>
							</span>
						</h5>
					<?php }else{ ?>
						<h5>
							<span><?php echo '$ '.$producto["precio_prod_act"]; ?></span>
						</h5>
					<?php } ?>

					<p class="lead font-weight-bold">Descripción</p>

					<p><?php echo $producto["desc_prod"]; ?></p>
					<div class="row p-3">
						<p class="font-weight-bold" style="margin-right:5px">Ordenes: <?php echo $producto["cant_ventas"]; ?></p>
						<p class="font-weight-bold">Stock: <?php echo $producto["stock_prod"]; ?></p>
					</div>
					<div class="row p-2">
						<a class="btn btn-primary btn-md my-0 p" href="<?php echo base_url()."add/".$producto["id_prod"];?>">Agregar al Carrito
							<i class="fas fa-shopping-cart ml-1"></i>
						</a>
					</div>

				</div>
				<!--Content-->

			</div>
			<!--Grid column-->
			<?php }else{ ?>
					<p>Producto no encontrados...</p>
			<?php } ?>
		</div>
		<!--Grid row-->

		<hr>

		<!--Grid row-->
		<div class="row d-flex justify-content-center wow fadeIn">

			<!--Grid column-->
			<div class="col-md-6 text-center">

				<h4 class="my-4 h4">Information de <?php echo $producto["nombre_tienda"]; ?></h4>

				<p><?php echo $producto["desc_tienda"]; ?></p>
				
			<?php if(!empty($productosTienda)){  ?>
				<br>
				
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
	</div>
</main>
<!--Main layout-->
