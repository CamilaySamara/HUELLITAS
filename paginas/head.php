<!-- contiene el menu lateral y el menu de navegacion  -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Huellitas</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- link Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>

<body id="page-top">

    <!-- Contenedor  -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../paginas/index.php">
                <div class="sidebar-brand-icon rotate-n-15">

                    <!-- logo de ;)  https://fontawesome.com/search aqui se descargan -->
                    <i class="fas fa-paw" style="color: #fff;"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HUELLITAS </div>
            </a>

            <!-- Linea de separacion  -->
            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../paginas/index.php">
                    <i class="fas fa-star" style="color: #fff;"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Linea de separacion  -->
            <hr class="sidebar-divider my-0">



            <!-- Clientes -->
            <div class="sidebar-heading">
                Clientes y Veterinarios
            </div>

            <!-- Menu de Clientes -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../clientes/index.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user-friends" style="color: #fff;"></i>
                    <span>clientes</span>
                </a>

            </li>



            <!-- Menu de veterinario -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../veterinario/index.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user-nurse" style="color: #fff;"></i>
                    <span>veterinario</span>
                </a>

            </li>

            <!-- Linea de separacion  -->
            <hr class="sidebar-divider my-0">


            <!-- Citas -->
            <div class="sidebar-heading">
                Citas
            </div>

            <!-- Menu de Citas -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../citas/index.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-regular fa-handshake fa-beat" style="color: #fff;"></i>
                    <span>citas</span>
                </a>

            </li>

            <!-- Linea de separacion  -->
            <hr class="sidebar-divider my-0">

            <!-- Macotas -->
            <div class="sidebar-heading">
                Macotas
            </div>

            <!-- Menu de Macotas -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../mascotas/index.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-regular fa-handshake fa-paw" style="color: #fff;"></i>
                    <span>Macotas</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../tipoMascota/index.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-regular fa-handshake fa-paw" style="color: #fff;"></i>
                    <span>Tipo de Mascotas</span>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../raza/index.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-regular fa-handshake fa-paw" style="color: #fff;"></i>
                    <span>Raza</span>
                </a>

            </li>

            <!-- Linea de separacion  -->
            <hr class="sidebar-divider my-0">


            <!--razas -->
            <div class="sidebar-heading">
                Vacunas
            </div>

            <!-- Menu de vacuna -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../vacuna/index.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-regular fa-handshake fa-syringe" style="color: #fff;"></i>
                    <span>Vacunas</span>

                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../tipoVacuna/index.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-regular fa-handshake fa-syringe" style="color: #fff;"></i>
                    <span>Tipo de Vacunas</span>

                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="../tipoAlimentacion/index.php" aria-expanded="true" aria-controls="collapseTwo">
                   
                    <i class="fas fa-drumstick-bite" style="color: #fff;"></i>
                    <span>Tipo de Alimentacion</span>

                </a>

            </li>

            <!-- Linea de separacion  -->
            <hr class="sidebar-divider my-0">



        </ul>
        <!-- Final del Menu Izquierdo -->






        <!-- Inicio del menu superior -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Buscador -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!--  Usuario-->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Nombre del Usuario</span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>

                            <!-- Informacion del Usuario -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


                                <a class="btn btn-user" href="../index.html">
                                    <p>Cerrar Sesion</p>
                                </a>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- Final del menu Superior -->