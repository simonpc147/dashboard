<?php
  session_start();

  require 'conexion-db.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }

  
?>
 <?php if(!empty($user)): ?>

    <!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="panelControl" content="" />
        <meta name="Simon" content="" />
        <link rel="shortcut icon" href="">
        <title></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

<!-- H E A D E R  P R I N C I P A L -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark " id="barra-titulo">
            <!-- Barra de Titulo-->
            <a class="navbar-brand ps-3" id="wps" href="#"></a>
            <!-- Barra de Menus-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Boton de Dark-->
            <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-3 me-3 my-1 my-md-0" >
                <li class="nav-item dropdown" id="dark">
                    <a href="#" style="padding-left: var(--bs-navbar-nav-link-padding-x); padding-right: var(--bs-navbar-nav-link-padding-x);">
                        <i class="bi bi-brightness-low" class="dark-button" id="dark-two"></i>
                    </a>
                </li>
            </ul>
             <!-- Boton de Notificacion-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a href="#"  style="padding-left: var(--bs-navbar-nav-link-padding-x); padding-right: var(--bs-navbar-nav-link-padding-x);">
                        <i class="bi bi-bell" id="notificacion"></i>
                    </a>
                </li>
            </ul>
             <!-- Boton de Mensajes-->
             <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a href="#"  style="padding-left: var(--bs-navbar-nav-link-padding-x); padding-right: var(--bs-navbar-nav-link-padding-x);">
                        <i class="bi bi-chat-left-text" id="mensaje"></i>
                    </a>
                </li>
            </ul>
             <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw" id="icon"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" id="cuenta2" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">

                        Bienvenido <b><?= $user['email']; ?></b>

                            </a></li>
                        <li><a class="dropdown-item" data-target="#configuracion" href="#!">Configuracion de cuenta</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <div>
                            <a class="button-salida" href="logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                Cerrar sección
                            </a>
                        </div>
                    </ul>
                </li>
            </ul>
        </nav>
<!--F I N  H E A D E R  P R I N C I P A L -->

<!--  B A R R A  L A T E R A L -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
<!-- PRINCIPAL -->
                        <div class="sb-sidenav-menu-heading">Principal</div>
                            
                            <a class="nav-link" id="whatsapp-One" data-target="#whatsapp" href="#">
                                <div class="sb-nav-link-icon" ><i class="bi bi-whatsapp"></i></div>
                                Whatsapp
                            </a>
                            <a class="nav-link" id="conexiones-One" data-target="#conexiones" href="#">
                                <div class="sb-nav-link-icon" ><i class="bi bi-arrow-left-right"></i></div>
                                Conexiones
                            </a>
                            <a class="nav-link" id="contactos-One" data-target="#contactos" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-rolodex"></i></div>
                                Contactos
                            </a>
                            <a class="nav-link" id="documentos-One" data-target="#documentos" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-file-earmark-text"></i></div>
                                Documentos
                            </a>
                            <a class="nav-link" id="respuesta-One" data-target="#respuesta" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-card-text"></i></div>
                                Respuestas rápidas
                            </a>
                            <!-- <a class="nav-link" id="soporte-One" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-gear"></i></div>
                               Soporte
                            </a> -->
<!-- ADMINISTRACION -->
                        <div class="sb-sidenav-menu-heading">Administración</div>

                            <a class="nav-link" id="equipo-One" data-target="#equipo" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                               Equipo
                            </a>
                            <a class="nav-link" id="chatbots-One" data-target="#chatbots" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-robot"></i></div>
                               Chatbots
                            </a>
                            <a class="nav-link" id="campaña-One" data-target="#campaña" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-gear"></i></div>
                               Campaña
                            </a>
                            <!-- <a class="nav-link"  data-target="#suscripcion" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-gear"></i></div>
                               Suscripción
                            </a> -->
                            <a class="nav-link" id="informes-One" data-target="#informes" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-gear"></i></div>
                               Informes
                            </a>
                            <a class="nav-link" id="configuracion-One" data-target="#configuracion" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-person-fill-gear"></i></div>
                               Configuración
                            </a>
                            <a class="nav-link footer-vacio" >
                                <div class="sb-nav-link-icon"></div>
                            </a>

                        </div>
                    </div>
                </nav>
            </div>
<!--  F I N  B A R R A  L A T E R A L -->


            <div id="layoutSidenav_content">


