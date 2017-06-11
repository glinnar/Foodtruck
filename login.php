<?php

include_once "db.php";
include_once "functions.php";
session_start();

if(isset($_POST['login'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $count="0";


$query = "SELECT * FROM Users WHERE username=:username
AND password=:password";
$stmt = $pdo->prepare($query);
$stmt ->bindParam(':username',$_POST['username']);
$stmt ->bindParam(':password',$_POST['password']);
$stmt->execute();
$result=$stmt->fetchAll();

if($count =="1"){
  $_SESSION['username']=$username;
  $_SESSION['password']=$password;
  header('Location: index.php');
}
}
?>

<?php include "header.php";?>

<form action="login.php" method="post">
  <input type ="text" id="username" name="username" placeholder="username">
  <input type="text"id="password"name="password" placeholder="password">
  <input type ="submit" id="login" name="login" value="Logga in"/>
</form>

<?php include "footer.php";?>
