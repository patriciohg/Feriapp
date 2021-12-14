<!--Main layout-->
<main class="mt-3 pt-4">
	<div class="container mt-5">
			<?php
				if ($this->cart->total_items()!=0){
			?>
					<h5 class="h1 font-weight-bold text-center pt-5 pb-5">Tú Carrito
						<img src="<?php echo site_url('/'); ?>assets/img/imgEzmartBuy/peepoStonks.png" width="60" height="60">
					</h5>
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
												<th class="font-weight-bold text-center">
														<strong>Imagen</strong>
													</th>
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
													<th class="font-weight-bold text-center">
														<strong>Quitar</strong>
													</th>
												</tr>
											</thead>
											<!-- /.Table head -->

											<!-- Table body -->
											<tbody>
												<?php $total= 0; ?>
												<?php foreach ($this->cart->contents() as $items): ?>
												<!-- First row -->
												<tr>
													<th scope="row">
														<img src="http://localhost:3000/api/products/public/<?php echo $items["imagen"]; ?>" alt="" class="img-fluid z-depth-0 mx-auto d-block">
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
													<td class="text-center">
														<a href="<?php echo base_url()."remove/".$items['rowid']."/".$items['qty'];?>" type="button" class="btn btn-sm btn-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Remove item">X</a>
													</td>
												</tr>
												<?php endforeach;?>
												<!-- /.First row -->
												<!-- Footer row -->
												<tr>
													<td class="text-left">
														<a href="<?php echo site_url('/'); ?>" type="button" class="btn btn-info btn-rounded font-weight-bold">Seguir Comprando
															<i class="fas fa-angle-left left"></i>
														</a>
													</td>
													<td class="text-left">
														<a href="<?php echo base_url();?>reiniciarCarro" class="btn btn-danger btn-remove font-weight-bold">Vaciar Todo <span class="fa fa-trash-alt"></span></a>
													</td>
													<td colspan="3"></td>
													<td>
														<h4 class="mt-2">
															<strong>Monto Total:</strong>
														</h4>
													</td>
													<td class="text-right">
														<h4 class="mt-2">
															<strong><?php echo "$".$this->cart->total()?></strong>
														</h4>
													</td>
													<td colspan="3" class="text-right">
														<?php
															if ($this->cart->total_items()!=0){
														?>
																<a href="<?php echo base_url()."preCheckout" ?>" type="button" class="btn btn-success font-weight-bold btn-rounded">Pagar
																	<i class="fas fa-angle-right right"></i>
																</a>
														<?php
															}
														?>
													</td>
												</tr>
												<!-- Footer row -->

											</tbody>
											<!-- /.Table body -->

										</table>

									</div>
									<!-- /.Shopping Cart table -->

								</div>

							</div>

						</div>
						<!--Grid column-->

						</div>
						<!--Grid row-->
			<?php
				}else {
			?>
					<div class="row">
						<div class="col-md-12">
							<h5 class="h1 font-weight-bold text-center pt-5 pb-5">Tú Carrito está vacío
								<img src="<?php echo site_url('/'); ?>assets/img/imgEzmartBuy/pepoCry.png" width="60" height="60">
							</h5>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<img src="<?php echo site_url('/'); ?>assets/img/imgEzmartBuy/peepoSadSwing.gif">
						</div>
					</div>
					
			<?php
				}
			?>
	</div>
</main>
<!--Main layout-->
