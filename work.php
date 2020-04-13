<?php
require_once 'Listdb.inc.php';
require_once 'function.php';
$xx = get_publicsh_work();

?>
<!DOCTYPE HTML>
<html lang="zh-Tw">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>所有文章</title>
        <meta name="description" content="baseketball 超人,聯盟">
        <meta name="author" content="帥哥">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="shortcut icon" href="captain-america.png">
        <!-- <link rel="stylesheet" href="image_style.css"> -->
        
    </head>
    <link rel="stylesheet" href="all.css">
    <body>
        <?php include_once 'menu.php';?>
         <div class="main">
          <div class="container">
              <div class="row">
                  <?php if(!empty($xx)):?>               
                  <?php foreach($xx as $a_work):?>
                  <div class="co-xs-12 col-sm-4">
                    <div class="thumbnail">
                    <?php if($a_work['image_path']):?>
                    <img name="a" id="myImg" src="<?php echo $a_work['image_path'];?>" alt="Snow" style="width:100%;max-width:300px;cursor:pointer;" >
            <!--下面的include'image_html.php'檔的功能是要讓圖片變大(參考w3school)-->
                        <?php else:?>                       
                        <div class="embed-responsive embed-responsive-16by9">
                        <video src="<?php echo $a_work['video_path'];?>"  controls></video>
                        </div>                       
                        <?php endif;?>
                    <div class="caption">
                        <?php echo $a_work['intro'];?>
                        <p><a href="work_list.php?i=<?php echo $a_work['id'];?>" class="btn btn-primary" role="button">查看</a>
                        </p>
                    </div>
                  </div>
                </div>
                    
                <?php endforeach;?>
                <?//php else;?>                  
                <h1>沒有作品</h1>
                <?php endif;?>
              </div>             
           </div>
         </div>
        <?php include_once 'image_html.php';?> 
         <?php include_once 'footer.php';?>
    <style>
       /* #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
    </style>    
    </body>
</html>