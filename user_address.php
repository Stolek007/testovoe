<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Адреса юзера</title>
</head>
<body>
  <?php require 'db/db.php'; ?>
  <?php $id = $_POST['user_id'];
  $res = $mysql->prepare("SELECT * FROM `users` WHERE `user_id` = '$id'");
  $res->execute();
  $rows = $res->fetchAll();
  foreach($rows as $row) {
    
  }
  ?>

  <form action="php/add_user_address.php" method="post">
    <input type="hidden" name="user_id" value="<?=$_POST['user_id']; ?>">
    <input type="text" name="city" value="<?=$row['city']; ?>" placeholder="City">
    <input type="text" name="postcode" value="<?=$row['postcode']; ?>" placeholder="Postcode">
    <input type="text" name="region" value="<?=$row['region']; ?>" placeholder="Region">
    <input type="text" name="street" value="<?=$row['street']; ?>" placeholder="Street">
    <input type="submit" name="butt" value="Подтвердить">
  </form>
  <br>
  <form action="user_address.php" method="post">
    <input type="text" name="user_id" value="<?=$_POST['user_id']; ?>">
    <button type="submit" name="city_button">Delete</button>
  </form>
  <?="City:\n" . $row['city'] . "<br />"; ?>
  <form action="user_address.php" method="post">
    <input type="hidden" name="user_id" value="<?=$_POST['user_id']; ?>">
    <button type="submit" name="postcode_button">Delete</button>
  </form>
  <?="Postcode:\n:" . $row['postcode'] . "<br />"; ?>
  <form action="user_address.php" method="post">
    <input type="hidden" name="user_id" value="<?=$_POST['user_id']; ?>">
    <button type="submit" name="region_button">Delete</button>
  </form>
  <?="Region:\n" . $row['region'] . "<br />"; ?>
  <form action="user_address.php" method="post">
    <input type="hidden" name="user_id" value="<?=$_POST['user_id']; ?>">
    <button type="submit" name="street_button">Delete</button>
  </form>
  <?="Street:\n" . $row['street'] . "<br />"; ?>
  <?php $id = $_POST['user_id'];
  if (isset($_POST['city_button'])) {
    $decision = $mysql->query("UPDATE `users` SET `city` = '' WHERE `user_id` = '$id'");
  }

  if (isset($_POST['postcode_button'])) {
    $decision = $mysql->query("UPDATE `users` SET `postcode` = '' WHERE `user_id` = '$id'");
  }

  if (isset($_POST['region_button'])) {
    $decision = $mysql->query("UPDATE `users` SET `region` = '' WHERE `user_id` = '$id'");
  }

  if (isset($_POST['street_button'])) {
    $decision = $mysql->query("UPDATE `users` SET `street` = '' WHERE `user_id` = '$id'");
  } ?>
</body>
</html>
