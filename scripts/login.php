<?php
 session_start();
 require_once "connect.php";
 if((!isset($_POST['login'])) || (!isset($_POST['password']))) {
     header('Location: ../index.php');
     exit();
 }

 $connection = @new mysqli($host,$db_user,$db_password,$db_name);

 if($connection->connect_errno!=0){
     echo "Error :".$connection->connect_errno;
     $_SESSION['user_active'] = 0;
 }
 else{
     $login = $_POST['login'];
     $password = $_POST['password'];

     unset($POST);

     $login = htmlentities($login,ENT_QUOTES,"UTF-8");
     $password = htmlentities($password,ENT_QUOTES,"UTF-8");

     if($result = @$connection->query(sprintf("SELECT * FROM users WHERE user='%s' AND pass='%s'",
     mysqli_real_escape_string($connection,$login),
     mysqli_real_escape_string($connection,$password)))){
       $user_count = $result->num_rows;
       if($user_count == 1){
           $user_pool = $result->fetch_assoc();
           $_SESSION['user'] = $user_pool['user'];
           $_SESSION['password'] = $user_pool['pass'];
           $_SESSION['surname'] = $user_pool['surname'];
           $_SESSION['phone'] = $user_pool['phone'];
           $_SESSION['terms'] = $user_pool['terms'];
           $_SESSION['fname'] = $user_pool['fname'];

           
           
           $_SESSION['user_active'] = true;
           $result->close();
           header('Location: ../page1/page1.php');
       }
       else if($user_count>1){
           echo "Critical data base error";
           $_SESSION['user_active'] = false;
       }
            else {
        $_SESSION['user_count_error'] = 1;
        $_SESSION['user_active'] = false;
        header('Location: ../index.php');
       }
    }
}
 $connection->close();
?>