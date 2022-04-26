<?php


require("auth_session_admin.php");
require_once('Api/http.php');

$a = new getApiHttp();
$array = $a->getUser($_SESSION["User_ID"]);

if (isset($_GET['idStock']) && isset($_GET['idMarque']) && isset($_GET['nameStock'])) {
    $nameStock = $_GET['nameStock'];
    $idStock = $_GET['idStock'];
    $idMarque = $_GET['idMarque'];
    $_SESSION['ProductID'] = $idStock;
    $_SESSION['MarqueID'] = $idMarque;
    $_SESSION['NameStock'] = $nameStock;
} else {
    $idStock = $_SESSION['ProductID'];
    $idMarque =  $_SESSION['MarqueID'];
    $nameStock = $_SESSION['NameStock'];
}

$arrayProducts = $a->getProducts($idMarque);
$arrayProductsStock = $a->displayStockProducts($idStock);
$arrayStock = $a->displayStocks($idMarque);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Produit</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Custom fonts for this template -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css">
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
                <a class="nav-link" href="Utilisateur.php">
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
                        <li><a href="Marque.php">Marque</a></li>
                        <li><a href="Stock.php">Stocks</a></li>
                        <li>Produits</li>
                    </ul>
                    <!-- breadcrumb -->

                    <!-- add Modal -->
                    <div class="modal fade" id="formAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <div class="col-md-13">
                                                <text>Stock</text>
                                                <select id="stockADD" class="form-control form-control-user" aria-label="Default select example" required>
                                                    <?php foreach ($arrayProducts as $product) { ?>
                                                        <option value="<?php echo $product->id ?>"><?php echo $product->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label">Quantité unitaire:</label>
                                            <input id="quantityADD" type="number" class="form-control" required>
                                        </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white">Ajouter</button>
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
                                        <input type="text" id="idProductModify" readonly hidden>
                                        <div class="form-group">
                                            <label class="col-form-label">Quantité unitaire:</label>
                                            <input id="modal-quantite" type="text" class="form-control" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white">Modifier</button>
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
                                <div class="modal-body">voulez vous vraiment Supprimer le Produit ?</div>
                                <form id="formDeleteModal">
                                    <input type="text" id="idProduct" readonly hidden>
                                    <div class="modal-footer">
                                        <button type="submit" value="deleteSTOCK" class="btn btn-danger btn-block">Supprimer le produit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- transfer Modal-->
                    <div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Transfert</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form id="formTransferModal">
                                        <input type="text" id="idProductTransfer" readonly hidden>
                                        <div class="form-group">
                                            <div class="col-md-13">
                                                <text>Stock</text>
                                                <select id="stockTransfer" class="form-control form-control-user" aria-label="Default select example" required>
                                                    <?php foreach ($arrayStock as $stock) { ?>
                                                        <?php if ($stock->name != $nameStock) { ?>
                                                            <option value="<?php echo $stock->id ?>"><?php echo $stock->name ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Quantité unitaire:</label>
                                            <input id="quantityTransfer" type="number" class="form-control" required>
                                        </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white">Transférer</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">


                        <div class="card-body">
                            <button type="button" class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white" data-toggle="modal" data-target="#formAddModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Ajouter</span>
                            </button>
                            <?php if (!empty($arrayProductsStock)) {  ?>
                                <span class="titrestock"><?php echo $nameStock ?></span>
                                <div id="dataTableProduct" class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%">
                                        <div class="dropdown mb-4 text-right ">
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Nom</th>
                                                <th>Quantité unitaire</th>
                                                <th>Date de Creation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($arrayProductsStock as $product) { ?>
                                                <tr>
                                                    <td><?php echo $product->id ?></td>
                                                    <td class="name<?= $product->id ?>"><?php echo $product->name ?></td>
                                                    <td class="quantite<?= $product->id ?>"><?php echo $product->pivot->quantity ?></td>
                                                    <td><?php echo date('d-m-Y h:i:sa', strtotime($product->created_at)) ?></td>
                                                    <td>
                                                        <button type="button" value="<?= $product->id ?>" class="updateBtn btn btn-warning btn-circle">
                                                            <i class="fas fa-marker"></i>
                                                        </button>
                                                        <button type="button" value="<?= $product->id ?>" class="deleteBtn btn btn-danger btn-circle">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <button type="button" value="<?= $product->id ?>" class="transferBtn btn btn-primary btn-circle">
                                                            <i class="fa-solid fa-arrow-right-long"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?PHP } else { ?>
                                            <div class="d-flex justify-content-center">
                                                <img src="img/pas de donnees.jpg" class="center">
                                            </div>
                                        <?PHP } ?>
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

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Caspro 2022</span>
            </div>
        </div>
    </footer>
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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function() {

            $('table tbody').on('click', '.updateBtn', function() {
                var idHidden = $(this).attr('value');
                $('#idProductModify').val(idHidden);
                $('#dataTableProduct').each(function() {
                    var quantite = $(this).find(".quantite" + idHidden).html();

                    $('#modal-quantite').val(quantite);

                });

                $('#updateModal').modal('show');

            });

            $('table tbody').on('click', '.deleteBtn', function() {
                var idHide = $(this).attr('value');
                $('#idProduct').val(idHide);
                $('#deleteModal').modal('show');
            });

            $('table tbody').on('click', '.transferBtn', function() {
                var idHide = $(this).attr('value');
                $('#idProductTransfer').val(idHide);
                $('#transferModal').modal('show');
            });

            $('#formTransferModal').on('submit', function() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/transferProducts",
                    data: {
                        id: $('#idProductTransfer').val(),
                        stock_id: $('#stockTransfer').val(),
                        quantity: $('#quantityTransfer').val()
                    },
                    error: function() {
                        alert("Something went wrong");
                    },
                });
            });

            $('#formAddModal').on('submit', function() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/addProductStocks",
                    data: {
                        id: $('#stockADD').val(),
                        stock_id: <?php echo $idStock ?>,
                        quantity: $('#quantityADD').val()

                    },
                    error: function() {
                        alert("Something went wrong");
                    },
                });
            });

            $('#formUpdateModal').on('submit', function() {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/updateProductsFromStock",
                    data: {
                        id: $('#idProductModify').val(),
                        stock_id: <?php echo $idStock ?>,
                        quantity: $('#modal-quantite').val(),

                    },
                    error: function() {
                        alert("Something went wrong");
                    },
                });
            });

            $('#formDeleteModal').on('submit', function(e) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8000/api/deleteProductsFromStock",
                    data: {
                        id: $('#idProduct').val(),
                        stock_id: <?php echo $idStock ?>
                    },
                    error: function() {
                        alert("Something went wrong");
                    },
                });
            });
        });
    </script>
</body>
<style>
    .titrestock {
        margin-left: 500px;
        font-size: 25px;
        font-weight: bold;
    }

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