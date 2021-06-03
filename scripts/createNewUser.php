<?php 
    session_start();
    if(isset($_POST['newName'])){

        $noErrors = true;
        $user = $_POST['newLogin'];
        $fname = $_POST['newName'];
        $surname = $_POST['newSurname'];
        $phone = $_POST['newPhone'];
        $email = $_POST['newMail'];
        if(isset($_POST['newTerms'])){
        $terms = $_POST['newTerms'];}
        $emailSanitized = filter_var($email,FILTER_SANITIZE_EMAIL);

    
    if(ctype_alnum($user)==false){
        $_SESSION['newLoginErr'] = "Wrong set of characters, use onyly alphanumeric";
        $noErrors = false;
        echo "Wrong set of characters, use onyly alphanumeric";
     }

    if(ctype_alpha($fname)==false){
        $_SESSION['newNameErr'] = "Please use only english signs in Name";
        $noErrors = false;
        echo "Please use only english signs in Name";
     }
    if(ctype_alpha($surname)==false){
        $_SESSION['newSurnameErr'] = "Please use only english signs in Surname";
        $noErrors = false;
        echo "Please use only english signs in Surname";
    }
    if(ctype_digit($phone)==false){
        $_SESSION['newPhoneErr'] = "Please use only numbers";
        $noErrors = false;
        echo "Please use only numbers";
    }
    if(strlen($phone)!=9){
        $_SESSION['newPhoneErr'] = "Please use 9 digits";
        $noErrors = false;
        echo "Please use 9 digits";
    }
    

    if((filter_var($emailSanitized,FILTER_VALIDATE_EMAIL)==false) || ($emailSanitized != $email)) {
        $noErrors = false;
        $_SESSION['newMailErr']="This email address is not valid";
        echo "This email address is not valid";
    }
    $password1 = $_POST['newPassword'];
    $password2 = $_POST['newPasswordCheck'];

    if((strlen($password1)<8) || (strlen($password1)>20)) {
        $noErrors = false;
        $_SESSION['newPasswordErr']="Password has to have from 8 to 20 digits";
        echo "Password has to have from 8 to 20 digits";
    }

    if($password1 != $password2){
        $noErrors = false;
        $_SESSION['newPasswordErr']="Passwords don't match";
        echo "Passwords don't match";
    }
    $password_hash = password_hash($password1, PASSWORD_DEFAULT);

    if(!isset($_POST['newTerms'])){
        $noErrors=false;
        $_SESSION['newTermsErr']="You have to accept terms and conditions";
        echo "You have to accept terms and conditions";
    }
    $mySecret = '6LcCPgYbAAAAABzxtaaNHIeKuKAA5MHnKpFdxlIJ';

    $keyCheck = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$mySecret.'&response='.$_POST['g-recaptcha-response']);

    $answer = json_decode($keyCheck);

    if ($answer->success==false) {
      $mySecret=false;
      $_SESSION['captchaErr']='Please confirm that you are not robot ;)';
      echo 'Please confirm that you are not robot ;)';
    }

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $db_connection = new mysqli($host,$db_user,$db_password,$db_name);
        if ($db_connection->connect_errno!=0){
            throw new Exception(mysqli_connect_errno());
          } else{
              
              $result = $db_connection->query("SELECT mail FROM users WHERE mail='$email'");
              if(!$result){ throw new Exception($db_connection->error);}
              
              $emailCounter = $result->num_rows;
              if($emailCounter>0){
                $noErrors=false;
                $_SESSION['newMailErr']="There is already an account with provided email";
              }

              $result = $db_connection->query("SELECT user FROM users WHERE user='$user'");
              if(!$result){ throw new Exception($db_connection->error);}
              
              $userCounter = $result->num_rows;
              if($userCounter>0){
                $noErrors=false;
                $_SESSION['newLoginErr']="There is already an acoout with provided login";
              }
              if($noErrors==true) {
                $terms = 1;
                $loopFlag = true;
                while($loopFlag == true){
                $newID = mt_rand(100000000,999999999);
                

                if($duplicate = $db_connection->query("SELECT * FROM users WHERE id='$newID'")){
                    $user_count = $duplicate->num_rows;
                    if($user_count > 0){
                      $loopFlag = true;
                    }
                    else{
                      $loopFlag = false;
                    }
                  }
                }


                if($db_connection->query("INSERT INTO users VALUES ('$newID','$user','$surname','$phone','$email','$password_hash','$terms','$fname')")) {
                  $_SESSION['signUpSuccess']=true;
                  header("Location: ../index.php");

                }
                else {
                  throw new Exception($db_connection->error);
                }
            
            }
              $db_connection->close();
            }


    } catch (Exception $e) {
        echo 'Server Error';
        echo '<br/>Informacja developerska: '.$e;
    } 

  }

?>