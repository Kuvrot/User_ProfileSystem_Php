<?php
 header('Access-Control-Allow-Origin: *');
include 'connect.php';
include 'sessionManager.php';
//$sql = "SELECT m_username from Users";
$stmt = $conn->query("SELECT m_username FROM Users");
$name = "";

while ($row = $stmt->fetch()) {

    $name = $row['m_username'];


    if ($session_active){
       ?> <h2 class="w-25">You are logged as <?php echo $current_user;?> </h2>
   <?php }{
       ?> <h2 class="w-25">You are not logged yet <?php echo $current_user;?> </h2> <?php
   }

   ?>

    <a href="viewProfile.php?user=<?php echo $name ?>" 
        class="list-group-item list-group-item-action btn w-25 center-content"> 
           <?php  echo $name?></a>

           <?php 
}

//$conn = null;

?>



 
