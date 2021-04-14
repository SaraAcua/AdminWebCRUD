
<?php 
session_start();

if(isset($_SESSION['usuario']))
{

	
} else{
    
header('Location: ingresar.php');
}

?>


<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Desarollo Web</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Opciones
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="index.html">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Panel Administrativo</span>
            </a>
					</li>

					 

					<li class="sidebar-item">
						<a class="sidebar-link" href="clientes.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Clientes</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="productos.php">
              <i class="align-middle" data-feather="archive"></i> <span class="align-middle">Productos</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-settings.html">
              <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-invoice.html">
              <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Invoice</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-blank.html">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
            </a>
					</li>

				</ul>

		
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
        </a>

			

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                          <img src=<?php echo $_SESSION['foto']?> class="avatar img-fluid rounded me-1" alt="Alex" /> <span class="text-dark"><?php echo $_SESSION['usuario']?></span>
                </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="controles/cerrar.php">Cerrar Session</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			