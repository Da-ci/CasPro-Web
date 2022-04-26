<?php
session_start();

if (isset($_SESSION['User_ID']) && $_SESSION['Type'] == "Marque") {
} else {


    header("Location: index.php");
    exit();
}
