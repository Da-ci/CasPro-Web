<?php

require("../auth_session_marque.php");
require_once('../Api/http.php');

$a = new getApiHttp();
$array = $a->getUser($_SESSION["User_ID"]);
$id = $_SESSION["User_ID"];

$a->markAllCommandeAsRead($_SESSION["User_ID"]);

$arrayCommandes = $a->displayCommandesMarque($id);

$arrayNotif = $a->getNotifications($_SESSION["User_ID"]);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Produits</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="../js/demo/datatables.js"></script>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav y sidebar sidebar-dark accordion" style="background-color:#f9b233 ; border-color:#f9b233 ; color:white" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Dashboard_Marque.php">
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


                <a class="nav-link" href="Stock_Marque.php">
                    <i class="fas fa-fw fa-cubes"></i>
                    <span>Stocks</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="Livreur_Marque.php">
                    <i class="fas fa-fw fa-truck"></i>
                    <span>Livreurs</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Catalogue_Marque.php">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Catalogue</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Commande_Marque.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Commande</span></a>
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
                                <?php if (count($arrayNotif) <= 5) { ?>
                                    <?php if (count($arrayNotif) != 0) {  ?>
                                        <span class="badge badge-danger badge-counter"><?= count($arrayNotif) ?></span>
                                    <?php } ?>
                                <?php } else { ?>
                                    <span class="badge badge-danger badge-counter">5+</span>
                                <?php } ?>
                            </a>

                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifications
                                </h6>
                                <?php if (count($arrayNotif) == 0) { ?>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div>
                                            <div class="small text-gray-500">Pas de notifications</div>
                                        </div>
                                    <?php } ?>
                                    <?php foreach ($arrayNotif as $notif) { ?>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div id="showNotif" value="<?= $notif->commande_id ?>" name="<?= $notif->id ?>">
                                                <div class="small text-gray-500"><?= substr($notif->data, 23, 39) ?></div>
                                                <span class="font-weight-bold"><?= $notif->type ?></span>
                                            </div>
                                        <?php } ?>
                                        </a>


                            </div>
                        </li>
                        <!--  Notifications  -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo (strtoupper($array->name)); ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
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
                        <li><a href="Dashboard_Marque.php">Home</a></li>
                        <li>Commandes</li>
                    </ul>
                    <!-- breadcrumb -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">


                        <div class="card-body">



                            <div id="dataTableUser" class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%">
                                    <div class="dropdown mb-4 text-right ">
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Numero de La Commande</th>
                                            <th>Status</th>
                                            <th>Date de Creation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($arrayCommandes as $Commandes) { ?>
                                            <tr>
                                                <td><?php echo $Commandes->id ?></td>
                                                <td class="numCommande<?= $Commandes->id ?>"><?php echo $Commandes->numCommande ?></td>
                                                <td> <?php
                                                        $arrayStatus = $a->checkStatusCommandeMarque($id, $Commandes->id);
                                                        if ($arrayStatus->status == "Validée") {
                                                        ?>

                                                        <span style="font-size: 100%" class="badge badge-success">Validée</span>

                                                    <?php } elseif ($arrayStatus->status == "Refusée") { ?>
                                                        <span style="font-size: 100%" class="badge badge-danger">Refusée</span>
                                                    <?php } elseif ($arrayStatus->status == "Livrée") { ?>
                                                        <span style="font-size: 100%" class="badge badge-success">Livrée</span>
                                                    <?php } else { ?>
                                                        <span style="font-size: 100%" class="badge badge-warning">En Attente</span>
                                                    <?php } ?>
                                                </td>


                                                <td><?php echo date('d-m-Y h:i:sa', strtotime($Commandes->created_at)) ?></td>
                                                <td>
                                                    <a name="infoBtn" href="infocommande_Marque.php?id=<?= $Commandes->id ?>" Title="Info" class="btn btn-primary btn-circle">
                                                        <i class="fas fa-clipboard"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->



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
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">voulez vous vraiment vous déconnecter?</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white" v href="logout.php">déconnexion</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#showNotif').on('click', function() {
                var id_notif = $(this).attr('name');
                var id_commande = $(this).attr('value');
                window.location.replace('infocommande_Marque.php?id=' + id_commande);

                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/markAsRead",
                    data: {
                        id: id_notif
                    },
                    error: function() {
                        alert("Something went wrong");
                    },
                });
            });

        });
    </script>

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