<?php 
include 'connect.php';
$session_active = false;
$current_user = "";
session_start();

//Log in
if (isset($_POST['ll_username']) && isset($_POST['ll_password'])){

$l_username = $_POST['ll_username'];
$l_password = $_POST['ll_password'];



$stmt = $conn->query("SELECT * FROM Users WHERE m_username = '$l_username' AND m_password = '$l_password'");

if ($row = $stmt->fetch()){

    ?> <?php
    $session_active = true;
    $_SESSION['m_username'] = $row['m_username'];
    $_SESSION['m_password'] = $row['m_password'];
    $_SESSION['m_email'] = $row['m_email'];
    $_SESSION['m_bio'] = $row['m_description'];
    $_SESSION['m_id'] = $row['id'];
    echo $session_active;

    //header("Location:index.php");
    ?> 

    <?php

}else{

    
    ?> <p><?php echo "user/password are incorrect, please try again.";?> </p><?php  
}

}

//Sign in
if (isset($_POST['ss_username']) && isset($_POST['ss_email']) && isset($_POST['ss_password']) && isset($_POST['ss_password_confirmation'])){

    $s_username = $_POST['ss_username'];
    $s_email = $_POST['ss_email'];

    $stmt_1 = $conn->query("SELECT m_username FROM Users WHERE m_username = '$s_username'");
    $stmt_2 = $conn->query("SELECT m_email FROM Users WHERE m_email = '$s_email'");
    

    if ($row = $stmt_1->fetch()){

        echo "That username it's already in use.";

    }else if ($row = $stmt_2->fetch()){

    echo "The email you provide it's already in use.";

    }else{

       if ($_POST['ss_password'] != $_POST['ss_password_confirmation']){

        echo "The passwords must be the same";  

       }else{

        if ($_POST['ss_password'] != ""){

            if (strlen($s_username) <= 20){
                    
                if (strlen($_POST['ss_password']) <= 20){
                    
                 if (strlen($s_email) <= 30){
                    
                    if (strlen($_POST['ss_bio']) <= 255){
                          
                        $sql_signin = "INSERT INTO Users (m_username , m_password, m_email ,m_description) 
                                        VALUES (:i_username , :i_password , :i_email , :i_bio)";

                        $stmt_signin = $conn->prepare($sql_signin);
                        $stmt_signin->execute([

                            ':i_username' => $s_username , 
                            ':i_password' => $_POST['ss_password'] , 
                            ':i_email' => $s_email , 
                            ':i_bio' => $_POST['ss_bio']


                        ]);

                        $_SESSION['m_username'] = $s_username;
                        $_SESSION['m_email'] = $_POST['ss_email'];
                        $_SESSION['m_bio'] = $_POST['ss_bio'];
                        $_SESSION['m_password'] = $_POST['m_password'];

                        $getid = $conn->query("SELECT id FROM Users WHERE m_username = '$_username'");

                        if ($m_row = $getid->fetch()){
                            $_SESSION['m_id'] = $m_row['id'];
                        }

                        ?> 

                        <p><cite>Registered succesfully</cite></p>
                        <a href="index.html" class="list-group-item list-group-item-action w-25 center-content"> GO HOME</a>

                        <?php

                    }else{
                        echo "Your biography is too long, you're not that important, 255 chars max";
                    }

                  }else{
                    echo "The email is too long, 30 chars max";
                  }
                    
                }else{
                    echo "The password is too long, 20 chars max";
                }

            }else{
                echo "The username is too long, 20 chars max";
            }

            
        }else{

            echo "The password can't be null";
        }
        
       }
        

    }

}


?>