<?php


require("../auth_session_marque.php");
require_once('../Api/http.php');


$a = new getApiHttp();



$array = $a->getUser($_SESSION["User_ID"]);

$arrayNotif = $a->getNotifications($_SESSION["User_ID"]);

if (isset($_POST['submit']) && $_POST['password'] == $_POST['confpassword']) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $RC = $_POST['RC'];
    $NIS = $_POST['NIS'];
    $NIF = $_POST['NIF'];
    $AI = $_POST['AI'];
    $id = $_SESSION["User_ID"];



    $a->updateUser($id, $name, $phone, $email, $password, $RC, $NIS, $NIF, $AI,);
    header("Location: profile.php ");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard_Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
                <div class="list">
                    <ul class="breadcrumb">
                        <li><a href="Dashboard.php">Home</a></li>
                        <li><a href="profile.php">Profil</a></li>
                        <li>Editer le Profil</li>
                    </ul>
                </div>
                <div class="container">


                    <div class="col-md-9">
                        <div class="card mb-2">
                            <div class="card-body">
                                <form class="user" method="POST">
                                    <div class="form-group">
                                        <text>Nom</text>

                                        <input type="text" class="form-control form-control-user" id="name" name="name" value="<?php echo ($array->name); ?>">
                                    </div>

                                    <div class="form-group">

                                        <text>Phone</text>
                                        <input type="text" class="form-control form-control-user" id="phone" aria-describedby="phone" name="phone" value="<?php echo ($array->phone); ?>">
                                    </div>
                                    <div class="form-group">

                                        <text>Email</text>
                                        <input type="email" class="form-control form-control-user" id="email" aria-describedby="email" name="email" value="<?php echo ($array->email); ?>">
                                    </div>
                                    <div class="form-group">

                                        <text>Registe de commerce</text>
                                        <input type="text" class="form-control form-control-user" id="RC" aria-describedby="RC" name="RC" value="<?php echo ($array->RC); ?>">
                                    </div>
                                    <div class="form-group">

                                        <text>Numéro d'identification fiscale</text>
                                        <input type="text" class="form-control form-control-user" id="NIF" aria-describedby="NIF" name="NIF" value="<?php echo ($array->NIF); ?>">
                                    </div>
                                    <div class="form-group">

                                        <text>Numéro d'identification statistique</text>
                                        <input type="text" class="form-control form-control-user" id="NIS" aria-describedby="NIS" name="NIS" value="<?php echo ($array->NIS); ?>">
                                    </div>
                                    <div class="form-group">

                                        <text> Article d'imposition</text>
                                        <input type="text" class="form-control form-control-user" id="AI" aria-describedby="AI" name="AI" value="<?php echo ($array->AI); ?>">
                                    </div>

                                    <text>Mot de passe</text>
                                    <input type="password" class="form-control form-control-user" name='password' id="password" min="6" readonly onfocus="this.removeAttribute('readonly');"> </input>
                                    <div id="checkPassword1"></div>


                                    <div class="form-group">

                                        <text>Confirmer Votre Mot de passe</text>

                                        <input type="password" class="form-control form-control-user" name='confpassword' id="password2" readonly onfocus="this.removeAttribute('readonly');"> </input>
                                        <div id="checkPassword2"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 text-right">

                                            <input class="btn  " id="edit" style="background-color:#6d358b ; border-color:#6d358b ; color:white" target="__blank" type="submit" name="submit" href="profile_edit.php">
                                        </div>
                                    </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
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
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">voulez vous vraiment vous déconnecter?</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white" href="logout.php">déconnexion</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>
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

        $("#edit").click(function() {
            var password = $("#password").val();
            var confirmPassword = $("#password2").val();
            if (password != confirmPassword) {
                $("#checkPassword1").html("Password does not match !").css("color", "red");
                $("#checkPassword2").html("Password does not match !").css("color", "red");
                return false;
            }
            return true;
        });
    });
</script>

</html>


<style>
    .list {
        padding-left: 25px;
        padding-right: 15px;
    }

    .container {

        padding: 100px;
        margin-left: 150px;


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