<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Productos</h1>
<p class="mb-4">Litado de productos que se encuentran a la venta actualmente dentro de la plataforma.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php $cantidad_productos ?> Productos</h6>
        <?php if($this->session->flashdata("producto-error")):?>
			<div class="alert alert-danger">
				<p><?php echo $this->session->flashdata("producto-error")?></p>
			</div>
		<?php endif; ?>
		<?php if($this->session->flashdata("producto-success")):?>
			<div class="alert alert-success">
				<p><?php echo $this->session->flashdata("producto-success")?></p>
			</div>
		<?php endif; ?>
        <a href="<?php echo base_url();?>vendedor/productos/add" class="btn btn-primary btn-icon-split">
        
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Añadir nuevos productos</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Imagen referencial</th>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio anterior</th>
                        <th>Precio actual</th>
                        <th>Stock</th>
                        <th>Ventas</th>
                        <th>Oferta</th>
                        <th>Editar</th>
                        <th>Eliminar</th>     
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($productos)):?>
                    <?php foreach($productos as $producto):?>
                    <tr>
                        <td> <img src="<?php echo base_url()."assets/img/imgTiendas".$producto->arch_multi; ?>" alt="<?php echo $producto->desc_prod;?>" width="150" height="150">   </td>
                        <td><?php echo $producto->nombre_categ?></td>
                        <td><?php echo $producto->nombre_prod?></td>
                        <td><?php echo $producto->desc_prod?></td>
                        <td><?php echo $producto->precio_prod_ant?></td>
                        <td><?php echo $producto->precio_prod_act?></td>
                        <td><?php echo $producto->stock_prod?></td>
                        <td><?php echo $producto->cant_ventas?></td>
                        <td><?php if($producto->oferta ==0) echo "<a href='". base_url().'vendedor/productos/oferta/'.$producto->id_prod."' class='btn btn-success btn-icon-split'><span class='icon text-white-50'><i class='fas fa-dollar-sign'></span></i>Nueva oferta</a>"; else echo "<a href='#' class='btn btn-warning btn-icon-split'><span class='icon text-white-50'><i class='fas fa-dollar-sign'></span></i>Producto en oferta!</a>" ; ?></td>
                        <td><a href="<?php echo base_url();?>vendedor/productos/edit/<?php echo $producto->id_prod?>" class="btn btn-primary btn-circle">
                                        <i class="fas  fa-wrench "></i>
                                    </a>  </td>
                        <td>
                        <a href="<?php echo base_url();?>vendedor/productos/delete/<?php echo $producto->id_prod?>" class="btn btn-danger btn-circle">
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
