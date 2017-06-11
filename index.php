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
  $querystring2 = 'DELETE FROM Menu WHERE id = :id';
  $stmt2 = $pdo->prepare($querystring2);
  $stmt2->bindParam(':id', $_POST['id']);
  $stmt2->execute();
  header('Location: index.php');
}
if(isset($_POST['delete'])){
  $querystring3='DELETE FROM Food WHERE id=:id';
  $stmt3=$pdo->prepare($querystring3);
  $stmt3->bindParam(':id',$_POST['id']);
  $stmt3->execute();
  header('Location:index.php');
}

?>
<?php include "header.php";?>
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

<table border="1">
  <tr>
    <th>Namn</th>
    <th>Beskrivning</th>
    <th>Price</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>
  <?php foreach ($pdo->query('SELECT * FROM Food')as $row) { ?>
    <tr>
    <td><?php echo $row['fname'];?></td>
    <td><?php echo $row['fdescription'];?></td>
    <td><?php echo $row['price'];?></td>
    <td class="fix">
      <a href="add_menu.php?id=<?php echo $row['id']; ?>">Update</a>
    </td>
     <td class="fix">
      <form action="index.php" method='post'>
      <input type='hidden' name='id' value='<?php echo $row['id']; ?>'/>
      <input type='submit'id="delete" class="delstyle" name='delete' value='Delete'/>
      </form>
    </td>
      <?php } ?>
    </tr>
    </table>
<table border="1">
  <tr>
    <th>Namn</th>
  </tr>
  <?php foreach ($pdo->query('SELECT * FROM Users')as $row){?>
    <tr>
    <td><?php echo $row['firstname'];?></td>
    <td><?php echo $row['lastname'];?></td>
    <td><?php echo $row['username'];?></td>
  </tr>
</table>
      <?php } ?>

<?php include "footer.php";?>
