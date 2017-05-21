<?php
include_once "db.php";
include_once "functions.php";

$error = [];
// Get Row by ID
if(isset($_GET['id'])){
  $query = "SELECT * FROM Foodtruck WHERE id=:id";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':id', $_GET['id']);
  $stmt->execute();
  $result = $stmt->fetchAll();
}
// Adding new Foodtruck
if (isset($_POST['add'])) {
  if(empty($_POST["name"])) {
    $error['name'] = "Namn is required";
  }
  if(empty($_POST["owner"])) {
    $error['owner'] = "Owner is required";
  }
  if(empty($_POST["description"])) {
    $error['description'] = "Description is required";
  }
  if(empty($_POST["open"])) {
    $error['open'] = "Opening hours is required";
  }
  if(empty($_POST["location"])) {
    $error['location'] = "Location is required";
  }
  if(empty($_POST["homepage"])) {
    $error['homepage'] = "Homepage is required";
  }
  else {
    $name = clear_input($_POST['name']);
    $owner = clear_input($_POST['owner']);
    $description = clear_input($_POST['description']);
    $open = clear_input($_POST['open']);
    $location = clear_input($_POST['location']);
    $homepage = clear_input($_POST['homepage']);

    $querystring = 'INSERT INTO foodtruck (name,owner,description,open,location,homepage)
     VALUES (:name,:owner,:description,:open,:location,:homepage)';
    $stmt = $pdo->prepare($querystring);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':owner', $owner);
      $stmt->bindParam(':description', $description);
      $stmt->bindParam(':open', $open);
      $stmt->bindParam(':location', $location);
      $stmt->bindParam(':homepage', $homepage);
      $stmt->execute();
    header('Location: foodtruck_form.php');
  }
}
//Update Foodtruck
if(isset($_POST['update'])){
  $name = clear_input($_POST['name']);
  $owner = clear_input($_POST['owner']);
  $description = clear_input($_POST['description']);
  $open = clear_input($_POST['open']);
  $location = clear_input($_POST['location']);
  $homepage = clear_input($_POST['homepage']);
  $querystring= 'UPDATE Foodtruck SET name=:name,owner=:owner,
  description=:description,open=:open,location=:location,homepage=:homepage';
  $stmt =$pdo->prepare($querystring);
  $stmt->bindParam(':name', $_POST['name']);
  $stmt->bindParam(':owner', $owner);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':open', $open);
  $stmt->bindParam(':location', $location);
  $stmt->bindParam(':homepage', $homepage);
  $stmt->execute();
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
      </ul>
    </nav>

<div id="content">
<form action="foodtruck_form.php" method="post" enctype="multipart/form-data">
  <label for="name">Name</label>
  <input type="text" id="name" name="name" value="<?php if(isset($result)) { echo $result['0']['name']; } ?>"/>
  <label for="owner">Owner</label>
  <input type="text" id="owner" name="owner"value="<?php if(isset($result)) { echo $result['0']['owner']; } ?>"/>
  <label for="description">Description</label>
  <textarea id="description" name="description"value="<?php if(isset($result)) { echo $result['0']['description']; } ?>"></textarea>
  <label for="open">open</label>
  <input type="text" id="open" name="open"value="<?php if(isset($result)) { echo $result['0']['open']; } ?>"/>
  <label for="location">Location</label>
  <input type="text" id="location" name="location"value="<?php if(isset($result)) { echo $result['0']['location']; } ?>"/>
  <label for="homepage">homepage</label>
  <input type="text" id="homepage" name="homepage"value="<?php if(isset($result)) { echo $result['0']['homepage']; } ?>"/>
  <?php if(isset($_GET['id'])) { ?>
  <input type="submit" name="update" value="Update">
  <?php } else { ?>
  <input type="submit" name="add" value="Add">
  <?php } ?>
  <input type="file" name="bild" />
  </form>
</div>
<footer>
<h1>Find a foodtruck</h1>
</footer>
</div>
</body>
</html>
