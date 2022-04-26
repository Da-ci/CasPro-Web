<?php

require("auth_session_admin.php");
require_once('Api/http.php');


$a = new getApiHttp();

$array = $a->getUser($_SESSION["User_ID"]);

if (isset($_GET['id'])) {
    $idcommande = $_GET['id'];
    $_SESSION['commandeID'] = $idcommande;
} else {
    $idcommande = $_SESSION['commandeID'];
}

$arrayMarquesPr = $a->displayInfoCommandeMarqueAdmin($idcommande);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Commandes</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
                        <li><a href="Commande.php">Commandes</a></li>
                        <li>Commandes</li>
                    </ul>
                    <!-- breadcrumb -->
                    <!-- delete Modal-->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Refuser</h5>
                                </div>
                                <div class="modal-body">Voulez Vous Vraiment Refuser Ce Produit?</div>
                                <form id="formDeleteModal">
                                    <input type="text" id="idDelete" readonly hidden>
                                    <div class="modal-footer">
                                        <button type="submit" name="subDeleteBtn" class="btn btn-danger btn-block">Refuser</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- avis Modal -->
                    <div class="modal fade" id="AvisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ATTENTION </h5>
                                </div>
                                <div class="modal-body">la quantitée précisée pour ce produit n'est pas disponible dans le stock !!!</div>
                                <input type="text" id="idUser" name="getIdUser" value="" readonly hidden>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-danger btn-block">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- update Modal -->
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Valider</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formUpdateModal">
                                        <input type="text" id="idValide" value="" readonly hidden>
                                        <input type="text" id="quantiteValider" value="" readonly hidden>
                                        <div class="form-group">
                                            <div class="col-md-13">
                                                <text>Livreur:</text>
                                                <select id="getLivreur" class="form-control form-control-user" aria-label="Default select example" required>
                                                    <option value="0">Select a delivery man</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-13">
                                                <text>Stock</text>
                                                <select id="getStock" class="form-control form-control-user" aria-label="Default select example" required>
                                                    <option value="0">Select a Stock</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button name="updateUser" type="submit" class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white">Valider</button>
                                        </div>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="container bootstrap snippets bootdeys">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default invoice" id="invoice">
                                            <div class="panel-body">

                                                <div class="row">

                                                    <div class="col-sm-6 top-left">
                                                        <img src="img/logo.png" height="80px" width="80px">
                                                    </div>
                                                </div>
                                                <hr>
                                                <br>
                                                <br>

                                                <?php for ($i = 0; $i < count($arrayMarquesPr); $i++) { ?>

                                                    <h3> <?php echo $arrayMarquesPr[$i][0]->brand_name ?> </h3>

                                                    <br>

                                                    <div class="row table-row">
                                                        <table id="tableProducts<?= $arrayMarquesPr[$i][0]->brand_id ?>" class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width:10%">id</th>
                                                                    <th style="width:20%">Produit</th>
                                                                    <th style="width:30%">Fardeaux</th>
                                                                    <th style="width:10%">Quantite</th>
                                                                    <th style="width:15%">Prix</th>
                                                                    <th style="width:15%">Action</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($arrayMarquesPr[$i] as $product) { ?>
                                                                    <tr>
                                                                        <td> <?php echo $product->id ?> </td>
                                                                        <td> <?php echo $product->name ?> </td>
                                                                        <td> <?php echo $product->quantity ?> </td>
                                                                        <td class="realQuantity<?= $product->id ?>"> <?php echo $product->realQuantity ?> </td>
                                                                        <td> <?php echo $product->price ?> </td>
                                                                        <td>
                                                                            <?php if (is_null($product->status)) { ?>
                                                                                <button type="button" value="<?= $product->id ?>" name="<?= $arrayMarquesPr[$i][0]->brand_id ?>" class="validerBtn btn btn-success btn-circle">
                                                                                    <i class="fas fa-check"></i>
                                                                                </button>
                                                                                <button type="button" value="<?= $product->id ?>" name="NonValiderCommande" class="deleteBtn btn btn-danger btn-circle">
                                                                                    <i class="fas fa-xmark"></i>
                                                                                </button>
                                                                            <?php } elseif ($product->status == 1) { ?>
                                                                                <span style="font-size: 100%" class="badge badge-success">Accepté</span>
                                                                            <?php } elseif ($product->status == 0) { ?>
                                                                                <span style="font-size: 100%" class="badge badge-danger">Refusé</span>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <br>
                                                    <br>

                                                <?php } ?>

                                                <br>
                                                <br>

                                            </div>
                                        </div>
                                    </div>
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
            $(' table tbody').on('click', '.deleteBtn', function() {
                var idHide = $(this).attr('value');
                $('#idDelete').val(idHide);
                $('#deleteModal').modal('show');
            });

            $(' table tbody').on('click', '.validerBtn', function() {
                var idHide = $(this).attr('value');
                var quantity = 0;
                var user_id = $(this).attr('name');
                var table = "#tableProducts" + user_id;
                $(table).each(function() {
                    quantity = $(this).find(".realQuantity" + idHide).html();
                });
                $('#idValide').val(idHide);
                $('#quantiteValider').val(quantity);
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/displayAvailableStocks",
                    data: {
                        product_id: idHide,
                        quantity: quantity
                    },
                    success: function(rsp) {
                        if (rsp.length > 0) {
                            $('#getStock').find('option').not(':first').remove();
                            $.each(rsp, function(index, value) {
                                $('#getStock').append(`<option value="${value.id}">
                                       ${value.name} - ${value.localisation}
                                  </option>`);
                            });
                            $.ajax({
                                type: "POST",
                                url: "http://localhost:8000/api/displayLivreur",
                                data: {
                                    id: user_id
                                },
                                success: function(rsp) {
                                    $('#getLivreur').find('option').not(':first').remove();
                                    $.each(rsp, function(index, value) {
                                        $('#getLivreur').append(`<option value="${value.id}">
                                       ${value.name}
                                  </option>`);
                                    });
                                    $('#updateModal').modal('show');
                                },
                            });
                        } else {
                            $('#AvisModal').modal('show');
                        }
                    },
                    error: function() {
                        alert("Something went wrong");
                    },
                });

                $('#formUpdateModal').on('submit', function() {
                    if ($('#getStock').val() != 0 && $('#getLivreur').val() != 0) {
                        $.ajax({
                            type: "POST",
                            url: "http://localhost:8000/api/validerCommande",
                            data: {
                                commande_id: <?php echo $idcommande ?>,
                                product_id: $('#idValide').val(),
                                livreur_id: $('#getLivreur').val(),
                                stock_id: $('#getStock').val(),
                                quantity: $('#quantiteValider').val()
                            },
                            error: function() {
                                alert("Something went wrong");
                            },
                        });
                    } else {
                        alert("Veuillez vous assurez que vous avez bien précisez un stock et un livreur");
                    }
                });
            });

            $('#formDeleteModal').on('submit', function() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/refuserCommande",
                    data: {
                        commande_id: <?php echo $idcommande ?>,
                        product_id: $('#idDelete').val()
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