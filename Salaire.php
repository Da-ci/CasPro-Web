<?php


require("auth_session_admin.php");
require_once('Api/http.php');


$a = new getApiHttp();

$array = $a->getUser($_SESSION["User_ID"]);

$arrayArgent = $a->displayArgent();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Salaire</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="js/demo/datatables.js"></script>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav y sidebar sidebar-dark accordion" style="background-color:#f9b233 ; border-color:#f9b233 ; color:white" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Dashboard.php">
                <div class="sidebar-brand-text mx-3">Caspro</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Navigation
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="Utilisateur.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Utilisateurs</span></a>
            </li>
            <li class="nav-item">

                <a class="nav-link" href="Marque.php">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Marque</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Pv.php">
                    <i class="fas fa-fw fa-globe"></i>
                    <span>Point De Vente</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Commande.php">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Commandes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Salaire.php">
                    <i class="fas fa-fw fa-coins"></i>
                    <span>Salaire</span></a>
            </li>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!--  Notifications  -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifications
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">

                                    <div>
                                        <div class="small text-gray-500">Aucune notification</div>
                                    </div>
                                </a>


                            </div>
                        </li>
                        <!--  Notifications  -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo (strtoupper($array->name)); ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Se déconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- breadcrumb -->
                    <ul class="breadcrumb">
                        <li><a href="Dashboard.php">Home</a></li>
                        <li>Salaire</li>
                    </ul>
                    <!-- breadcrumb -->

                    <!-- delete Modal-->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Soldée</h5>
                                </div>

                                <form id="formDeleteModal">
                                    <input type="text" id="idUser" name="getIdUser" value="" readonly hidden>
                                    <div class="modal-body">Veuillez choisir ce Que vous voulez Soldée?</div>
                                    <div class="modal-footer">
                                        <div class="d-flex justify-content-start">
                                            <button type=" button" name="bbn" class="btn btn-warning">Soldée CasPro</button>
                                        </div>
                                        <div class="d-flex flex-row-reverse">
                                            <button type="button" class="btn btn-info">Soldée Commercial</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4" font->

                    <!-- Add -->
                    <div class="card-body">

                        <div id="dataTableUser" class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%">
                                <div class="dropdown mb-4 text-right ">
                                </div>
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>numéro Commande</th>
                                        <th>Marque</th>
                                        <th>Salaire Marque</th>
                                        <th>Salaire Caspro </th>
                                        <th>Salaire Commercial</th>
                                        <th>Status Caspro </th>
                                        <th>Status Commercial </th>
                                        <th style="width:10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($arrayArgent as $argent) { ?>
                                        <tr>
                                            <td><?php echo $argent->id ?></td>
                                            <td> <?php echo $argent->commande->numCommande ?> </td>
                                            <td> <?php echo $argent->user->name ?> </td>
                                            <td><?php echo $argent->salaireMarque ?></td>
                                            <td><?php echo $argent->salaireCaspro ?></td>
                                            <td><?php echo $argent->salaireCommercial ?></td>
                                            <?php if ($argent->soldeMarque == 1) { ?>
                                                <td>
                                                    <div id="statusCaspro<?= $argent->id ?>">
                                                        <span style="font-size: 100%" class="badge badge-success">Soldée</span>
                                                    </div>
                                                </td>
                                            <?php } else { ?>
                                                <td>
                                                    <div id="statusCaspro<?= $argent->id ?>">
                                                        <span style="font-size: 100%" class="badge badge-danger">Non Soldée</span>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            <?php if ($argent->soldeCommercial == 1) { ?>
                                                <td>
                                                    <div id="statusCommercial<?= $argent->id ?>">
                                                        <span style="font-size: 100%" class="badge badge-success">Soldée</span>
                                                    </div>
                                                </td>
                                            <?php } else { ?>
                                                <td>
                                                    <div id="statusCommercial<?= $argent->id ?>">
                                                        <span style="font-size: 100%" class="badge badge-danger">Non Soldée</span>
                                                    </div>
                                                </td>
                                            <?php } ?>

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Soldée
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button type="button" name="<?= $argent->soldeMarque ?>" value="<?= $argent->id ?>" class="payedCasproBtn btn">
                                                            Caspro soldée
                                                        </button>
                                                        <div class="dropdown-divider"></div>
                                                        <button type="button" name="<?= $argent->soldeMarque ?>" value="<?= $argent->id ?>" class="NotpayedCasproBtn btn">
                                                            Caspro non soldée
                                                        </button>
                                                        <div class="dropdown-divider"></div>
                                                        <button type="button" name="<?= $argent->soldeCommercial ?>" value="<?= $argent->id ?>" class="payedCommercialBtn btn">
                                                            Commercial soldée
                                                        </button>
                                                        <div class="dropdown-divider"></div>
                                                        <button type="button" name="<?= $argent->soldeCommercial ?>" value="<?= $argent->id ?>" class="NotpayedCommercialBtn btn">
                                                            Commercial non soldée
                                                        </button>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->


        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">déconnecter</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">voulez vous vraiment vous déconnecter?</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white" v href="logout.php">déconnexion</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('table tbody').on('click', '.payedCasproBtn', function() {
                var id = $(this).attr('value');
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/casproPayed",
                    data: {
                        id: id
                    },
                    success: function() {
                        $("#statusCaspro" + id).html('<span style="font-size: 100%" class="badge badge-success">Soldée</span>');
                    },
                    error: function() {
                        alert("Something went wrong");
                    },
                });
            });

            $('table tbody').on('click', '.NotpayedCasproBtn', function() {
                var id = $(this).attr('value');
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/casproNotPayed",
                    data: {
                        id: id
                    },
                    success: function() {
                        $("#statusCaspro" + id).html('<span style="font-size: 100%" class="badge badge-danger">Non soldée</span>');
                    },
                    error: function() {
                        alert("Something went wrong");
                    },
                });
            });

            $('table tbody').on('click', '.payedCommercialBtn', function() {
                var id = $(this).attr('value');
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/commercialPayed",
                    data: {
                        id: id
                    },
                    success: function() {
                        $("#statusCommercial" + id).html('<span style="font-size: 100%" class="badge badge-success">Soldée</span>');
                    },
                    error: function() {
                        alert("Something went wrong");
                    },
                });
            });

            $('table tbody').on('click', '.NotpayedCommercialBtn', function() {
                var id = $(this).attr('value');
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/commercialNotPayed",
                    data: {
                        id: id
                    },
                    success: function() {
                        $("#statusCommercial" + id).html('<span style="font-size: 100%" class="badge badge-danger">Non soldée</span>');
                    },
                    error: function() {
                        alert("Something went wrong");
                    },
                });
            });
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>





</body>
<style>
    .wrapper {
        background-color: #6d358b;
        border-color: #6d358b;
        color: white"


    }

    ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
        background-color: #F9F8F8;

    }

    ul.breadcrumb li {
        display: inline;
        font-family: "Gill Sans", sans-serif;
        font-size: 18px;
    }

    ul.breadcrumb li+li:before {
        padding: 8px;
        color: black;
        content: "/\00a0";
    }

    ul.breadcrumb li a {
        color: #6d358b;
        text-decoration: none;
    }

    ul.breadcrumb li a:hover {
        color: grey;
        text-decoration: underline;
    }
</style>

</html>