<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Feriapp - Registro</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="http://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
<div class="container" >

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0" >
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Crea una cuenta!</h1>
                    </div>
                    <?php if($this->session->flashdata("error")):?>
                        <div class="alert alert-danger">
                            <p><?php echo $this->session->flashdata("error")?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata("success")):?>
                        <div class="alert alert-success">
                            <p><?php echo $this->session->flashdata("success")?></p>
                        </div>
                    <?php endif; ?>
                    <form class="user" action="<?php echo base_url();?>register/register" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="Nombres" name="nombre_usuario">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                    placeholder="Apellido paterno" name="apellido_p">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                    placeholder="Apellido materno" name="apellido_m">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="Rut: XX.XXX.XXX-X" name="rut_usuario">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id=""
                                placeholder="Número de telefono" name="telefono">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Contraseña" name="password">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Confirmar contraseña">
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                        <h1 class="h5 text-gray-900 mb-4">Dirección de despacho</h1>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="nombre_direccion">Número</label>
                                <input type="text" class="form-control form-control-user" id=""
                                    placeholder="Número ej: 1234" name="nombre_direccion">
                            </div>
                            <div class="col-sm-6">
                                <label for="comuna">Comuna</label>
                                <select class="form-control" name="comuna">
                                    <?php if(!empty($comunas)):?>
                                        <?php foreach($comunas as $comuna):?>
                                            <option value="<?php echo $comuna->id_comuna;?>"><?php echo $comuna->nombre_comuna;?></option>
                                            <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id=""
                                    placeholder="Calle" name="calle" >
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id=""
                                    placeholder="Departamento" name="departamento">
                            </div>
                        </div>
                        <button type ="submit" class="btn btn-primary btn-user btn-block">
                            Registrar cuenta
                        </button>

                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?php echo base_url();?>register/registerTienda">Crear una cuenta de vendedor!</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?php echo base_url();?>auth">Ya tienes una cuenta? Ingresa!</a>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>

</div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>