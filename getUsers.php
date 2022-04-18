<?php
 header('Access-Control-Allow-Origin: *');
include 'connect.php';
include 'sessionManager.php';
//$sql = "SELECT m_username from Users";
$stmt = $conn->query("SELECT m_username FROM Users");
$name = "";

if (isset($_SESSION['m_username'])){
    ?> 
    <nav class="nav nav-pills nav-justified w-50 center-table">
        <a class="nav-link active" aria-current="page" href="index.html">HOME</a>
        <a class="nav-link" href="seemyprofile.php">SEE YOUR PROFILE</a>
        <a class="nav-link" href="logout.php">LOG OUT</a>
    </nav>
    
    <h2 class="w-25">You are logged as <?php echo $_SESSION['m_username'];?> </h2>
<?php }else{
    ?> 
    <nav class="nav nav-pills nav-justified w-50 center-table">
        <a class="nav-link active" aria-current="page" href="index.html">HOME</a>
        <a class="nav-link" href="login.html">LOGIN</a>
        <a class="nav-link" href="signin.html">SIGN IN UP</a>
    </nav>
    <h2 class="w-25">You are not logged yet </h2> <?php
}

while ($row = $stmt->fetch()) {

    $name = $row['m_username'];

   ?>

    <a href="viewProfile.php?user=<?php echo $name ?>" 
        class="list-group-item list-group-item-action btn w-25 center-content"> 
           <?php  echo $name?></a>

           <?php 
}

//$conn = null;

?>



 
