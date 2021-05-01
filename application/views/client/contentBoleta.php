<!--Main layout-->
<main class="mt-3 pt-4">
	<div class="container mt-5">
		<h5 class="h1 font-weight-bold text-center pt-5 pb-5">Gracias por su compra</h5>

		<!--Grid row-->
		<div class="row">

			<!--Grid column-->
			<div class="col-md-12 my-3 text-left">

				<div class="card">
					<div class="card-body">

						<!-- Shopping Cart table -->
						<div class="table-responsive">

							<table class="table product-table">

								<!-- Table head -->
								<thead class="mdb-color lighten-5">
									<tr>
										<th></th>
										<th class="font-weight-bold text-center">
											<strong>Producto</strong>
										</th>
										<th class="font-weight-bold text-center">
											<strong>Categoría</strong>
										</th>
										<th class="font-weight-bold text-center" width="150px">
											<strong>Tienda</strong>
										</th>
										<th class="font-weight-bold text-center">
											<strong>Precio</strong>
										</th>
										<th class="font-weight-bold text-center">
											<strong>Cantidad</strong>
										</th>
										<th class="font-weight-bold text-center">
											<strong>Monto</strong>
										</th>
									</tr>
								</thead>
								<!-- /.Table head -->

								<!-- Table body -->
								<tbody>
									<?php $total= 0; ?>
									<?php foreach ($carrito as $items): ?>
									<!-- First row -->
									<tr>
										<th scope="row">
											<img src="<?php echo base_url() ?>assets/img/imgTiendas<?php echo $items['imagen']; ?>" alt="" class="img-fluid z-depth-0 mx-auto d-block">
										</th>
										<td>
											<h5 class="mt-3">
												<strong class="text-center"><?php echo $items['name']; ?></strong>
											</h5>
										</td>
										<td class="text-center"><?php echo $items['categoria']; ?></td>
										<td class="text-center"><?php echo $items['tienda']; ?></td>
										<td class="text-center"><?php echo "$".$items['price'];?></td>
										<td class="text-center"><?php echo $items['qty'];?></td>
										<td class="font-weight-bold text-center">
											<strong><?php echo "$".($items["price"] * $items["qty"]) ?></strong>
										</td>
									</tr>
									<?php endforeach;?>
									<!-- /.First row -->
									<!-- Footer row -->
									<thead class="mdb-color lighten-5">
										<tr>
											<th class="font-weight-bold text-center">
												<strong>Tipo de Despacho</strong>
											</th>
											<th class="font-weight-bold text-center">
												<strong>Metodo de Pago</strong>
											</th>
											<th class="font-weight-bold text-center" colspan=3>
												<strong>Courier</strong>
											</th>
											<th></th>
											<th class="font-weight-bold text-center">
												<strong>Monto Total</strong>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">
												<?php echo $tipoDelivery ?>
											</td>
											<td class="text-center">
												<?php echo $metodoPago ?>
											</td>
											<td colspan=3 class="text-center">
												<img src="<?php echo base_url() ?>assets/img/imgCourier<?php echo $courier['logo_courier']; ?>" alt="" class="img-fluid z-depth-0 mx-auto d-block">
											</td>
											<td></td>
											<td class="text-center font-weight-bold">
												<?php echo "$".$montoTotal?>
											</td>
											
										</tr>
									</tbody>
									<!-- Footer row -->

								</tbody>
								<!-- /.Table body -->

							</table>
							<a href="#" class="btn btn-primary btn-lg btn-block">Imprimir Boleta <i class="fas fa-print ml-2"></i></a>
						</div>
						<!-- /.Shopping Cart table -->

					</div>

				</div>

			</div>
			<!--Grid column-->

		</div>
		<!--Grid row-->
		<div class="col-6">
			<a href="<?php echo site_url('/'); ?>" class="btn btn-success btn-lg btn-block"><i class="fas fa-arrow-left ml-2"></i> Volver a Página Principal</a>
		</div>
	</div>
	
</main>
<!--Main layout-->
