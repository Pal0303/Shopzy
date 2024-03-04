<?php


if(!isset($_SESSION['email'])){
    include('login_user.php');
}
else{
    include('payment.php');
 }
 

?>


