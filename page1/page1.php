<?php
  session_start();
  if(($_SESSION['user_active'] == false) || (!isset($_SESSION['user_active']))){
      header('Location: ../scripts/logout.php');
  }

  echo '<a href="../scripts/logout.php">Wyloguj się</a>';
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>
</head>
<body>

</body>
</html>

