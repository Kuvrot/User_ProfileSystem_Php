<?php
 header('Access-Control-Allow-Origin: *');
include 'connect.php';
include 'sessionManager.php';
//$sql = "SELECT m_username from Users";
$stmt = $conn->query("SELECT m_username FROM Users");
$name = "";

if (isset($_SESSION['m_username'])){
    ?> 
    <h2 style="text-align:right; margin-right:5%;">You are logged as <a href="editprofile.php"style="color:blue;"><?php echo $_SESSION['m_username'];?></a> </h2>
    <nav class="nav nav-pills nav-justified w-50 center-table">
        <a class="nav-link active" aria-current="page" href="index.html">HOME</a>
        <a class="nav-link" href="seemyprofile.php">SEE YOUR PROFILE</a>
        <a class="nav-link" href="logout.php">LOG OUT</a>
    </nav>
    
    
<?php }else{
    ?> 
    <h2 style="text-align:right; margin-right:5%;">You are not logged yet </h2>
    <nav class="nav nav-pills nav-justified w-50 center-table">
        <a class="nav-link active" aria-current="page" href="index.html">HOME</a>
        <a class="nav-link" href="login.html">LOGIN</a>
        <a class="nav-link" href="signin.html">SIGN IN UP</a>
    </nav>
     <?php
}

while ($row = $stmt->fetch()) {

    $name = $row['m_username'];

   ?>

    <a style="margin-top:2.5%;" href="viewProfile.php?user=<?php echo $name ?>" 
        class="list-group-item list-group-item-action btn w-25 center-content"> 
           <?php  echo $name?></a>

           <?php 
}

//$conn = null;

?>



 
