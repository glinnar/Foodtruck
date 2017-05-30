<?php
include_once "db.php";
include_once "functions.php";


$error=[];
// Get menu row by ID
if(isset($_GET['id'])){
  $query2="SELECT * FROM Menu WHERE id=:id";
  $stmt2 = $pdo->prepare($query2);
  $stmt2->bindParam(':id',$_GET['id']);
  $stmt2->execute();
  $result2 = $stmt2->fetchAll();
}

//Adding new Menu
if(isset($_POST['add'])){
  if(empty($_POST['mname'])){
    $error['mname']= "Name is required";
  }
  else{
      $mname = clear_input($_POST['mname']);
      $querystring='INSERT INTO Menu(mname)VALUES(:mname)';
        $stmt = $pdo->prepare($querystring);
        $stmt ->bindParam(':mname',$mname);
        $stmt->execute();
          header('Location:index.php');
  }
}


//Update new Menu
if(isset($_POST['update'])){
  $mname = clear_input($_POST['mname']);
  $querystring='UPDATE Menu SET mname=:mname';
    $stmt =$pdo->prepare($querystring);
    $stmt ->bindParam(':mname',$mname);
    $stmt->execute();
        header('Location: index.php');
  }

 ?>

<?php include "header.php";?>
<div id="content">

  <form action="add_menu.php" method="post">
    <label for="mname">Menunamn</label>
    <input type="text" id="mname" name="mname" value="<?php if(isset($result)){ echo $result['0']['mname']; } ?>"/>
    <?php if(isset($_GET['id'])) { ?>
    <input type="submit" name="update" value="Update">
    <?php } else { ?>
    <input type="submit" name="add" value="Add">
    <?php } ?>
  </form>


<?php include "footer.php";?>
