<!--Main layout-->
<main class="mt-5 pt-4">
	<div class="container dark-grey-text mt-5">

		<!--Grid row-->
		<div class="row wow fadeIn">
			<?php if(!empty($producto)){ ?>

			<!--Grid column-->
			<div class="col-md-6 mb-4">

				<!--Content-->
				<div class="p-3">
				<div class="card mb-3" >
					<div class="card-header">
						<div class="mb-3">
							<span class="badge purple mr-1"><?php echo $producto["nombre_categ"]; ?></span>
							<span class="badge green mr-1">Nuevo</span>
							<?php if($producto["oferta"] == 1){ ?>
								<span class="badge red mr-1">Oferta</span>
							<?php } ?>
						</div>
					</div>
					<div class="card-body">
						<h5 class="card-title">
							<div class="mb-3">
								<p class="lead font-weight-bold"><?php echo $producto["nombre_prod"]; ?></p>
							</div>
						</h5>
						<?php if($producto["oferta"] == 1){ ?>
							<h5>
								<span class="font-weight-bold"><?php echo '$ '.$producto["precio_prod_act"]; ?></span>
								<img src="<?php echo base_url()."assets/img/imgEzmartBuy/pepeMoney.gif" ?>" width="40" height="40">
							</h5>
							<h5>
								<span class="mr-1 font-weight-bold red-text">
									<del><?php echo '$ '.$producto["precio_prod_ant"]; ?></del>
								</span>
							</h5>
						<?php }else{ ?>
							<h5>
								<span><?php echo '$ '.$producto["precio_prod_act"]; ?></span>
							</h5>
						<?php } ?>
						<hr>
						<p class="lead font-weight-bold">Descripción:</p>

						<p><?php echo $producto["desc_prod"]; ?></p>
						<hr>
						<div class="row p-3">
							<p class="font-weight-bold" style="margin-right:5px">Ordenes: <?php echo $producto["cant_ventas"]; ?></p>
							<p class="font-weight-bold">Stock: <?php echo $producto["stock_prod"]; ?></p>
						</div>
					</div>
					<div class="card-footer">
						<div class="row p-2 justify-content-center">
							<a class="btn btn-success font-weight-bold btn-rounded" href="<?php echo base_url()."add/".$producto["id_prod"];?>">Agregar al Carrito
								<i class="fas fa-shopping-cart ml-1"></i>
							</a>
						</div>
					</div>
				</div>
				</div>
				<!--Content-->

			</div>

			<!--Grid column-->
			<div class="col-md-6 mb-4">

				<img src="http://localhost:3000/api/products/public/<?php echo $producto["arch_multi"]; ?>" class="img-fluid" alt="">

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
				<h4 class="my-4 h4 font-weight-bold">
					<?php echo $producto['nombre_tienda'] ?>
				</h4>
				<img src="<?php echo base_url()."assets/img/logosTiendas/".$producto['logo_tienda'] ?>" class="card-img-top" alt="">
				<h4 class="my-4 h4">
					<a class="btn btn-success font-weight-bold btn-rounded" href="<?php echo site_url('tienda/'.$producto['id_tienda']); ?>">
					Haz click aquí para visitar a <?php echo $producto["nombre_tienda"]; ?>
					</a>
				</h4>
				
			

			</div>

		</div>
		
		<!--Section: Products v.3-->
		<section class="text-center mb-4">
			<!--Grid row-->
			<?php if(!empty($productosTienda)){  ?>
				<hr>
				<h4 class="my-4 h4">Revisa otros productos de la Tienda</h4>
				
			<div class="row wow fadeIn">
				<?php foreach($productosTienda as $row){ ?>
					<div class="col-lg-3 col-md-6 mb-4">
						<div class="card h-100">
							<div class="view overlay">
								<img src="http://localhost:3000/api/products/public/<?php echo $row["arch_multi"]; ?>" class="card-img-top"
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
