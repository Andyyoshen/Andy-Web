<?php
//print_r($_POST)
//echo $_POST['data'];
include("Listdb.inc.php");
include("function.php");
//require_once 'function.php';
//echo $_POST['un'];
//print_r($_POST);
    
$check = update_user($_POST['id'],$_POST['un'],$_POST['pw'],$_POST['n']);

if($check)
{
    //帳號存在
    echo 'yes';
}
else
{
    //echo $_POST['un'];
    echo 'No';
}

?>