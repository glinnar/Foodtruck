<?php
include_once "db.php";
include_once "functions.php";

$name = clear_input($_POST['name']);
$owner = clear_input($_POST['owner']);
$description = clear_input($_POST['description']);
$open = clear_input($_POST['open']);
$location = clear_input($_POST['location']);
$homepage = clear_input($_POST['homepage']);

if(isset($_POST['update'])){
  $querystring= 'UPDATE Foodtruck SET id=:id,name=:name,owner=:owner,
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
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <input type="text"name="name" placeholder="Namn"> <?php if (isset($error['name'])) { echo $error['name']; } ?>
  <input type="text"name="owner" placeholder="Ägare"> <?php if (isset($error['owner'])) { echo $error['owner']; } ?>
  <input type="text"name="description" placeholder="Beskrivning"><?php if (isset($error['description'])) { echo $error['description']; } ?>
  <input type="text"name="open" placeholder="Öppet"> <?php if (isset($error['open'])) { echo $error['open']; } ?>
  <input type="text"name="location" placeholder="Plats"> <?php if (isset($error['location'])) { echo $error['location']; } ?>
  <input type="text"name="homepage" placeholder="Hemsida"> <?php if (isset($error['webpage'])) { echo $error['webpage']; } ?>
  <input type="submit" name="update" value="Update">
</form>
<td class="fix">
  <form action="adminpage.php" method='post'>
  <input type='hidden' name='id' value='<?php echo $row['id']; ?>'/>
  <input type='submit'  name='update' value='Update'/>
  </form>
</td>
