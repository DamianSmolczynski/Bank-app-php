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
      <a href="../scripts/logout.php">Wyloguj się</a>
    </div>
    </nav>
    <div class="accountInfoWrapper">
      <div class="col ac">
        <div class="accountInfo">
          <div>Bank AC Number:</div>
          <?php echo '<div>'.$_SESSION['acNumber'].'</div>'; ?>
        </div>
      </div>
      <div class="col history">
        <div class="summaryWrapper">
          <div class="child">
            <div>Bank AC Number:</div>
            <?php echo '<div>'.$_SESSION['acNumber'].'</div>'; ?>
            <div>
              <div>Currency: </div>
              <?php echo '<div>'.$_SESSION['currency'].'</div>'; ?>
            </div>
            <div>
            <?php echo '<div>'.$_SESSION['fname'].'</div>'; ?>
            <?php echo '<div>'.$_SESSION['surname'].'</div>'; ?>
            </div>
          </div>
          <div class="child">
            <div>
              <div>Balance: </div>
              <?php echo '<div>'.$_SESSION['acBalance'].'</div>'; ?>
            </div>
            <div>
              <div>Avilable balance: </div>
              <?php echo '<div>'.$_SESSION['acBalance']-$_SESSION['acDebit'].'</div>'; ?>
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

