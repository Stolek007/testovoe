<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Добавить пользователя</title>
  </head>
  <body>
    <form action="php/add_user.php" method="post">
      <input type="text" name="firstName" placeholder="First Name">
      <input type="text" name="lastName" placeholder="Last Name">
      <input type="email" name="email" placeholder="Email">
      <select name="userType">
        <option value="User">User</option>
        <option value="Admin">Admin</option>
      </select>
      <input type="password" name="password" placeholder="Password">
      <button type="submit" name="button">Submit</button>
    </form>
  </body>
</html>
