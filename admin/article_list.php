<?php
require_once '../Listdb.inc.php';
require_once '../function.php';
print_r($_SESSION);
if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location: login.php");
}
$datas = get_all_article();

//print_r($datas);
?>

<!DOCTYPE HTML>
<html lang="zh-Tw">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>公司網站-後台-文章列表</title>
        <meta name="description" content="baseketball 超人,聯盟">
        <meta name="author" content="帥哥">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="shortcut icon" href="../captain-america.png">
        <link rel="stylesheet" href="../all.css">
    </head>
<!--    <link rel="stylesheet" href="../all.css">-->
    <body>
       <?php include_once 'menu.php';?>
         <div class="main">
          <div class="container">
            <div class="row add_btn_area">
              <div class="co-xs-12">
                  <a href="article_add.php" class="btn btn-primary">新增文章</a>
              </div>
             </div>
              <div class="row">
                  <div class="col-xs-12">
                      <table class="table table-hover">
                          <tr>
                          <th>分類</th>
                          <th>標題</th>
                          <th>是否發布</th>
                          <th>建立時間</th>
                          <th>管理動作</th>
                          </tr>
                          <?php if(!empty($datas)):?>
                          <?php foreach($datas as $a_data):?>
                          <tr>
                            <td><?php echo $a_data['category'];?></td>
                            <td><?php echo $a_data['title'];?></td>
                            <td><?php echo ($a_data['publish'])?'發布中':'下架中';?></td>
                            <td><?php echo $a_data['create_date'];?></td>
                            <td>                            
                                <a href="article_edit.php?i=<?php echo $a_data['id'];?>" class="btn btn-success">編輯</a>  
                                <a href="javascript:void(0);" class="btn btn-danger del_article" data-id="<?php echo $a_data['id'];?>">刪除</a>
                            </td>
                          </tr>
                          <?php endforeach;?>
                          <?php else:?>
                          <tr>
                            <td>無資料</td>
                          </tr>
                          <?php endif;?>  
                      </table>
                  </div>
              </div>
           </div>
         </div>        
         <?php include_once 'footer.php';?>
<!--------------------------------------以下為刪除資料---------------------------------->
        
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
        $(document).on("ready",function(){
             // 當帳號輸入後 檢查帳號是否重複
            
            $("a.del_article").on("click",function(){
                var c = confirm("妳確定要刪除嗎");
                    this_tr = $(this).parent().parent();
            
            if(c)
                {
                      $.ajax({
                        type : "POST", //表單傳送的方式 同 form 的method屬性
                        url  : "../del_article.php", //目標給哪個檔案 同 form 的 action 屬性
                        data : {//為要傳過去的資料 使用物件方式呈現 因為變數key值為英文的關係 所以用物件方式送 。 ex{name : "輸入的名子",password : "輸入的密碼"}
                        'id'    : $(this).attr("data-id")
                        },
                        dataType: 'html' //設定該網頁回應的會是 html 格式
                    }).done(function(data){
                        console.log(data);
                        if(data == true)
                        {
                            alert("刪除成功.點擊確認回到列表頁"); 
                            //window.location.href = "article_list.php";
                             //this_tr.fadeOut();
                        }
                        else
                        {
                            //console.lag('n');
                            alert("刪除失敗" + data);
                            //this_tr.fadeOut();
                        }
                        
                    }).fail(function(jqXHR,textStatus,errorThrom){
                        //失敗的時候
                        alert("有錯誤");
                        console.lag(jqXHR.responseText);
                    });
                }
            });
            
                     
        });
        </script>   
        
        
        
        
        
    </body>
</html>