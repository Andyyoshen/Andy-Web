<?php
//print_r($_POST)
//echo $_POST['data'];
include("Listdb.inc.php");
include("function.php");
//require_once 'function.php';
//echo $_POST['un'];
//print_r($_POST);
    
$check = update_article($_POST['id'],$_POST['title'],$_POST['category'],$_POST['content'],$_POST['publish']);

if($check)
{
    //帳號存在
    echo true;
}
else
{
    //echo $_POST['un'];
    echo 'No';
}

?>   