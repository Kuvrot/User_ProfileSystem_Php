<?php 
include 'connect.php';
$session_active = false;
$current_user = "";
session_start();

if (isset($_POST['ll_username']) && isset($_POST['ll_password'])){

$l_username = $_POST['ll_username'];
$l_password = $_POST['ll_password'];



$stmt = $conn->query("SELECT m_username , m_password FROM Users WHERE m_username = '$l_username' AND m_password = '$l_password'");

if ($row = $stmt->fetch()){

    ?> <p><?php echo "Session started";?> </p><?php
    $session_active = true;
    $_SESSION['m_username'] = $row['m_username'];
    
    ?> 
    <p><cite>Log in succesfully</cite></p>
    <a href="index.html" class="list-group-item list-group-item-action w-25 center-content"> GO HOME</a>

    <?php

}else{

    
    ?> <p><?php echo "user/password are incorrect, please try again.";?> </p><?php  
}

}




?>