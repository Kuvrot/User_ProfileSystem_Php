<?php
 header('Access-Control-Allow-Origin: *');
include 'connect.php';
//$sql = "SELECT m_username from Users";
$stmt = $conn->query("SELECT m_username FROM Users");
$name = "";

while ($row = $stmt->fetch()) {

    $name = $row['m_username'];
    
    ?><a href="viewProfile.php?user=<?php echo $name ?>" 
        class="list-group-item list-group-item-action btn w-25 center-content"> 
           <?php  echo $name?></a>

           <?php 
}
?>



 
