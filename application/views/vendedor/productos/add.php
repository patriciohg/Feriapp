<!-- Begin Page Content -->
<div class="container-fluid">

    <form class="user" action="<?php echo base_url();?>vendedor/productos/store" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control form-control-user"
                placeholder="Nombre del producto" name="nombre">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" name="categoria">
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
                rows="10" name="descripcion"></textarea>
        </div>
        <div class="form-group">
            <label>Precio</label>
            <input type="text" class="form-control form-control-user"
                placeholder="Precio ($)" name="precio">
        </div>
        <div class="form-group">
            <label>Stock</label>
            <input type="text" class="form-control form-control-user"
                placeholder="Productos en stock" name="stock">
        </div>
        <div class ="form-group">
        <label for="userfile">Imagen: </label>
            <input type="file" name="userfile" value="fichero" >                                    
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