<!-- Whatsapp -->
                <div class="container-fluid px-4 active" data-content id="whatsapp">
                    <main>
                        <div class="contenedorP">
                            <div class="contenedorP-container">

                            <div class="panel-1">
                                    <div class="card mb-4 container-one three8">
                                        <div class="card-header">
                                            <ul class="nav-tabs">
                                                <li class="nav-item" id="abierto">
                                                    <i class="bi bi-envelope-paper-fill two"></i>
                                                    <a href="#" class="title-active">Abiertos</a>
                                                </li>
                                                <li class="nav-item" id="resuelto">
                                                    <i class="bi bi-check-square-fill two"></i>
                                                    <a href="#" class="title-active">Resueltos</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="buscador">
                                            <div class="buscador2">
                                                <i class="bi bi-search"></i>
                                                <input type="text" class="inputP three" placeholder="Buscar">
                                            </div>
                                        </div>

                                        <div class="abiertos active" data-content id="open">
                                            <div class="abiertos-two">
                                                <div class="nav-tabs">
<!-- Mis Chats-->
                                                    <div class="nav-item" style="display: flex;" id="chats">
                                                        <a class="nav-link subtitle" style="padding-right:7px;" href="#">Mis chats </a>
                                                        <a class="nav-link dropdown-toggle subtitle2" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                            <li><a class="dropdown-item" href="#!">Todos los chats</a></li>
                                                        </ul>
                                                    </div>
 <!-- En espera -->
                                                    <div class="nav-item " id="espera">
                                                        <a class="nav-link subtitle" href="#">En espera</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <ul class="line"></ul>

<!-- Mis Chats-content -->
                                            <div class="multi-select" data-content id="chats-content">
                                                <div class="seccion-m">
                                                    <ul class="nav-tabs">
                                                        <span class="jss617"></span>
                                                        <div class="">
                                                            <i class=""></i>
                                                        </div>
                                                        <div class="multiline">
                                                            <span class="jss609"></span>
                                                            <span class="jss609"></span>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
<!-- Espera-content -->
                                            <div class="espera" data-content id="espera-content">
                                                <div class="jss100">
                                                    <ul class="nav-tabs">
                                                         <div class="jss105 ">
                                                            <span class="jss104">¡Nada acá!</span>
                                                            <p class="jss103" >No se encontraron chats con este término de búsqueda</p>
                                                         </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

<!-- Resueltos -->
                                        <div class="resueltos" data-content id="resolved">
                                            <div class="jss100">
                                                <div class="jss101">
                                                    <ul class="nav-tabs">
                                                     <div class="jss105 ">
                                                        <span class="jss104">¡Nada acá!</span>
                                                        <p class="jss103">No se encontraron chats con este término de búsqueda</p>
                                                     </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </div>

                            <div class="panel-2">
                                <div class="card mb-4 container-two">
                                    <p class="jss104">Selecciona un chat para empezar a chatear</p>
                                </div>
                            </div>
                          </div>
                        </div>
                    </main>

                </div>


