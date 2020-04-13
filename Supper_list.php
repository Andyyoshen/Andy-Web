<?php
require_once 'Listdb.inc.php';
require_once 'function.php';
$ss = get_publicsh_article();
//print_r($ss);
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
    </head>
    <link rel="stylesheet" href="all.css">
    <body>
        <?php include_once 'menu.php';?>
         <div class="main">
          <div class="container">
            <div class="row">
              <div class="co-xs-12">
                  <?php if(!empty($ss)):?>
                  <?php foreach($ss as $article):?>
                 <?//php echo $_Get['i'];?>
                    <?php
                        //$abstract = strip_tags($article['content']);
                        $article['content']= substr($article['content'],0,100);
                    
                    ?>
                  <?php //echo $article['id'];?>
                    <div class="panel panel-primary" id="aa">
                        <div class="panel-heading" >
                            <a class="bb" href='Supper.php?i=<?php echo $article['id'];?>' style="color:black;font-weight:bold;text-decoration:underline;"><?php echo $article['title'];?>
                                <?//php echo $_Get['i'];?>
                            </a>
                        </div>
                        <div class="panel-body">
                         <p>
                            <span class="label label-info"><?php echo $article['category'];?></span>
                            <span class="label label-danger"><?php echo $article['create_date'];?></span>
                         </p>
                            <?php echo $article['content'];?>
                            <?php echo '<b>...More</b>';?>
                        </div>
                    </div>
                  <?php endforeach;?>
                  <?php endif;?>
              </div>
             </div>
             <a class="ccc"></a>
           </div>
         </div>        
         <?php include_once 'footer.php';?>
    <script>
     $(document).on('ready',function(){
        $(".panel").mouseenter(function(){
            $(this).find('.bb').css('color','red');
            //this.css('color','red');
        //    console.log($(this));
        //    console.log($("#aa"));
        //    console.log($("#bb"));
        //console.log($(this).css('color','red'));
        //console.log($(this).find('.bb'));
        });
        $(".panel").mouseleave(function(){
           $(this).find('.bb').css('color', 'black');
        })
        // $("#aa").mouseleave(function(){
        //    $("#bb").css('color', 'black');
        // })
     });
    </script>
    </body>
    
</html>