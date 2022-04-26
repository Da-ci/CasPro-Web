<?php
session_start();

if (isset($_SESSION['User_ID']) && $_SESSION['Type'] == "Admin") {
} else {


    header("Location: index.php");
    exit();
}
