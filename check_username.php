<?php
//print_r($_POST)
include("Listdb.inc.php");
include("function.php");
//require_once 'function.php';
//print_r($_POST);
$check = check_has_username($_POST['n']);

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