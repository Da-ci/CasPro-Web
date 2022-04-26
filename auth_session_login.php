<?php
session_start();

if (!isset($_SESSION['User_ID'])) {
} elseif (isset($_SESSION['User_ID']) && $_SESSION['Type'] == "Admin") {

    header("Location: Dashboard.php");
} elseif (isset($_SESSION['User_ID']) && $_SESSION['Type'] == "Marque") {

    header("Location: Marque/Dashboard_Marque.php");
}
