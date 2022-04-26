<?php


require("auth_session_admin.php");
require_once('Api/http.php');


$a = new getApiHttp();
$array = $a->getUser($_SESSION["User_ID"]);
$arrayBrands = $a->getAllBrands();
$arrayPdv = $a->getAllPdv();

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./vendor/@jarstone/dselect/dist/css/dselect.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
    <script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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

                <!-- breadcrumb -->
                <ul class="breadcrumb">
                    <li><a href="Dashboard.php">Home</a></li>
                    <li><a href="Commande.php">Commandes</a></li>
                    <li>Ajouter Une Commande</li>
                </ul>
                <!-- breadcrumb -->
                <!-- Begin Page Content -->
                <div class="card shadow mb-4">

                    <div class="card-body">
                        <div class="container bootstrap snippets bootdeys">
                            <div class="row">
                                <div class="col-sm-12"><br>
                                    <div class="panel panel-default invoice" id="invoice">
                                        <div class="panel-body">

                                            <div class="d-flex justify-content-between">
                                                <div class="col-xs-4 from">
                                                    <p class="lead marginbottom">De :
                                                        <label><?php echo $array->name ?></label>
                                                    </p>
                                                    <p class="lead marginbottom">Email :
                                                        <label><?php echo $array->email ?></label>
                                                    </p>
                                                    <p class="lead marginbottom">Numéro de téléphone :
                                                        <label><?php echo $array->phone ?></label>
                                                    </p>
                                                </div>

                                                <div class="col-xs-4 to">
                                                    <p class="lead marginbottom">Point de vente :
                                                        <select class="form-select" id="getPv">
                                                            <option value="0">Select a point of sale</option>
                                                            <?php foreach ($arrayPdv as $pdv) { ?>
                                                                <option value="<?php echo $pdv->id ?>"><?php echo $pdv->id ?> - <?php echo $pdv->name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </p>
                                                </div>

                                            </div>
                                            <br>
                                            <br>
                                            <div class="d-flex">
                                                <div class="">
                                                    <p>Marque</p>
                                                    <select id="getMark">
                                                        <option value="0">Marque</option>
                                                        <?php foreach ($arrayBrands as $brand) { ?>
                                                            <option value="<?php echo $brand->id ?>"><?php echo $brand->name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="produit" id="divProduct" style="display:none">
                                                    <p>Produit</p>
                                                    <select class="form-modal" id="getProduct">
                                                        <option value="0">Select a product</option>
                                                    </select>
                                                </div>
                                                <div class="quantite" id="divQuantity" style="display:none">
                                                    <p>Fardeaux</p>
                                                    <input type="number" min="0" id="getQuantity" class="form-control">
                                                </div>


                                            </div>
                                        </div>

                                        <br>
                                        <br>
                                        <br>
                                        <div id="checkProduct"></div>
                                        <div class="d-flex flex-row">
                                            <button type="button" id="addBtn" class="btn btn-success">
                                                <span class="icon text-white-60">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="text">Ajouter</span>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row table-row">
                                            <table id="showTable" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width:10%">id</th>
                                                        <th style="width:20%">Produit</th>
                                                        <th style="width:30%">Fardeaux</th>
                                                        <th style="width:20%">Quantite unitaire</th>
                                                        <th style="width:20%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>

                                        </div>
                                        <br>
                                        <br>
                                        <div class="d-flex flex-row-reverse">
                                            <button id="addCommande" type="button" class="btn btn-primary" style="background-color: #6d358b ; border-color:#6d358b ; color:white" data-toggle="modal" data-target="#addModal">
                                                <span class="icon text-white-60">

                                                </span>
                                                <span class="text">Ajouter La Commande</span>
                                            </button>
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

        <!-- Footer -->

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

    <script src="https://unpkg.com/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./vendor/@jarstone/dselect/dist/js/dselect.js"></script>
    <script>
        dselect(document.querySelector("#getPv"), {
            search: true,
        });

        dselect(document.querySelector("#getMark"), {
            search: true,
        });
    </script>

    <script>
        $(document).ready(function() {

            function addToShowTable(id, item, quantite, realquantite) {
                $('#showTable>tbody').append('<tr> <td>' + id + '</td> <td>' + item + '</td> <td>' + quantite + '</td> <td> ' + realquantite + ' </td> <td> <button type="button" class="deleteBtn btn btn-danger"><i class="fa-solid fa-x"></i></button> </td> </tr>');
            };

            $("#addBtn").click(function() {
                var id = $("#getProduct option:selected").val();
                var item = $("#getProduct option:selected").text();
                var quantite = $("#getQuantity").val();
                var realquantite = $("#getQuantity").val() * $("#getProduct option:selected").attr('class');
                if (item != '' && quantite != 0 && $('#showTable tr > td:contains(' + item + ')').length == 0) {
                    $("#checkProduct").html("");
                    addToShowTable(id, item, quantite, realquantite);
                    $("#getQuantity").val(0);
                } else {
                    $("#checkProduct").html("Fill the all the data correctly !").css("color", "red");
                    $("#getQuantity").val(0);
                }
            });

            $('table tbody').on('click', '.deleteBtn', function() {
                $(this).closest("tr").remove();
            });

            $('#getMark').on('change', function() {
                if ($(this).val() == 0) {
                    $("#divProduct").hide();
                    $("#divQuantity").hide();
                } else {
                    $.ajax({
                        type: "POST",
                        url: "http://localhost:8000/api/displayAvailableProducts",
                        data: {
                            id: $(this).val(),
                        },
                        success: function(rsp) {
                            $('#getProduct').find('option').not(':first').remove();
                            $.each(rsp, function(index, value) {
                                $('#getProduct').append(`<option class="${value.quantity}" value="${value.id}">
                                       ${value.name}
                                  </option>`);
                            });
                            $("#divProduct").show();
                        },
                        error: function() {
                            alert("Something went wrong");
                        },
                    });
                }
            });

            $('#getProduct').on('change', function() {
                if ($(this).val() == 0) {
                    $("#divQuantity").hide();
                } else {
                    $.ajax({
                        type: "POST",
                        url: "http://localhost:8000/api/checkMaxQuantity",
                        data: {
                            id: $("#getProduct").val()
                        },
                        success: function(rsp) {
                            $("#getQuantity").attr({
                                "max": rsp[0].Quantity,
                            });

                            $("#divQuantity").show();
                        },
                        error: function() {
                            alert("Something went wrong");
                        },
                    });
                }
            });

            $("#addCommande").click(function() {
                var arrData = [];
                $("#showTable tr").each(function() {
                    var currentRow = $(this);

                    var col1_value = currentRow.find("td:eq(0)").text();
                    var col2_value = currentRow.find("td:eq(1)").text();
                    var col3_value = currentRow.find("td:eq(2)").text();

                    var obj = {};
                    obj.id = col1_value;
                    obj.name = col2_value;
                    obj.quantity = col3_value;

                    arrData.push(obj);
                });
                arrData.shift();
                if (arrData.length > 0 && $('#getPv').val() != 0) {
                    $.ajax({
                        type: "POST",
                        url: "http://localhost:8000/api/createCommandes",
                        data: {
                            user_id: <?php echo $_SESSION["User_ID"] ?>,
                            pdv_id: $('#getPv').val()
                        },
                        success: function(rsp) {
                            arrData.forEach(function(product) {
                                $.ajax({
                                    type: "POST",
                                    url: "http://localhost:8000/api/attachProductCommandes",
                                    data: {
                                        id: rsp.id,
                                        product_id: product.id,
                                        quantity: product.quantity
                                    },
                                    success: function() {
                                        location.href = '/Projet/Commande.php';
                                    },
                                    error: function() {
                                        alert("Something went wrong");
                                    },
                                });
                            });
                        },
                        error: function() {
                            alert("Something went wrong");
                        },
                    });
                } else {
                    alert("Veuillez remplir la commande avec des produits et précisez un point de vente !")
                }
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
    .scroll {
        width: 120%;
    }

    /*Invoice*/
    .invoice .top-left {
        font-size: 65px;
        color: #3ba0ff;
    }

    .invoice .top-right {
        text-align: right;
        padding-right: 90px;
    }

    .invoice .table-row {
        margin-left: -25px;
        margin-right: -15px;
        margin-top: 25px;
    }

    .invoice .payment-info {
        font-weight: 200;
    }

    .produit {
        margin-left: 200px;
    }

    .quantite {
        margin-left: 200px;


    }

    .quantite1 {
        margin-left: 200px;


    }

    .invoice .table-row .table>thead {
        border-top: 1px solid #ddd;
    }

    .invoice .table-row .table>thead>tr>th {
        border-bottom: none;
    }

    .invoice .table>tbody>tr>td {
        padding: 8px 20px;
    }

    .invoice .invoice-total {
        margin-right: -10px;
        font-size: 16px;
    }

    .invoice .last-row {
        border-bottom: 1px solid #ddd;
    }

    .invoice-ribbon {
        width: 85px;
        height: 88px;
        overflow: hidden;
        position: absolute;
        top: -1px;
        right: 14px;
    }




    @media(max-width:575px) {

        .invoice .top-left,
        .invoice .top-right,
        .invoice .payment-details {
            text-align: center;
        }

        .invoice .from,
        .invoice .to,
        .invoice .payment-details {
            float: none;
            width: 100%;
            text-align: center;
            margin-bottom: 25px;
        }

        .invoice p.lead,
        .invoice .from p.lead,
        .invoice .to p.lead,
        .invoice .payment-details p.lead {
            font-size: 22px;
        }

        .invoice .btn {
            margin-top: 10px;
        }
    }

    @media print {
        .invoice {
            width: 900px;
            height: 800px;
        }
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