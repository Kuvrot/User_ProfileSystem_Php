<?php

include 'connect.php';
include 'editingProfile.php';

if (isset($_POST['n_username']) && isset($_POST['n_password']) && isset($_POST['n_email']) && isset($_POST['n_bio'])){

    $s_username = $_POST['n_username'];
    $s_email = $_POST['n_email'];
    $cur_id = $_SESSION['m_id'];

    $stmt_1 = $conn->query("SELECT m_username FROM Users WHERE m_username = '$s_username'");
    $stmt_2 = $conn->query("SELECT m_email FROM Users WHERE m_email = '$s_email'");
    
    if ($_SESSION['m_username'] == $s_username){

        if ($_SESSION['m_email'] == $s_email){

            $update_profile_stmt = "UPDATE Users SET m_username = :p_username , m_password = :p_password , m_email = :p_email , m_description = :p_bio WHERE id = '$cur_id' ";
            $updating = $conn->prepare($update_profile_stmt);
            $updating->execute([

            ':p_username' => $s_username,
            ':p_password' => $_POST['n_password'],
            ':p_email' => $s_email,
            ':p_bio' => $_POST['n_bio']

        ]);

        $_SESSION['m_username'] = $s_username;

        header("Location:editProfile.php");

        }

    }else{

        if ($_SESSION['m_email'] == $s_email){

            $update_profile_stmt = "UPDATE Users SET m_username = :p_username , m_password = :p_password , m_email = :p_email , m_description = :p_bio WHERE id = '$cur_id' ";
                $updating = $conn->prepare($update_profile_stmt);
                $updating->execute([
        
                    ':p_username' => $s_username,
                    ':p_password' => $_POST['n_password'],
                    ':p_email' => $s_email,
                    ':p_bio' => $_POST['n_bio']
        
                ]);
        
                $_SESSION['m_username'] = $s_username;
        
                header("Location:editProfile.php");

        }else{

            if ($row = $stmt_1->fetch()){

                echo "That username it's already in use.";
        
            }else if ($row = $stmt_2->fetch()){
        
                echo "The email you provide it's already in use.";
        
            }else{
        
                $update_profile_stmt = "UPDATE Users SET m_username = :p_username , m_password = :p_password , m_email = :p_email , m_description = :p_bio WHERE id = '$cur_id' ";
                $updating = $conn->prepare($update_profile_stmt);
                $updating->execute([
        
                    ':p_username' => $s_username,
                    ':p_password' => $_POST['n_password'],
                    ':p_email' => $s_email,
                    ':p_bio' => $_POST['n_bio']
        
                ]);
        
                $_SESSION['m_username'] = $s_username;
        
                header("Location:editProfile.php");
        
            }
        }

    }

    


}else{

    echo "AN UNEXPECTED AND PROBABLY UNKNOWN ERROR HAPPENED, PLEASE TRY AGAIN";

}

function update_profile (){



}


?>