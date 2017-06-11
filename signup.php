<?php
include_once "db.php";
include_once "functions.php";


$error = [];
if(isset($_GET['id'])){
  $query = "SELECT *FROM Users WHERE id=:id";
  $stmt =$pdo>prepare($query);
  $stmt->bindParam(':id',$GET_['id']);
  $stmt->execute();
  $result =$stmt ->fetchAll();
}

if(isset($_POST['add'])){
if(empty($_POST['firstname'])){
$error['firstname'] ="Firstname is required";
  }
if(empty($_POST['lastname'])){
  $error['lastname']="Lastname is required";
}
if(empty($_POST['username'])){
  $error['username']= "Username is required";
}
if(empty($_POST['password'])){
  $error['password'] = "Password is required";
}
else {
  $firstname= clear_input($_POST['firstname']);
  $lastname = clear_input($_POST['lastname']);
  $username = clear_input($_POST['username']);
  $password = clear_input($_POST['password']);

  $querystring = 'INSERT INTO Users (firstname,lastname,username,password)
  VALUES (:firstname,:lastname,:username,:password)';

$stmt = $pdo-> prepare($querystring);
$stmt->bindParam(':firstname',$firstname);
$stmt->bindParam(':lastname',$lastname);
$stmt->bindParam(':username',$username);
$stmt->bindParam(':password',$password);
$stmt->execute();
header('Location: login.php');
}
}

 ?>

 <?php include "header.php";?>

<form action="signup.php" method="post">
  <input type="text" id="firstname" name="firstname" placeholder="firstname">
  <input type="text" id="lastname" name="lastname"placeholder="lastname">
  <input type="text" id="username"name="username"placeholder="username">
  <input type="text" id="password"name="password" placeholder="password">
  <input type="submit" name="add" value="Registrera">
</form>


<?php include "footer.php";?>
