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

}
//Addin new Dish to Menu
if(isset($_POST['add'])){
  if(empty($_POST['fname'])){
    $error['fname']="Name is required";
  }
  if(empty($_POST['fdescription'])){
    $error['fdescription']="A Description is required";
  }
  if(empty($_POST['price'])){
    $error['price']="Price is required";
  }

if(empty($error)){
    $fname = clear_input($_POST['fname']);
    $fdescription = clear_input($_POST['fdescription']);
    $price = clear_input($_POST['price']);

    $querystring='INSERT INTO Food (fname,fdescription,price)
    VALUES(:fname,:fdescription,:price)';

    $stmt = $pdo->prepare($querystring);
    $stmt->bindParam(':fname',$fname);
    $stmt->bindParam(':fdescription',$fdescription);
    $stmt->bindParam(':price',$price);
    $stmt->execute();
    header('Location:index.php');
}
else{
  echo "All fields must be filled";
}
}

if(isset($_POST['update'])){
    $fname = clear_input($_POST['fname']);
    $fdescription = clear_input($_POST['fdescription']);
    $price = clear_input($_POST['price']);
    $querystring='UPDATE Food SET fname=:fname';
    $stmt =$pdo->prepare($querystring);
    $stmt->bindParam(':fname',$fname);
    $stmt->bindParam(':fdescription',$fdescription);
    $stmt->bindParam(':price',$fdescription);
    $stmt-->execute();
    header('Location:index.php');
}

?>

<?php include "header.php";?>
<div id="content">
  <form action="add_dish.php" method="post">
  <label for="fname">Maträtt</label>
  <input type="text" id="fname"name="fname" value="<?php if(isset($result)){echo $result['0']['fname'];}?>"/>
  <label for="fdescription">Beskrivning</label>
  <textarea id="fdescription" name="fdescription" value="<?php if(isset($result)){echo $result['0']['fdescription'];}?>"></textarea>
  <label for="price">Pris</label>
  <input type="text"id="price"name="price"value="<?php if(isset($result)){echo $result['0']['price'];}?>"/>
  <?php if(isset($_GET['id'])) { ?>
  <input type="submit" name="update" value="Update">
  <?php } else { ?>
  <input type="submit" name="add" value="Add">
  <?php } ?>
  </form>
<?php include "footer.php";?>
