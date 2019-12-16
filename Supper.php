<?php
require_once 'Listdb.inc.php';
require_once 'function.php';
$aa = get_article($_GET['i']);
//error_reporting(E_ALL ^ E_NOTICE); 
//echo $article['title'];
echo $_GET['i'];
//print_r($ss);
?>
<!DOCTYPE HTML>
<html lang="zh-Tw">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $aa['title'];?></title>
        <meta name="description" content="baseketball 超人,聯盟">
        <meta name="author" content="帥哥">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="shortcut icon" href="captain-america.png">
    </head>
    <link rel="stylesheet" href="all.css">
    <body>
        <?php include_once 'menu.php';?>
         <div class="main">
          <div class="container">
            <div class="row">
              <div class="co-xs-12">
                  <h1><?php echo $aa['title'];?></h1>
                  <hr>
                  <?php echo $aa['content'];?>
              </div>
             </div>
           </div>
         </div>        
         <?php include_once 'footer.php';?>
    
    </body>
</html>