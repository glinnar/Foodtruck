<?php
include_once "db.php";
include_once "functions.php";



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
        <li><a href="index.php">Översikt</a></li>
        <li><a href="foodtruck_form.php">Lägg till</a></li>
      </ul>
    </nav>

    <div id="content">
      <table border="1">
        <tr>
          <th>Namn</th>
          <th>Ägare</th>
          <th>Beskriving</th>
          <th>Öppet</th>
          <th>Plats</th>
          <th>Webpage</th>
          <th>Update</th>
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
            <a href="foodtruck_form.php?id=<?php echo $row['id']; ?>">Update</a>
          <td class="fix">
            <form action="index.php" method='post'>
            <input type='hidden' name='id' value='<?php echo $row['id']; ?>'/>
            <input type='submit'id="delete" name='delete' value='Delete'/>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="JS/funcs.js"></script>
</body>
</html>
