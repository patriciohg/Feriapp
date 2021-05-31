<!-- Begin Page Content -->
<div class="container-fluid">

    <form class="user" action="<?php echo base_url();?>vendedor/productos/update/<?php echo $producto->id_prod?>" method="post">

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control form-control-user"
                placeholder="Nombre del producto" name="nombre" value="<?php echo $producto->nombre_prod?>">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" name="categoria" value="<?php echo $producto->id_categ?>">
                <?php if(!empty($categorias)):?>
                    <?php foreach($categorias as $categoria):?>
                        <option value="<?php echo $categoria->id_categ;?>"><?php echo $categoria->nombre_categ;?></option>
                        <?php endforeach;?>
                <?php endif;?>
            </select>

        </div>
        <div class="form-group">
            <label>Descripción</label>
            <textarea type="text" class="form-control "
                rows="5" name="descripcion" placeholder="<?php echo $producto->desc_prod?>"></textarea>
        </div>
        <div class="form-group">
            <label>Precio</label>
            <input type="text" class="form-control form-control-user"
                placeholder="Precio ($)" name="precio_act" value="<?php echo $producto->precio_prod_act?>">
        </div>
        <div class="form-group">
            <label>Precio</label>
            <input type="text" class="form-control form-control-user"
                placeholder="Precio ($)" name="precio_ant" value="<?php echo $producto->precio_prod_ant?>">
        </div>
        <div class="form-group">
            <label>Stock</label>
            <input type="text" class="form-control form-control-user"
                placeholder="Productos en stock" name="stock" value="<?php echo $producto->stock_prod?>">
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