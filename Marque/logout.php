<?php

session_start();
$_SESSION = array();
session_destroy();

return header('Location: /Projet/index.php');
