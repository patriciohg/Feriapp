<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Orden de compra N°<?php echo $orden_compra?></h1>
<p class="mb-4">Detalle del pedido realizado</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detalle pedido</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Imagen producto</th>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio anterior</th>
                        <th>Precio actual</th>
                        <th>Stock</th>
                        <th>Ventas</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Imagen producto</th>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio anterior</th>
                        <th>Precio actual</th>
                        <th>Stock</th>
                        <th>Ventas</th>                   
                    </tr>
                </tfoot>
                <tbody>
                <?php if(!empty($productos)):?>
                    <?php foreach($productos as $producto):?>
                    <tr>
                        <td> <img src="<?php echo base_url();?>assets/img/ImgTiendas<?php echo $producto->arch_multi;?>" alt="<?php echo $producto->desc_prod;?>" width="150" height="150">   </td>
                        <td><?php echo $producto->nombre_categ?></td>
                        <td><?php echo $producto->nombre_prod?></td>
                        <td><?php echo $producto->desc_prod?></td>
                        <td><?php echo $producto->precio_prod_act?></td>
                        <td><?php echo $producto->precio_prod_ant?></td>
                        <td><?php echo $producto->stock_prod?></td>
                        <td><?php echo $producto->cant_ventas?></td>

                    </tr>
                    <?php endforeach;?>
                <?php endif;?>                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>