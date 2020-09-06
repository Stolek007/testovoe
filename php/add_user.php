<?php

require '../db/db.php';
// Получаем и фильтруем данные
$firstName = filter_var(trim($_POST['firstName']), FILTER_SANITIZE_STRING);
$lastName = filter_var(trim($_POST['lastName']), FILTER_SANITIZE_STRING);
$email = trim($_POST['email']);
$userType = $_POST['userType'];
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$date = date('Y-m-d H:i:s');
$errors = []; // Массив ошибок

if (mb_strlen($firstName) < 2) {
  array_push($errors, 'Слишком короткое имя');
}

if(mb_strlen($lastName) < 3) {
  array_push($errors, 'Слишком короткая фамилия');
}

if(mb_strlen($password) < 6) {
  array_push($errors, 'Слишком ненадежный пароль');
}

if (!empty($errors)) {
  for ($i = 0; $i < count($errors); $i++) {
    echo $errors[$i];
    $exit();
  }
}
else if (empty($errors)) {

}
$password = md5($password);

$result = $mysql->prepare("SELECT * FROM `users` WHERE `email` = '$email'");
$result->execute();
$test_result = $result->fetch_assoc();

if(!empty($test_result)) {
  echo "Пользователь с таким email уже существует!";
  exit();
}

else if(empty($test_result)) {

}

$res = $mysql->prepare("INSERT INTO `users` (`firstName`, `lastname`, `email`, `user_type`, `password`, `created_at`, `city`, `postcode`, `region`, `street`)
VALUES ('$firstName', '$lastName', '$email', '$userType', '$password', '$date', '', '', '', '')");
$res->execute();

header('Location:../index.php');
