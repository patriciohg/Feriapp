<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Empleados Activos </h1>
	<p class="mb-4">Listado de los empleados que se encuentran con contrato activo.</p>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Lista empleados</h6>
			<?php if($this->session->flashdata("empleado-error")):?>
				<div class="alert alert-danger">
					<p><?php echo $this->session->flashdata("empleado-error")?></p>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata("empleado-success")):?>
				<div class="alert alert-success">
					<p><?php echo $this->session->flashdata("empleado-success")?></p>
				</div>
			<?php endif; ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Rut empleado</th>
							<th>Nombre</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Fecha Inicio Contrato</th>
							<th>Teléfono</th>
							<th>Email</th>
							<th>Despedir</th>
						</tr>
					</thead>
					<tbody>
					<?php if(!empty($empleados)):?>
						<?php foreach($empleados as $empleado):?>
						<tr>
							<td><?php echo $empleado->rut_usuario?></td>
							<td><?php echo $empleado->nombre_usuario?></td>
							<td><?php echo $empleado->apellido_pat?></td>
							<td><?php echo $empleado->apellido_mat?></td>
							<td><?php echo $empleado->fecha_ingreso?></td>
							<td><?php echo $empleado->telefono?></td>
							<td><?php echo $empleado->email?></td>
							<td>
								<a href="<?php echo base_url();?>vendedor/empleados/delete/<?php echo $empleado->rut_usuario?>" class="btn btn-danger btn-circle">
									<i class="fas fa-trash"></i>
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
</div>
