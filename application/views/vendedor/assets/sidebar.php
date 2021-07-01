<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url("/");?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-shopping-basket"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Feri-app</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url("vendedor");?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administración
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario"
                    aria-expanded="true" aria-controls="collapseInventario">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Gestión inventario</span>
                </a>
                <div id="collapseInventario" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones de inventario:</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>vendedor/productos">Listar productos</a>
                        <a class="collapse-item" href="<?php echo base_url();?>vendedor/productos/add">Añadir producto</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFinanzas"
                    aria-expanded="true" aria-controls="collapseFinanzas">
                    <i class="fas fa-fw fa-money-bill-wave"></i>
                    
                    <span>Finanzas</span>
                </a>
                <div id="collapseFinanzas" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Control de Finanzas:</h6>
                        <a class="collapse-item" href="<?php echo base_url();?>vendedor/pedidos">Mostrar pedidos</a>
      
                    </div>
                </div>
            </li>

			<!-- Nav Item - Utilities Collapse Menu -->
			<?php if($rol == 1):?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmpleados"
                    aria-expanded="true" aria-controls="collapseEmpleados">
                    <i class="fas fa-fw fa-user-friends"></i>
                    
                    <span>Empleados</span>
                </a>
                <div id="collapseEmpleados" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Control de Empleados:</h6>
						<a class="collapse-item" href="<?php echo base_url();?>vendedor/empleados/add">Agregar Empleado</a>
                        <a class="collapse-item" href="<?php echo base_url();?>vendedor/empleados">Empleados Activos</a>
                    </div>
                </div>
            </li>
			<?php endif;?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
