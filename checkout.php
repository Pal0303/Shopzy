<?php
include('header.php');
require_once('functions/common_func.php');

if(!isset($_SESSION('username'))){
    include('user/register_user.php');
}

include('footer.php');
?>