<?php
  session_start();
  if(($_SESSION['user_active'] == false) || (!isset($_SESSION['user_active']))){
      header('Location: ../scripts/logout.php');
  }

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./page1style.css" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  <nav>
    <img src="./navLogo.png" alt="" class="navlogo">
    <ul>
      <li><a href="">Services</a></li>
      <li><a href="">Help</a></li>
      <li><a href="">Settings</a></li>
    </ul>
    <div class="userArea">
      <?php echo $_SESSION['fname']." ".$_SESSION['surname']; ?>
      <a href="../scripts/logout.php">Wyloguj się</a>
    </div>
    </nav>
    <div class="accountInfoWrapper">
      <div class="col ac">
        <div class="accountInfo">
          <div>Bank AC Number:</div>
          <?php echo '<div>'.$_SESSION['id'].'</div>'; ?>
        </div>
      </div>
      <div class="col history">
        <div class="summaryWrapper">
          <div class="child">
            <div>Bank AC Number:</div>
            <?php echo '<div>'.$_SESSION['id'].'</div>'; ?>
            <div>
              <div>Currency: </div>
              <div>GBP</div>
            </div>
            <div>
              <div>Name</div>
              <div>Surname</div>
            </div>
          </div>
          <div class="child">
            <div>
              <div>Balance: </div>
              <div>7.003</div>
            </div>
            <div>
              <div>Avilable balance: </div>
              <div>6.890</div>
            </div>
          </div>
        </div>
        <div class="quickActions">
          <button>Transfer</button>
          <button>Take a loan</button>
          <button>Your payes</button>
        </div>
        <div class="accountTransactions">
          <div class="header">

          </div>
          <div class="transactionsContainer">
            <div class="transaction">

            </div>
          </div>
        </div>
      </div>
    </div>
  
</body>
</html>

