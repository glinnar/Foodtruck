<?php
include_once "db.php";
include_once "functions.php";

$error=[];

if(isset($_GET['id'])){
  $query3="SELECT * FROM Food WHERE id=:id";
  $stmt3=$pdo->prepare($query3);
  $stmt3->bindParam(':id',$_GET['id']);
  $stmt3->execute();
  $result3=$stmt3->fetchAll();
echo debug($result3);
}
//Addin new Dish to Menu
if(isset($_POST['add'])){
if(empty($_POST['fname'])){
  $error['fname']="Name is required";
}
if(isset($_POST['fdescription'])){
  $error['fdescription']="A Description is required";
}
if(isset($_POST['price'])){
  $error['price']="Price is required";
}
else{
    $fname = clear_input($_POST['fname']);
    $fdescription = clear_input($_POST['fdescription']);
    $price = clear_input($_POST['price']);

    $querystring3='INSERT INTO Food (fname,fdescription,price)
    VALUES(:fname,:fdescription,:price)';

    $stmt3 = $pdo->prepare($querystring3);
    $stmt3->bindParam(':fname',$fname);
    $stmt3->bindParam(':fdescription',$fdescription);
    $stmt3->bindParam(':price',$price);
    $stmt3->execute();
  header('Location:index.php');
  }
}

if(isset($_POST['update'])){
  $fname = clear_input($_POST['fname']);
  $fdescription = clear_input($_POST['fdescription']);
  $price = clear_input($_POST['price']);
  $querystring3='UPDATE Food SET fname=:fname';
  $stmt3 =$pdo->prepare($querystring3);
  $stmt3->bindParam(':fname',$fname);
  $stmt3->bindParam(':fdescription',$fdescription);
  $stmt3->bindParam(':price',$fdescription);
  $stmt3->execute();
header('Location:index.php');
}

?>

<html lang="sv">
<head>
  <title>Foodtruck</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <div id="wrapper">
    <header></header>
    <nav>
      <ul class="menu">
        <li><a href="index.php">Start</a></li>
        <li><a href="foodtruck_form.php">Skapa Foodtruck</a></li>
        <li><a href="add_menu.php">Skapa Meny</a></li>
        <li><a href="add_dish.php">Skapa rätt</a></li>
      </ul>
    </nav>

<div id="content">
  <form action="add_dish.php" method="post">
  <label for="fname">Maträttsnämn</label>
  <input type="text" id="fname"name="fname" value="<?php if(isset($result3)){echo $result3['0']['fname'];}?>"/>
  <label for="fdescription">Beskrivning</label>
  <textarea id="fdescription" name="fdescription" value="<?php if(isset($result3)){echo $result3['0']['fdescription'];}?>"></textarea>
  <label for="price">Pris</label>
  <input type="text"id="price"name="price"value="<?php if(isset($result3)){echo $result3['0']['price'];}?>"/>
  <?php if(isset($_GET['id'])) { ?>
  <input type="submit" name="update" value="Update">
  <?php } else { ?>
  <input type="submit" name="add" value="Add">
  <?php } ?>
  </form>
</div>
<footer>
  <h1>Find a foodtruck</h1>
</footer>
</div>
</body>
</html>
