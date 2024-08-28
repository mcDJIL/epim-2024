<?php

include "conn.php";

if(isset($_SESSION['login'])) {

} else {
    header('location: ./page/login-regis/login.php');
}