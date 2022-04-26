<?php

class getApiHttp
{

    function login($email, $password)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/login");


        $datas = array("login" => $email, "password" => $password);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        if ($array->message == "Success") {
            if ($array->type == "Admin") {
                session_start();

                $_SESSION["User_ID"] = $array->id;
                $_SESSION["Type"] = $array->type;
                return header('Location: /Projet/index.php');
            } elseif ($array->type == "Marque") {
                session_start();

                $_SESSION["User_ID"] = $array->id;
                $_SESSION["Type"] = $array->type;
                return header('Location: /Projet/index.php');
            }
        } else {

            return header('Location: /Projet/index.php');
        }
    }


    function getUser($id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayUser");


        $datas = array("id" => $id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function getAllUsers()
    {

        $ch = require "init_curl.php";

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayAllUsers");

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function updateUser($id, $name, $phone, $email, $password, $RC, $NIF, $NIS, $AI)
    {
        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/updateUser");


        $datas = array("id" => $id, "name" => $name, "phone" => $phone, "email" => $email, "password" => $password, "RC" => $RC, "NIF" => $NIF, "NIS" => $NIS, "AI" => $AI);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);
    }

    function updateOneUser($id, $name, $phone, $email, $type, $password)
    {
        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/updateOneUser");


        $datas = array("id" => $id, "name" => $name, "phone" => $phone, "email" => $email, "type" => $type, "password" => $password);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);
    }

    function deleteUser($id)
    {
        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/deleteUser");

        $datas = array("id" => $id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);
    }

    function createUser($name, $email, $password, $type, $phone)
    {
        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/createUser");

        $datas = array("name" => $name, "phone" => $phone, "email" => $email, "password" => $password, "type" => $type);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);
    }

    function getAllBrands()
    {

        $ch = require "init_curl.php";

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayBrands");

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function getProducts($id)
    {
        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayProducts");

        $datas = array("id" => $id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayLivreur($id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayLivreur");


        $datas = array("id" => $id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }
    function displayStocks($id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayStocks");

        $datas = array("id" => $id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayStockProducts($id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayStocksProducts");

        $datas = array("id" => $id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }
    function getAllPdv()
    {

        $ch = require "init_curl.php";

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayPdv");

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }
    function getAllCommandes()
    {

        $ch = require "init_curl.php";

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayCommandes");

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }
    function getinfoCommandes($id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/infoCommande");

        $datas = array("id" => $id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }
    function displayCommandesMarque($id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayCommandesMarque");

        $datas = array("id" => $id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayInfoCommandeMarque($id, $user_id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayInfoCommandeMarque");

        $datas = array("id" => $id, "user_id" => $user_id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function checkStatusCommandeMarque($user_id, $commande_id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/checkStatusCommandeMarque");

        $datas = array("user_id" => $user_id, "commande_id" => $commande_id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayInfoCommandeMarqueAdmin($commande_id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayInfoCommandeMarqueAdmin");

        $datas = array("commande_id" => $commande_id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayArgent()
    {

        $ch = require "init_curl.php";

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayArgent");

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function getNotifications($user_id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/getNotif");

        $datas = array("user_id" => $user_id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }
    function markAllCommandeAsRead($user_id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/markAllCommandeAsRead");

        $datas = array("user_id" => $user_id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayPendingRequest()
    {

        $ch = require "init_curl.php";

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayCommandesEnAttente");

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayPendingRequestMarques($user_id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayCommandesEnAttenteMarques");

        $datas = array("user_id" => $user_id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayDailyEarnings()
    {

        $ch = require "init_curl.php";

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayEarningsDaily");

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayDailyEarningsMarques($user_id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayEarningsDailyMarques");

        $datas = array("user_id" => $user_id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayMonthlyEarnings()
    {

        $ch = require "init_curl.php";

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayEarningsMonthly");

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayMonthlyEarningsMarques($user_id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayEarningsMonthlyMarques");

        $datas = array("user_id" => $user_id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayPercentageTasks()
    {

        $ch = require "init_curl.php";

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayPercentageTasks");

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayNumberProductsMarques($user_id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayNumberProductsMarques");

        $datas = array("user_id" => $user_id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayPdvPieChart()
    {

        $ch = require "init_curl.php";

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayPdvPieChart");

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }

    function displayProductPieChartMarques($user_id)
    {

        $ch = require "init_curl.php";
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8000/api/displayProductPieChartMarques");

        $datas = array("user_id" => $user_id);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);

        $response = curl_exec($ch);

        curl_close($ch);

        $array = json_decode($response);

        return $array;
    }
}
