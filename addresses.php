<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Заголовок</title>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>

  <?php require 'db/db.php';
  $result = $mysql->prepare("SELECT * FROM `users`");
  $result->execute();
  $res = $result->fetchAll();
  ?>
  <select id="select">
    <?php foreach ($res as $us): ?>
      <option value="<?=$us['user_id']; ?>"><? echo $us['firstname'] . "\n" . $us['lastname'] . "\n"; ?></option>
    <?php endforeach; ?>
  </select>

  <script type="text/javascript">
  $('#select').on("change", function(){
    let select = document.getElementById("select");
    let val = select.value;

    $.ajax({
      url: 'ajax.php',
      type: 'POST',
      data: {'selectVal':val},
      success: function(data){
        let isData = JSON.parse(data);
        $('#p1').text(isData['city']);
      }
    })

  });
  </script>
<br><br>
  <?php foreach ($res as $r): ?>
    <?php echo $r['city'] . "\n" . $r['postcode'] . "\n" . $r['region'] . "\n" . $r['street'] . "<br />"; ?>
  <?php endforeach; ?>

  <p id="p1"></p>
  <p id="p2"></p>
</body>
</html>
