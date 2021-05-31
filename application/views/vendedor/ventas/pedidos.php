<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ordenes de compra </h1>
<p class="mb-4">Litado de las ordenes de compra que existen asociadas a esta tienda.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ordenes de compra</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>N° Orden</th>
                        <th>Rut comprador</th>
                        <th>Courier</th>
                        <th>Fecha compra</th>
                        <th>Total</th>
                        <th>Ver detalle</th>
                        <th>Eliminar</th>     
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id_orden</th>
                        <th>Rut comprador</th>
                        <th>Courier</th>
                        <th>Fecha compra</th>
                        <th>Total</th>
                        <th>Ver detalle</th>
                        <th>Eliminar</th>                        
                    </tr>
                </tfoot>
                <tbody>
                <?php if(!empty($pedidos)):?>
                    <?php foreach($pedidos as $pedido):?>
                    <tr>
                        
                        <td><?php echo $pedido->id_orden?></td>
                        <td><?php echo $pedido->rut_usuario?></td>
                        <td><?php echo $pedido->nombre_courier?></td>
                        <td><?php echo $pedido->fecha_compra?></td>
                        <td><?php echo $pedido->total?></td>
                        <td><a href="<?php echo base_url();?>vendedor/pedidos/ver/<?php echo $pedido->id_orden?>" class="btn btn-primary btn-circle">
                                        <i class="fas  fa-eye "></i>
                                    </a>  </td>
                        <td>
                        <a href="<?php echo base_url();?>vendedor/pedidos/delete/<?php echo $pedido->id_orden?>" class="btn btn-danger btn-circle">
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