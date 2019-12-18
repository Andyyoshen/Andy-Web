<?php
$file_path = $_SERVER['PHP_SELF']; // 尋找路徑
$file_name = basename($file_path,".php"); //更改路徑名稱

switch($file_name){
    case 'Supper_list':
    case 'article_edit':
    case 'Supper_add':
    case 'article_list':
    case 'article_add':
        $page_index = 1;
        break;
    case 'work_list':
    case 'work_edit':
    case 'work_add':
        $page_index = 2;
        break;
    case 'member_list':
    case 'member_edit':
    case 'member_add':
        $page_index = 3;
        break;
    default:
        $page_index = 0;
        break;
}
?>

<div class="top">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="co-xs-12">
                            <h1 class="text-center">公司網站</h1>
<ul class="nav nav-pills">
<li role="presentation" ><a href="../First.php">前台首頁</a></li>
    <li role="presentation" <?php echo ($page_index == 0)?"class='active'":"";?>><a href="./">後台首頁</a></li>
<li role="presentation" <?php echo ($page_index == 1)?"class='active'":"";?>><a href="article_list.php">所有文章</a></li>
<li role="presentation"  <?php echo ($page_index == 2)?"class='active'":"";?>><a href="work_list.php">所有作品</a></li>
<li role="presentation"  <?php echo ($page_index == 3)?"class='active'":"";?>><a href="member_list.php">所有會員</a></li>
    <li role="presentation" ><a href="../php/logout.php">登出</a></li>
</ul>
                </div>
             </div>
        </div>
    </div>
</div>