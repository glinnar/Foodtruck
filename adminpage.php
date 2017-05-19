<?php
include_once "db.php";
include_once "functions.php";

$error = [];

// Adding new Foodtruck
if (isset($_POST['add'])) {
  if(empty($_POST["name"])) {
    $error['name'] = "Namn is required";
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
    header('Location: adminpage.php');
  }
}

// Deleting new Foodtruck
if (isset($_POST['delete'])) {
  $querystring = 'DELETE FROM foodtruck WHERE id = :id';
  $stmt = $pdo->prepare($querystring);
  $stmt->bindParam(':id', $_POST['id']);
  $stmt->execute();
  header('Location: adminpage.php');
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
  header('Location: adminpage.php');
}
?>
<html lang="sv">
<head>
  <title>Gurra</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <div id="wrapper">
    <header></header>

    <nav>
      <ul class="menu">
        <li><a href="index.php">Visa Trucks</a></li>
        <li><a href="adminpage.php"> Modifiera Trucks</a></li>
      </ul>
    </nav>

    <div id="content">
        <h2>Lägg till Foodtruck</h2>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text"name="name" placeholder="Namn"> <?php if (isset($error['name'])) { echo $error['name']; } ?>
        <input type="text"name="owner" placeholder="Ägare"> <?php if (isset($error['owner'])) { echo $error['owner']; } ?>
        <input type="text"name="description" placeholder="Beskrivning"><?php if (isset($error['description'])) { echo $error['description']; } ?>
        <input type="text"name="open" placeholder="Öppet"> <?php if (isset($error['open'])) { echo $error['open']; } ?>
        <input type="text"name="location" placeholder="Plats"> <?php if (isset($error['location'])) { echo $error['location']; } ?>
        <input type="text"name="homepage" placeholder="Hemsida"> <?php if (isset($error['webpage'])) { echo $error['webpage']; } ?>
        <input type="submit" name="add" value="Skapa Foodtruck">
      </form>
      <h2>Uppdatera Foodtruck</h2>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text"name="name" placeholder="Namn"> <?php if (isset($error['name'])) { echo $error['name']; } ?>
        <input type="text"name="owner" placeholder="Ägare"> <?php if (isset($error['owner'])) { echo $error['owner']; } ?>
        <input type="text"name="description" placeholder="Beskrivning"><?php if (isset($error['description'])) { echo $error['description']; } ?>
        <input type="text"name="open" placeholder="Öppet"> <?php if (isset($error['open'])) { echo $error['open']; } ?>
        <input type="text"name="location" placeholder="Plats"> <?php if (isset($error['location'])) { echo $error['location']; } ?>
        <input type="text"name="homepage" placeholder="Hemsida"> <?php if (isset($error['webpage'])) { echo $error['webpage']; } ?>
        <input type="submit" name="update" value="Uppdatera">
      </form>

      <table border="1">
        <tr>
          <th>Namn</th>
          <th>Ägare</th>
          <th>Beskriving</th>
          <th>Öppet</th>
          <th>Plats</th>
          <th>Webpage</th>
          <th>Delete</th>
        </tr>
        <?php foreach ($pdo->query('SELECT * FROM Foodtruck') as $row) { ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['owner']; ?></td>
          <td><?php echo $row['description']; ?></td>
          <td><?php echo $row['open']; ?></td>
          <td><?php echo $row['location']; ?></td>
          <td><?php echo $row['homepage']; ?></td>

          <td class="fix">
            <form action="adminpage.php" method='post'>
            <input type='hidden' name='id' value='<?php echo $row['id']; ?>'/>
            <input type='submit'  name='delete' value='Delete'/>
            </form>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>

    <footer>
      <h1>Find a foodtruck</h1>
    </footer>
  </div>
</body>
</html>
