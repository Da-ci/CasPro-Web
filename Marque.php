<?php

require("auth_session_admin.php");
require_once('Api/http.php');


$a = new getApiHttp();
$array = $a->getUser($_SESSION["User_ID"]);

$arrayBrands = $a->getAllBrands();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marque</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Custom fonts for this template -->

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
                        <li>Marque</li>
                    </ul>
                    <!-- breadcrumb -->



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" font->

                        <!-- Add -->
                        <div class="card-body">

                            <!-- Add -->

                            <div id="dataTableUser" class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%">
                                    <div class="dropdown mb-4 text-right ">
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Date de Creation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($arrayBrands as $brands) { ?>
                                            <tr id="brands<?= $brands->id ?>">
                                                <td><?php echo $brands->id ?></td>
                                                <td class="name<?= $brands->id ?>"><?php echo $brands->name ?></td>

                                                <td><?php echo date('d-m-Y h:i:sa', strtotime($brands->created_at)) ?></td>
                                                <td>

                                                    <a name="infoBtn" href="Stock.php?id=<?= $brands->id ?>" Title="Stocks" class="btn btn-info btn-circle">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                    <a name="infoBtn" href="Livreur.php?id=<?= $brands->id ?>" Title="Livreurs" class="btn btn-info btn-circle">
                                                        <i class="fa-solid fa-truck"></i>

                                                    </a>
                                                    <a name="infoBtn" href="Catalogue.php?id=<?= $brands->id ?>" Title="Catalogue" class="btn btn-info btn-circle">
                                                        <i class="fa-solid fa-book"></i>
                                                    </a>
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

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Caspro 2020</span>
                    </div>
                </div>
            </footer>
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
            $('table tbody').on('click', '.deleteBtn', function() {
                var idHide = $(this).attr('value');
                $('#idUser').val(idHide);
                $('#deleteModal').modal('show');
            });

            $("#addUser").click(function() {
                var password = $("#passwordADD").val();
                var confirmPassword = $("#password2ADD").val();
                if (password != confirmPassword) {
                    $("#checkPassword1").html("Password does not match !").css("color", "red");
                    $("#checkPassword2").html("Password does not match !").css("color", "red");
                    return false;
                }
                return true;
            });

            $('table tbody').on('click', '.updateBtn', function() {
                var idHidden = $(this).attr('value');
                $('#idUserModify').val(idHidden);
                $('#dataTableUser').each(function() {
                    var name = $(this).find(".name" + idHidden).html();
                    var email = $(this).find(".email" + idHidden).html();
                    var phone = $(this).find(".phone" + idHidden).html();
                    var type = $(this).find(".type" + idHidden).html();

                    $('#modal-name').val(name);
                    $('#modal-email').val(email);
                    $('#modal-phone').val(phone);
                    $('#modal-type').val(type);
                });

                $('#updateModal').modal('show');

            });

            $('#formAddModal').on('submit', function() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/createUser",
                    data: {
                        name: $('#nameADD').val(),
                        email: $('#emailADD').val(),
                        password: $('#passwordADD').val(),
                        type: $('#typeADD').val(),
                        phone: $('#phoneADD').val()
                    },
                    error: function() {
                        alert("Something went wrong, be sure that the email is unique and all the data are correct");
                    },
                });
            });

            $('#formUpdateModal').on('submit', function() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/updateOneUser",
                    data: {
                        id: $('#idUserModify').val(),
                        name: $('#modal-name').val(),
                        email: $('#modal-email').val(),
                        password: $('#modal-password').val(),
                        type: $('#modal-type').val(),
                        phone: $('#modal-phone').val()
                    },
                    error: function() {
                        alert("Something went wrong, be sure that the email is unique and all the data are correct");
                    },
                });
            });

            $('#formDeleteModal').on('submit', function() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/deleteUser",
                    data: {
                        id: $('#idUser').val()
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