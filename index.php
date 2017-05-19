<?php
include_once "db.php";
include_once "functions.php";

 ?>
<htm lang="sv">
<head>
  <title>Gurra</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
  <div id="wrapper">
    <header>

    </header>
<nav>
<ul class="menu">
  <li><a href="#">Visa Trucks</a></li>
  <li><a href="adminpage.php"> Modifiera Trucks</a></li>
</ul>
</nav>
    <div id="content">
      <h2>Foodtrucks</h2>
      <table border="1">
        <tr>
          <th>Namn</th>
          <th>Ägare</th>
          <th>Beskriving</th>
          <th>Öppet</th>
          <th>Plats</th>
          <th>Webpage</th>
        </tr>
        <?php foreach ($pdo->query('SELECT * FROM Foodtruck') as $row) { ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['owner']; ?></td>
          <td><?php echo $row['description']; ?></td>
          <td><?php echo $row['open']; ?></td>
          <td><?php echo $row['location']; ?></td>
          <td><?php echo $row['homepage']; ?></td>
        </tr>
        <?php } ?>
      </table>
    </div>


  <p>hejj</p>
  <footer>
  <h1>Find a foodtruck</h1>
  </footer>
</div>
</body>
</html>
