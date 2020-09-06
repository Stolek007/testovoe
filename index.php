<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Главная страница</title>
</head>
<body>
  <a href="add_user.php">Добавить автора</a>
  <?php require 'db/db.php'; ?>
  <?php $result = $mysql->prepare('SELECT * FROM `users` ORDER BY user_id');
  $result->execute();
  $allUsers = $result->fetchAll();
  ?>

  <?php foreach($allUsers as $user): ?>
    <form action="user_address.php" method="post">
      <input type="hidden" name="user_id" value="<?=$user['user_id']; ?>">
      <a href="#"><td><a href="#"><input type="submit" name="button" value="<?=$user['firstname']; ?>"></a></td></a>
    </form>
  <?php endforeach; ?>

</body>
</html>
