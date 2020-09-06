<?php

$mysql = new mysqli('localhost', 'root', 'root', 'testovoe');

if(isset($_POST['selectVal']))
{
  $filter_id = $_POST['selectVal'];
  $result = $mysql->query("SELECT * FROM `users` WHERE `user_id` = '$filter_id'");
  $res = $result->fetch_assoc();
  echo json_encode($res);
}
else
{
  $result = $mysql->query("SELECT * FROM `users`");
  $res = $result->fetch_assoc();
  echo json_encode($res);
}
