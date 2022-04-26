<?php


require("auth_session_admin.php");
require_once('Api/http.php');


$a = new getApiHttp();

$array = $a->getUser($_SESSION["User_ID"]);

$arrayUsers = $a->getAllUsers();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Utilisateur</title>

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
                    <i class="fas fa-fw fa-bars"></i>
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
                        <li>Utilisateur</li>
                    </ul>
                    <!-- breadcrumb -->

                    <!-- add Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formAddModal">
                                        <div class="form-group">
                                            <label class="col-form-label">Nom:</label>
                                            <input id="nameADD" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Email:</label>
                                            <input id="emailADD" type="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Mot De Passe:</label>
                                            <input id="passwordADD" type="text" class="form-control form-control-user" min="6" required> </input>
                                            <div id="checkPassword1"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Confirmer Votre Mot De Passe:</label>
                                            <input id="password2ADD" type="text" class="form-control form-control-user" min="6" required> </input>
                                            <div id="checkPassword2"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Numero De Telephone:</label>
                                            <input id="phoneADD" type="text" class="form-control">
                                        </div>
                                        <div class="form-group" id="rcAddHide">
                                            <label class="col-form-label">Registe de commerce:</label>
                                            <input id="rcADD" type="text" class="form-control">
                                        </div>
                                        <div class="form-group" id="nifAddHide">
                                            <label class="col-form-label">Numéro d'identification fiscale:</label>
                                            <input id="nifADD" type="text" class="form-control">
                                        </div>
                                        <div class="form-group" id="nisAddHide">
                                            <label class="col-form-label">Numéro d'identification statistique:</label>
                                            <input id="nisADD" type="text" class="form-control">
                                        </div>
                                        <div class="form-group" id="aiAddHide">
                                            <label class="col-form-label">Article d'imposition:</label>
                                            <input id="aiADD" type="text" class="form-control">
                                        </div>

                                        <div class="form-group">

                                            <div class="col-md-13">
                                                <text>Type</text>

                                                <select id="typeADD" class="form-control form-control-user" aria-label="Default select example" required>

                                                    <option value="Marque">Marque</option>
                                                    <option value="Commercial">Commercial</option>
                                                    <option value="Admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" id="pourcentageCaspro">
                                            <label class="col-form-label">Pourcentage Caspro:</label>
                                            <input id="pourcentageADD" min="0" max="100" type="number" class="form-control">
                                        </div>


                                </div>
                                <div class="modal-footer">

                                    <button id="addUser" type="submit" class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white">Ajouter</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- update Modal -->
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formUpdateModal">
                                        <input type="text" id="idUserModify" value="" readonly hidden>
                                        <input type="text" id="modal-type" value="" readonly hidden>
                                        <div class="form-group">
                                            <label class="col-form-label">Nom:</label>
                                            <input name="nameModify" type="text" class="form-control" id="modal-name">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Email:</label>
                                            <input name="emailModify" type="text" class="form-control" id="modal-email">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Mot De Passe:</label>
                                            <input id="passwordModify" type="text" class="form-control form-control-user" min="6"> </input>
                                            <div id="checkPasswordModify1"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Confirmer mot de passe:</label>
                                            <input id="passwordModify2" type="text" class="form-control form-control-user" min="6"> </input>
                                            <div id="checkPasswordModify2"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Numero De Telephone:</label>
                                            <input name="phoneModify" type="text" class="form-control" id="modal-phone">
                                        </div>
                                        <div class="form-group" id="pourcentageCasproShow">
                                            <label class="col-form-label">Pourcentage Caspro:</label>
                                            <input type="number" min="0" max="100" class="form-control" id="modal-pourcentageCaspro">
                                        </div>
                                        <div class="form-group" id="rcModifyShow">
                                            <label class="col-form-label">Registe de commerce:</label>
                                            <input type="text" class="form-control" id="modal-rc">
                                        </div>
                                        <div class="form-group" id="nifModifyShow">
                                            <label class="col-form-label">Numéro d'identification fiscale:</label>
                                            <input type="text" class="form-control" id="modal-nif">
                                        </div>
                                        <div class="form-group" id="nisModifyShow">
                                            <label class="col-form-label">Numéro d'identification statistique:</label>
                                            <input type="text" class="form-control" id="modal-nis">
                                        </div>
                                        <div class="form-group" id="aiModifyShow">
                                            <label class="col-form-label">Article d'imposition:</label>
                                            <input type=" text" class="form-control" id="modal-ai">
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button id="updateUser" type="submit" class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white">Modifier</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- delete Modal-->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                                </div>
                                <div class="modal-body">voulez vous vraiment Supprimer l'utilisateur?</div>
                                <form id="formDeleteModal">
                                    <input type="text" id="idUser" name="getIdUser" value="" readonly hidden>
                                    <div class="modal-footer">
                                        <button type="submit" name="subDeleteBtn" class="btn btn-danger btn-block">Supprimer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" font->

                        <!-- Add -->
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white" data-toggle="modal" data-target="#addModal">
                                <span class="icon text-white-60">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Ajouter</span>
                            </button>
                            <!-- Add -->

                            <div id="dataTableUser" class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%">
                                    <div class="dropdown mb-4 text-right ">
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Numero De Telephone</th>
                                            <th>RC</th>
                                            <th>NIF</th>
                                            <th>NIS</th>
                                            <th>AI</th>
                                            <th>Type</th>
                                            <th>Pourcentage Caspro</th>
                                            <th>Date de Creation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($arrayUsers as $user) { ?>
                                            <tr id="user<?= $user->id ?>">
                                                <td><?php echo $user->id ?></td>
                                                <td class="name<?= $user->id ?>"><?php echo $user->name ?></td>
                                                <td class="email<?= $user->id ?>"><?php echo $user->email ?></td>
                                                <td class="phone<?= $user->id ?>"><?php echo $user->phone ?></td>
                                                <td class="rc<?= $user->id ?>"><?php echo $user->RC ?></td>
                                                <td class="nif<?= $user->id ?>"><?php echo $user->NIF ?></td>
                                                <td class="nis<?= $user->id ?>"><?php echo $user->NIS ?></td>
                                                <td class="ai<?= $user->id ?>"><?php echo $user->AI ?></td>
                                                <td class="type<?= $user->id ?>"><?php echo $user->type ?></td>
                                                <td class="pourcentageCaspro<?= $user->id ?>"><?php if (!is_null($user->pourcentageCaspro)) echo $user->pourcentageCaspro . '%' ?></td>
                                                <td><?php echo date('d-m-Y h:i:sa', strtotime($user->created_at)) ?></td>
                                                <td>
                                                    <?php if ($user->id != $_SESSION['User_ID']) { ?>
                                                        <button type="button" value="<?= $user->id ?>" class="updateBtn btn btn-warning btn-circle">
                                                            <i class="fas fa-marker"></i>
                                                        </button>
                                                        <button type="button" value="<?= $user->id ?>" class="deleteBtn btn btn-danger btn-circle">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-secondary btn-circle" disabled>
                                                            <i class="fas fa-marker"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-secondary btn-circle" disabled>
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    <?php } ?>
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

            $("#updateUser").click(function() {
                var password1 = $("#passwordModify").val();
                var confirmPassword1 = $("#passwordModify2").val();
                if (password1 != confirmPassword1) {
                    $("#checkPasswordModify1").html("Password does not match !").css("color", "red");
                    $("#checkPasswordModify2").html("Password does not match !").css("color", "red");
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
                    var pourcentageCaspro = $(this).find(".pourcentageCaspro" + idHidden).html();
                    var RC = $(this).find(".rc" + idHidden).html();
                    var NIF = $(this).find(".nif" + idHidden).html();
                    var NIS = $(this).find(".nis" + idHidden).html();
                    var AI = $(this).find(".ai" + idHidden).html();

                    $('#modal-name').val(name);
                    $('#modal-email').val(email);
                    $('#modal-phone').val(phone);
                    $('#modal-type').val(type);
                    $('#modal-pourcentageCaspro').val(pourcentageCaspro.replace('%', ''));
                    $('#modal-rc').val(RC);
                    $('#modal-nif').val(NIF);
                    $('#modal-nis').val(NIS);
                    $('#modal-ai').val(AI);

                    if (type != 'Marque') {
                        $('#pourcentageCasproShow').hide();
                        $('#modal-pourcentageCaspro').val(null);
                        $('#rcModifyShow').hide();
                        $('#modal-rc').val(null);
                        $('#nifModifyShow').hide();
                        $('#modal-nif').val(null);
                        $('#nisModifyShow').hide();
                        $('#modal-nis').val(null);
                        $('#aiModifyShow').hide();
                        $('#modal-ai').val(null);
                    } else {
                        $('#pourcentageCasproShow').show();
                        $('#rcModifyShow').show();
                        $('#nifModifyShow').show();
                        $('#nisModifyShow').show();
                        $('#aiModifyShow').show();
                    }
                });

                $('#updateModal').modal('show');

            });

            $('#typeADD').on('change', function() {
                if ($(this).val() != 'Marque') {
                    $("#pourcentageCaspro").hide();
                    $("#pourcentageADD").val(null);
                    $('#rcAddHide').hide();
                    $('#rcADD').val(null);
                    $('#nifAddHide').hide();
                    $('#nifADD').val(null);
                    $('#nisAddHide').hide();
                    $('#nisADD').val(null);
                    $('#aiAddHide').hide();
                    $('#aiADD').val(null);

                } else {
                    $('#pourcentageCaspro').show();
                    $('#rcAddHide').show();
                    $('#nifAddHide').show();
                    $('#nisAddHide').show();
                    $('#aiAddHide').show();
                }
            });

            $('#formAddModal').on('submit', function() {
                if ($('#typeADD').val() == "Marque") {
                    if ($("#pourcentageADD").val() == "" || $("#pourcentageADD").val() == 0) {
                        $("#pourcentageADD").val(5)
                    }
                }
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/createUser",
                    data: {
                        name: $('#nameADD').val(),
                        email: $('#emailADD').val(),
                        password: $('#passwordADD').val(),
                        type: $('#typeADD').val(),
                        pourcentageCaspro: $("#pourcentageADD").val(),
                        phone: $('#phoneADD').val(),
                        RC: $('#rcADD').val(),
                        NIF: $('#nifADD').val(),
                        NIS: $('#nisADD').val(),
                        AI: $('#aiADD').val()
                    },
                    error: function() {
                        alert("Something went wrong,");
                    },
                });
            });

            $('#formUpdateModal').on('submit', function() {
                if ($('#modal-type').val() == "Marque") {
                    if ($("#modal-pourcentageCaspro").val() == "" || $("#modal-pourcentageCaspro").val() == 0) {
                        $("#modal-pourcentageCaspro").val(5)
                    }
                }
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/updateOneUser",
                    data: {
                        id: $('#idUserModify').val(),
                        name: $('#modal-name').val(),
                        email: $('#modal-email').val(),
                        password: $('#passwordModify').val(),
                        phone: $('#modal-phone').val(),
                        pourcentageCaspro: $("#modal-pourcentageCaspro").val(),
                        RC: $('#modal-rc').val(),
                        NIF: $('#modal-nif').val(),
                        NIS: $('#modal-nis').val(),
                        AI: $('#modal-ai').val()
                    },
                    error: function() {
                        alert("Something went wrong");
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