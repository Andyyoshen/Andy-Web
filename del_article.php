<?php
//print_r($_POST)
//echo $_POST['data'];
include("Listdb.inc.php");
include("function.php");
//require_once 'function.php';
//echo $_POST['un'];
//print_r($_POST);
    
$check = del_article($_POST['id']);

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