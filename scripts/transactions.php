<?php
 session_start();
 require_once "connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);

if($connection->connect_errno!=0){
    echo "Error :".$connection->connect_errno;
    $_SESSION['user_active'] = 0;
}

else{
    $acNum = $_SESSION['acNumber'];
   

    if($transaction = @$connection->query("SELECT * FROM transactions WHERE senderAcNum = '$acNum'")) {
        
            $transaction_pool = $transaction->fetch_assoc();
            $_SESSION['tDate'] = $transaction_pool['transactionDate'];
            $_SESSION['tName'] = $transaction_pool['transactionName'];
            $_SESSION['tAmmount'] = $transaction_pool['ammount'];
            
        }
        
    

}
header('Location: ../page1/page1.php');

?>