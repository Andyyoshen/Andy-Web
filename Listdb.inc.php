<?php
 
    //if(!isset($_SESSION)) 
   // { 
       @ session_start(); 
    //} 

$host = 'localhost';
$dbuser = 'root';
$dbpw = '';
$dbname = 'login';
//$datas = array();
$GLOBALS['link']= mysqli_connect($host,$dbuser,$dbpw,$dbname);
//$link = mysqli_connect($host,$dbuser,$dbpw,$dbname);
//$sql = "SELECT * FROM us ";
//$result = mysqli_query($link,$sql);
//$row=mysqli_num_rows($result);
//$row=mysqli_fetch_array($result); 
//while ($row = mysqli_fetch_assoc($result))
//{
 //   $datas[] = $row;
    //echo "<br>";
//}   
//foreach($datas as $key => $row)
//{
  //  print_r($row['un']);
   // print_r($row['pw']);
//echo($key);
//}
 //echo "<br>";
 //while ($row =mysqli_fetch_array($result))
 //{
  //          print_r($row);
 //}
   // print_r($datas);
    //print_r( $row["pw"]);
//for ($x = 0; $x <= 10; $x++) {
//$row = mysqli_fetch_array($result);
  //  print_r($row[1]);
//}

    


//echo $row[0];
if($link)
{
    mysqli_query($link,"SET NAMES utf8");
//echo "連線";
}

else 
{
    echo 'NO';
    
 }

?>