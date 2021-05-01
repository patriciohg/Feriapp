<!--Main layout-->
<main class="mt-5 pt-4">
	<div class="container wow fadeIn">

		<!-- Heading -->
		<h2 class="my-5 h2 text-center">Formulario de Pago</h2>
		
		<!--Grid row-->
		<div class="row">

			<!--Grid column-->
			<div class="col-md-6 mb-6">

				<!--Card-->
				<div class="card">

					<!--Card content-->
					<form class="card-body" method="post" action="<?php echo base_url('checkout')?>">

						<!--Grid row-->
						<div class="row">

							<!--Grid column-->
							<div class="col-md-6 mb-2">

								<!--firstName-->
								<!-- <div class="md-form ">
									<input type="text" id="firstName" class="form-control">
									<label for="firstName" class="">First name</label>
								</div> -->

							</div>
							<!--Grid column-->

							<!--Grid column-->
							<div class="col-md-6 mb-2">

								<!--lastName-->
								<!-- <div class="md-form">
									<input type="text" id="lastName" class="form-control">
									<label for="lastName" class="">Last name</label>
								</div> -->

							</div>
							<!--Grid column-->

						</div>
						<!--Grid row-->

						<!--Username-->
						<!-- <div class="md-form input-group pl-0 mb-5">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">@</span>
							</div>
							<input type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1">
						</div> -->

						<!--email-->
						<!-- <div class="md-form mb-5">
							<input type="text" id="email" class="form-control" placeholder="youremail@example.com">
							<label for="email" class="">Email (optional)</label>
						</div> -->

						<!--address-->
						<!-- <div class="md-form mb-5">
							<input type="text" id="address" class="form-control" placeholder="1234 Main St">
							<label for="address" class="">Address</label>
						</div> -->

						<!--address-2-->
						<!-- <div class="md-form mb-5">
							<input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
							<label for="address-2" class="">Address 2 (optional)</label>
						</div> -->

						<!--Grid row-->
						<div class="row">

							<!--Grid column-->
							<!-- <div class="col-lg-4 col-md-12 mb-4">

								<label for="country">Country</label>
								<select class="custom-select d-block w-100" id="country" required>
									<option value="">Choose...</option>
									<option>United States</option>
								</select>
								<div class="invalid-feedback">
									Please select a valid country.
								</div>

							</div> -->
							<!--Grid column-->

							<!--Grid column-->
							<!-- <div class="col-lg-4 col-md-6 mb-4">

								<label for="state">State</label>
								<select class="custom-select d-block w-100" id="state" required>
									<option value="">Choose...</option>
									<option>California</option>
								</select>
								<div class="invalid-feedback">
									Please provide a valid state.
								</div>

							</div> -->
							<!--Grid column-->

							<!--Grid column-->
							<!-- <div class="col-lg-4 col-md-6 mb-4">

								<label for="zip">Zip</label>
								<input type="text" class="form-control" id="zip" placeholder="" required>
								<div class="invalid-feedback">
									Zip code required.
								</div>

							</div> -->
							<!--Grid column-->

						</div>
						<!--Grid row-->
						<div class="d-block my-3">
							<?php $i = 0 ?>
							<?php if(!empty($couriers)){ foreach($couriers as $courier){ ?>
								<div class="custom-control custom-radio">
									<div class="row align-items-center">
										<div class="col-6">
											<input id="<?php echo $courier["nombre_courier"] ?>" name="courier" type="radio" class="custom-control-input" value="<?php echo $courier["id_courier"] ?>" required <?php if($i == 0){ echo "checked";} ?>>
											<label class="custom-control-label" for="<?php echo $courier["nombre_courier"] ?>"><?php echo $courier["nombre_courier"] ?></label>
										</div>
										<div class="col-6">
											<img src="<?php echo base_url() ?>assets/img/imgCourier<?php echo $courier['logo_courier']; ?>" alt="" class="img-fluid z-depth-0 mx-auto d-block">
										</div>
									</div>
								</div>
								<?php $i++ ?>
							<?php } }else{ ?>
								<p>Courier(s) no encontrados...</p>
							<?php } ?>
						</div>
						<hr>

						<div class="d-block my-3">
							<div class="custom-control custom-radio">
								<input id="sucursal" name="deliveryMethod" type="radio" class="custom-control-input" value="Retiro Sucursal" checked required>
								<label class="custom-control-label" for="sucursal">Retiro Sucursal</label>
							</div>
							<div class="custom-control custom-radio">
								<input id="domicilio" name="deliveryMethod" type="radio" class="custom-control-input" value="Despacho a Domicilio" required>
								<label class="custom-control-label" for="domicilio">Despacho a Domicilio</label>
							</div>
						</div>

						<hr>

						<div class="d-block my-3">
							<div class="custom-control custom-radio">
								<input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="Tarjeta de Credito" checked required>
								<label class="custom-control-label" for="credit">Tarjeta de Credito</label>
							</div>
							<div class="custom-control custom-radio">
								<input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="Tarjerta de Debito" required>
								<label class="custom-control-label" for="debit">Tarjeta de Debito</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="cc-name">Nombre Tarjeta</label>
								<input type="text" class="form-control" id="cc-name" placeholder="" required>
								<small class="text-muted">Nombre completo escrito en la tarjeta</small>
								<div class="invalid-feedback">
									Nombre de la tarjeta es obligatorio
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="cc-number">Número de la tarjeta</label>
								<input type="text" class="form-control" id="cc-number" placeholder="" required>
								<div class="invalid-feedback">
									Número de la tarjeta es obligatorio
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 mb-5">
								<label for="cc-expiration">Fecha Expiración</label>
								<input type="date" class="form-control" id="cc-expiration" placeholder="" required>
								<div class="invalid-feedback">
									Fecha de expiración obligatorio
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label for="cc-expiration">CVV</label>
								<input type="text" class="form-control" id="cc-cvv" placeholder="" required>
								<div class="invalid-feedback">
									Código de seguridad obligatorio
								</div>
							</div>
						</div>
						<hr class="mb-4">
						<div class="col-12 d-flex justify-content-end">
							<button class="btn btn-primary btn-lg btn-block" type="submit" name="checkout">Realizar Pago <i class="fas fa-shopping-cart ml-2"></i></button>
						</div>

					</form>

				</div>
				<!--/.Card-->

			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-md-6 mb-6">

				<!-- Heading -->
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Tu Carrito</span>
					<span class="badge badge-secondary badge-pill"><?php echo $this->cart->total_items(); ?></span>
				</h4>

				<!-- Cart -->
				<ul class="list-group mb-3 z-depth-1">
					<?php foreach ($this->cart->contents() as $items): ?>
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div class="row align-items-center">
								<div class="col-4">
									<img width= "100%" src="<?php echo base_url() ?>assets/img/imgTiendas<?php echo $items['imagen']; ?>" alt="" class="">
								</div>
								<div class="col-8">
									<div class="row align-items-center">
										<div class="col-4">
											<h6 class="my-0"><?php echo $items['name']; ?></h6>
											<small class="text-muted"><?php echo $items['tienda']; ?></small>
										</div>
										<div class="col-4">
											<span><?php echo "$".$items['price']." x".$items['qty']; ?></span>	
										</div>
										<div class="col-4">
											<span class="font-weight-bold"><?php echo "$".($items['qty'] * $items['price']); ?></span>	
										</div>
									</div>
								</div>
							</div>
							
						</li>
					<?php endforeach ?>
					<li class="list-group-item d-flex justify-content-end">
						<div class="row mr-4">
							<div class="col-6">
								<span>Total:</span>
							</div>
							<div class="col-6">
								<strong class="font-weight-bold"><?php echo "$".$this->cart->total()?></strong>
							</div>
						</div>
					</li>
				</ul>
				<!-- Cart -->

			</div>
			<!--Grid column-->

		</div>
		<!--Grid row-->

	</div>
</main>
<!--Main layout-->
