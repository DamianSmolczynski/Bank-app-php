<?php

$idGenerated = false;

function idGen($idGenerated,$host,$db_user,$db_password,$db_name){

    while($idGenerated == false){
    $newID = mt_rand(100000000,999999999);
   
        $db_check = new mysqli($host,$db_user,$db_password,$db_name);
        if ($db_check->connect_errno!=0){
            echo "ERRPR";
          } else{
              if(!($req = $db_check->query("SELECT id FROM users WHERE id='$newID'")))
              {
                  $_SESSION['newID'] = $newID;
                  $idGenerated = true;
              }
            }
        }
    }
    



?>