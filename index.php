<?php
include_once "db.php";
include_once "functions.php";



// Deleting new Foodtruck
if (isset($_POST['delete'])) {
  $querystring = 'DELETE FROM foodtruck WHERE id = :id';
  $stmt = $pdo->prepare($querystring);
  $stmt->bindParam(':id', $_POST['id']);
  $stmt->execute();
  header('Location: index.php');
}

if (isset($_POST['delete'])) {
  $querystring = 'DELETE FROM Menu WHERE id = :id';
  $stmt = $pdo->prepare($querystring);
  $stmt->bindParam(':id', $_POST['id']);
  $stmt->execute();
  header('Location: index.php');
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
            <li><a href="add_menu.php">Lägg till</a></li>
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
          </td>
          <td class="fix">
            <form action="index.php" method="post">
            <input type='hidden' name='id' value='<?php echo $row['id']; ?>'/>
            <input type='submit'id="delete"class="delstyle" name='delete' value='Delete'/>
            </form>
          </td>
        </tr>
        <?php } ?>
      </table>

      <table border="1">
        <tr>
          <th>Menu</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
          <?php foreach ($pdo->query('SELECT * FROM Menu') as $row) { ?>
          <tr>
            <td><?php echo $row['mname']; ?></td>

        <td class="fix">
          <a href="add_menu.php?id=<?php echo $row['id']; ?>">Update</a>
        </td>
         <td class="fix">
          <form action="index.php" method='post'>
          <input type='hidden' name='id' value='<?php echo $row['id']; ?>'/>
          <input type='submit'id="delete" class="delstyle" name='delete' value='Delete'/>
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
