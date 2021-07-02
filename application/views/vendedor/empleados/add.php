<!-- Begin Page Content -->
<div class="container-fluid">

    <form class="user" action="<?php echo base_url();?>vendedor/empleados/store" method="post" enctype="multipart/form-data">
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
        <div class="form-group">
            <label for="nombre">Rut Empleado</label>
            <input type="text" class="form-control form-control-user"
                placeholder="Rut sin punto ni guión" name="rut_usuario">
        </div>
        <button type= "submit" class="btn btn-primary btn-user btn-block">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Añadir</span>
        </button>
        <hr>
    </form>

</div>
