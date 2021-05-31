<!-- Begin Page Content -->
<div class="container-fluid">


<div class="card">
<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Imagen referencial</th>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio actual</th>
                        <th>Stock</th>
                        <th>Ventas</th>  
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td> <img src="<?php echo base_url();?>assets/img/ImgTiendas<?php echo $producto->arch_multi;?>" alt="<?php echo $producto->desc_prod;?>" width="150" height="150">   </td>
                        <td><?php echo $producto->nombre_categ?></td>
                        <td><?php echo $producto->nombre_prod?></td>
                        <td><?php echo $producto->desc_prod?></td>
                        <td><?php echo $producto->precio_prod_act?></td>
                        <td><?php echo $producto->stock_prod?></td>
                        <td><?php echo $producto->cant_ventas?></td>
                    </tr>                
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <form class="user" action="<?php echo base_url();?>vendedor/productos/crear_oferta/<?php echo $producto->id_prod?>" method="post">
        <div class="form-group">
            <label>Precio nuevo</label>
            <input type="text" class="form-control form-control-user"
                placeholder="Precio ($)" name="precio_act" value="<?php echo $producto->precio_prod_act?>">
        </div>
        <button type= "submit" class="btn btn-primary btn-user btn-block">
            <span class="icon text-white-50">
                <i class="fas fa-save"></i>
            </span>
            <span class="text">Guardar</span>
        </button>
        <hr>
    </form>

</div>