<!-- Conexiones -->
                <div class="container-fluid px-4 " data-content id="conexiones">
                    <div class="panel-seccion">
                        <div class="card mb-4 container-seccion">
                            <div class="jss1007">
                                <div class="jss1008">
                                    <h2 class="text-h5">Conexiones</h2>
                                    <div class="jss1009">
                                        <button class="container-prymary">
                                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">AGREGAR </a>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="#!"><i class="bi bi-whatsapp"></i> Whatsapp</a></li>
                                                <!-- <li><a class="dropdown-item" href="#!"><i class="bi bi-facebook"></i> Facebook</a></li>
                                                <li><a class="dropdown-item" href="#!"><i class="bi bi-instagram"></i> Instagram</a></li> -->
                                            </ul>
                                        </button>
                                    </div>
                                </div>
                                <div class="panel-2">
                                    <table class="multitablet">
                                        <thead class="title-seccion">
                                            <tr>
                                                <th class="MuiTableCell-head">Canal</th>
                                                <th class="MuiTableCell-head dos">Nombre</th>
                                                <th class="MuiTableCell-head dos2">Telefono</th>
                                                <th class="MuiTableCell-head dos3">Estado</th>
                                                <th class="MuiTableCell-head dos4">Seccion</th>
                                                <th class="MuiTableCell-head dos5">Ultima Actualizacón</th>
                                                <th class="MuiTableCell-head dos6">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="multitablet">
                                            <tr>
                                                <td class="MuiTableCell-text">..</td>
                                                <td class="MuiTableCell-text">...</td>
                                                <td class="MuiTableCell-text">...</td>
                                                <td class="MuiTableCell-text">...</td>
                                                <td class="MuiTableCell-text">...</td>
                                                <td class="MuiTableCell-text">...</td>
                                                <td class="MuiTableCell-text">...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>


 <!-- Contacto -->
        <div class="container-fluid px-4" data-content id="contactos">
            <div class="panel-seccion">
                <div class="card mb-4 container-seccion three">
                    <div class="jss1007">
                        <div class="jss1008">
                            <h2 class="text-h5 two">Contactos</h2>
                            <div class="jss1009">
                                <div class="buscador" >
                                    <div class="buscador3" >
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >Etiquetas </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <div class="buscador">
                                                <div class="buscador-etiquetas">
                                                    <i class="bi bi-search"></i>
                                                    <input type="text" class="inputP" placeholder="Buscar">
                                                </div>
                                                <ol style="border-top: 2px solid rgba(0, 0, 0, 0.12);"></ol>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="buscador">
                                    <div class="buscador3">
                                        <i class="bi bi-search"></i>
                                        <input type="text" class="inputP" placeholder="Buscar">
                                    </div>
                                </div>
                                <div class="jss1009" >
                                    <button class="container-prymary button">
                                        <a class="nav-link" href="#">AGREGAR CONTACTO</a>
                                    </button>
                                    <button class="container-prymary button2">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#!"><i class="bi bi-arrow-bar-up"></i> Importar XLSX</a></li>
                                            <li><a class="dropdown-item" href="#!"><i class="bi bi-arrow-bar-down"></i> Exportar</a></li>
                                        </ul>
                                    </button>
                                </div>
                            </div>


                        </div>
                        <div class="panel-2">
                            <table class="multitablet">
                                <thead class="title-seccion">
                                    <tr>
                                        <th class="MuiTableCell-head">Nombre</th>
                                        <th class="MuiTableCell-head">Whatsapp</th>
                                        <th class="MuiTableCell-head">Correo Electronico</th>
                                        <th class="MuiTableCell-head">Etiquetas</th>
                                        <th class="MuiTableCell-head">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="multitablet">
                                    <tr>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
 <!-- Respuestas... -->
        <div class="container-fluid px-4" data-content id="respuesta">
            <div class="panel-seccion">
                <div class="card mb-4 container-seccion three2">
                    <div class="jss1007">
                        <div class="jss1008">
                            <h2 class="text-h5 two2">Respuestas rápidas</h2>
                            <div class="jss1009">
                                <div class="buscador">
                                    <div class="buscador3">
                                        <i class="bi bi-search"></i>
                                        <input type="text" class="inputP" placeholder="Buscar">
                                    </div>
                                </div>
                                <div class="buscador etiquetas" >
                                    <div class="buscador2" >
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >Etiquetas </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <div class="buscador">
                                                <div class="buscador-etiquetas">
                                                    <i class="bi bi-search"></i>
                                                    <input type="text" class="inputP" placeholder="Buscar">
                                                </div>
                                                <ol style="border-top: 2px solid rgba(0, 0, 0, 0.12);"></ol>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                  <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jss1009" >
                                     <button class="container-prymary">
                                    <a class="nav-link" id="navbarDropdown" href="#" >AÑADIR RESPUESTA RÁPIDA </a>
                                </button>
                                </div>
                            </div>


                        </div>
                        <div class="panel-2">
                            <table class="multitablet">
                                <thead class="title-seccion">
                                    <tr>
                                        <th class="MuiTableCell-head">Atajo</th>
                                        <th class="MuiTableCell-head">Mensaje</th>
                                        <th class="MuiTableCell-head">Comparte</th>
                                    </tr>
                                </thead>
                                <tbody class="multitablet">
                                    <tr>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
