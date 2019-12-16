<?php
require_once 'Listdb.inc.php';
require_once 'function.php';
//$xx = get_publicsh_work();
$xx = get_work($_GET['i']);
//echo $_GET['i'];
//$site_title = strip_tags($work['intro']);
//$site_title = substr($site_title,0,12) . "...";

?>
<!DOCTYPE HTML>
<html lang="zh-Tw">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $xx['intro'];?></title>
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
                  
                  <div class="co-xs-12 col-sm-4">
                    <div class="thumbnail">
                    <?php if($xx['image_path']):?>
                    <img src="<?php echo $xx['image_path'];?>">
                        <?php else:?>
                        <div class="embed-responsive embed-responsive-16by9">
                        <video src="<?php echo $xx['video_path'];?>"  controls></video>
                        </div>
                        
                        <?php endif;?>
                    <div class="caption">
                        <?php echo $xx['intro'];?>
                    </div>
                  </div>
                </div>
              </div>             
           </div>
         </div>

         <?php include_once 'footer.php';?>
    
    </body>
</html>