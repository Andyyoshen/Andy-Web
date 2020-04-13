<?php
//print_r($_POST)
include("../Listdb.inc.php");
include("../function.php");
//require_once 'function.php';
//print_r($_POST);


$check = verify_user($_POST['un'], $_POST['pw']);

if($check)
{
    //帳號存在
    echo 'yes';
}
else
{
    echo 'No';
}

?>