<?php
include_once "db.php";
include_once "functions.php"


 ?>

 <?php include "header.php";?>

<form action="signup.php" method="post">
  <input type="text" id="firstname" name="firstname" placeholder="firstname">
  <input type="text" id="lastname" name="lastname"placeholder="lastname">
  <input type="text" id="username"name="username"placeholder="username">
  <input type="text" id="password"name="password" placeholder="password">
    <input type="submit" name="registera" value="Registrera">
</form>


<?php include "footer.php";?>
