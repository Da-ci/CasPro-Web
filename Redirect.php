<?php

if (!isset($_SESSION['User_ID'])) {
    return header ('Location: /Projet');
}