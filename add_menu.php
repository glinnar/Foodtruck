<?php
include_once "db.php";
include_once "functions.php";


$error=[];
// Get menu row by ID
if(isset($_GET['id'])){
  $query="SELECT * FROM Menu WHERE id=:id";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':id',$_GET['id']);
  $stmt->execute();
  $result = $stmt->fetchAll();
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
          header('Location:add_menu.php');
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

  <form action="add_menu.php" method="post">
    <label for="mname">Menunamn</label>
    <input type="text" id="mname" name="mname" value="<?php if(isset($result)) { echo $result['0']['mname']; } ?>"/>
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
