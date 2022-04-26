<?php

session_start();

if (!isset($_SESSION['User_ID'])) {
    return header('Location: /Projet/login.php');
} elseif (isset($_SESSION['User_ID']) && $_SESSION['Type'] == "Admin") {

    return header("Location: /Projet/Dashboard.php");
} elseif (isset($_SESSION['User_ID']) && $_SESSION['Type'] == "Marque") {

    return header("Location: Marque/Dashboard_Marque.php");
}
