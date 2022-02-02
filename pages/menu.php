<?php
    include 'opendb.php';
    if((!isset ($_SESSION['user']) == true))
    {
      unset($_SESSION['user']);
      session_destroy();
      header('location:../login.php');
      }
     
    $idfuncao = $_SESSION['idfuncao'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema de Gestão de Vidas</title>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../gerencial/dashboard.php">Sistema de gestão de vidas</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Pesquisar..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Mensagens</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../logout.php">Sair</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Gerencial</div>
                            <a class="nav-link" href="../gerencial/pacientes.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-address-card"></i></div>
                                Pacientes
                            </a>
                            <a class="nav-link" href="../importar/lancarPaciente.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-upload"></i></div>
                                Importação
                            </a>
                        
                            <?php if($idfuncao == 1){ ?>
                            <div class="sb-sidenav-menu-heading">Administrativo</div>
                                <a class="nav-link" href="../usuarios/usuarios.php">
                                    <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                    Usuários
                                </a>
                            </div>
                            <?php 
                            }
                        ?>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"></div>
                        
                    </div>
                </nav>
            </div>

            
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

<!-- AUTOCOMPLETE BOOTSTRAP -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


