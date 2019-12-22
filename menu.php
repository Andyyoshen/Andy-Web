<?php
$file_path = $_SERVER['PHP_SELF'];
$file_name = basename($file_path,".php");

switch($file_name){
    case 'Supper_list':
        $page_index = 1;
        break;
    case 'Supper':
        $page_index = 1;
        break;
    case 'work_list':
        $page_index = 2;
        break;
    case 'work':
        $page_index = 2;
        break;
    case 'about':
        $page_index = 3;
        break;
    case 'register':
        $page_index = 4;
        break;
    default:
        $page_index = 0;
        break;
}
?>

<div class="top">
    <link rel="stylesheet" href="all.css">
    <div id="my-color" class="jumbotron" style="background-color:bisque">
        <div class="container">
            <div class="row">
                <div class="co-xs-12">
                            <h1 class="text-center">公司網站</h1>
<ul class="nav nav-pills">
<li role="presentation" <?php echo ($page_index == 0)?"class='active'":"";?>><a href="First.php">首頁</a></li>
<li role="presentation" <?php echo ($page_index == 1)?"class='active'":"";?>><a href="Supper_list.php">所有文章</a></li>
<li role="presentation"  <?php echo ($page_index == 2)?"class='active'":"";?>><a href="work.php">所有作品</a></li>
<li role="presentation"  <?php echo ($page_index == 3)?"class='active'":"";?>><a href="about.php">關於我們</a></li>
<li role="presentation" <?php echo ($page_index == 4)?"class='active'":"";?>><a href="register.php">註冊</a></li>
</ul>
                    
                </div>
             </div>
        </div>
    </div>
</div>