<!-- Documentos -->
        <div class="container-fluid px-4" data-content id="documentos">
            <div class="panel-seccion">
                <div class="card mb-4 container-seccion three2">
                    <div class="jss1007">
                        <div class="jss1008">
                            <h2 class="text-h5 two2">Documentos</h2>
                            <!-- <div class="jss1009">
                                <div class="buscador">
                                    <div class="buscador3">
                                        <i class="bi bi-search"></i>
                                        <input type="text" class="inputP" placeholder="Buscar">
                                    </div>
                                </div>
                                <div class="buscador etiquetas" >
                                    <div class="buscador2" >
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >Etiquetas </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <div class="buscador">
                                                <div class="buscador-etiquetas">
                                                    <i class="bi bi-search"></i>
                                                    <input type="text" class="inputP" placeholder="Buscar">
                                                </div>
                                                <ol style="border-top: 2px solid rgba(0, 0, 0, 0.12);"></ol>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                  <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jss1009" >
                                     <button class="container-prymary">
                                    <a class="nav-link" id="navbarDropdown" href="#" >AÑADIR RESPUESTA RÁPIDA </a>
                                </button>
                                </div>
                            </div> -->


                        </div>
                        <!-- <div class="panel-2">
                            <table class="multitablet">
                                <thead class="title-seccion">
                                    <tr>
                                        <th class="MuiTableCell-head">Atajo</th>
                                        <th class="MuiTableCell-head">Mensaje</th>
                                        <th class="MuiTableCell-head">Comparte</th>
                                    </tr>
                                </thead>
                                <tbody class="multitablet">
                                    <tr>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                 </div>
            </div>
        </div>

 <!-- Equipo -->
        <div class="container-fluid px-4" data-content id="equipo">
            <div class="panel-seccion">
                <div class="card mb-4 container-seccion three3">
                    <div class="jss1007">
                        <div class="jss1008">
                            <h2 class="text-h5 two3">Equipo de Trabajo</h2>
                            <div class="jss1009">
                                <div class="buscador">
                                    <div class="buscador3">
                                        <i class="bi bi-search"></i>
                                        <input type="text" class="inputP" placeholder="Buscar">
                                    </div>
                                </div>
                                <div class="jss1009"  style="padding-left: 10px ;">
                                     <button class="container-prymary">
                                    <a class="nav-link" id="navbarDropdown" href="#" >AGREGAR USUARIO </a>
                                </button>
                                    <form action="">

                                    </form>
                                </div>
                            </div>


                        </div>
                        <div class="panel-2">
                            <table class="multitablet">
                                <thead class="title-seccion">
                                    <tr>
                                        <th class="MuiTableCell-head">Nombre</th>
                                        <th class="MuiTableCell-head">Correo Electronico</th>
                                        <th class="MuiTableCell-head">Ultima Sección</th>
                                        <th class="MuiTableCell-head">Acciónes</th>
                                    </tr>
                                </thead>
                                <tbody class="multitablet">
                                    <tr>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
            </div>
        </div>

 <!-- Chatbots -->
        <div class="container-fluid px-4" data-content id="chatbots">
            <div class="panel-seccion">
                <div class="card mb-4 container-seccion three4">
                    <div class="jss1007">
                        <div class="jss1008">
                            <h2 class="text-h5 two4">Chatbots</h2>
                            <div class="jss1009">
                                <div class="jss1009"  style="padding-left: 10px ;">
                                        <button class="container-prymary">
                                    <a class="nav-link" id="navbarDropdown" href="#" >AGREGAR DEPARTAMENTO </a>
                                </button>
                                    <form action="">

                                    </form>
                                </div>
                            </div>


                        </div>
                        <div class="panel-2">
                            <table class="multitablet">
                                <thead class="title-seccion">
                                    <tr>
                                        <th class="MuiTableCell-head">Nombre</th>
                                        <th class="MuiTableCell-head">Color</th>
                                        <th class="MuiTableCell-head">Mensaje de saludo</th>
                                        <th class="MuiTableCell-head">Comportamiento</th>
                                    </tr>
                                </thead>
                                <tbody class="multitablet">
                                    <tr>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
             </div>
        </div>

 <!-- Campaña -->
        <div class="container-fluid px-4" data-content id="campaña">
            <div class="panel-seccion">
                <div class="card mb-4 container-seccion three5">
                    <div class="jss1007">
                        <div class="jss1008">
                            <h2 class="text-h5 two5">Campaña</h2>
                            <div class="jss1009">
                                <div class="buscador">
                                    <p class="parrafo">Mensajes restantes: X</p>
                                </div>
                                <div class="buscador etiquetas" >
                                    <div class="buscador2" >
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >Etiquetas </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <div class="buscador">
                                                <div class="buscador-etiquetas">
                                                    <i class="bi bi-search"></i>
                                                    <input type="text" class="inputP" placeholder="Buscar">
                                                </div>
                                                <ol style="border-top: 2px solid rgba(0, 0, 0, 0.12);"></ol>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                                  <div class="buscador-etiquetas">
                                                    <input type="checkbox" class="inputP" placeholder="Buscar">
                                                    <input type="text">
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="jss1009" >
                                     <button class="container-prymary">
                                    <a class="nav-link" id="navbarDropdown" href="#" >AÑADIR RESPUESTA RÁPIDA </a>
                                </button>
                                </div>
                            </div>
                        </div>

                        <div class="panel-2">
                            <table class="multitablet">
                                <thead class="title-seccion">
                                    <tr>
                                        <th class="MuiTableCell-head">Atajo</th>
                                        <th class="MuiTableCell-head">Mensaje</th>
                                        <th class="MuiTableCell-head">Comparte</th>
                                    </tr>
                                </thead>
                                <tbody class="multitablet">
                                    <tr>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                        <td class="MuiTableCell-text">...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
 <!-- Suscripcion -->
                 <!-- <div class="container-fluid px-4" data-content id="suscripcion">
                    <h1 class="mt-4">Suscripción</h1>
                    <ol class="breadcrumb mb-4"></ol>
                 </div> -->

 <!-- Informes -->
        <div class="container-fluid px-4" data-content id="informes">
            <div class="panel-seccion">
                <div class="card mb-4 container-seccion two6">
                    <div class="contenedorP">
                        <div class="contenedorP-container">

                        <div class="panel-2 informe">
                            <div class="card mb-4 container-three">
                                Selecciona un chat para empezar a chatear.
                            </div>
                        </div>
                        <div class="panel-2 informe">
                            <div class="card mb-4 container-three">
                                Selecciona un chat para empezar a chatear.
                            </div>
                        </div>
                        <div class="panel-2 informe">
                            <div class="card mb-4 container-three">
                                Selecciona un chat para empezar a chatear.
                            </div>
                        </div>
                        <div class="panel-2 informe">
                            <div class="card mb-4 container-three">
                                Selecciona un chat para empezar a chatear.
                            </div>
                        </div>

                    </div>

                        <div class="panel informe">
                            <div class="card mb-4 container-three">
                                Selecciona un chat para empezar a chatear.
                            </div>
                        </div>
                        <div class="panel informe">
                            <div class="card mb-4 container-three">
                                Selecciona un chat para empezar a chatear.
                            </div>
                        </div>
                        <div class="panel informe">
                            <div class="card mb-4 container-three">
                                Selecciona un chat para empezar a chatear.
                            </div>
                        </div>
                        <div class="panel informe">
                            <div class="card mb-4 container-three">
                                Selecciona un chat para empezar a chatear.
                            </div>
                        </div>
                        <div class="panel informe">
                            <div class="card mb-4 container-three">
                                Selecciona un chat para empezar a chatear.
                            </div>
                        </div>

                    </div>
                  </div>
            </div>
        </div>

 <!-- Configuracion -->
         <div class="container-fluid px-4" data-content id="configuracion">
            <div class="panel-seccion">
                <div class="card mb-4 container-seccion three6">
                    <h1 class="text-h5 configuration">Configuración</h1>
                    <ol class="breadcrumb mb-4"></ol>
                    <div class="contenedorP">
                        <div class="contenedorP-container" style="width: 55%;">
                            <div class="panel-2 informe">
                                <div class="card mb-4 container">
                                    <div class="">
                                        <div class="jss1010">
                                            <div class="buscador" >
                                                <p class="parrafo2">Idioma de los mensajes generados automáticamente.</p>
                                            </div>
                                            <div class="buscador etiquetas" >
                                                <div class="buscador2 input-button2" >
                                                    <a class="nav-link dropdown-toggle input-a" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <input type="button" class="input-button" name="" id="">
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="#!"> Portugués</a></li>
                                                        <li><a class="dropdown-item" href="#!"> Español</a></li>
                                                        <li><a class="dropdown-item" href="#!"> Inglés</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="MuiDivider-root ">
                                    <div class="">
                                        <div class="jss1010">
                                            <div class="buscador">
                                                <p class="parrafo2">Uso horario.</p>
                                            </div>
                                            <div class="buscador etiquetas" >
                                                <div class="buscador2 input-button2" >
                                                    <a class="nav-link dropdown-toggle input-a" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <input type="button" class="input-button" name="" id="">
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                        <!-- <li><a class="dropdown-item" href="#!"> Portugués</a></li>
                                                        <li><a class="dropdown-item" href="#!"> Español</a></li>
                                                        <li><a class="dropdown-item" href="#!"> Inglés</a></li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="MuiDivider-root ">
                                    <div class="">
                                        <div class="jss1010">
                                            <div class="buscador">
                                                <a href="#" style="text-decoration: none; color: black;" >
                                                    <p class="parrafo2">Borrar datos de la cuenta.</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
         </div>

        <footer class=" bg-light2 mt-auto">
        <div class="container-footer px-4 three7">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted2">Copyright &copy;</div>
                <!-- <div>
                    <a class="text-muted2" href="#">Privacy Policy</a>
                    &middot;
                    <a class="text-muted2" href="#">Terms &amp; Conditions</a>
                </div> -->
            </div>
        </div>
        </footer>
    </div>

        </div>


        <script type="text/javascript" src="./js/index.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>


<?php else: ?>

<?php header('Location: index.php');?>

<?php endif; ?>

