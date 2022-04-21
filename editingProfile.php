<?php 

include 'sessionManager.php';

?>

<!Doctype html>
<html lang="en">

<head> 
<title>Home</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    
    <nav class="nav nav-pills nav-justified w-50 center-table" style="margin-bottom:2.5%;">
        <a class="nav-link active" aria-current="page" href="editProfile.php">RETURN</a>
    </nav>

<form action="validatechangesApi.php" method="post" class="center-content">
  <div class="form-group center-content">
    <label for="mod_email">Change Username</label>
    <input type="text" name ="n_username"class="form-control w-25 center-content" id="mod_email" aria-describedby="emailHelp" maxlength="20" value="<?php echo $_SESSION['m_username']?>">
  </div>
  <div class="form-group center-content">
    <label for="mod_email">Change Password</label>
    <input type="password" name ="n_password" class="form-control w-25 center-content" id="mod_email" aria-describedby="emailHelp" maxlength="20" value="<?php echo $_SESSION['m_password']?>">
  </div>
  <div class="center-content form-group ">
    <label for="mod_email">Change Email address</label>
    <input type="email" class="form-control center-content w-25" name="n_email" id="mod_email" maxlength = "30" value="<?php echo $_SESSION['m_email']?>">
  </div>
  <div class="form-group w-50 center-content">
    <label for="mod_email">Change Biography</label>
    <textarea class="form-control" name="n_bio"rows="3" maxlength="255"><?php echo $_SESSION['m_bio']?></textarea>
  </div>
  <button type="submit" style="margin-top:2.5%;" class="btn btn-primary center-content">SAVE CHANGES</button>
</form>

<?php ?>


      
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   

</body>

</html>