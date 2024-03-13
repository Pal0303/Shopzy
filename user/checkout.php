<?php

session_start();
if(!isset($_SESSION['email'])){
    include('login_user.php');
}
else{
    header('Location: ../payment.php');
    ob_end_flush();
exit;
 }
 

?>


