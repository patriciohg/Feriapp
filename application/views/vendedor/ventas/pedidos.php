<div class="container-fluid">

<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Ordenes de compra </h1>
	<p class="mb-4">Litado de las ordenes de compra que existen asociadas a esta tienda.</p>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Ordenes de compra</h6>
			<?php if($this->session->flashdata("pedido-error")):?>
				<div class="alert alert-danger">
					<p><?php echo $this->session->flashdata("pedido-error")?></p>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata("pedido-success")):?>
				<div class="alert alert-success">
					<p><?php echo $this->session->flashdata("pedido-success")?></p>
				</div>
			<?php endif; ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>N° Orden</th>
							<th>Rut comprador</th>
							<th>Estado</th>
							<th>Courier</th>
							<th>Fecha compra</th>
							<th>Total</th>
							<th>Ver detalle</th>
							<th>Cambiar Estado</th>     
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>N° Orden</th>
							<th>Rut comprador</th>
							<th>Estado</th>
							<th>Courier</th>
							<th>Fecha compra</th>
							<th>Total</th>
							<th>Ver detalle</th>
							<th>Cambiar Estado</th>                      
						</tr>
					</tfoot>
					<tbody>
					<?php if(!empty($pedidos)):?>
						<?php foreach($pedidos as $pedido):?>
						<tr>
							<td><?php echo $pedido->id_orden?></td>
							<td><?php echo $pedido->rut_usuario?></td>
							<td>
								<?php switch ($pedido->estado) {
									case 0:
										echo "Cancelado";
										break;
									case 1:
										echo "Pendiente";
										break;
									case 2:
										echo "Aprobado";
										break;
									case 3:
										echo "Despachado";
										break;
									case 4:
										echo "Entregado";
										break;
								}?>
							</td>
							<td><?php echo $pedido->nombre_courier?></td>
							<td><?php echo $pedido->fecha_compra?></td>
							<td><?php echo '$'. $pedido->total?></td>
							<td><a href="<?php echo base_url();?>vendedor/pedidos/ver/<?php echo $pedido->id_orden?>" class="btn btn-primary btn-circle">
											<i class="fas  fa-eye "></i>
										</a>  </td>
							<td>
							<a href="#" data-toggle="modal" data-target="#cambiarEstadoModal" class="btn btn-success btn-circle">
								<i class="fas fa-pencil-alt"></i>
							</a>
							</td>

						</tr>
						<?php endforeach;?>
					<?php endif;?>                    
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade" id="cambiarEstadoModal" tabindex="-1" role="dialog" aria-labelledby="cambiarEstadoModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Escoja nuevo estado.</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="custom-control custom-radio">
						<input type="radio" id="estado1" name="cambioEstado" class="custom-control-input" value = "1">
						<label class="custom-control-label" for="estado1">Pendiente</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="estado2" name="cambioEstado" class="custom-control-input" value = "2" checked>
						<label class="custom-control-label" for="estado2">Aprobado</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="estado3" name="cambioEstado" class="custom-control-input" value = "3">
						<label class="custom-control-label" for="estado3">Despachado</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="estado4" name="cambioEstado" class="custom-control-input" value = "4">
						<label class="custom-control-label" for="estado4">Entregado</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="estado0" name="cambioEstado" class="custom-control-input" value = "0">
						<label class="custom-control-label" for="estado0">Cancelado</label>
					</div>
				</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" href="">Cambiar Estado</a>
                </div>
            </div>
        </div>
    </div>

</div>
