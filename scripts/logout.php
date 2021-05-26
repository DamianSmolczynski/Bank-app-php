<?php
session_start();
 $_SESSION['user_active']=false;
 header('Location: ../index.php');
 ?>