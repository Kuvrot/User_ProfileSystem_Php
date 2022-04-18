<?php 
include 'connect.php';
include 'sessionManager.php';

?>

<!Doctype html>
<html lang="en">

<head> 
<title>Main menu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
<?php
if (isset($_SESSION['m_username'])){
  ?> 
  <nav class="nav nav-pills nav-justified w-50 center-table">
  <a class="nav-link" aria-current="page" href="index.html">HOME</a>
  <a class="nav-link" href="logout.php">LOG OUT</a>
  <a class="nav-link" href="editProfile.php">SEE YOUR PROFILE</a>
</nav>
  <?php
}else{
  ?> <nav class="nav nav-pills nav-justified w-50 center-table">
  <a class="nav-link" aria-current="page" href="index.html">HOME</a>
  <a class="nav-link" href="login.html">LOG IN</a>
  <a class="nav-link" href="signin.html">SIGN IN UP</a>
</nav>

<?php 
}

if (isset($_GET['user'])){
    $name = $_GET['user'];
    $stmt = $conn->query("SELECT m_username , m_email , m_description FROM Users WHERE m_username = '$name'");
if ($row = $stmt->fetch()){
?>
<div class="card w-50 center-content" style="margin-top:2.5%">
  <img src="..." class="card-img-top" alt="user image">

  <div class="card-body w-25">
    <h5 class="card-title"><?php echo $row['m_username'] ?></h5>
    <p class="card-text"><?php echo $row['m_description'] ?></p>
    <p class="card-text"><cite><?php echo $row['m_email'] ?></cite></p>
  </div>
</div>

<?php } } ?>
      
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   
<script src="main.js"></script>
</body>

</html>