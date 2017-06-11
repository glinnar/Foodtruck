<?php
session_start();

if(isset($_POST['logout'])){
  session_start();
  session_destroy();
  header('Location:login.php');
}
 ?>
<?php include"header.php";?>


<h2>Välkommen</h2>
<form method="post" name="logout">
  <input type="submit" name="logout" value="Logga ut">
</form>

<?php include"footer.php";?>
