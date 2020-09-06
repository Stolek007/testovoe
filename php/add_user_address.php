<?php

require '../db/db.php';

$user_id = $_POST['user_id'];
$user_city = $_POST['city'];
$user_postcode = $_POST['postcode'];
$user_region = $_POST['region'];
$user_street = $_POST['street'];

if (mb_strlen($user_city) < 1 && mb_strlen($user_city) != 0) {
  array_push($errors, 'Слишком короткое название города');
}

if (mb_strlen($user_postcode) < 6 && mb_strlen($user_postcode) != 0) {
  array_push($errors, 'Слишком короткий postcode');
}

if (mb_strlen($user_region) < 1 && mb_strlen($user_region) != 0) {
  array_push($errors, 'Пустое поле(Регион)');
}

if (mb_strlen($user_street) < 1 && mb_strlen($user_street) != 0) {
  array_push($errors, 'Слишком короткое название улицы');
}

if (!empty($errors)) {
  for ($i = 0; $i < count($errors); $i++) {
    echo $errors[$i];
  }
  exit();
}
else if (empty($errors)) {

}

if (mb_strlen($user_city) < 1) {
  $user_city = '';
}

if (mb_strlen($user_postcode) < 1) {
  $user_city = '';
}

if (mb_strlen($user_region) < 1) {
  $user_region = '';
}

if (mb_strlen($user_street) < 1) {
  $user_street = '';
}


$result = $mysql->prepare("UPDATE `users` SET `city` = '$user_city', `postcode` = '$user_postcode', `region` = '$user_region', `street` = '$user_street' WHERE `user_id` = '$user_id'");
$result->execute();
header('Location: ../user_address.php');

?>
