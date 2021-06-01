<?php
  session_start();
  
  if((isset($_SESSION['user_active'])) && ($_SESSION['user_active']==true)){
      header('Location: ./page1/page1.php');
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./singin.css">
    <title>Document</title>
</head>
<body>
    <div class="signInArea">
        <img src="./logo.png" alt="logo" class="logo"></img>
        <form action="./scripts/login.php" method="POST">
            <label for="login">Login</label>
            <input type="text" name="login"></input>
            <div class="labelWrapper">
            <label for="password" class="first">Password</label>
            <label for="password" class="second"><a href='https://google.com'>forgot password?</a></label>
            </div>
            <input type="password" name="password"></input>
            <button type="submit" >Sing in</button>
            <?php
        if(isset($_SESSION['user_count_error'])){
            if($_SESSION['user_count_error']==1) {echo '<p id="error">Wrong login or password</p>'; $_SESSION['user_count_error']=0;
        }
        }
    ?>
        </form>
    
    <div class = "singUpWrapper">
        <p>New to BankApp? <a href="./signup/signup.php">Sing up</a></p>
    </div>
    <div class="footerLinks">
        <a href="http://olx.pl">Security</a><a href="http://youtube.com">FAQ</a><a href="http://google.com">Contact us</a>
    </div>
</body>
</html>