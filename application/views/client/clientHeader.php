<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Feriapp</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
	<link href="<?php echo base_url() ?>/assets/css/cssClient/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url() ?>/assets/css/cssClient/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
	<link href="<?php echo base_url() ?>/assets/css/cssClient/style.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/assets/css/cssClient/carrito.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="<?php echo site_url('/'); ?>">
				<i style="color: Dodgerblue;" class="fas fa-shopping-basket"></i>
        <strong class="blue-text">Feriapp</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect" href="<?php echo site_url('/'); ?>" >Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="<?php echo base_url();?>register/registerTienda" target="_blank">Abrir Tienda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="#"
              target="_blank">Nosotros</a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
					<li class="nav-item">
						<!--Trigger-->
						<a class="nav-link waves-effect" href="<?php echo base_url()."cart";?>">
							<span class="badge red z-depth-1 mr-1"><?php echo $this->cart->total_items(); ?></span>
							<i class="fas fa-shopping-cart"></i>
							<span class="clearfix d-none d-sm-inline-block"> Carrito</span>
						</a>
					</li>

          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="learfix d-none d-sm-inline-block">
                Usuario
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url();?>auth/logout" >
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Salir
                </a>
            </div>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->
