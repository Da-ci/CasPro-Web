<?php

require("auth_session_login.php");
require_once('Api/http.php');


$a = new getApiHttp();



if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $a->login($email, $password);
}



?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="loginBox"> <img class="user" src="img/logo.png" height="100px" width="100px">

        <h3>Log-In</h3><br>

        <form method="post">
            <div class="inputBox"> <input id="email" type="email" name="email" placeholder="Email" required>
                <input id="pass" type="password" name="password" placeholder="Mot de passe" required>
            </div> <br>
            <input type="submit" name="login" value="s'identifier">
        </form>

    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src=''></script>
    <script type='text/Javascript'></script>
</body>
<style>
    body {
        margin: 0;
        padding: 0;
        background: url("img/17580.jpg");
        height: 100vh;
        font-family: sans-serif;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        overflow: hidden
    }

    @media screen and (max-width: 600px) {
        body {
            background-size: cover;
            background: fixed
        }

    }

    #particles-js {
        height: 100%
    }

    .loginBox {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 350px;
        min-height: 200px;
        background: #000;
        border-radius: 10px;
        padding: 40px;
        box-sizing: border-box
    }

    .user {
        margin: 0 auto;
        display: block;
        margin-bottom: 20px
    }

    h3 {
        margin: 0;
        padding: 0 0 20px;
        color: #6d358b;
        text-align: center
    }

    .loginBox input {
        width: 100%;
        margin-bottom: 20px
    }

    .loginBox input[type="email"],
    .loginBox input[type="password"] {
        border: none;
        border-bottom: 2px solid #262626;
        outline: none;
        height: 40px;
        color: #fff;
        background: transparent;
        font-size: 16px;
        padding-left: 20px;
        box-sizing: border-box
    }

    .loginBox input[type="text"]:hover,
    .loginBox input[type="password"]:hover {
        color: #42F3FA;
        border: 1px solid #42F3FA;
        box-shadow: 0 0 5px rgba(0, 255, 0, .3), 0 0 10px rgba(0, 255, 0, .2), 0 0 15px rgba(0, 255, 0, .1), 0 2px 0 black
    }

    .loginBox input[type="text"]:focus,
    .loginBox input[type="password"]:focus {
        border-bottom: 2px solid #42F3FA
    }

    .inputBox {
        position: relative
    }

    .inputBox span {
        position: absolute;
        top: 10px;
        color: #262626
    }

    .loginBox input[type="submit"] {
        border: none;
        outline: none;
        height: 40px;
        font-size: 16px;
        background: #6d358b;
        color: #fff;
        border-radius: 20px;
        cursor: pointer
    }

    .loginBox a {
        color: #262626;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        text-align: center;
        display: block
    }
</style>

</html>