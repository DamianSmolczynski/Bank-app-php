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
  <div class="wrapper">
  </div>
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
          <div><strong> AC Number:</strong></div>
          <?php echo '<div>'.$_SESSION['acNumber'].'</div>'; ?>
        </div>
      </div>
      <div class="col history">
        <div class="summaryWrapper">
          <div class="child">
            <div><strong> AC Number:</strong></div>
            <?php echo '<div>'.$_SESSION['acNumber'].'</div>'; ?>
            <div>
              <div><strong>Currency: </strong></div>
              <?php echo '<div>'.$_SESSION['currency'].'</div>'; ?>
            </div>
            <div>
            <div><strong>AC Holder: </strong></div>
            <?php echo '<div>'.$_SESSION['fname'].'</div>'; ?>
            <?php echo '<div>'.$_SESSION['surname'].'</div>'; ?>
            </div>
          </div>
          <div class="child">
            <div>
              <div><strong>Balance: </strong></div>
              <?php echo '<div>'.$_SESSION['acBalance'].'</div>'; ?>
            </div>
            <div>
              <div><strong>Avilable balance: </strong></div>
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
            <div>Date</div>
            <div>Transaction name</div>
            <div>Amount</div>

          </div>
          <div class="transactionsContainer">
            <div class="transaction">
              <?php 
              
                if(isset($_SESSION['tDate'])){
                  echo "<div>".$_SESSION['tDate']."</div>";
                  echo "<div>".$_SESSION['tName']."</div>";
                  echo "<div>".$_SESSION['tAmmount']."</div>";
                }
                
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</body>
</html>

