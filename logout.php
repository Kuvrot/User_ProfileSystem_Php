<?php

include 'sessionManager.php';

if (isset($_SESSION['m_username'])){
    session_unset();
    session_destroy();
    header("Location: index.html");
    
}else{
    echo "ERROR: no se hizo nada :) \n por algún motivo y no se porqué xd";
}

