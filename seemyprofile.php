<?php
include 'sessionManager.php';

if (isset($_SESSION['m_username'])){

    header("Location:editprofile.php");

}else{

    header("Location:login.html");
}